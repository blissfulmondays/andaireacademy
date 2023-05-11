<?php
$share_type = isset( $share_type ) ? $share_type : 'dropdown';
?>
<?php if ( arabesque_mikado_core_plugin_installed()
           && arabesque_mikado_options()->getOptionValue( 'enable_social_share' ) === 'yes'
           && arabesque_mikado_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
    <div class="mkdf-blog-share">
		<?php echo arabesque_mikado_get_social_share_html( array( 'type'              => $share_type,
		                                                          'dropdown_behavior' => 'left'
		) ); ?>
    </div>
<?php } ?>