<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
//生成面包屑
$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
    <div class="col-lg-9">
        <div class="panel－title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin();?>
            <?=$form->field($model, 'title')->textInput(['maxlength' =>true])?>
            <?=$form->field($model, 'cat_id')->dropDownList([1 => '你好', 2 => '哈哈'])?>
            <?=$form->field($model, 'label_img')->textInput(['maxlength' =>true])?>
            <?=$form->field($model, 'content')->textInput(['maxlength' =>true])?>
            <?=$form->field($model, 'tags')->textInput(['maxlength' =>true])?>
            <div class="form-group">
                <?=Html::submitButton('发布', ['class' => 'btn btn-success'])?>
            </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel－title box-title">
            <span>注意事项</span>
        </div>
    </div>
</div>