<?php

arabesque_mikado_get_single_post_format_html($blog_single_type);

do_action('arabesque_mikado_action_after_article_content');

arabesque_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

arabesque_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

arabesque_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

arabesque_mikado_get_module_template_part('templates/parts/single/comments', 'blog');