<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use mobile\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum=1.0,user-scalable=no">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?= $this->blocks['window.css'] ?? "" ?>
</head>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</html>

<?php $this->endPage() ?>

<?= $this->blocks['window.js'] ?? "" ?>
