<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\captcha\Captcha;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/login.js', ['depends' => ['backend\assets\AppAsset']]);
//只在该视图中使用非全局的jui
?>
<div class="login-box">
    <form class="layui-form layui-form-pane" method="get" action="">
        <div class="layui-form-item">
            <h3>YiiStudy后台登录系统</h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">账号：</label>

            <div class="layui-input-inline">
                <input type="text" name="username" class="layui-input" lay-verify="username" placeholder="账号" autocomplete="on" maxlength="20"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>

            <div class="layui-input-inline">
                <input type="password" name="password" class="layui-input" lay-verify="password" placeholder="密码" maxlength="20"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">验证码：</label>
            <div class="layui-input-inline">
                <input type="text" name="verifyCode" class="layui-input" lay-verify="code" placeholder="验证码" maxlength="4"/><?= Captcha::widget(['name'=>'captchaimg', 'imageOptions'=>['title'=>'点击刷新', 'alt'=>'换一个', ],'template'=>'{image}']); ?>
            </div>
        </div>
        <div class="layui-form-item">
            <button type="reset" class="layui-btn layui-btn-danger btn-reset">重置</button>
            <button type="button" class="layui-btn btn-submit" lay-submit="" lay-filter="sub">立即登录</button>
        </div>
    </form>
</div>
