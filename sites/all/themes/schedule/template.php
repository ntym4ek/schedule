<?php

/**
 * Implements hook_theme().
 */
function schedule_theme()
{
  return array(
    'schedule_page' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule/schedule-page',
    ),
    'schedule_page_room_block' => array(
      'variables' => array('room' => null, 'is_admin' => null),
      'template' => 'templates/schedule/schedule-page-room-block',
    ),
    'schedule_room_page' => array(
      'variables' => array('room' => NULL),
      'template' => 'templates/schedule/schedule-room-page',
    ),
    'schedule_room_content' => array(
      'variables' => array('room' => NULL),
      'template' => 'templates/schedule/schedule-room-content',
    ),
  );
}
