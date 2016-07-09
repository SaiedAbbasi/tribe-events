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

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( __( '&laquo; All %s', 'tribe-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Event header -->
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'tribe-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
			<?php if ( tribe_get_cost() ) : ?>
<?php endif; ?>
		</ul>
	</div>	
		<!-- .tribe-events-sub-nav -->

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<?php the_title( '<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>' ); ?>
	<div class="tribe-events-schedule updated published tribe-clearfix">
		<?php echo tribe_events_event_schedule_details( $event_id, '<h3>', '</h3>' ); ?>
		<?php if ( tribe_get_cost() ) : ?>
			<span class="tribe-events-divider">|</span>
			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
		<?php endif; ?>
	</div>
	
	<!-- #tribe-events-header -->
<!-- start -->
<!-- Saied edit to cost to add button to single event -->
<span class="saied-single-event-cost"><div class="tribe-events-event-cost">
<?php if ( tribe_get_custom_field( 'General Admission Text' ) ) : ?>
    <a target="_blank" href="<?php echo esc_url( tribe_get_custom_field( 'General Admission Link' ) ); ?>"><span style="padding:12px 30px;background-color:#3C2791;border-radius:4px;border:1px solid #2707B2;font-weight:700;white-space: nowrap;"><?php echo tribe_get_custom_field('General Admission Text', $eventID) ?></span></a>
<?php endif; ?>
<?php if ( tribe_get_custom_field( 'Member Button Text' ) ) : ?>
    <a target="_blank" href="<?php echo esc_url( tribe_get_custom_field( 'Member Link' ) ); ?>"><span style="padding:12px 30px;background-color: #3C2791;border-radius:4px;border:1px solid #2707B2;font-weight:700;white-space: nowrap;"><?php echo tribe_get_custom_field('Member Button Text', $eventID) ?></span></a>
<?php endif; ?>
</div></span>


	<!-- end -->
	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->
			<!-- Hiding featured image: <?php echo tribe_event_featured_image( $event_id, 'full', false ); ?> -->

			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php
			/**
			 * The tribe_events_single_event_meta() function has been deprecated and has been
			 * left in place only to help customers with existing meta factory customizations
			 * to transition: if you are one of those users, please review the new meta templates
			 * and make the switch!
			 */
			if ( ! apply_filters( 'tribe_events_single_event_meta_legacy_mode', false ) ) {
				tribe_get_template_part( 'modules/meta' );
			} else {
				echo tribe_events_single_event_meta();
			}
			?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>
<!-- attempt to add content after meta 2nd buy button -->
<!-- Saied edit to cost to add button to single event -->
	<div class="saied-end-event-cost"><span class="saied-single-event-cost">
		<a href="<?php echo (tribe_get_event_website_url() ); ?>"><span style="padding: 12px 30px;
    background-color: #3C2791;
    border-radius: 4px;
    border:1px solid #2707B2;
    font-weight:700;">BUY TICKETS</span></a>
	</span></div>
	<!-- end -->


	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<h3 class="tribe-events-visuallyhidden"><?php printf( __( '%s Navigation', 'tribe-events-calendar' ), $events_label_singular ); ?></h3>
		<ul class="tribe-events-sub-nav">
			<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
			<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
		</ul>
		<!-- .tribe-events-sub-nav -->
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->