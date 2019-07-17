<?php
/**
 * Class for adding gupnp_root_device_get_relative_location(root_device) Section Widget
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 * @since 1.0.0
 */
if( !class_exists( 'Country_Inn_Recreation_Widget' ) ){

  class Country_Inn_Recreation_Widget extends WP_Widget

  {
    private function defaults()
    {
      /*defaults values for fields*/
      $defaults    = array(
        'title'               => esc_html__('Our Recreation','country-inn'),
        'sub_title'           => esc_html__('Continually impact bricks-and-clicks applications after prospective metrics. Synergistically re-engineer standardized e-tailers and competitive niches.','country-inn'),
        'bg_image' => '',
        'features'            => ''
      );
      return $defaults;
    }

    public function __construct()

    {
      parent::__construct(
        /*Base ID of your widget*/
        'country_inn_recreation_widget',
        /*Widget name will appear in UI*/
        esc_html__( 'Country Inn Recreation', 'country-inn' ),
        /*Widget description*/
        array( 'description' => esc_html__( 'Country Inn Section', 'country-inn' ) )
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
          if (!empty( $instance ) ) 
          {
            $instance = wp_parse_args( (array ) $instance, $this->defaults ());
            $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
            $subtitle     =  esc_html( $instance['sub_title'] );
            $bgimage    = esc_url($instance['bg_image']);
            $features = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array();
            echo $args['before_widget'];
            ?>
            <!-- Recreation Start -->
            
              <div class="service-block sec-mar">

            <div class="container">

                <div class="row mb-40 wow fadeInUp">

                    <div class="offset-sm-2 col-sm-8 text-center">
                        <?php if ( !empty ( $title ) ) { ?>
                         
                          <h2 class="sec-title"><?php echo $title ?></h2>

                          <div class="title-sep mb-10"> <i class="far fa-bookmark"></i> </div>
                    
                      <?php } 

                      if ( !empty( $subtitle ) ) { ?>

                        <p><?php echo $subtitle ; ?></p>

                     <?php } ?>

                    </div>    

                </div>

                <!--title-->

              <?php if (isset($features) && !empty($features['main'])) : ?> 

                <div class="row align-items-center">

                    <div class="col-sm-6 left-block">

                       <ul class="service-list icon-list">

                          <?php
                            $post_in = array();

                            if  (count($features) > 0 && is_array($features) )
                           
                            {
                              $post_in[0] = $features['main'];                                         
                              foreach ( $features as $our_services )
                             
                              {
                                if( isset( $our_services['page_ids'] ) && !empty( $our_services['page_ids'] ) )
                                {
                                 $post_in[] = $our_services['page_ids'];
                               }
                             }
                           }

                           if( !empty( $post_in )) :

                            $services_page_args = array(
                              'post__in'         => $post_in,
                              'orderby'             => 'post__in',
                              'posts_per_page'      => count( $post_in ),
                              'post_type'           => 'page',
                              'no_found_rows'       => true,
                              'post_status'         => 'publish'
                            );

                            $services_query = new WP_Query( $services_page_args );

                            /*The Loop*/
                            if ( $services_query->have_posts() ):
                              $i = 1;
                              while ( $services_query->have_posts() ):$services_query->the_post();
                                 $icon = get_post_meta( get_the_ID(), 'country_inn_icon', true );
                                ?> 

                                   <li class="wow fadeInLeft" data-wow-delay="0.<?php echo $i; ?>s">

                                       <span class="icon circle"> <i class="fa <?php echo esc_attr($icon); ?>"></i> </span>

                                       <h6 class="text-uppercase"><a href="#"><?php the_title(); ?></a></h6>

                                       <p><?php echo esc_html( wp_trim_words(get_the_content(),4)); ?>..</p>

                                   </li>



                         <?php $i++; endwhile; endif; wp_reset_postdata(); endif; ?>

                       </ul>

                    </div>

                    <!--service left-->
                  <?php if(!empty( $bgimage )) {  ?>
                      <div class="col-sm-6">

                          <figure class="service-img wow fadeInRight">

                              <img src="<?php echo $bgimage ?>" alt="image"> 

                          </figure>

                      </div>
               <?php } ?>
                </div>
            <?php endif; ?>
            </div>

        </div>

         
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
        public function update($new_instance, $old_instance)
        {
          $instance              = $old_instance;
          $instance['main']      = absint($new_instance['main']);
          $instance['title']     = ( isset( $new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
          $instance['sub_title'] = ( isset( $new_instance['sub_title'])) ? sanitize_text_field($new_instance['sub_title']) : '';
           $instance['bg_image'] = esc_url_raw($new_instance['bg_image']);
          if (isset($new_instance['features']))
          {
            foreach($new_instance['features'] as $feature)
            {
              $feature['page_ids'] = absint($feature['page_ids']);
            }
            $instance['features']  = $new_instance['features'];
          }
          return $instance;
        }

        public function form($instance)
        {
          $instance   = wp_parse_args( (array ) $instance, $this->defaults() );
          $title      = esc_attr( $instance['title'] );
          $subtitle   = esc_attr( $instance['sub_title'] );
          $features_background = esc_url($instance['bg_image']);
          $features   = ( ! empty( $instance['features'] ) ) ? $instance['features'] : array(); 
          ?>
          <span class="pt-country-inn-additional services">
            <p>
              <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title', 'country-inn'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo $title; ?>">
            </p>
            <p>
              <label for="<?php echo esc_attr( $this->get_field_id('sub_title') ); ?>">
                <?php esc_html_e( 'Sub Title', 'country-inn'); ?>
              </label><br/>
              <input type="text" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" value="<?php echo $subtitle; ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('bg_image'); ?>">
                    <?php _e( 'Select Image', 'country-inn' ); ?>:
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $features_background ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo esc_url( $features_background ); ?>" alt="<?php esc_attr_e( 'Image preview', 'country-inn' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('bg_image'); ?>" id="<?php echo $this->get_field_id('bg_image'); ?>" value="<?php echo esc_url( $features_background ); ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'country-inn' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','country-inn'); ?>" data-button="<?php esc_attr_e( 'Select Image','country-inn'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'country-inn' ); ?>" class="button media-image-remove" />
           </p>
            <hr>
            <!--updated code-->
            <label><?php _e( 'Select Pages', 'country-inn' ); ?>:</label>
            <br/>
            <small><?php _e( 'Add Page and Remove. Please do not forget to add Icon and Excerpt  on selected pages.', 'country-inn' ); ?></small>
            <?php
            if  ( count( $features ) >=  1 && is_array( $features ) )
            {
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
            $counter = 0;
            if ( count( $features ) > 0 ) 
            {
              foreach( $features as $feature ) 
              {
                if ( isset( $feature['page_ids'] ) ) 
                  { ?>
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
            <a class="pt-country-inn-add button" data-id="country_inn_recreation_widget" id="<?php echo $repeater_id; ?>"><?php _e('Add New Section', 'country-inn'); ?></a> 
            <?php
          }
        }
      }
      add_action( 'widgets_init', 'country_inn_recreation_widget' );
      function country_inn_recreation_widget() {
        register_widget( 'Country_Inn_Recreation_Widget' );
      }