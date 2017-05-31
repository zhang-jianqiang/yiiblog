<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common', 'Blog'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    //左侧导航栏
    $menuLeft = [
        ['label' => Yii::t('common', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('common', 'Article'), 'url' => ['/post/index']],
    ];
    //右侧导航栏
    if (Yii::$app->user->isGuest) {
        $menuRight[] = ['label' => Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $menuRight[] = ['label' => Yii::t('common', 'Login'), 'url' => ['/site/login']];
    } else {
        $menuRight[] = [
            //显示头像
            'label' => '<img src="' . Yii::$app->params['avatar']['small'] . '" alt="' . Yii::$app->user->identity->username . '" />',
            //属性设置
            'linkOptions' => ['class' => 'avatar'],
            //下拉选项 退出图标 <i class="fa fa-sign-out" ></i>
            'items' => [
              ['label' => '<i class="fa fa-sign-out" ></i> 退出', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post',],]
            ],
        ];
    }
    //输出左侧导航栏
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuLeft,
    ]);
    //输出右侧导航栏
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuRight,
        //不过滤html标签
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
