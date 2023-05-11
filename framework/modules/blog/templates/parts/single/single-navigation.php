<?php
$blog_single_navigation = arabesque_mikado_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = arabesque_mikado_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="mkdf-blog-single-navigation">
		<div class="mkdf-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'label' => '<span class="mkdf-blog-single-nav-label"><span><span>'.esc_html__('previous', 'arabesque').'</span></span>'
					),
					'next' => array(
						'label' => '<span class="mkdf-blog-single-nav-label"><span><span>'.esc_html__('next', 'arabesque').'</span></span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
                        $post_navigation['prev']['thumbnail'] = get_the_post_thumbnail($post_navigation['prev']['post'], $size = 'thumbnail');
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
                        $post_navigation['next']['thumbnail'] = get_the_post_thumbnail($post_navigation['next']['post'], $size = 'thumbnail');
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
                        $post_navigation['prev']['thumbnail'] = get_the_post_thumbnail($post_navigation['prev']['post'], $size = 'thumbnail');
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
                        $post_navigation['next']['thumbnail'] = get_the_post_thumbnail($post_navigation['next']['post'], $size = 'thumbnail');
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<a itemprop="url" class="mkdf-blog-single-<?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
                            <?php echo arabesque_mikado_get_formated_output($post_navigation[$nav_type]['thumbnail']); ?>
							<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
						</a>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>