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

function post_unpublished($id, $post)
{
    $calendarId = 'c_pjtm9656bvffua43j4jqik36co@group.calendar.google.com';
    $service = get_google_calendar_service();
    $post_url = get_permalink($id);

    $tribeEvents = tribe_get_event($id);
    $title = $tribeEvents->post_title;
    $desc = $tribeEvents->post_content;
    $timezone = $tribeEvents->timezone;
    $start = tribe_get_start_date($post, true, 'c', $timezone);
    $end = tribe_get_end_date($post, true, 'c', $timezone);

    // Create/update
    if(current_action() == 'publish_tribe_events')
    {
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

        update_post_meta($id, 'googleEventID', $eventID);

        $fp = fopen(get_template_directory() . '/google_calendar_log.txt', 'a');
        fwrite($fp, json_encode($tribeEvents) . "\r\n");
        fwrite($fp, $timezone . "\r\n");
        fclose($fp);
    }

    // Delete
    // if(current_action() == 'trash_tribe_events')
    // {
    //     $eventID = get_post_meta($id, 'googleEventID');
    //     $deleteEvent = $service->events->delete($calendarId, $eventID);

    //     $fp = fopen(get_template_directory() . '/google_calendar_log.txt', 'a');
    //     fwrite($fp, 'Delete ' . $title . "\r\n");
    //     fclose($fp);
    // }
}
 add_action( 'publish_tribe_events', 'post_unpublished', 10, 2);
 add_action( 'trash_tribe_events', 'post_unpublished', 10, 2);