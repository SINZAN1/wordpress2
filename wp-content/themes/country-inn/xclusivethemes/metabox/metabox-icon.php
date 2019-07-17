<?php
/**
 * Class for adding font awesome icons
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 * @since 1.0.0
 */
if( !class_exists( 'Country_Inn_Font_Awesome_Class_Metabox') ){
    class Country_Inn_Font_Awesome_Class_Metabox {

        public function __construct()
        {

            add_action( 'add_meta_boxes', array( $this, 'country_inn_icon_metabox') );

            add_action( 'save_post', array( $this, 'country_inn_save_icon_value') );

            add_action( 'add_meta_boxes', array( $this, 'Country_Inn_room_price_metabox' ) );

            add_action( 'save_post', array( $this, 'Country_Inn_save_room_price_value' ) );

        }
     
          public function Country_Inn_room_price_metabox(){

           add_meta_box( 'room_price', 
           esc_html__('Room Price', 'country-inn'), 
           array( $this, 'Country_Inn_generate_room_price' ),
             'post',
             'advanced', 
             'high' 
             );
      }


       public function Country_Inn_generate_room_price( $post ) {
           $values = get_post_meta( $post->ID, 'Country_Inn_room_price', true );
            ?>
             <input class="widefat" type="text" name="room_price" value="<?php echo esc_attr($values) ?>">
            <?php
             wp_nonce_field( basename(__FILE__), 'country_inn_room_price_fields_nonce');  
        }


        public function country_inn_icon_metabox()
        {

            add_meta_box(
                    'country_inn_icon',
                    esc_html__('Font Awesome Class For Features', 'country-inn'),
                    array(
                            $this, 'country_inn_generate_icon'),
                    'page',
                    'side',
                    'low'
            );
        }

        public function country_inn_generate_icon($post)
        {
            $values = get_post_meta( $post->ID, 'country_inn_icon', true );
            wp_nonce_field( basename(__FILE__), 'country_inn_fontawesome_fields_nonce');
            ?>
            <input type="text" name="icon" value="<?php echo esc_attr($values) ?>" />
            <br/>
            <small>
                <?php
                esc_html_e( 'Font Awesome Icon Used in Post', 'country-inn' );
                printf( __( '%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'country-inn' ), '<br /><a href="'.esc_url( 'https://fontawesome.com/v4.7.0/icons/' ).'" target="_blank">','</a>',"<code>","</code>" );
                ?>
            </small>
            <?php
        }

        public function country_inn_save_icon_value($post_id)
        {

            /*
                * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
                *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
                * */
            if (
                !isset($_POST['country_inn_fontawesome_fields_nonce']) ||
                !wp_verify_nonce($_POST['country_inn_fontawesome_fields_nonce'], basename(__FILE__)) || /*Protecting against unwanted requests*/
                (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || /*Dealing with autosaves*/
                !current_user_can('edit_post', $post_id)/*Verifying access rights*/
            ) {
                return;
            }

            //Execute this saving function
            if (isset($_POST['icon']) && !empty($_POST['icon'])) {
                $fontawesomeclass = sanitize_text_field( $_POST['icon'] );
                update_post_meta($post_id, 'country_inn_icon', $fontawesomeclass);
            }      
        }

 public function Country_Inn_save_room_price_value($post_id ){

    /*
          * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
          *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
          * */
          if (
              !isset($_POST['country_inn_room_price_fields_nonce']) ||
              !wp_verify_nonce($_POST['country_inn_room_price_fields_nonce'], basename(__FILE__)) || /*Protecting against unwanted requests*/
              (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || /*Dealing with autosaves*/
              !current_user_can('edit_post', $post_id)/*Verifying access rights*/
          ) {
              return;
            }

    if(isset($_POST['room_price']) && !empty($_POST['room_price']))
    {
       $room_price = sanitize_text_field( $_POST['room_price'] );
       update_post_meta( $post_id, 'Country_Inn_room_price', $room_price );
    }
   
    }

    }
}
$productsMetabox = new Country_Inn_Font_Awesome_Class_Metabox;