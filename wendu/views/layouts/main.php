<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\modules\template\assets\AppAsset;
use yii\helpers\Url;

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

    $("#day-sign").click(function (e){

        $.post("<?= Url::to(["home/sign-data"]) ?>",{"<?= Yii::$app->request->csrfParam ?>":"<?= Yii::$app->request->csrfToken ?>"},function (data){
            var signList=[];
            for (k in data.days){
                signList.push({"signDay":data.days[k]})
            }

            //ajax获取日历json数据
            calUtil.init(signList);
            if ($("#sign_cal .on:contains("+new Date().getDate()+")").length > 0){
                $("#sign-submit").removeClass("qiandaobtn");
                $("#sign-submit").addClass("disabled");
                $("#sign-submit").unbind("click");
            }
            $(".dateTime_box .buy").html(data.buy);
            $(".dateTime_box .qiandaotishi b").html(data.continuous);
            $(".dateTime_box").show();
            $(".shade_box").show();
        }).fail(function (data){
            console.log(data.responseJSON);
        });

    });

    $(".dateTime_box #sign-submit").click(function (e){
        $.post("<?= Url::to(["home/sign"]) ?>",{"<?= Yii::$app->request->csrfParam ?>":"<?= Yii::$app->request->csrfToken ?>"},function (data){
            if(data == false){
                alert("今日已经签到");
            }else{
                $("#day-sign").click();
            }
        }).fail(function (data){
            alert("签到异常");
            console.log(data.responseJSON);
        });
    })

</script>

</html>

<?php $this->endPage() ?>

<?= $this->blocks['window.js'] ?? "" ?>
