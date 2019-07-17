<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
 $to_top         = absint(country_inn_get_option('country_inn_footer_go_to_top'));
 $ci_title          = esc_html(country_inn_get_option('country_inn_post_news_letter_title_option'));
 $sub_title      = esc_html(country_inn_get_option('country_inn_post_news_letter_sub_title_option'));
 $mailchim_form  = esc_html(country_inn_get_option('country_inn_post_news_letter_subscription_option'));
 $booking_form   = country_inn_get_option('country_inn_booking_option');
 $book_now_text  = esc_html(country_inn_get_option('country_inn_book_now_text_option'));
 $book_now_image = esc_url(country_inn_get_option('country_inn_booking_form_image'));
 
 if(is_home()|| is_front_page())
 {
?>

 <div class="subscription wow fadeInUp">
    <div class="container">
        <div class="subscription-wrap pri-bg text-white rounded">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="pri-font text-uppercase text-white mb-0"><?php echo $ci_title ; ?></h5>
                    <?php echo $sub_title ; ?>
                </div>

                <div class="col-sm-6">
                   <?php echo do_shortcode( $mailchim_form ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
        <!--subscription-->

<!-- Footer Top Start -->
 <footer class="site-footer">
<?php
   
   do_action('country_inn_site_footer_widget');

	do_action('country_inn_site_footer_button');
?>
</footer> 
<!--footer-->

 <?php if( $to_top==1 ) {   ?>
    <a href="#" class="scrollUp"><i class="fa fa-arrow-up"></i></a>
    
    <div class="modal fade" id="bookmodel" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><?php esc_html_e('&times;','country-inn');?></span>
            </button>  

          <figure>
            <img src="<?php echo $book_now_image; ?>">
          </figure>

          <div class="right">  
            <h2><?php $book_now_text ?></h2> 
            <?php echo do_shortcode ($booking_form); ?> 
          </div>
        </div>

      </div>
    </div>

<?php } wp_footer(); ?>
</body>
</html>