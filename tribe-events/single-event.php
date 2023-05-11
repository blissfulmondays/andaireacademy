<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if(!defined('ABSPATH')) {
	die('-1');
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single mkdf-tribe-events-single">
	<!-- Notices -->
	<?php tribe_the_notices() ?>







	<div class="mkdf-events-single-main-content">
		<div class="mkdf-grid-row">
			<div class="mkdf-events-single-featured-image mkdf-grid-col-6">
				<?php echo tribe_event_featured_image($event_id, 'full', false); ?>
			</div>
			
			<div class="mkdf-events-single-map mkdf-grid-col-6">
				<?php tribe_get_template_part('modules/meta/map'); ?>
			</div>
		</div>
		
		<div class="mkdf-events-single-content-holder">
			<?php do_action('tribe_events_single_event_before_the_content') ?>

            <div class="mkdf-grid-row">
                <div class="mkdf-grid-col-12">
                    <div class="mkdf-events-single-main-info clearfix">
                        <div class="mkdf-events-single-title-holder">
                            <h2 class="mkdf-events-single-title"><?php the_title(); ?></h2>
                            <?php if(tribe_get_cost($event_id)) { ?>
                                <div class="mkdf-events-single-cost">
                                    <?php echo tribe_get_cost(null, true); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="mkdf-grid-col-9">
                    <?php the_content(); ?>
                    <div class="mkdf-events-single-cost-content">
                        <?php echo tribe_get_cost(null, true); ?>
                    </div>
                </div>
            </div>
			
			<?php do_action('tribe_events_single_event_before_the_meta') ?>
			
			<h3 class="mkdf-events-single-content-title"><?php esc_html_e('EVENT DETAILS', 'arabesque'); ?></h3>

			<div class="mkdf-events-single-meta-holder mkdf-grid-row">
				<div class="mkdf-grid-col-4">
					<div class="mkdf-events-single-meta-item">
						<span class="mkdf-events-single-meta-icon">
							<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-calendar-outline', 'ion_icons'); ?>
						</span>
						<span class="mkdf-events-single-meta-label"><?php esc_html_e('Date:', 'arabesque'); ?></span>
						<span class="mkdf-events-single-meta-value">
							<?php echo tribe_events_event_schedule_details(); ?>
						</span>
					</div>

					<div class="mkdf-events-single-meta-item">
						<span class="mkdf-events-single-meta-icon">
							<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-clock', 'ion_icons'); ?>
						</span>
						<span class="mkdf-events-single-meta-label"><?php esc_html_e('Time:', 'arabesque'); ?></span>
						<span class="mkdf-events-single-meta-value">
							<?php echo tribe_get_start_time(); ?> - <?php echo tribe_get_end_time(); ?>
						</span>
					</div>

					<?php if(tribe_has_venue()) : ?>
						<div class="mkdf-events-single-meta-item">
                            <span class="mkdf-events-single-meta-icon">
                                <?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-home-outline', 'ion_icons'); ?>
                            </span>
							<span class="mkdf-events-single-meta-label"><?php esc_html_e('Venue:', 'arabesque'); ?></span>
							<span class="mkdf-events-single-meta-value">
                                <?php echo tribe_get_venue(); ?>
                            </span>
						</div>

						<?php if(tribe_address_exists()) : ?>
							<div class="mkdf-events-single-meta-item">
								<span class="mkdf-events-single-meta-icon">
									<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-location-outline', 'ion_icons'); ?>
								</span>
								<span class="mkdf-events-single-meta-label"><?php esc_html_e('Address:', 'arabesque'); ?></span>
								<span class="mkdf-events-single-meta-value">
									<?php echo tribe_get_address(); ?>
								</span>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="mkdf-grid-col-4">
					<?php if(tribe_has_organizer()) : ?>
						<div class="mkdf-events-single-meta-item">
							<span class="mkdf-events-single-meta-icon">
								<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-person-outline', 'ion_icons'); ?>
							</span>
							<span class="mkdf-events-single-meta-label"><?php esc_html_e('Organizer Name:', 'arabesque'); ?></span>
							<span class="mkdf-events-single-meta-value">
								<?php echo tribe_get_organizer(); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if(tribe_get_organizer_phone()) : ?>
						<div class="mkdf-events-single-meta-item">
							<span class="mkdf-events-single-meta-icon">
								<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-telephone-outline', 'ion_icons'); ?>
							</span>
							<span class="mkdf-events-single-meta-label"><?php esc_html_e('Phone:', 'arabesque'); ?></span>
							<span class="mkdf-events-single-meta-value">
								<?php echo tribe_get_organizer_phone(); ?>
							</span>
						</div>
					<?php endif; ?>

					<?php if(tribe_get_organizer_email()) : ?>
						<div class="mkdf-events-single-meta-item">
							<span class="mkdf-events-single-meta-icon">
								<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-email-outline', 'ion_icons'); ?>
							</span>
							<span class="mkdf-events-single-meta-label"><?php esc_html_e('Email:', 'arabesque'); ?></span>
							<span class="mkdf-events-single-meta-value">
								<a href="mailto: <?php echo tribe_get_organizer_email(); ?>">
	                                <?php echo tribe_get_organizer_email(); ?>
	                            </a>
							</span>
						</div>
					<?php endif; ?>

					<?php if(tribe_get_organizer_website_link()) : ?>
						<div class="mkdf-events-single-meta-item">
							<span class="mkdf-events-single-meta-icon">
								<?php echo arabesque_mikado_icon_collections()->renderIcon('ion-ios-world-outline', 'ion_icons'); ?>
							</span>
							<span class="mkdf-events-single-meta-label"><?php esc_html_e('Website:', 'arabesque'); ?></span>
							<span class="mkdf-events-single-meta-value">
								<a target="_blank" href="<?php echo tribe_get_organizer_website_url(); ?>">
	                                <?php echo tribe_get_organizer_website_url(); ?>
	                            </a>
							</span>
						</div>
					<?php endif; ?>
				</div>
				
				<div class="mkdf-grid-col-4">
				</div>
			</div>
			
			<?php do_action('tribe_events_single_event_after_the_meta'); ?>
		</div>
		
		<div class="mkdf-events-single-navigation clearfix">
			<div class="mkdf-events-single-prev">
				<?php tribe_the_prev_event_link(esc_html__('previous', 'arabesque')); ?>
			</div>
			
			<div class="mkdf-events-single-next">
				<?php tribe_the_next_event_link(esc_html__('next', 'arabesque')); ?>
			</div>
		</div>
		
		<?php do_action('tribe_events_single_event_after_the_content') ?>
	</div>

</div>
