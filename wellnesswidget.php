<?php
/*
Template Name: Wellness Widget Page Template
*/
?>

<?php get_header(); ?>
<section class="weather_page " >
    <div class="container">
        <div class="">
			<div class="welcome-container-mobile">
			<img src="https://nuvedo.com/wp-content/uploads/2022/03/weather-e1648668406832.png" alt="">
			<h1 class="weather_page_title">Discover the mushroom extract that aligns with your wellness goals. Select the benefit you're looking for and let us guide you to the perfect choice.</h1>
		</div>
            <div class="weather_search_form">
				<div class="benifits">	
					<div style="color: #fff; font-size: 22px;">What is your primary wellness goal?</div>
					<div>						
						<input class="selection" type="radio" name="que" value="1" id="ans1">
						<label for="ans1" class="desc">Immune Support</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="2" id="ans2">
						<label for="ans2" class="desc">Energy & Endurance</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="3" id="ans3">
						<label for="ans3" class="desc">Cognitive Health/ Brain Boost</label>
					</div>
					<div> 
						<input class="selection" type="radio" name="que" value="4" id="ans4">
						<label for="ans4" class="desc">Skin Health</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="5" id="ans5">
						<label for="ans5" class="desc">Stress Relief</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="6" id="ans6">
						<label for="ans6" class="desc">Gut Health</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="7" id="ans7">
						<label for="ans7" class="desc">Sleep Quality</label>
					</div>
					<div>
						<input class="selection" type="radio" name="que" value="8" id="ans8">
						<label for="ans8" class="desc">Sexual Health</label>
					</div>
					<button id="submit" class="pinCheckBtn">Suggest Products</button>
				</div>
				<div class="container">
    <div class="product_cat_card_wrappers weather_products">
        <?php
            $args = array(
                'product_cat' => 'mushroom_tincture',
                'posts_per_page' => -1,
                'orderby' => 'rand'
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
				?>
                <div style="border: 2px solid #cccccc; border-radius: 10px; padding: 20px; margin-bottom: 30px"class="product_card weather_product_card" id="<?php echo get_the_id();?>">
                    <a style="width:50%;" href="<?php echo get_permalink( ) ?>">
                        <div class="product_card_image_wrapper">
                            <div class="product_image">
                                <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />

                            </div>
                            
                       </div>
                    </a>
                    <div style="margin-bottom: 30px;"class="product_details_wrapper">
                        <div class="product_item_name">
                            <a href="<?php echo get_permalink( ) ?>">
                                <h2 style="font-size: 20px; font-weight: 700; color: #c75328;0"> <?php the_title(); ?></h2>
                            </a>
                            <div style="margin-top:20px;" class="product_item_description">
                            <?php
                            $product_id = $product->get_id();
                            $custom_content = '';

                            if ($product_id == 4989) {
                                $custom_content = '<p><b>Main Benifits : </b>Cognitive Health/ Brain Boost, Stress Relief, Gut Health</p><p><b>Additional Benifits : </b>Mild Anxiety & Stress, Gastric Ulcers & Gut Health , Nerve Growth Stimulation</p>';
                            } elseif ($product_id == 4990) {
                                $custom_content = '<p><b>Main Benifits : </b>Energy & Endurance, Sexual Health</p><p><b>Additional Benifits: </b>Respiratory Wellness, Kidney Support, Cancer Support, Heart Health</p>';
                            } elseif ($product_id == 4991) {
                                $custom_content = '<p><b>Main Benifits : </b>Immune Support, Stress Relief, Gut Health, Sleep Quality</p><p><b>Additional Benifits : </b>Cardiovascular Health, Liver Support, Kidney Support, Fighting Infections, Cancer Support, Respiratory Wellness, Fatigue, Gut Health, Immune Support</p>';
                            } elseif ($product_id == 4992) {
                                $custom_content = '<p><b>Main Benifits : </b>Immune Support, Skin Health, Gut Health</p><p><b>Additional Benifits : </b>Heart Health, Immune Support, High in Vitamins & Minerals, Gut Health, Cancer Support</p>';
                            }

                            // Default content if no specific case matches
                            if (empty($custom_content)) {
                               $custom_content = '<p>' . get_field('short_description') . '</p>';

                            }

                            echo $custom_content;
                            ?>
                            </div>
                        </div>
                        <div class="content_price">
                            <?php if ($product->get_regular_price()): ?>
                                <span class="price product-price <?=($product->get_sale_price()) ? "strike":""; ?> ">
                                        &#x20B9; <?php echo $product->get_regular_price(); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($product->get_sale_price()): ?>
                                <span class="price old-price">
                                &#x20B9; <?php echo $product->get_sale_price(); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="add-to-cart ">
                            <?php
                                $specific_ids = array(2513);
                                if( in_array($product->get_id(), $specific_ids) ) {
                                    echo sprintf( '<a href="#" class="%s">%s</a>',
                                    esc_attr( implode( ' ', array_filter( array(
                                            'button aprilFoolButtonTrigger', 'product_type_' . $product->get_type(),
                                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                                    ) ) ) ),
                                    esc_html( $product->add_to_cart_text() )
                                    );
                                } else{
                                    echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
                                    esc_url( $product->add_to_cart_url() ),
                                    esc_attr( implode( ' ', array_filter( array(
                                            'button', 'product_type_' . $product->get_type(),
                                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                                    ) ) ) ),
                                    wc_implode_html_attributes( array(
                                            'data-product_id'  => $product->get_id(),
                                            'data-product_sku' => $product->get_sku(),
                                            'aria-label'       => $product->add_to_cart_description(),
                                    ) ),
                                    esc_html( $product->add_to_cart_text() )
                                    );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
    </div>
		<div class="" id="additional_text">
		</div>
		<div class="welcome-container">
			<img src="https://nuvedo.com/wp-content/uploads/2022/03/weather-e1648668406832.png" alt="">
			<h1 class="weather_page_title">Discover the mushroom extract that aligns with your wellness goals. Select the benefit you're looking for and let us guide you to the perfect choice.</h1>
		</div>
					<div class="noprod-error">
			   <img src="https://nuvedo.com/wp-content/uploads/2021/05/1.png" alt="" width="200">
			   <p>Unusual inputs detected! For the best product recommendations, adjust the inputs you have provided. Let's grow amazing mushrooms together!</p>
    			<p>-Team Nuvedo | In Mushrooms We Trust</p>
    			
		</div>
</div>
				
            </div>
<!-- 			<div class="weather-error">
				<p class="error-message">
					Looks like the humidity is lower than expected in your location. Please make sure you spray extra water on your kits for best 				results.</p>
			</div> -->
	
        </div>

    </div>
</section>


<!--/.products-->
<script type="text/javascript">
$(document).ready(function(){
    $('.weather_product_card, #additional_text').hide();
	 if ($('.weather_product_card:visible').length === 0) {
            $('.welcome-container').show();
       }
});

$("#submit").click(function() {
	$('.welcome-container').hide();
    var idArray = [];
    $('.weather_product_card').each(function () {
        idArray.push(this.id);
    });

    var purpus = $('input[name="que"]:checked').val();
    console.log("purpus", purpus);

    Filter(purpus);
      if ($(window).width() <= 767) {
        $('html, body').animate({
          scrollTop: $(".weather_products").offset().top - 150
        }, 2000);
	  }
});

function arrayRemove(arr, value) { 
    return arr.filter(function(ele){ 
        return ele != value; 
    });
}

function Filter(purpus){
    var itemToShow = [];

    switch(purpus) {
        case '1':
            // Logic for Immune Support
            itemToShow.push("4991");
            itemToShow.push("4992");
            // Add more product IDs as needed
            break;
        case '2':
            // Logic for Energy & Endurance
            itemToShow.push("4990");
            // Add more product IDs as needed
            break;
        case '3':
            // Logic for Cognitive Health/ Brain Boost
            itemToShow.push("4989");
            // Add more product IDs as needed
            break;
               case '4':
            // Logic for Cognitive Health/ Brain Boost
            itemToShow.push("4992");
            // Add more product IDs as needed
            break;
			case '5':
				// Logic for Cognitive Health/ Brain Boost
				itemToShow.push("4989");
				itemToShow.push("4992");
				// Add more product IDs as needed
				break;
			case '6':
				// Logic for Cognitive Health/ Brain Boost
				itemToShow.push("4989");
				itemToShow.push("4991");
				itemToShow.push("4992");
				// Add more product IDs as needed
				break;
			case '7':
				// Logic for Cognitive Health/ Brain Boost
				itemToShow.push("4991");
				// Add more product IDs as needed
				break;
			case '8':
				// Logic for Cognitive Health/ Brain Boost
				itemToShow.push("4990");
				// Add more product IDs as needed
				break;
		default:
            // Default case (if needed)
            break;
    }

    console.log("itemToShow", itemToShow);

    $('.weather_product_card, #additional_text').hide();
    if(itemToShow.length == 0){
        console.log("No products found");
        $(".noprod-error").show();
        $('#suggestions_heading').hide();
    } else {
        // Show the section.
        $(".noprod-error").hide();
        $('#suggestions_heading').show();
        itemToShow.map(item => {
            console.log("#"+item);
            $("#"+item).show();
        });
    }
}
	function updateAdditionalText(purpus) {
    // Replace the following paragraphs with the content you want for each selection
    var paragraphs = {
        '1': 'You selected Immune Support. Here is additional information.',
        '2': 'You selected Energy & Endurance. Here is additional information.',
        '3': 'You selected Cognitive Health/ Brain Boost. Here is additional information.',
        // Add entries for other selections
    };

    // Get the selected radio button value and update #additional_text
    var selectedText = paragraphs[purpus];
    $("#additional_text").html("<p>" + selectedText + "</p>");
}
</script>

<?php get_footer(); ?>