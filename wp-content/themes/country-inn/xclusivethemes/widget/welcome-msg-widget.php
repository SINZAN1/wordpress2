<?php
if (!class_exists( 'Country_Inn_Welcome_Msg_Widget' ) ) {
    class Country_Inn_Welcome_Msg_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults             = array(
                'page_id'         => 0,
                'character_limit' => 25,
                'sub_title'       => esc_html__(' A best place to enjoy your holidays.', 'country-inn'),
                'read_more'       => esc_html__('Read More', 'country-inn'),
                'image1'          => '',
                'image2'          => '',
                'image3'          => '',
            );

            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'country-inn-welcome-msg-widget',
                esc_html__( 'Country Inn Welcome Message', 'country-inn' ),
                array( 'description' => esc_html__( 'Country Inn Welcome Message', 'country-inn' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance        = wp_parse_args( (array )$instance, $this->defaults() );
                $page_id         = absint($instance['page_id']);
                $limit_character = absint( $instance['character_limit'] );
                $sub_title = esc_html( $instance['sub_title'] );
                $read_more = esc_html( $instance['read_more'] );
                $image1    = esc_url($instance['image1']);
                $image2    = esc_url($instance['image2']);
                $image3    = esc_url($instance['image3']);
                echo $args['before_widget'];
                if ( !empty( $page_id ) ) {
                    $country_inn_page_args     = array(
                        'page_id'        => $page_id,
                        'posts_per_page' => 1,
                        'post_type'      => 'page',
                        'no_found_rows'  => true,
                        'post_status'    => 'publish'
                    );

                  $welcome_query = new WP_Query( $country_inn_page_args );
                    if ($welcome_query->have_posts()):
                        while ($welcome_query->have_posts()):$welcome_query->the_post(); ?>
                              <div class="intro sec-mar">

                        <div class="container">

                            <div class="row align-items-center">

                                <div class="col-sm-6 left-block"> 
                                  
                                   <figure class="fig-big img-animi wow fadeInUp" data-wow-delay="0s"> 

                                        <img src="<?php echo $image1; ?>" alt=""> 

                                    </figure>



                                    <figure class="fig-small img-animi wow fadeInUp" data-wow-delay="0.1s">
            
                                        <img src="<?php echo $image2; ?>" alt=""> 
            
                                    </figure>
            
            
            
                                    <figure class="fig-small img-animi wow fadeInUp" data-wow-delay="0.2s">
            
                                        <img src="<?php echo $image3; ?>" alt=""> 
            
                                    </figure> 

                                   <!-- <figure class="fig-big img-animi wow fadeInUp" data-wow-delay="0s"> 

                                       <?php //echo get_the_post_thumbnail(get_the_ID(), 'large' ); ?>

                                    </figure>-->


                                </div>

                                <!--left-->
                                <div class="col-sm-6">

                                    <div class="content-hold wow fadeInUp">

                                        <h2>

                                            <span><?php the_title(); ?></span>

                                            <?php echo  $sub_title; ?>

                                        </h2>



                                        <p>

                                            <?php echo esc_html( wp_trim_words(get_the_content(), $limit_character)); ?>

                                        </p>

                                    </div>


                                  <?php if(!empty($read_more)){ ?>
                                    <a class="btn bdr text-uppercase wow fadeInUp" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i class="fa fa-long-arrow-alt-right"></i></a>
                                 <?php } ?>
                                </div>

                            </div>

                        </div>

                    </div>

                     <!--intro-->
        
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    echo $args['after_widget'];
                }
            }
        }

        public function update( $new_instance, $old_instance )
        {
            $instance                    = $old_instance;
            $instance['page_id']         = absint($new_instance['page_id']);
            $instance['character_limit'] = absint( $new_instance['character_limit'] );
            $instance['sub_title'] = sanitize_text_field( $new_instance['sub_title'] );
            $instance['read_more'] = sanitize_text_field( $new_instance['read_more'] );
            $instance['image1'] = esc_url_raw($new_instance['image1']);
            $instance['image2'] = esc_url_raw($new_instance['image2']);
            $instance['image3'] = esc_url_raw($new_instance['image3']);

            return $instance;
        }

        public function form( $instance )
        {
            $instance        = wp_parse_args((array )$instance, $this->defaults() );
            $page_id         = absint($instance['page_id']);
            $limit_character = absint( $instance['character_limit'] );
            $sub_title = esc_attr( $instance['sub_title'] );
            $read_more = esc_attr( $instance['read_more'] );
            $image1 = esc_url($instance['image1']);
            $image2 = esc_url($instance['image2']);
            $image3 = esc_url($instance['image3']);

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('sub_title')); ?>"><?php esc_html_e('Subtitle', 'country-inn'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('sub_title')); ?>" class="country-inn-cons" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" value="<?php echo $sub_title ?>">
            </p>
             <hr>
            <p>
                <label for="<?php echo $this->get_field_id('image1'); ?>">
                    <?php _e( 'Select Image', 'country-inn' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $image1 ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $image1); ?>" alt="<?php esc_attr_e( 'Image preview', 'country-inn' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image1'); ?>" id="<?php echo $this->get_field_id('image1'); ?>" value="<?php echo esc_url( $image1 ); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'country-inn' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','country-inn'); ?>" data-button="<?php esc_attr_e( 'Select Image','country-inn'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'country-inn' ); ?>" class="button media-image-remove" />
           </p>
            <hr>
            
            <p>
                <label for="<?php echo $this->get_field_id('image2'); ?>">
                    <?php _e( 'Select Image', 'country-inn' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $image2 ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $image2 ); ?>" alt="<?php esc_attr_e( 'Image preview', 'country-inn' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image2'); ?>" id="<?php echo $this->get_field_id('image2'); ?>" value="<?php echo esc_url( $image2 ); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'country-inn' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','country-inn'); ?>" data-button="<?php esc_attr_e( 'Select Image','country-inn'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'country-inn' ); ?>" class="button media-image-remove" />
           </p>
            <hr>
            
            <p>
                <label for="<?php echo $this->get_field_id('image3'); ?>">
                    <?php _e( 'Select Image', 'country-inn' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $image3 ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $image3 ); ?>" alt="<?php esc_attr_e( 'Image preview', 'country-inn' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image3'); ?>" id="<?php echo $this->get_field_id('image3'); ?>" value="<?php echo esc_url( $image3); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'country-inn' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','country-inn'); ?>" data-button="<?php esc_attr_e( 'Select Image','country-inn'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'country-inn' ); ?>" class="button media-image-remove" />
           </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('page_id')); ?>"><?php esc_html_e('Select Page', 'country-inn'); ?></label><br/>

                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected'         => $page_id,
                    'name'             => esc_attr( $this->get_field_name('page_id') ),
                    'id'               => esc_attr( $this->get_field_id('page_id') ),
                    'class'            => 'widefat',
                    'show_option_none' => esc_html__( 'Select Page', 'country-inn' ),
                );
                wp_dropdown_pages($args);
                ?>
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('character_limit')); ?>"><?php esc_html_e('Character Limit', 'country-inn'); ?></label><br/>
                <input type="number" name="<?php echo esc_attr( $this->get_field_name('character_limit')); ?>" class="country-inn-cons" id="<?php echo esc_attr($this->get_field_id('character_limit')); ?>" value="<?php echo $limit_character ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('read_more')); ?>"><?php esc_html_e('Read More', 'country-inn'); ?></label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('read_more')); ?>" class="country-inn-cons" id="<?php echo esc_attr($this->get_field_id('read_more')); ?>" value="<?php echo $read_more ?>">
            </p>
            <?php
        }
    }

}

add_action( 'widgets_init', 'country_inn_welcome_msg_widget' );

function country_inn_welcome_msg_widget()
{
    register_widget( 'Country_Inn_Welcome_Msg_Widget' );

}