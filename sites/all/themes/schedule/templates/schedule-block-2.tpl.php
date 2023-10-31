<div class="block-2 room-block<?php print (isset($content[ROOM2]['events']) && count($content[ROOM2]['events'])) ? '' : ' disabled'; ?>">
    <div class="header">
        <div class="box1">2</div>
        <div class="box2">
          <div class="line1"><a href="/schedule/room/2"><?php print $content[ROOM2]['title']; ?></a></div>
            <div class="line2"><?php print $content[ROOM2]['floor_text']; ?></div>
        </div>
    </div>
    <div class="content">
        <?php if (!empty($content[ROOM2]['events'])): ?>
            <?php foreach($content[ROOM2]['events'] as $eid => $event): ?>
                <div class="event<?php print $event['started']; ?>">
                    <div class="row1"><?php print $event['start']; ?></div>
                    <div class="row2">
                        <div class="line1"><?php print $event['title']; ?></div>
                        <div class="line2"><?php print $event['description']; ?></div>
                    </div>
                    <?php if ($content['admin']): ?><a href="/node/<?php print $eid; ?>/edit" class="edit-link"><i class="fas fa-pen"></i></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
