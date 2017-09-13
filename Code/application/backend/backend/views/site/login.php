<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
LoginAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>后台登录</title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="login">
    <h2></h2>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="login-top">
        <h1>后台系统登录</h1>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => '用户名'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码'])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>
        <div class="forgot">

        </div>
    </div>
    <div class="login-bottom">
        <input type="hidden" name="YII_CSRF_TOKEN" id="csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
        <?= Html::input('submit', '', '登录', ['id' => 'login']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
