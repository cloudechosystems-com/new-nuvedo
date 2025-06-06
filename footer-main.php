<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dravalife
 */

?>
<footer id="colophon" class="site-footer" style="background-image: url('https://drava.life/wp-content/uploads/2020/12/Untitled-3.jpg');">
  <canvas id="waves"></canvas>


  <div class="container">
    <div class="footer_main_wrapper">
      <div class="footer_menu">
        <?php
									wp_nav_menu(
										array(
											'menu' => 'Menu 1',
											'menu_id' => 'footer-advanced-menu',
										)
									);
									?>

      </div>
      <div class="footer_cta">
        <div class="cta_content">
        Join Drava Life.<br>Subscribe To Get 10% Off On Your First Order.

        </div>
        <div class="cta_search">
          <?php echo do_shortcode('[contact-form-7 id="235" title="Untitled"]'); ?>
        </div>

      </div>
      <div class="footer_social_icon">
        <a href="https://wa.me/917411478068">
          <img src="https://drava.life/wp-content/uploads/2020/12/socialicons-01.svg" alt="">

        </a>
        <a href="https://www.facebook.com/dravasuperfoods">
          <img src="https://drava.life/wp-content/uploads/2020/12/socialicons-02.svg" alt="">

        </a>
        <a href="https://www.instagram.com/drava.life/?igshid=1dop517tgkgfc">
          <img src="https://drava.life/wp-content/uploads/2020/12/socialicons-03.svg" alt="">

        </a>


      </div>

    </div>
    <!-- .site-info -->
    <div class="site-info">
      The information contained on Drava (www.drava.life or subdomains) is provided for informational purposes only and is not meant to substitute for the advice provided by your doctor or other healthcare professionals. Information and statements regarding products, supplements, etc listed on Drava have not been evaluated by the Food and Drug Administration or any government authority and are not intended to diagnose, treat, cure, or prevent any disease. The results from the products will vary from person to person. No individual result should be seen as typical.
    </div>

  </div>


</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
<script>
console.log("value");
</script>

</body>

</html>
