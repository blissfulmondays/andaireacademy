<div <?php post_class($item_class); ?> <?php arabesque_mikado_inline_style($item_holder_styles); ?>>
    <div class="mkdf-events-list-item-holder">
        <?php if(has_post_thumbnail()) : ?>
            <div class="mkdf-events-list-item-image-holder" <?php arabesque_mikado_inline_style($image_holder_styles);?>>
                <a href="<?php the_permalink(); ?>">
                    <?php if ($enable_box_shadow == 'yes') : ?>
                    <div class="mkdf-moving-image-holder"><div class="mkdf-moving-image">
                    <?php endif; ?>
                        <?php the_post_thumbnail($image_size); ?>

                        <div class="mkdf-events-list-item-date-holder">
                            <div class="mkdf-events-list-item-date-inner">
                                <span class="mkdf-events-list-item-date-day">
                                    <?php echo tribe_get_start_date(null, true, 'd'); ?>
                                </span>

                                <span class="mkdf-events-list-item-date-month">
                                    <?php echo tribe_get_start_date(null, true, 'M'); ?>
                                </span>
                            </div>
                        </div>
                    <?php if ($enable_box_shadow == 'yes') : ?>
                    </div></div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
        <div class="mkdf-events-list-item-content">
            <div class="mkdf-events-list-item-title-holder">
                <h4 class="mkdf-events-list-item-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
            </div>
	        <div class="mkdf-events-list-item-info">
		        <div class="mkdf-events-list-item-date">
					<span class="mkdf-events-item-info-icon">
						<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-clock-outline', 'ion_icons'); ?>
					</span>
			        <?php echo tribe_events_event_schedule_details(); ?>
		        </div>
		        <div class="mkdf-events-list-item-location-holder">
					<span class="mkdf-events-item-info-icon">
						<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-location-outline', 'ion_icons'); ?>
					</span>
			        <span class="qpdef-events-list-item-location"><?php echo esc_html(tribe_get_address()); ?></span>
		        </div>
	        </div>
	        <?php
            if ($show_excerpt == 'yes') :
                    $excerpt_text = get_the_excerpt();
                    if(!empty($excerpt_text)) { ?>
                        <div class="mkdf-events-list-item-excerpt-holder">
                            <?php
                                $excerpt_text = rtrim( implode( ' ', array_slice( explode( ' ', $excerpt_text ), 0, 55 ) ) );
                                echo esc_html( $excerpt_text );
                            ?>
                        </div>
                    <?php }
                endif;
	        ?>
        </div>
    </div>
</div>