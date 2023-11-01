<div class="room-<?php print $room['index']; ?> room-block">
  <div class="header">
    <div class="box1"><?php print $room['index']; ?></div>
    <div class="box2">
      <div class="line1"><a href="/schedule/room/<?php print $room['id']; ?>"><?php print $room['title']; ?></a></div>
      <div class="line2"><?php print $room['floor_text']; ?></div>
    </div>
    <?php if ($is_admin): ?><a href="/node/add/room-event" class="add-link"><i class="fas fa-plus"></i></a><?php endif; ?>
  </div>
  <div class="content">
    <?php if (!empty($room['events'])): ?>
      <?php foreach($room['events'] as $eid => $event): ?>
        <div class="event<?php print $event['started']; ?>">
          <div class="row1"><?php print $event['start']; ?></div>
          <div class="row2">
            <div class="line1"><?php print $event['title']; ?></div>
            <div class="line2"><?php print $event['description']; ?></div>
          </div>
          <?php if ($is_admin): ?><a href="/node/<?php print $event['eid']; ?>/edit" class="edit-link"><i class="fa-solid fa-pen"></i></a><?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

