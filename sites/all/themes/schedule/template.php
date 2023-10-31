<?php

/**
 * Implements hook_theme().
 */
function schedule_theme()
{
  return array(
    'schedule_room_page' => array(
      'variables' => array('room' => NULL),
      'template' => 'templates/schedule-room-page',
    ),
    'schedule_room_content' => array(
      'variables' => array('room' => NULL),
      'template' => 'templates/schedule-room-content',
    ),

    'schedule_page' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-page',
    ),
    'schedule_block_1' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-1',
    ),
    'schedule_block_2' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-2',
    ),
    'schedule_block_3' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-3',
    ),
    'schedule_block_4' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-4',
    ),
    'schedule_block_5' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-5',
    ),
    'schedule_block_6' => array(
      'variables' => array('content' => NULL),
      'template' => 'templates/schedule-block-6',
    ),
  );
}
