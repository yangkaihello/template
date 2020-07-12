<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/9/3
 * Time: 上午8:45
 */

use yii\helpers\Url;

?>

<body>
    <form id="form" method="post" action="<?= Url::to(['site/login']) ?>">
        <input type="hidden" name="username" value="yangkai" />
        <input type="hidden" name="password" value="123456" />
    </form>
</body>

<script>
    var form = document.getElementById('form');
    form.submit();
</script>
