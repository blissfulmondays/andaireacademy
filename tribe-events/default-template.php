<?php
get_header();
arabesque_mikado_get_title();
get_template_part('slider');
?>
<div class="mkdf-container mkdf-default-page-template">
	<?php do_action('arabesque_mikado_action_after_container_open'); ?>
	<div class="mkdf-container-inner clearfix">
        <div id="tribe-events-pg-template">
            <?php tribe_events_before_html(); ?>
            <?php tribe_get_view(); ?>
            <?php tribe_events_after_html(); ?>
        </div> <!-- #tribe-events-pg-template -->
        <?php do_action('arabesque_mikado_action_page_after_content'); ?>
    </div>
	<?php do_action('arabesque_mikado_action_before_container_close'); ?>
</div>
<?php get_footer(); ?>
