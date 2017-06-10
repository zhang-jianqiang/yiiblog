<?php
use yii\helpers\Url;
$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?=$data['title']?></h1>
            <span>作者：<?=$data['user_name']?></span>
            <span>发布：<?=date('Y-m-d', $data['created_at'])?></span>
            <span>浏览：<?=isset($data['extend']['browser']) ? $data['extend']['browser'] : 0 ?></span>
        </div>
        <div class="page-content">
            <?=$data['content']?>
        </div>
        <div class="page-tag">
            标签：
            <?php foreach ($data['tags'] as $tag): ?>
                <span><a href=""><?=$tag?></a></span>
            <?php endforeach ?>
        </div>
    </div>

    <div class="col-lg-3">
        <a type="button" class="btn btn-success btn-block" href="<?=Url::to(['post/create'])?>">创建文章</a>
        <a type="button" class="btn btn-primary btn-block" >编辑文章</a>
    </div>
</div>