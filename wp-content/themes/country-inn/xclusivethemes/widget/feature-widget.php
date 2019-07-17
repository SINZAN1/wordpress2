<?php
/**
 * Class for adding Our Features Section Widget
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 * @since 1.0.0
 */
if( !class_exists( 'Country_Inn_Feature_Widget') ){

    class Country_Inn_Feature_Widget extends WP_Widget
    {
        private function defaults()
        {
            /*defaults values for fields*/
            $defaults = array(
                 'features_title'      => esc_html__('We are specialist, all we do', 'country-inn'),
                 'subtitle'      => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting country-inn.', 'country-inn'),
                 'features_background' => '',
                  'features' => ''
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                /*Widget ID*/
                'country_inn_feature_widget',
                /*Widget name*/
                 esc_html__('Country Inn Features', 'country-inn'),
                 /*Widget Description*/
                 array('description' => esc_html__('You can show the content of pages using this widget', 'country-inn'))
            );
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         *
         * @return void
         *
         */

        public function widget( $args, $instance )
        {
            if ( !empty( $instance ) )
             {
                $instance = wp_parse_args( (array) $instance, $this->defaults() );
                /*default values*/
                $features_title = apply_filters( 'widget_title', !empty( $instance['features_title'] ) ? esc_html( $instance['features_title'] ) : '', $instance, $this->id_base);
                $subtitle     =  esc_html( $instance['subtitle'] );
                $features_background  = esc_url($instance['features_background']);

                $features = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array();

                echo $args['before_widget'];
                ?>
                <!-- Feature Start -->
    <section  class="feature">
      <?php if (isset($features) && !empty($features['main'])) : ?>
      <div class="container">
                <div class="sec-title text-center">
                  <?php if ( !empty ( $features_title ) ) { ?>
                  <h3><?php echo $args['before_title'] . $features_title . $args['after_title']; ?></h3>
                  <?php } ?>
                  <span class="double-border"></span>
                  <?php if ( !empty( $subtitle ) ) { ?>
                  <p><?php echo $subtitle; ?></p>
                  <?php } ?>
                </div>
        <div class="feature-box">
          <div class="row m-t-60">
            <div class="col-md-8 col-sm-12 m-t-30">
              <div class="row ">
                <?php $post_in = array();

                                if  (count($features) > 0 && is_array($features) )
                                {

                                      $post_in[0] = $features['main'];

                                      foreach ( $features as $our_feature )
                                    {
                                        if( isset( $our_feature['page_ids'] ) && !empty( $our_feature['page_ids'] ) )

                                           {
                                               $post_in[] = $our_feature['page_ids'];
                                            }
                                    }
                                }
                                if( !empty( $post_in )) :
                                    $features_page_args = array(
                                            'post__in'            => $post_in,
                                            'orderby'             => 'post__in',
                                            'posts_per_page'      => count( $post_in ),
                                            'post_type'           => 'page',
                                            'no_found_rows'       => true,
                                            'post_status'         => 'publish'
                                    );

                                    $features_query = new WP_Query( $features_page_args );

                                    /*The Loop*/
                                    if ( $features_query->have_posts() ):
                                        $i = 1;
                                        while ( $features_query->have_posts() ):$features_query->the_post();
                                              $icon = get_post_meta( get_the_ID(), 'country_inn_icon', true );
                                              ?>

                <div class="col-md-6 col-sm-6">
                  <div class="feature-block wow fadeInUp" data-wow-delay=".<?php echo esc_attr($i); ?>">
                     <?php
                        if(!empty($icon))
                        {
                        ?>
                    <div class="thin-icon">
                      <a href="<?php the_permalink();?>"><span class="fa <?php echo esc_attr($icon); ?>"></span></a>
                    </div>
                    <?php } ?>
                    <div class="feature-txt">
                        <a href="<?php the_permalink();?>"><h5><?php the_title();?></h5></a>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                  </div>
                </div>

                 <?php
                    endwhile;
              endif;
              wp_reset_postdata();
        endif;
      ?>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 ">
              <div class="feature-img"><img src="<?php echo esc_url($features_background); ?>" alt="" /></div>
            </div>
          </div><!-- /.row -->
        </div>
      </div><!-- /.container -->
       <?php endif; ?>
    </section>
    <!-- Feature End -->
                <?php
                echo $args['after_widget'];
            }
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         *
         * @return array
         *
         */
        public function update( $new_instance, $old_instance )
         {
            $instance           = $old_instance;
            $instance['features_title'] = (isset($new_instance['features_title'])) ? sanitize_text_field( $new_instance['features_title'] ) : '';
            $instance['subtitle'] = ( isset( $new_instance['subtitle'])) ? sanitize_text_field($new_instance['subtitle']) : '';
            $instance['features_background'] = esc_url_raw($new_instance['features_background']);

            if (isset($new_instance['features']))
            {
                foreach($new_instance['features'] as $feature){
                  $feature['page_ids'] = absint($feature['page_ids']);
                }
                $instance['features'] = $new_instance['features'];
            }
            return $instance;


        }
        /*Widget Backend*/
        public function form( $instance )
        {
            $instance           = wp_parse_args( (array) $instance, $this->defaults() );
            /*default values*/
            $country_inn_features_title = esc_attr( $instance[ 'features_title' ] );
            $subtitle   = esc_attr( $instance['subtitle'] );
            $features_background   = esc_url( $instance['features_background'] );
            $features              = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array();
            ?>
           <span class="pt-country-inn-additional">
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('features_title')); ?>">
                    <?php esc_html_e('Title', 'country-inn'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name( 'features_title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'features_title' ) ); ?>" value="<?php echo $country_inn_features_title?>">
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id('$subtitle') ); ?>">
                <?php esc_html_e( 'Sub Title', 'country-inn'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('$subtitle')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('$subtitle')); ?>" value="<?php echo $subtitle; ?>">
            </p>

            <label><?php _e( 'Select Pages', 'country-inn' ); ?>:</label>
            <br/>
            <small><?php _e( 'Add Page and Remove. Please do not forget to add Icon and Excerpt  on selected pages.', 'country-inn' ); ?></small>
              <?php

                if  (count($features) >=  1 && is_array($features) ){
                   $selected = $features['main'];

                }
                else
                {
                  $selected = "";
                }

                $repeater_id   = $this->get_field_id( 'features' ).'-main';
                $repeater_name = $this->get_field_name( 'features'). '[main]';

                $args = array(
                    'selected'          => $selected,
                    'name'              => $repeater_name,
                    'id'                => $repeater_id,
                    'class'             => 'widefat pt-select',
                    'show_option_none'  => __( 'Select Page', 'country-inn'),
                    'option_none_value' => 0 // string
                );
                wp_dropdown_pages( $args );
              ?>
              <?php
            $counter = 0;
            if ( count( $features ) > 0 ) {
                foreach( $features as $feature ) {

                    if ( isset( $feature['page_ids'] ) ) { ?>
                      <div class="pt-country-inn-sec">
                          <?php
                            $repeater_id     = $this->get_field_id( 'features' ) .'-'. $counter.'-page_ids';
                            $repeater_name   = $this->get_field_name( 'features' ) . '['.$counter.'][page_ids]';

                            $args = array(
                                'selected'          => $feature['page_ids'],
                                'name'              => $repeater_name,
                                'id'                => $repeater_id,
                                'class'             => 'widefat pt-select',
                                'show_option_none'  => __( 'Select Page', 'country-inn'),
                                'option_none_value' => 0 // string
                            );
                            wp_dropdown_pages( $args );
                            ?>

                            <a class="pt-country-inn-remove delete"><?php esc_html_e('Remove Section','country-inn') ?></a>
                      </div>
                      <?php
                      $counter++;
                   }
                }
            }

            ?>

           </span>
           <a class="pt-country-inn-add button" data-id="country_inn_feature_widget" id="<?php echo $repeater_id; ?>"><?php _e('Add New Section', 'country-inn'); ?></a>
           <hr>
            <p>
                <label for="<?php echo $this->get_field_id('features_background'); ?>">
                    <?php _e( 'Select Image', 'country-inn' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $features_background ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $features_background ); ?>" alt="<?php esc_attr_e( 'Image preview', 'country-inn' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('features_background'); ?>" id="<?php echo $this->get_field_id('features_background'); ?>" value="<?php echo esc_url( $features_background ); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'country-inn' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','country-inn'); ?>" data-button="<?php esc_attr_e( 'Select Image','country-inn'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'country-inn' ); ?>" class="button media-image-remove" />
           </p>
            <?php
        }
    }
}

add_action( 'widgets_init', 'country_inn_feature_widget' );
function country_inn_feature_widget()
{
    register_widget( 'Country_Inn_Feature_Widget' );
}