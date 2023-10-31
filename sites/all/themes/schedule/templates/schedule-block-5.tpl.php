<div class="block-5 room-block<?php print (isset($content[ROOM5]['events']) && count($content[ROOM5]['events'])) ? '' : ' disabled'; ?>">
    <div class="header">
        <div class="box1">5</div>
        <div class="box2">
          <div class="line1"><a href="/schedule/room/5"><?php print $content[ROOM5]['title']; ?>, <span><?php print $content[ROOM5]['floor_text']; ?></span></a></div>
        </div>
    </div>
    <div class="content">
        <?php if (!empty($content[ROOM5]['events'])): ?>
            <?php foreach($content[ROOM5]['events'] as $eid => $event): ?>
                <div class="event<?php print $event['started']; ?>">
                    <div class="row1"><?php print $event['start']; ?></div>
                    <div class="row2">
                        <div class="line1"><?php print $event['title']; ?></div>
                        <div class="line2"><?php print $event['description']; ?></div>
                    </div>
                    <?php if ($content['admin']): ?><a href="/node/<?php print $event['eid']; ?>/edit" class="edit-link"><i class="fas fa-pen"></i></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
