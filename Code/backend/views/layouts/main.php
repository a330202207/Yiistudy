<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\NavWidget;
use backend\components\HeaderWidget;
use backend\components\FooterWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="login-body body skin-0">
<?php $this->beginBody() ?>
    <div class="layui-layout layui-layout-admin">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
