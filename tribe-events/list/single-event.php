<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<!-- Event Cost  EDITED TO LINK EVENT WEBSITE URL AROUND PRICE-->



<!-- EDITS -->
<?php if ( tribe_get_custom_field( 'Member Button Text' ) ) : ?>
  <div class="tribe-events-event-cost">
    <a target="_blank" href="<?php echo esc_url( tribe_get_custom_field( 'Member Link' ) ); ?>"><span><?php echo tribe_get_custom_field('Member Button Text', $eventID) ?></span></a>
  </div>
<?php endif; ?>
<?php if ( tribe_get_custom_field( 'General Admission Text' ) ) : ?>
  <div class="tribe-events-event-cost">
    <a target="_blank" href="<?php echo esc_url( tribe_get_custom_field( 'General Admission Link' ) ); ?>"><span><?php echo tribe_get_custom_field('General Admission Text', $eventID) ?></span></a>
  </div>
<?php endif; ?>

<!-- EDITS -->





<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
  <?php if ( tribe_get_custom_field( 'Screening Type' ) ) : ?>
    <p style="font-weight:700;padding-bottom:0;"><?php echo tribe_get_custom_field( 'Screening Type' ); ?></p>
  <?php endif; ?>
<h2 class="tribe-events-list-event-title entry-title summary">
	<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>
</h2>
<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>
<div class="tribe-events-event-meta vcard">
	<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

		<!-- Schedule & Recurrence Details -->
		<div class="updated published time-details">
			<span class="custom_list_date"><?php echo tribe_events_event_schedule_details() ?></span>
		</div>

		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<div class="tribe-events-venue-details">
				<?php echo implode( ', ', $venue_details ); ?>
			</div> <!-- .tribe-events-venue-details -->
		<?php endif; ?>

	</div>
</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'medium' ) ?>

<!-- Event Content -->
<?php do_action( 'tribe_events_before_the_content' ) ?>
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<?php the_excerpt() ?>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more" rel="bookmark"><?php esc_html_e( 'Read more / Trailer', 'tribe-events-calendar' ) ?> &raquo;</a>
</div><!-- .tribe-events-list-event-description -->
<?php
do_action( 'tribe_events_after_the_content' );
