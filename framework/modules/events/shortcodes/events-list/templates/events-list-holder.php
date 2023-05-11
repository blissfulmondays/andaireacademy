<div class="mkdf-events-list <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-events-list-wrapper mkdf-outer-space clearfix">
    <?php if($query->have_posts()) : ?>
        <?php while($query->have_posts()) : $query->the_post(); ?>
            <?php $caller->getEventItemTemplate($params); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'arabesque'); ?></p>
    <?php endif; ?>
    </div>
</div>