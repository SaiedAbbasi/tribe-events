<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>
<!-- try something -->
<!-- Tribe Bar -->
    
<?php tribe_get_template_part( 'modules/bar' ); ?>

    

    <!-- Opening & Closing -->


    <!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>

    <div class="tribe-clear"></div>
    <div id="tribe-events-content" class="tribe-events-list">
    <h2 class="tribe-events-page-title">Recent Events</h2>
    
<?php echo do_shortcode("[ecspe-list-events cat='past' limit='15' eventdetails='true' thumb='true'  excerpt='true' ecspe-list-events order='DESC']"); ?>
</div>
<div class="tribe-clear"></div>
<?php
do_action( 'tribe_events_after_template' );
