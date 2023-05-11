<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
        <div class="mkdf-bli-image-holder">
            <?php if ( $post_info_image == 'yes' ) {
                arabesque_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
            } ?>
			<?php if ( $post_info_date_position == 'on-image' && $post_info_date == 'yes' ) {
				arabesque_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
			} ?>
        </div>
        <div class="mkdf-bli-content">
            <?php if ($post_info_section == 'yes' &&  ($post_info_date_position !== 'on-image' && $post_info_date == 'yes') || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes' || $post_info_like == 'yes' ) { ?>
                <div class="mkdf-bli-info">
	                <?php
		                if ( $post_info_date_position !== 'on-image' && $post_info_date == 'yes' ) {
			                arabesque_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		                }
		                if ( $post_info_category == 'yes' ) {
			                arabesque_mikado_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                arabesque_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                arabesque_mikado_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                arabesque_mikado_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <?php arabesque_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="mkdf-bli-excerpt">
		        <?php arabesque_mikado_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
                <?php if ( $post_info_share == 'yes' ) {
                    arabesque_mikado_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                }
                ?>
		        <?php arabesque_mikado_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', 'shortcode', $params ); ?>
	        </div>
        </div>
	</div>
</li>