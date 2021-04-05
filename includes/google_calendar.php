<?php

function get_google_calendar_service()
{
    $client = new Google\Client();

    if ($credentials_file = checkServiceAccountCredentialsFile()) {
        // set the location manually
        $client->setAuthConfig($credentials_file);
    } elseif (getenv('GOOGLE_APPLICATION_CREDENTIALS')) {
        // use the application default credentials
        $client->useApplicationDefaultCredentials();
    } else {
        echo missingServiceAccountDetailsWarning();
        return;
    }

    $client->setScopes(['https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.events']);
    $client->setSubject('dev@heretic.agency');
    $service = new Google_Service_Calendar($client);

    return $service;
}


/**
 * Event 'created/updated' hook for creating Google Calendar events
 */

function post_unpublished($new_status, $old_status, $post)
{
    $postType = get_post_type($post);

    $fp = fopen(get_template_directory() . '/google_calendar_log.txt', 'a');
    fwrite($fp, json_encode([$new_status, $old_status]) . "\r\n");
    fclose($fp);

    // For some reason when importing events from evenbrite through the events aggregator,
    // the event is published twice, but the first time the date is incorrect. This is a hack fix
    // to only create a google calendar event on the second publish.
    // This does mean that if a post is manually created, it will need to be saved a second time
    // to create the google calendar event
    if($postType == 'tribe_events' && $new_status == 'publish' && $old_status == 'publish')
    {
        $calendarId = 'c_pjtm9656bvffua43j4jqik36co@group.calendar.google.com';
        $service = get_google_calendar_service();

        $tribeEvents = tribe_get_event($post);
        $title = $tribeEvents->post_title;
        $desc = $tribeEvents->post_content;
        $timezone = $tribeEvents->timezone;
        $start = tribe_get_start_date($post, true, 'c', $timezone);
        $end = tribe_get_end_date($post, true, 'c', $timezone);

        $event = new Google_Service_Calendar_Event(array(
            'summary' => $title,
            'description' => $desc,
            'start' => array(
                'dateTime' => $start,
                'timeZone' => $timezone
            ),
            'end' => array(
                'dateTime' => $end,
                'timeZone' => $timezone
            )
        ));

        $addEvent = $service->events->insert($calendarId, $event);

        $eventID = $addEvent->id;

        update_post_meta($post->ID, 'googleEventID', $eventID);

        $fp = fopen(get_template_directory() . '/google_calendar_log.txt', 'a');
        fwrite($fp, json_encode($addEvent) . "\r\n");
        fwrite($fp, $timezone . "\r\n");
        fclose($fp);
    }

    if($postType == 'tribe_events' && $new_status == 'trash')
    {
        $calendarId = 'c_pjtm9656bvffua43j4jqik36co@group.calendar.google.com';
        $service = get_google_calendar_service();
        $tribeEvents = tribe_get_event($post);
        $title = $tribeEvents->post_title;
        $eventID = get_post_meta($post->ID, 'googleEventID');
        $deleteEvent = $service->events->delete($calendarId, $eventID);

        $fp = fopen(get_template_directory() . '/google_calendar_log.txt', 'a');
        fwrite($fp, 'Delete ' . $title . "\r\n");
        fclose($fp);
    }
}
// add_action( 'publish_tribe_events', 'post_unpublished', 10, 2);
// add_action( 'trash_tribe_events', 'post_unpublished', 10, 2);
add_action('transition_post_status', 'post_unpublished', 10, 3);