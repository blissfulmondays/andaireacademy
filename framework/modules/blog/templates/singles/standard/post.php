<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php arabesque_mikado_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
            <?php if (has_post_thumbnail() && $post_format == 'standard') {
                arabesque_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params);
            } ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <?php arabesque_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <div class="mkdf-post-info-top">
                        <?php if (arabesque_mikado_options()->getOptionValue('blog_single_posted_by') === 'yes') {
                            arabesque_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params);
                        } ?>
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                    <?php the_content(); ?>
                    <?php do_action('arabesque_mikado_action_single_link_pages'); ?>
                </div>
                <div class="mkdf-post-info-bottom clearfix">
                    <div class="mkdf-post-info-bottom-left">
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
                    <div class="mkdf-post-info-bottom-right">
                        <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>