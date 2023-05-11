<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="mkdf-post-content">
	        <?php if ( has_post_thumbnail() ) { ?>
		        <div class="mkdf-post-image">
			        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        <?php the_post_thumbnail( 'thumbnail' ); ?>
			        </a>
		        </div>
	        <?php } ?>
	        <div class="mkdf-post-title-area <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'mkdf-no-thumbnail' ); } ?>">
		        <div class="mkdf-post-title-area-inner">
			        <h4 itemprop="name" class="mkdf-post-title entry-title">
				        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			        </h4>
			        <?php
			        $mkdf_my_excerpt = get_the_excerpt();
			        
			        if ( ! empty( $mkdf_my_excerpt ) ) { ?>
				        <p itemprop="description" class="mkdf-post-excerpt"><?php echo wp_trim_words( esc_html( $mkdf_my_excerpt ), 30 ); ?></p>
			        <?php } ?>
                    <div class="mkdf-post-read-more-button">
                        <?php if ( arabesque_mikado_core_plugin_installed() ) {
                            $button_params = array(
                            'type'             => 'simple',
                            'size'             => 'medium',
                            'link'             => get_the_permalink(),
                            'text'             => esc_html__( 'Read More', 'arabesque' ),
                            'enable_underline' => 'yes'
                            );

                            echo arabesque_mikado_get_button_html( $button_params ); ?>

                        <?php } else { ?>
                        <a itemprop="url" href="<?php echo get_the_permalink(); ?>" target="_self" class="mkdf-btn mkdf-btn-medium mkdf-btn-simple mkdf-blog-list-button">
                            <span class="mkdf-btn-text"><?php esc_html_e( 'Read More', 'arabesque' ); ?></span>
                        </a>
                        <?php } ?>
                    </div>
		        </div>
	        </div>
        </div>
    </article>
<?php endwhile; ?>
<?php else: ?>
	<p class="mkdf-blog-no-posts"><?php esc_html_e( 'No posts were found.', 'arabesque' ); ?></p>
<?php endif; ?>