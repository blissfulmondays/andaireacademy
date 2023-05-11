<?php if ( ! arabesque_mikado_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="mkdf-post-read-more-button">
		<?php
			$button_params = array(
				'type'             => 'simple',
				'size'             => 'medium',
				'link'             => get_the_permalink(),
				'text'             => esc_html__( 'Read More', 'arabesque' ),
                'custom_class'     => 'mkdf-btn-underline'
			);

			echo arabesque_mikado_return_button_html( $button_params );
		?>
	</div>
<?php } ?>