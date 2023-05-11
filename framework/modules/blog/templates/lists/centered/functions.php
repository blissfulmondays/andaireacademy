<?php

if ( ! function_exists( 'arabesque_mikado_register_blog_centered_template_file' ) ) {
	/**
	 * Function that register blog centered template
	 */
	function arabesque_mikado_register_blog_centered_template_file( $templates ) {
		$templates['blog-centered'] = esc_html__( 'Blog: Centered', 'arabesque' );
		
		return $templates;
	}
	
	add_filter( 'arabesque_mikado_filter_register_blog_templates', 'arabesque_mikado_register_blog_centered_template_file' );
}

if ( ! function_exists( 'arabesque_mikado_set_blog_centered_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function arabesque_mikado_set_blog_centered_type_global_option( $options ) {
		$options['centered'] = esc_html__( 'Blog: Centered', 'arabesque' );
		
		return $options;
	}
	
	add_filter( 'arabesque_mikado_filter_blog_list_type_global_option', 'arabesque_mikado_set_blog_centered_type_global_option' );
}