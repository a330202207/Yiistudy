<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<div class="login-box">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'layui-form layui-form-pane'],
    ]); ?>
        <div class="layui-form-item">
            <h3>YiiStudy后台登录系统</h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账号：</label>

            <div class="layui-input-inline">
                <?= $form->field($model, 'username')->textInput([
                    'class' => 'layui-input',
                    'autocomplete' => 'on',
                    'lay-verify' =>"account",
                    'maxlength' => '20',
                    'placeholder' => '帐号'
                ])->label(false) ?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>

            <div class="layui-input-inline">
                <?= $form->field($model, 'password')->textInput([
                    'class' => 'layui-input',
                    'autocomplete' => 'on',
                    'lay-verify' =>"account",
                    'maxlength' => '20',
                    'placeholder' => '密码'
                ])->label(false) ?>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码：</label>

            <div class="layui-input-inline">
                <?= $form->field($model, 'verifyCode',
                    ['template' => '{input}'.Captcha::widget([
                            'model' => $model,
                            'template' => '{image}',
                            'attribute' =>'verifyCode',
                            'imageOptions' => ['title' => '点击刷新', 'alt'=>'换一个']
                        ]).'{error}'])->textInput([
                    'class' => 'layui-input',
                    'lay-verify' => 'code',
                    'placeholder' => '验证码'
                ])->label(false);?>

                <?php
                      //验证码另一种写法
/*                    $form->field($model, 'verifyCode')->widget(Captcha::className(), ['template' => '{image}', 'imageOptions' => ['title' => '点击刷新', 'alt'=>'换一个'],
                        'options' => [
                            'class' => 'layui-input',
                            'lay-verify' => 'code',
                            'placeholder' => '验证码'
                        ]
                    ])->label(false);*/
                ?>
            </div>
        </div>
        <div class="layui-form-item">
            <?= Html::resetButton('重置', ['class'=>'layui-btn layui-btn-danger btn-reset', 'name' =>'submit-button']) ?>
            <?= Html::submitButton('立即登录', ['class' => 'layui-btn btn-submit', 'lay-filter' => 'sub', 'name' => 'login-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
