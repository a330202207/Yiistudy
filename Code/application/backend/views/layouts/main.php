<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\NavWidget;
use backend\components\HeaderWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--头部挂件开始-->
<?= HeaderWidget::widget(); ?>
<!--头部挂件结束-->

<section id="main">
    <!--菜单挂件开始-->
    <?= NavWidget::widget(); ?>
    <!--菜单挂件结束-->

    <!--中间的内容开始-->
    <section id="content">

    </section>
    <!--中间的内容结束-->
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
