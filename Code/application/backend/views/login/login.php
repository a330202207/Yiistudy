<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<body class=" login">
    <div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 bs-reset">
            <div class="login-bg" style="background-image:url(./static/img/bg2.jpg)"></div>
        </div>
        <div class="col-md-6 login-container bs-reset">
            <div class="login-content">
                <h1>YiiStudy系统登录</h1>
                <form action="" class="login-form" method="post">
                    <div class="row">
                        <div class="col-xs-7">
                            <input class="form-control form-control-solid placeholder-no-fix" type="text"
                                   autocomplete="off" placeholder="账户" name="username" required/>
                        </div>
                        <div class="col-xs-7">
                            <input class="form-control form-control-solid placeholder-no-fix" type="password"
                                   autocomplete="off" placeholder="密码" name="password" required/>
                        </div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix" type="text"
                                   autocomplete="off" placeholder="验证码" name="password" required/>
                        </div>
                    </div>
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>请输入您的账户和密码. </span>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="rem-password">
                                <p>记住我
                                    <input type="checkbox" class="rem-checkbox"/>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password" class="forget-password">忘记密码?</a>
                            </div>
                            <button class="btn blue" type="submit">进入</button>
                        </div>
                    </div>
                </form>
                <!-- 忘记密码开始 -->
                <form class="forget-form" action="" method="post">
                    <h3 class="font-green">忘记密码 ?</h3>
                    <p> 请联系系统管理员帮您重置密码. </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                               placeholder="Email" name="email"/></div>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn grey btn-default">返回</button>
                        <button type="submit" class="btn blue btn-success uppercase pull-right">确定</button>
                    </div>
                </form>
                <!-- 忘记密码结束 -->
            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-8 bs-reset">
                        <div class="login-copyright text-right">
                            <p>Copyright &copy; YiiStudy 2017</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

