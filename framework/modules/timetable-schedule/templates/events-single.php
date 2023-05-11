<div class="mkdf-ttevents-single">
    <?php if(has_post_thumbnail()) : ?>
        <div class="mkdf-ttevents-single-image-holder">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php endif; ?>

    <div class="mkdf-ttevents-single-holder">
        <?php if(!empty($subtitle)) : ?>
            <p class="mkdf-ttevents-single-subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <h2 class="mkdf-ttevents-single-title"><?php the_title(); ?></h2>

        <div class="mkdf-ttevents-single-content">
            <?php the_content(); ?>
        </div>
    </div>
</div>
