<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="login">
    <h2></h2>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="login-top">
        <h1>后台系统登录</h1>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => '用户名'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码'])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>
<!--        <div class="forgot">
            <a href="#">忘记密码</a>
        </div>-->
    </div>
    <div class="login-bottom">
        <input type="hidden" name="YII_CSRF_TOKEN" id="csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
        <?= Html::submitButton('登录', ['name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

