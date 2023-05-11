<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <div class="mkdf-post-mark">
                        <span class="mkdf-testimonials-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="82px" height="64px" viewBox="0 0 82 64" enable-background="new 0 0 82 64" xml:space="preserve">
                            <g>
                                <path d="M11.88,56.082c-1.215,0-1.82-0.52-1.82-1.561c0-0.52,0.346-1.125,1.04-1.819c10.226-7.105,15.86-15.601,16.9-25.48
                                    c0.17-1.211-0.045-2.641-0.65-4.29c-0.609-1.646-1.345-3.51-2.21-5.59c-0.869-0.866,0.346-2.6,3.64-5.2
                                    c3.12-2.425,5.285-3.465,6.5-3.12c1.385,0.175,2.6,2.255,3.64,6.24c1.21,3.989,1.56,6.849,1.04,8.58
                                    c-3.12,8.84-12.049,19.415-26.78,31.72C12.831,55.912,12.4,56.082,11.88,56.082z M43.6,56.082c-1.215,0-1.82-0.52-1.82-1.561
                                    c0-0.52,0.346-1.125,1.041-1.819c10.225-7.105,15.859-15.601,16.899-25.48c0.171-1.211-0.044-2.641-0.649-4.29
                                    c-0.609-1.646-1.346-3.51-2.211-5.59c-0.869-0.866,0.346-2.6,3.641-5.2c3.119-2.425,5.285-3.465,6.5-3.12
                                    c1.211,0.175,2.51,2.255,3.9,6.24c1.039,4.16,1.299,7.02,0.779,8.58c-3.12,8.669-11.96,19.24-26.52,31.72
                                    C44.465,55.912,43.945,56.082,43.6,56.082z"/>
                            </g>
                            </svg>
                        </span>
                    </div>
                    <?php arabesque_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
        <div class="mkdf-post-info-top">
            <?php if (arabesque_mikado_options()->getOptionValue('blog_single_posted_by') === 'yes') {
                arabesque_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params);
            } ?>
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
        </div>
    </div>
    <div class="mkdf-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="mkdf-post-info-bottom clearfix">
        <div class="mkdf-post-info-bottom-left">
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
        </div>
        <div class="mkdf-post-info-bottom-right">
            <?php arabesque_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>