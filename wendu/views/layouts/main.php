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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <?= $this->blocks['window.css'] ?? "" ?>
</head>

<body>
<?php $this->beginBody() ?>
<?= $content ?>

<?php $this->beginContent('@frontend.template/views/layouts/model.php'); ?>

<?php $this->endContent(); ?>

<?php $this->endBody() ?>
</body>

<script>
    $("#login-button").click(function (e){
        let form = $(this).parents("form")

        $.post(form.attr("action"),form.serialize(),function (data){
            window.location.reload();
        }).fail(function (data,status,xhr){
            var html = [],key;
            for (key in data.responseJSON) {
                html.push("<p>"+data.responseJSON[key]+"</p>");
            }
            form.find(".errors").html(html.join(""));
            console.log(data.responseJSON);
        });
    });

</script>

</html>

<?php $this->endPage() ?>

<?= $this->blocks['window.js'] ?? "" ?>
