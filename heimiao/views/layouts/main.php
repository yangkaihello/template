<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\modules\template\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
