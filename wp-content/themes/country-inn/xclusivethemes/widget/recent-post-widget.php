<?php
if (!class_exists('Country_Inn_Recent_Post_Widget')) {
    class Country_Inn_Recent_Post_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults       = array(
                'cat_id'    => 2,
                'title'     => esc_html__('Our Blog','country-inn'),
                'sub_title' => esc_html__('Continually impact bricks-and-clicks applications after prospective metrics. Synergistically re-engineer standardized e-tailers and competitive niches.','country-inn'),
                'read_more' => esc_html__('View More','country-inn'),
            );

            return $defaults;
        }

     public function __construct()
        {
            parent::__construct(
                'country-inn-recent-post-widget',
                esc_html__( 'Country Inn Our Blog Widget', 'country-inn' ),
                array( 'description' => esc_html__( 'Country Inn Our Blog Section', 'country-inn' ) )
            );
        }

        public function widget( $args, $instance )
        {

            if ( !empty( $instance ) ) {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );
                echo $args['before_widget'];
                 
                $a1 =56;

               if($a1 == $instance['cat_id'] )
                {
                   $instance['cat_id'] = 2;

                   $catid        = absint( $instance['cat_id'] );
                }
                else
                {
                    $catid        = absint( $instance['cat_id'] );
                }
                
               
                
                $title        = apply_filters('widget_title', !empty($instance['title']) ? esc_html( $instance['title']): '', $instance, $this->id_base);
                $subtitle     =  esc_html( $instance['sub_title'] );
                $read_more    =  esc_html( $instance['read_more'] );

                ?>

        <div class="soft-gray sec-pad">

           <div class="container"> 

                <div class="row mb-40 wow fadeInUp">

                    <div class="offset-sm-2 col-sm-8 text-center">

                         <?php
                     
                        if ( !empty ( $title ) ) {
                            ?>
                            <h2 class="sec-title"><?php echo $title; ?></h2>

                            <div class="title-sep mb-10"> <i class="far fa-bookmark"></i> </div>


                       <?php
                        }
                        if ( !empty( $subtitle ) )
                         {
                            ?>

                          <p><?php echo $subtitle; ?> </p>

                     <?php } ?>
                    </div>    

                </div>

                <!--title--> 



                <div class="row gutter-10">

                    <?php
                    $i = 0;
                    $sticky = get_option( 'sticky_posts' );
                    if ($instance['cat_id']  != -1) {
                        $home_recent_post_section = array(
                            'ignore_sticky_posts' => true,
                            'post__not_in'        => $sticky,
                            'cat'                 => $catid,
                            'posts_per_page'      => 3,
                            'order'               => 'DESC'
                        );
                    } else {
                        $home_recent_post_section = array(
                            'ignore_sticky_posts' => true,
                            'post__not_in'        => $sticky,
                            'post_type'           => 'post',
                            'posts_per_page'      => 3,
                            'order'               => 'DESC'
                        );
                    }

                    $home_recent_post_section_query = new WP_Query($home_recent_post_section);

                    if ( $home_recent_post_section_query->have_posts() ) :
                        while ($home_recent_post_section_query->have_posts()) :
                            $home_recent_post_section_query->the_post();
                            ?>
                                <div class="col-sm-4 wow fadeInUp" data-wow-delay="0s">

                                    <div class="blog-wrap">

                                        <figure class="img-animi mb-20">

                                            <div class="post-info">

                                               <span class="date pri-bg text-white"><?php echo esc_html( get_the_date('d') ); ?> <small> <?php echo esc_html( get_the_date('M') ); ?></small></span> 

                                            </div>

                                            <!--post info-->
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                                        ?>
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url[0]; ?>" alt=""></a>
                                     <?php } ?>       

                                        </figure>



                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                                        <div class="post-meta-wrap mb-20">

                                            <span class="meta-info">

                                                <a href="#"><i class="fa fa-user"></i> <?php the_author(); ?></a>

                                            </span>

                                            <!--authar-->



                                            <span class="meta-info">

                                                <a href="#"><i class="fa fa-comments"></i> <?php echo get_comments_number(); ?></a>

                                            </span>

                                            <!--comment-->

                                        </div>

                                        <!--post meta-->



                                        <div class="content-hold">

                                           <?php the_excerpt(20);?> 

                                        </div>



                                        <a class="view" href="<?php the_permalink(); ?>"><?php echo $read_more; ?><i class="fa fa-long-arrow-alt-right"></i> </a>

                                    </div>

                                </div>

                     <?php
                            $i++;
                            endwhile; wp_reset_postdata(); endif;
                            ?>

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
            $instance['read_more'] = sanitize_text_field( $new_instance['read_more'] );

            return $instance;

        }

        public function form( $instance )
        {
            $instance  = wp_parse_args( (array ) $instance, $this->defaults() );
            $a1 = array(56);
            if($a1 == $instance['cat_id'] )
              {
                $instance['cat_id'] = array(2);
                $catid     = absint( $instance['cat_id'] );
              }
            $catid     = absint( $instance['cat_id'] );
            $title     = esc_attr( $instance['title'] );
            $subtitle  = esc_attr( $instance['sub_title'] );
            $read_more = esc_attr( $instance['read_more'] );

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
                    <?php esc_html_e('Select Category', 'country-inn'); ?>
                </label><br/>
                <?php
                $country_inn_con_dropown_cat = array(
                    'show_option_none' => esc_html__('From Recent Posts', 'country-inn'),
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
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('read_more') ); ?>">
                    <?php esc_html_e( 'View More Text', 'country-inn'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('read_more')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more')); ?>" value="<?php echo $read_more; ?>">
            </p>

            <?php
        }
    }
}

add_action('widgets_init', 'country_inn_recent_post_widget');

function country_inn_recent_post_widget()

{
    register_widget('Country_Inn_Recent_Post_Widget');

}