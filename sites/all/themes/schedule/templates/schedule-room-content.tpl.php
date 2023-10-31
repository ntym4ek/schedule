<?
if (!empty($room['events'])) {
  $current = array_shift($room['events']);
  if (time() < $current['start_unix'] - 15*60) {
    $next = $current;
    $current = null;
  } else {
    $next = array_shift($room['events']);
  }
}
?>
<div class="room-content">
  <div class="room-event<?php print isset($current['started']) ? $current['started'] : ''; ?>">
    <?php if (!empty($current['start'])): ?>
    <div class="block-d">
      <div class="line2"><?php print empty($current['description']) ? $current['title'] : $current['description']; ?></div>
      <div class="line3"><?php print $current['start'] . ' - ' . $current['finish']; ?></div>
    </div>
    <div class="block-m">
      <div class="live">ИДЁТ СОВЕЩАНИЕ</div>
    </div>
    <?php else: ?>
    <div class="block-m">
      <div class="line2">Нет мероприятий</div>
    </div>
    <div class="block-m">
      <div class="free">СВОБОДНО</div>
    </div>
    <?php endif; ?>
  </div>

  <div class="room-participants">
      <div class="content">
        <?php if (!empty($current['participants'])): ?>
        <?php foreach($current['participants'] as $pp): ?>
          <div class="participant">
            <div class="line1"><?php print $pp->field_company_value; ?></div>
            <div class=""><?php print nl2br($pp->field_participants_list_value); ?></div>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
  </div>

  <div class="room-footer">
    <?php if (!empty($next)): ?>
      <div class="line2">Следующее мероприятие</div>
      <div class="line1"><?php print empty($next['description']) ? $next['title'] : $next['description']; ?></div>
      <div class="b">
        <div class="line3"><?php print $next['start'] . ' - ' . $next['finish']; ?></div>
      </div>
      <div class="block-wrap">
        <div class="b">
          <?php foreach($next['participants'] as $pp): ?>
            <div class="line1"><?php print $pp->field_company_value; ?></div>
          <?php endforeach; ?>
        </div>
      </div>

    <?php elseif (!empty($current)): ?>
      <div class="line1">Далее на сегодня нет мероприятий</div>
    <?php endif; ?>
  </div>
</div>
