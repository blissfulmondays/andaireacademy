<?php

if ( ! function_exists( 'arabesque_mikado_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function arabesque_mikado_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'arabesque' );

        return $search_type_options;
    }

    add_filter( 'arabesque_mikado_filter_search_type_global_option', 'arabesque_mikado_set_search_fullscreen_global_option' );
}