<?php
/**
 * View: List View - Single Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/title.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

$eventURL = tribe_get_event_website_url();
?>
<h3 class="tribe-events-calendar-list__event-title tribe-common-h6 tribe-common-h4--min-medium">
    <a
        href="<?php echo $eventURL ?>"
        target="_blank"
        title="<?php echo esc_attr( $event->title ); ?>"
        rel="bookmark"
        class="tribe-events-calendar-list__event-title-link tribe-common-anchor-thin"
    >
        <?php
        // phpcs:ignore
        echo $event->title;
        ?>
    </a>
</h3>
