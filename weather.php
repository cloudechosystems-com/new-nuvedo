<?php
/*
Template Name: Weather Page Template
*/
?>

<?php get_header(); ?>
<section class="weather_page " >
    <div class="container">
        <div class="">
            <img src="https://nuvedo.com/wp-content/uploads/2022/03/weather-e1648668406832.png" alt="">
            <h1 class="weather_page_title">Not sure which Mushroom Growing Kit to grow?</h1>
            <div class="weather_search_form">
				<div class="location">	
					<h4>Enter your pincode to check the best mushroom suited for your weather</h4>					
                    <div>
                        <label>Location</label>
                        <input type="text" id="Location">
                    </div>
					<div>
                        <label>What is the Temperature at your location?</label>
                        <input type="text" id="Temprature">
                    </div>
                    <div>
                        <label>Pincode</label>
                        <input type="text" id="pincode">
                    </div>
				</div>
				<div class="questions">
					<h4>Which of these best describes your motivation to grow mushrooms?</h4>
					<div>						
						<input type="radio" name="que" value="1">
                        <p id="ans1" class="desc">To taste and cook with exotic mushrooms</p>  
					</div>
					<div>
						<input type="radio" name="que" value="2">
                        <p id="ans2" class="desc">For the health benefits</p>
					</div>
					<div>
						<input type="radio" name="que" value="3">
                        <p id="ans3" class="desc">To learn cultivation</p> 
					</div>
					<div> 
						<input type="radio" name="que" value="4">
                        <p id="ans4" class="desc">For the experience of growing a new mushroom</p> 
					</div>
					<div>
						<input type="radio" name="que" value="5">
                        <p id="ans5" class="desc">For gifting</p>
					</div>
					<div>
					  <input type="radio" name="que" value="6">
                      <p id="ans6" class="desc">Out of curiosity</p>
					</div>

				</div>
                <div class="experience">
				  <h4>On a scale of 1-5 how experienced are you in mushroom cultivation?</h4>	
					<div class="radio-wrapper">
						<div>
							<label>01</label>
							<input type="radio" name="scale" value="01">
						</div>
						<div>
							<label>02 </label>
							 <input type="radio" name="scale" value="02">
						</div>
						<div>
							<label>03</label>
							<input type="radio" name="scale" value="03">
						</div>

						<div>
							<label>04</label>
							<input type="radio" name="scale" value="04">
						</div>

						<div>
							<label>05</label>
							<input type="radio" name="scale" value="05">
						</div>						
					</div>
						<div class="radio-content">						
<!-- 							<span><em>Where</em></span> -->
							<p>01: Being, Never tried growing mushrooms before</p>
<!-- 							<span><em>and</em></span> -->
							<p>05: Being, Master grower.</p>			
						</div>


				</div>

                <button id="submit" class="pinCheckBtn">Suggest Products</button>
            </div>
            <div class="pincode_weather">
                <div class="pincode_weather_title">Here's what the current weather at your location looks like</div>
				<div class="pincode_weather_details_item">
                    <div>Location : </div>
                    <span id="loca"></span>
                </div>
                <div class="pincode_weather_details_item">
                    <div>Temperature : </div>
                    <span id="temp"></span>
                </div>
                <div class="pincode_weather_details_item">
                    <div>Humidity : </div>
                    <span id="hum"></span>
                </div>
            </div>
			<div class="weather-error">
				<p class="error-message">
					Looks like the humidity is lower than expected in your location. Please make sure you spray extra water on your kits for best 				results.</p>
				</div>
			
           <div class="noprod-error">
			   <img src="https://nuvedo.com/wp-content/uploads/2021/05/1.png" alt="" width="200">
			   <p>Unusual inputs detected! For the best product recommendations, adjust the inputs you have provided. And, don't forget to sync 					with your local weather. Let's grow amazing mushrooms together!</p>
    			<p>-Team Nuvedo | In Mushrooms We Trust</p>
    			
		</div>
	
        </div>

    </div>
</section>
<div class="container">
	<h2 id="suggestions_heading" style="text-align: center; margin-bottom: 30px;">
		Here are our suggestions based on the current weather at your location:
	</h2>
    <div class="product_cat_card_wrapper weather_products">
        <?php
            $args = array(
                'product_cat' => 'mushroom-growing-kit',
                'posts_per_page' => -1,
                'orderby' => 'rand'
            );
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
                global $product;
				?>
                <div class="product_card weather_product_card" id="<?php echo get_the_id();?>">
                    <a href="<?php echo get_permalink( ) ?>">
                        <div class="product_card_image_wrapper">
                            <div class="product_image">
                                <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />

                            </div>
                            
                        </div>
                    </a>
                    <div class="product_details_wrapper">
                        <div class="product_item_name">
                            <a href="<?php echo get_permalink( ) ?>">
                                <h2> <?php the_title(); ?></h2>
                            </a>
                            <div class="product_item_description">
                                <p><?= get_field('short_description'); ?> </p>
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
</div>

<!--/.products-->
<script type="text/javascript">
var lat = '';
var lon = '';
$(document).ready(function(){
	$('.weather_product_card').hide();
})
$("#submit").click(function() {
	var idArray = [];
	$('.weather_product_card').each(function () {
		idArray.push(this.id);
	});
	
    var pin = $('#pincode').val();
	var temprature = $('#Temprature').val();
	var location = $('#Location').val();
    console.log(pin);
	console.log(temprature);
	var purpus = $('input[name="que"]:checked').val();
    console.log("purpus", purpus);
	Filter(temprature, purpus);
	
	$('html, body').animate({
        scrollTop: $(".weather_products").offset().top -150
    }, 2000);
    $.ajax({
        type: "GET",
        url: 'https://api.openweathermap.org/data/2.5/weather?zip='+pin+',IN&appid=debf3e5d0fd50530225638513f0255d4&units=metric',
        data: $(this).serialize(),
        success: function(response)
        {
            console.log(response);
            $('.pincode_weather').show();
            var temp = response.main.temp;
            var hum = response.main.humidity;
            $("#temp").html(temprature);
            $("#hum").html(hum);
			$("#loca").html(location);
            console.log(temp);
//             Filter(temp, purpus);
        },
		error: function() 
		{
    		// Hide the .pincode_weather section on AJAX error
    		$('.pincode_weather, .weather_product_card, #suggestions_heading').hide();
			$(".noprod-error").show();
  		}
    });
    $("input[name$='que']").click(function() {
        var test = $(this).val();
         console.log(test);   
    });
});
function arrayRemove(arr, value) { 
	return arr.filter(function(ele){ 
		return ele != value; 
	});
}
function Filter(temp, purpus){
    var itemToShow=[];
	console.log("purpus", purpus);
	if(hum => 40){
        if(temp > 20 && temp <= 40 ){
			console.log("temp > 20 && temp <= 40");
			itemToShow.push("2838");
		}
        if(temp > 16 && temp <= 33 ){
			console.log("temp > 16 && temp <= 33");
			itemToShow.push("1880");
		}
        if(temp > 14 && temp <= 26 ){
			console.log("temp > 14 && temp <= 26");
			itemToShow.push("777");
		}
        if(temp > 14 && temp <= 29 ){
			console.log("temp > 14 && temp <= 26");
			itemToShow.push("2331");
		}
		if(temp > 19 && temp <= 29 ){
			console.log("temp > 19 && temp <= 29");
			itemToShow.push("3485");
		}
		if(purpus === '3'){
			console.log("purpus consition", purpus);
			itemToShow = arrayRemove(itemToShow, '2838');
			itemToShow = arrayRemove(itemToShow, '1880');
			itemToShow = arrayRemove(itemToShow, '777');
			itemToShow = arrayRemove(itemToShow, '2331');
			itemToShow = arrayRemove(itemToShow, '3485');
			console.log("itemToShow", itemToShow);
		}
		if(purpus == 4){

		}
		if(purpus == 6){

		}
		console.log("itemToShow", itemToShow);
		
		$('.weather_product_card').hide();
		if(itemToShow.length == 0){
			console.log("No products found");
			$(".noprod-error").show();
			$('#suggestions_heading').hide();
		} else{
			//Show the section.
			$(".noprod-error").hide();
			$('#suggestions_heading').show();
			itemToShow.map(item => {
				console.log("#"+item);
				$("#"+item).show();
			});
		}
	}
	else{
		$('.weather_product_card').hide();
		$('#suggestions_heading').hide();
		$('.weather-error').show();	
	}
}
</script>

<?php get_footer(); ?>