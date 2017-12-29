<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if ($this->context->action->id == 'create') {
    $title = '创建';
} else {
    $title = '编辑';
}
//$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $title;
?>
<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span><?= $title ?>文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin() ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'cat_id')->dropDownList($cat) ?>

                <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload') ?>

                <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
                    'options'=>[
                        'initialFrameHeight' => 400,
                    ]
                ]) ?>

                <?= $form->field($model, 'tags')->widget('common\widgets\tags\TagWidget') ?>

            <div class="form-group">
                <?= Html::submitButton('发布', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
            </div>

            <?php ActiveForm::end()?>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel-title box-title">
            <span>注意事项</span>
        </div>
        <div class="panel-body">
            <p>1.不能发布暴力</p>
            <p>2.不能发布暴力</p>
        </div>
    </div>
</div>
