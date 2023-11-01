<div class="block-f">
    <div class="content">
        <?php if (!empty($content['footer']['events'])): ?>
            <?php foreach($content['footer']['events'] as $event): ?>
                <div class="event<?php print $event['started']; ?>">
                    <div class="row1">
                        <div class="line1"><?php print $event['start']; ?></div>
                        <div class="line2"><?php print $event['title']; ?></div>
                    </div>
                    <div class="row2">
                        <?php if ($event['floor'] == 1): ?>
                            <i class="fas fa-long-arrow-alt-left"></i>
                            <i class="fas fa-<?php print $event['hurry'] ? 'running' : 'walking'; ?> fa-flip-horizontal"></i>
                        <?php endif; ?>
                        <?php if ($event['floor'] == 2): ?>
                            <i class="fas fa-<?php print $event['hurry'] ? 'running' : 'walking'; ?>"></i>
                            <i class="fas fa-long-arrow-alt-up"></i>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
