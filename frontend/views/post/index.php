<?php
use frontend\widgets\post\PostWidget;
?>
<div class="row">
    <div class="col-lg-9">
        <?=PostWidget::widget(['page' => 1, 'limit' => 10])?>
    </div>
    <div class="col-lg-3">

    </div>
</div>