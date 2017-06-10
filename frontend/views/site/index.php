<?php
use frontend\widgets\banner\BannerWidget;
use frontend\widgets\post\PostWidget;
$this->title = '博客－首页';
?>
<div class="row">
    <div class="col-lg-9">
        <?=BannerWidget::widget()?>
    </div>
    <div class="col-lg-3">
        22
    </div>
    <div class="col-lg-9">
        <?=PostWidget::widget()?>
    </div>
</div>

