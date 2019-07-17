<?php
if (!class_exists('Country_Inn_Room_Widget')) {
    class Country_Inn_Room_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults       = array(
                'cat_id'    => 8,
                'title'     => esc_html__('ROOMS & SUITS','country-inn'),
                'sub_title' => esc_html__('Continually impact bricks-and-clicks applications after prospective metrics. Synergistically re-engineer standardized e-tailers and competitive niches.','country-inn'),
               
            );

            return $defaults;
        }

     public function __construct()
        {
            parent::__construct(
                'country-inn-room--widget',
                esc_html__( 'Country Inn Room Widget', 'country-inn' ),
                array( 'description' => esc_html__( 'Country Inn Room Section', 'country-inn' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                echo $args['before_widget'];
                 $a1 =51;

               if($a1 == $instance['cat_id'] )
                {
                   $instance['cat_id'] = 8;

                   $catid        = absint( $instance['cat_id'] );
                }
                else
                {
                    $catid        = absint( $instance['cat_id'] );
                }
 
                $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle     =  esc_html( $instance['sub_title'] );
               

                ?>

             <div class="rooms-blk sec-pad sec-mar soft-gray">
                <div class="container">
                   <?php
                     
                        if ( !empty ( $title ) || !empty( $subtitle ) ) {
                            ?> 
                            <div class="row mb-40 wow fadeInUp">
                                <div class="offset-sm-2 col-sm-8 text-center">
                                    <h2 class="sec-title"><?php echo $title; ?></h2>
                                    <div class="title-sep mb-10"> <i class="far fa-bookmark"></i> </div>

                                    <p><?php echo $subtitle; ?></p>
                                </div>    
                            </div>
                            <!--title--> 
                         <?php
                          }

                         ?>   

                    <div class="row mb-20 wow fadeInUp"> 
                        <div class="col-sm-12"> 
                            <div class="room-listing listing-slider"> 

                                <?php
                                $i = 0;
                                $sticky = get_option( 'sticky_posts' );
                                if ($instance['cat_id']  != -1) {
                                    $home_recent_post_section = array(
                                        'ignore_sticky_posts' => true,
                                        'post__not_in'        => $sticky,
                                        'cat'                 => $catid,
                                        'posts_per_page'      => -1,
                                        'order'               => 'DESC'
                                    );
                                } 

                                $home_recent_post_section_query = new WP_Query($home_recent_post_section);

                                if ( $home_recent_post_section_query->have_posts() ) :
                                    while ($home_recent_post_section_query->have_posts()) :
                                        $home_recent_post_section_query->the_post();
                                         $price = get_post_meta( get_the_ID(), 'Country_Inn_room_price', true );
                                        ?>
                                       
                                        <div class="room-wrap">
                                             <?php
                                                if (has_post_thumbnail()) {
                                                    $image_id = get_post_thumbnail_id();
                                                    $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                                                    ?>
                                                    
                                                    <figure class="room-figure img-animi"> 
                                                        <span class="price pri-bg"><?php echo esc_html($price); ?></span> 
                                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_url[0]); ?>" alt=""></a>
                                                    </figure>

                                               <?php } ?>     

                                            <div class="bottom text-center">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                                                <p>
                                                    <?php echo esc_html( wp_trim_words(get_the_content(), 10)); ?>
                                                </p>

                                               
                                            </div> 
                                        </div>

                              

                     <?php endwhile; wp_reset_postdata(); endif; ?>

                </div>

           </div>

        </div>
    </div>

</div>        

        <?php
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance              = $old_instance;
            $instance['cat_id']    = (isset( $new_instance['cat_id'] ) ) ? absint($new_instance['cat_id']) : '';
            $instance['title']     = sanitize_text_field( $new_instance['title'] );
            $instance['sub_title'] = sanitize_text_field( $new_instance['sub_title'] );
            return $instance;

        }

        public function form( $instance )
        {
            $instance  = wp_parse_args( (array ) $instance, $this->defaults() );
            $a1 = array(51);
            if($a1 == $instance['cat_id'] )
              {
                $instance['cat_id'] = array(8);
                $catid     = absint( $instance['cat_id'] );
              }
            $catid     = absint( $instance['cat_id'] );
            $title     = esc_attr( $instance['title'] );
            $subtitle  = esc_attr( $instance['sub_title'] );
           
            ?>

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
                <label for="<?php echo esc_attr( $this->get_field_id('cat_id') ); ?>">
                    <?php esc_html_e('Select Room', 'country-inn'); ?>
                </label><br/>
                <?php
                $country_inn_con_dropown_cat = array(
                    'show_option_none' => esc_html__('Select Room', 'country-inn'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $catid,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('cat_id') ),
                    'id'               => esc_attr( $this->get_field_name('cat_id') ),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );

                wp_dropdown_categories( $country_inn_con_dropown_cat );
                ?>
            </p>
            
            <?php
        }
    }
}

add_action('widgets_init', 'country_inn_room_widget');

function country_inn_room_widget()

{
    register_widget('Country_Inn_Room_Widget');

}