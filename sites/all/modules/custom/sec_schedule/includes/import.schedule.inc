<?php

function schedule_process_incoming_files()
{
  $directory = 'private://exchange/';

  // получить список файлов по шаблону
  $mask = '/event_import.*\.json/';
  $files = file_scan_directory($directory, $mask, ['recurse' => false], 0);

  //  watchdog('import', 'Крон запущен <pre>@v</pre>', array('@v' => print_r( $files, TRUE)), WATCHDOG_INFO);

  // импортировать
  if ($files) {
    foreach ($files as $file) {
      //      $c = file_get_contents($file->uri);
      $array = drupal_json_decode(file_get_contents($file->uri));
      if (schedule_event_import($array)) {
        $path = $directory . 'success/schedule/' . date('Y') . '/' . date('m') . '/' . date('d');
      } else {
        $path = $directory . 'fail/schedule/' . date('Y') . '/' . date('m') . '/' . date('d');
      }
      file_prepare_directory($path, FILE_CREATE_DIRECTORY);
      file_unmanaged_move($file->uri, $path . '/' . $file->filename);
    }
  }
}

function schedule_event_import($array)
{
  if (is_array($array) && isset($array['room_id'])) {

    $query = new EntityFieldQuery();
    $events = $query
      ->entityCondition('entity_type', 'node')
      ->propertyCondition('type', 'room_event')
      ->fieldCondition('field_1c_id', 'value', trim($array['id_1c']))
      ->execute();

    if (!$events) {
      $event = (object)array(
        'title' => $array['title'],
        'type' => 'room_event',
        'status' => 1,
      );
      node_save($event);
    } else {
      $event = current($events['node']);
    }

    $node_wr = entity_metadata_wrapper('node', $event->nid);
    $node_wr->title->set($array['title']);
    $node_wr->status->set($array['status']);
    $node_wr->body->value->set($array['description']);
    $node_wr->field_1c_id = $array['id_1c'];
    $node_wr->field_room = $array['room_id'];
    $node_wr->field_period->value->set(strtotime($array['start']));
    $node_wr->field_period->value2->set(strtotime($array['finish']));
    foreach ($node_wr->field_participants->getIterator() as $pp_wr) {
      $pp_wr->delete();
    }
    $node_wr->field_participants->set(null);
    $node_wr->save();

    foreach($array['participants'] as $item_pp) {
      $participant = entity_create('field_collection_item', array('field_name' => 'field_participants'));
      $participant->setHostEntity('node', $node_wr->value());
      $participant_wr = entity_metadata_wrapper('field_collection_item', $participant);
      $participant_wr->field_company = $item_pp['company'];
      $p_markup = '';
      if (!empty($item_pp['list'])) {
        foreach($item_pp['list'] as $pp) {
          $p_markup .= '<span>' . $pp . '</span>';
        }
      }
      $participant_wr->field_participants_list = $p_markup;
      $participant_wr->save();
    }

    drupal_set_message('Мероприятие импортировано.');
    watchdog('import', 'Мероприятие импортировано.', [], WATCHDOG_INFO);
    return true;
  } else {
    drupal_set_message('Импорт мероприятия не выполнен.', 'warning');
    watchdog('import', 'Импорт мероприятия не выполнен.', [], WATCHDOG_ERROR);
    return false;
  }
}
