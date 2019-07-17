<?php
/**
 * Custom Search Form
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
global  $country_inn_placeholder_option;
?>
<div class="search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform search-form" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $country_inn_placeholder_text     = '';
            $country_inn_placeholder_option   = country_inn_get_option( 'country_inn_post_search_placeholder_option');
            if ( !empty( $country_inn_placeholder_option) ):
                $country_inn_placeholder_text = 'placeholder="'.esc_attr ( $country_inn_placeholder_option ). '"';
            endif; ?>
            <input type="text" <?php echo $country_inn_placeholder_text ;?> class="blog-search-field" id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>