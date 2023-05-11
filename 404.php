<?php get_header(); ?>
				<div class="mkdf-page-not-found">
					<?php
					$mkdf_title_image_404 = arabesque_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = arabesque_mikado_options()->getOptionValue( '404_title' );
					$mkdf_subtitle_404    = arabesque_mikado_options()->getOptionValue( '404_subtitle' );
					$mkdf_text_404        = arabesque_mikado_options()->getOptionValue( '404_text' );
					$mkdf_search_form_skin= arabesque_mikado_options()->getOptionValue( '404_search_form_skin' );
                    $mkdf_button_style    = arabesque_mikado_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $mkdf_title_image_404 ) ) { ?>
						<div class="mkdf-404-title-image">
							<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'arabesque' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
							echo esc_html( $mkdf_title_404 );
						} else {
							esc_html_e( '404', 'arabesque' );
						} ?>
					</h1>
					
					<h3 class="mkdf-404-subtitle">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'arabesque' );
						} ?>
					</h3>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'The page requested couldn\'t be found. This could be a spelling error in the URL or a removed page.', 'arabesque' );
						} ?>
					</p>

                    <?php
                    $button_params = array(
                        'link'         => esc_url( home_url( '/' ) ),
                        'type'         => 'outline',
                        'custom_class' => 'mkdf-btn-default-style',
                        'text'         => ! empty( $mkdf_button_label ) ? $mkdf_button_label : esc_html__( 'Home Page', 'arabesque' )
                    );

                    if ( $mkdf_button_style == 'light-style' ) {
                        $button_params['custom_class'] = 'mkdf-btn-light-style';
                    } ?>
                    <div class="mkdf-404-button-holder">
                        <?php
                            echo arabesque_mikado_return_button_html( $button_params );
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>