<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <div class="mkdf-post-mark">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="62.03px" height="18.863px" viewBox="0 0 62.03 18.863" enable-background="new 0 0 62.03 18.863" xml:space="preserve">
                        <g>
                            <path fill="#231F20" d="M56.214,0.994H37.697c-2.838,0-5.149,2.31-5.149,5.149v0.705h3.268V6.144c0-1.037,0.844-1.882,1.881-1.882
                                h18.518c1.038,0,1.883,0.845,1.883,1.882v6.857c0,1.037-0.845,1.882-1.883,1.882H37.697c-1.038,0-1.881-0.845-1.881-1.882v-0.705
                                h-3.268v0.705c0,2.837,2.311,5.149,5.149,5.149h18.518c2.84,0,5.15-2.313,5.15-5.149V6.144C61.365,3.304,59.054,0.994,56.214,0.994
                                z"/>
                            <path fill="#231F20" d="M26.18,12.296v0.705c0,1.037-0.844,1.882-1.882,1.882H5.78c-1.037,0-1.882-0.845-1.882-1.882V6.144
                                c0-1.037,0.845-1.882,1.882-1.882h18.518c1.038,0,1.882,0.845,1.882,1.882v0.705h3.268V6.144c0-2.84-2.311-5.149-5.149-5.149H5.78
                                c-2.839,0-5.149,2.31-5.149,5.149v6.857c0,2.837,2.31,5.149,5.149,5.149h18.518c2.839,0,5.149-2.313,5.149-5.149v-0.705H26.18z"/>
                            <path fill="#231F20" d="M40.392,11.205H21.603c-0.902,0-1.633-0.731-1.633-1.633s0.731-1.635,1.633-1.635h18.789
                                c0.902,0,1.634,0.733,1.634,1.635S41.293,11.205,40.392,11.205z"/>
                        </g>
                        </svg>
                    </div>
                    <?php arabesque_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
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