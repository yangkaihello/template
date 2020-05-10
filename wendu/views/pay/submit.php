<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/20
 * Time: 下午9:18
 * @var $json string
 */

?>
<form id="form" action="<?= $url ?>" method="<?= $method ?>">
    <?php foreach($config as $key => $value): ?>
        <input type="hidden" name="<?= $key?>" value='<?= $value ?>'>
    <?php endforeach; ?>
</form>

<script>
    var form = document.getElementById('form');
    //再次修改input内容`
    form.submit();
</script>