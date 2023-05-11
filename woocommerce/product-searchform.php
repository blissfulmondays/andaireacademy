<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'arabesque'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr__('Type your search', 'arabesque'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr__('Search for:', 'arabesque'); ?>"/>
	    <button type="submit" class="mkdf-woo-search-widget-button">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                        <path d="M15.389,14.544c1.105-1.307,1.777-2.994,1.777-4.836c0-4.136-3.365-7.5-7.5-7.5c-4.136,0-7.5,3.364-7.5,7.5
	c0,4.137,3.365,7.5,7.5,7.5c1.934,0,3.693-0.742,5.025-1.947l5.305,4.926l0.682-0.732L15.389,14.544z M9.667,16.208
	c-3.584,0-6.5-2.917-6.5-6.5c0-3.584,2.916-6.5,6.5-6.5c3.584,0,6.5,2.916,6.5,6.5C16.167,13.292,13.25,16.208,9.667,16.208z"></path>
                    </svg>
        </button>
        <input type="hidden" name="post_type" value="product"/>
    </div>
</form>