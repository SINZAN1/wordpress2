<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Country Inn Themes
  */
get_header();
 ?>

 <main class="main sec-pad">  

        <div class="container">

            <div class="row">  

                <div class="col-sm-12">

                    <div class=" text-center">

                        <h4 class="mb-30"><?php esc_html_e('THIS PAGE DOES NOT EXIST','country-inn');?></h4>

                        <figure class="mb-50"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/images/404.jpg" alt=""></figure>

                        <a class="btn pri-bg text-uppercase" href="<?php echo home_url(); ?>"><?php esc_html_e('Back to Home Page','country-inn');?></a>

                    </div>

                </div>

            </div>

        </div> 

    </main>

<?php get_footer();
