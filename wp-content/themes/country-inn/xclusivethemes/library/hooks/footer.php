<?php 
/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Country Inn
*/ 
if ( ! function_exists( 'country_inn_site_footer_widget_action' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function country_inn_site_footer_widget_action() { 
		if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
            {     
	    $count = 0;
	        for ( $i = 1; $i <= 4; $i++ )
	            {
	              if ( is_active_sidebar( 'footer-' . $i ) )
	                    {
	                        $count++;
	                    }
	            }
	        $column=3;
	        if( $count == 4 ) 
	        {
	            $column = 3;  
	       
	        }
	        elseif( $count == 3)
	        {
	                $column=4;
	        }
	        elseif( $count == 2) 
	        {
	                $column = 6;
	        }
	       elseif( $count == 1) 
	        {
	                $column = 12;
	        }
	    ?>               
		

             <div class="footer dark-bg sec-pad">

               <div class="container"> 

                  <div class="row">
                    <?php
                for ( $i = 1; $i <= 4 ; $i++ )
                {
                    if ( is_active_sidebar( 'footer-' . $i ) )
                    { 
                ?>

                    <div class="col-md-<?php echo  absint( $column ); ?>">
                        <div class="footer-widget">
                            <?php dynamic_sidebar('footer-' . $i); ?>
                        </div>
                    </div>
                    <?php }

                }
                ?>  
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        <!-- Footer Top End -->    
	<?php            
      }
   }
endif;
add_action( 'country_inn_site_footer_widget', 'country_inn_site_footer_widget_action', 10 );



/*
* Footer Section footer widget section 
* @since 1.0.0
* @package Country Inn
*/ 
if ( ! function_exists( 'country_inn_site_footer_button_action' ) ) :
    /**
     * Footer Section footer widget section
     *
     * @since 1.0.0
     */
    function country_inn_site_footer_button_action() {
	$copyright = wp_kses_post(country_inn_get_option('country_inn_copyright'));
	
    	?>
	
     <div class="footer-bottom">

            <div class="container">

                <div class="row align-items-center">

                    <div class="col-sm-8">
                        <div class="powered-text">
                             <span><?php
                               echo $copyright;
                                /* translators: %s: CMS name, i.e. WordPress. */
                                printf( esc_html__( 'Proudly powered by %s', 'country-inn' ), 'WordPress' );
                            ?></span>
                            <span class="sep"> | </span>
                            <?php
                                /* translators: 1: Theme name, 2: Theme author. */
                                printf( esc_html__( 'Theme: %1$s by %2$s.', 'country-inn' ), 'Country Inn', '<a href="#">Xclusive Themes</a>' );
                            ?>
                        </div>  
                    </div>

                    <!--award-->



                    <div class="col-sm-4 text-right">

                        <ul class="social">

                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>

                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>

                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>

                            <li><a href="#" target="_blank"><i class="fab fa-tripadvisor"></i></a></li>

                        </ul>

                    </div>

                    <!--social-->


                    
                </div>

            </div>

        </div>

 <?php  }
endif;
add_action( 'country_inn_site_footer_button', 'country_inn_site_footer_button_action', 10 );
