<div class="block-1 room-block<?php print (isset($content[ROOM1]['events']) && count($content[ROOM1]['events'])) ? '' : ' disabled'; ?>">
  <div class="header">
    <div class="box1">1</div>
    <div class="box2">
      <div class="line1"><a href="/schedule/room/1"><?php print $content[ROOM1]['title']; ?></a></div>
      <div class="line2"><?php print $content[ROOM1]['floor_text']; ?></div>
    </div>
    <?php if ($content['admin']): ?><a href="/node/add/room-event" class="add-link"><i class="fas fa-plus"></i></a><?php endif; ?>
  </div>
  <div class="content">
    <?php if (!empty($content[ROOM1]['events'])): ?>
      <?php foreach($content[ROOM1]['events'] as $eid => $event): ?>
        <div class="event<?php print $event['started']; ?>">
          <div class="row1"><?php print $event['start']; ?></div>
          <div class="row2">
            <div class="line1"><?php print $event['title']; ?></div>
            <div class="line2"><?php print $event['description']; ?></div>
          </div>
          <?php if ($content['admin']): ?><a href="/node/<?php print $event['eid']; ?>/edit" class="edit-link"><i class="fa-solid fa-pen"></i></a><?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

