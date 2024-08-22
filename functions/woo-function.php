<?php
//Filter WooCommerce Flexslider options - Add Navigation Arrows
add_filter( 'woocommerce_single_product_carousel_options', 'filter_single_woo_flexslider_options' );
function filter_single_woo_flexslider_options( $options ) {
		$options['directionNav'] = true;
		$options['prevText'] = '<i class="fa-solid fa-angle-up"></i>';
		$options['nextText'] = '<i class="fa-solid fa-angle-down"></i>';
        $options['smoothHeight'] = false;
//         $options['direction'] = "vertical";
        $options['controlNav'] = 'thumbnails';
        $options['animation'] = "slide";
        $options['slideshow'] = false;
    return $options;
}



function product_gallery_slider(){
?>
<script>
	/* scroll the images through images index*/
	const updateCarousel = (selectedImgIndex, lastImgIndex) => {
		let indexOfImgToScroll = selectedImgIndex - 3;
		if (selectedImgIndex < 3 || lastImgIndex <= 3) indexOfImgToScroll = -1;
		else if (selectedImgIndex === lastImgIndex) indexOfImgToScroll = indexOfImgToScroll - 1;

		const liElements = document.querySelectorAll(".flex-control-thumbs li");
		liElements.forEach((li, i) => {
			const liWidth = li.offsetWidth; // Get the width of the li element
			if (window.innerWidth <= 575) {
				// Horizontal scrolling for mobile
				if (i <= indexOfImgToScroll) li.style.marginLeft = `-${liWidth + 10}px`;
				else li.style.marginLeft = '0';
			} else {
				// Vertical scrolling for larger screens
				if (i <= indexOfImgToScroll) li.style.marginTop = '-150px';
				else li.style.marginTop = '0';
			}
			li.style.transition = 'all 0.4s linear';
		});
	};

	/* Mutation observer is used to keep the record of active images and change the image accordingly*/
	document.addEventListener("DOMContentLoaded", (event) => {
		setTimeout(() => {
			let observer = new MutationObserver((mutations) => {
				mutations.forEach((mutationRecord) => {
					if (mutationRecord.target.className === "flex-active") {
						const allElements = mutationRecord.target.parentNode.parentNode.children;
						const targetedElement = mutationRecord.target.parentNode;
						const indexOfTargetedElement = Array.from(allElements).indexOf(targetedElement);
						const lastElementIndex = document.querySelectorAll(".flex-control-thumbs li").length - 1;

						updateCarousel(indexOfTargetedElement, lastElementIndex);
					}
				});
			});

			document.querySelectorAll(".flex-control-thumbs li img").forEach((img, i) => {
				observer.observe(img, {
					attributes: true,
					attributeFilter: ['style', 'class'],
				});
			});
		}, 0);
	});
</script>

<style>
	@media (max-width: 575px) {
		.flex-control-thumbs {
			display: flex;
			overflow-x: auto;
			white-space: nowrap;
			width: calc(100% - 50px);
		}
		.woocommerce-js div.product div.woocommerce-product-gallery--columns-4 .flex-control-thumbs li {
			max-width: calc(25% - 8px);
			flex: 0 0 100%;
			margin-right: 10px !important;
			margin-bottom: 0;
			transition: margin 0.4s linear;
			height:76px;
		}
		.single_product_details .flex-direction-nav{
			right:0;
			left:auto;
			top:auto;
			bottom:0;
			flex-direction: column;
			row-gap:10px;
		}
		.single_product_details .flex-direction-nav li a {
			width: 35px;
			height: 35px;
		}
		.woocommerce-js div.product div.woocommerce-product-gallery--columns-4 .flex-control-thumbs li img{
			width: 100%;
			height:100%;
			object-fit: scale-down;
		}
		.single_product_details .flex-direction-nav li.flex-nav-prev{
			transform: rotate(-90deg)
		}
		.single_product_details .flex-direction-nav li.flex-nav-next{
			transform: rotate(-90deg)
		}
	}
</style>
<?php
}
add_action('wp_footer', 'product_gallery_slider');

// Remove Related Product
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 10 );

// Define a function to add content after WooCommerce main content
function about_mold_content_after_main_content() {
    if (is_singular('product')) {
        get_template_part('section-template/about-mold', 'section');
    }
}
add_action('woocommerce_after_main_content', 'about_mold_content_after_main_content', 20);



add_action('woocommerce_checkout_process', 'disable_cod_for_virtual_products');
// add_action('woocommerce_before_checkout_form', 'disable_cod_for_virtual_products');
// add_action('woocommerce_before_cart', 'disable_cod_for_virtual_products');
add_filter('woocommerce_available_payment_gateways', 'remove_cod_payment_gateway', 10, 1);

function disable_cod_for_virtual_products() {
    if (!WC()->cart) {
        return;
    }

    $virtual_product_in_cart = false;
    $virtual_product_names = [];

    // Loop through the cart items
    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        if ($product->is_virtual()) {
            $virtual_product_in_cart = true;
            $virtual_product_names[] = $product->get_name();
            error_log('Virtual product found: ' . $product->get_name());
        }
    }

    // If there's a virtual product in the cart, disable COD
    if ($virtual_product_in_cart) {
        // Display a notice to the customer with a button to view the cart
        $cart_url = wc_get_cart_url();
        
        // Create the product names list in <ul><li> format
        $product_names_list = '<ul>';
        foreach ($virtual_product_names as $product_name) {
            $product_names_list .= '<li>' . esc_html($product_name) . '</li>';
        }
        $product_names_list .= '</ul>';

        $notice = sprintf(
            __('Cash on Delivery is not available for virtual products. <a href="%s" class="button">View Cart</a>'),
            esc_url($cart_url)
        );
        
        $notice .= sprintf(
            __('<br>You have selected the following virtual product(s): %s'),
            $product_names_list
        );
        
        wc_add_notice($notice, 'notice'); // Changed to 'info' notice type
        error_log('Virtual product names: ' . implode(', ', $virtual_product_names));
    }
}

function remove_cod_payment_gateway($available_gateways) {
    if (!WC()->cart) {
        return $available_gateways;
    }

    $virtual_product_in_cart = false;

    // Loop through the cart items
    foreach (WC()->cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        if ($product->is_virtual()) {
            $virtual_product_in_cart = true;
            break;
        }
    }

    // If there's a virtual product in the cart, remove COD payment gateway
    if ($virtual_product_in_cart) {
        if (isset($available_gateways['cod'])) {
            unset($available_gateways['cod']);
        }
    }

    return $available_gateways;
}


// Make the phone number field required for billing and shipping
add_filter('woocommerce_billing_fields', 'make_billing_phone_required');
add_filter('woocommerce_shipping_fields', 'make_shipping_phone_required');

function make_billing_phone_required($fields) {
    $fields['billing_phone']['required'] = true;
    return $fields;
}

function make_shipping_phone_required($fields) {
    $fields['shipping_phone']['required'] = true;
    return $fields;
}

