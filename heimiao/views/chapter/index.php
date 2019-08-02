<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->params['platform.name'] . '-' . $chapter->title . '-阅读';

/* 预加载CSS */
//'css/bootstrap.min.css',
//'css/sprites.css',
//'css/app.css',
frontend\assets\AppAsset::addCss($this,'css/reader.css');

/*预加载JS*/
//'js/bootstrap.min.js',
//'js/app.js',


?>

<body id="reader" class="skin-1">

    <div id="within_header">
        <div class="wrap clearfix">
            <div class="logo-img pull-left">
                <a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>">
                    <img src="/img/logo1.png" alt="">
                </a>
            </div>
            <ul class="menu pull-left clearfix">
                <li class="active"><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>">书屋</a></li>
                <li><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_LONG]) ?>">长篇</a></li>
                <li><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_SHORT]) ?>">短篇</a></li>
                <!--<li><a href="#">充值</a></li>-->
                <li><a href="#this">作者福利</a></li>
            </ul>
            <div class="pull-left search-box">
                <input type="text" class="search-input" placeholder="书名/作者">
                <button class="search-btn"><svg t="1535339923867" class="icon" viewBox="0 0 1024 1024" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg" p-id="2042" xmlns:xlink="http://www.w3.org/1999/xlink" width="19"
                                                height="19">
                        <defs>
                            <style type="text/css"></style>
                        </defs>
                        <path d="M928 886.4l-160-160c128-150.4 120-377.6-20.8-520-150.4-150.4-393.6-150.4-542.4 0-72 72-112 169.6-112 272s40 198.4 112 272c72 72 169.6 112 272 112 91.2 0 179.2-32 248-91.2l160 160c12.8 12.8 32 12.8 44.8 0 11.2-12.8 11.2-32-1.6-44.8zM249.6 705.6c-60.8-60.8-94.4-140.8-94.4-225.6s33.6-166.4 94.4-225.6c62.4-62.4 144-92.8 225.6-92.8s163.2 30.4 225.6 92.8c124.8 124.8 124.8 328 0 452.8C640 768 560 801.6 475.2 801.6c-84.8-3.2-164.8-35.2-225.6-96z"
                              fill="#FFFFFF" p-id="2043"></path>
                    </svg></button>
            </div>
            <!--<div class="pull-right">
                <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModal">登录</a>
            </div>-->
        </div>
    </div>
    <div class="reader-box">
        <div class="wrap clearfix">
            <div class="bar-list pull-left">
                <dl>
                    <!--<dd class="">
                        <a href="#" class="mulu-link">
                            <i class="mulu"></i>
                            <span>目录</span>
                        </a>
                        <div class="box mulu-box">
                            <a href="#" class="close">
                            </a>
                            <p class="title">
                                目录
                            </p>
                            <div class="tab-box">
                                <table>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                第001章 男人冷库的下落驱逐令
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                第002章 当野模是最快的途径
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </dd>-->
                    <!--<dd>
                        <a href="#" class="shezhi-link">
                            <i class="shezhi"></i>
                            <span>设置</span>
                        </a>
                        <div class="box shezhi-box">
                            <a href="#" class="close">
                            </a>
                            <p class="title">
                                设置
                            </p>
                            <div class="aaa">
                                <form action="">
                                    <div class="col">
                                        <span class="lab">阅读主题</span>
                                        <div class="aa">
                                                <span>
                                                    <input type="radio" checked data-id="1" class="font-c" name="color" id="c1">
                                                    <label for="c1"></label>
                                                </span>
                                            <span>
                                                    <input type="radio" data-id="2" class="font-c" name="color" id="c2">
                                                    <label for="c2"></label>
                                                </span>
                                            <span>
                                                    <input type="radio" data-id="3" class="font-c" name="color" id="c3">
                                                    <label for="c3"></label>
                                                </span>
                                            <span>

                                                    <span>
                                                        <input type="radio" data-id="4" class="font-c" name="color" id="c4">
                                                        <label for="c4"></label>
                                                    </span>

                                        </div>

                                    </div>
                                    <div class="col">
                                        <span class="lab">正文字体</span>
                                        <div class="aa">
                                                <span>
                                                    <input type="radio" checked data-id="1" class="font-f" name="font" id="f1">
                                                    <label for="f1">雅黑</label>
                                                </span>
                                            <span>
                                                    <input type="radio" data-id="2" class="font-f" name="font" id="f2">
                                                    <label for="f2">宋体</label>
                                                </span>
                                            <span>
                                                    <input type="radio" data-id="3" class="font-f" name="font" id="f3">
                                                    <label for="f3">楷体</label>
                                                </span>
                                            <span>
                                                    <input type="radio" data-id="4" class="font-f" name="font" id="f4">
                                                    <label for="f4">黑体</label>
                                                </span>
                                        </div>


                                    </div>
                                    <div class="col">
                                        <span class="lab">字体大小</span>
                                        <div class="aa">
                                                <span class="sb">
                                                    <a href="#" class="f-size">
                                                        A+
                                                    </a>
                                                    <input type="text" name="size" class="font-size" readonly value="18">
                                                    <a href="#" class="s-size">
                                                        A-
                                                    </a>
                                                </span>

                                        </div>

                                    </div>
                                    <button type="submit">保存</button>
                                    <button type="button" class=" close quxiao">取消</button>
                                </form>
                            </div>
                        </div>
                    </dd>-->
                    <!-- <dd class="up-link">
                        <a href="#">
                            <i class="up"></i>
                        </a>
                    </dd> -->
                </dl>
            </div>
            <div class="main pull-left">
                <div class="T">
                    <span>当前位置：</span>
                    <a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>"><?= Yii::$app->params['platform.name'] ?></a>
                    <span>></span>
                    <a href="<?= Url::to(['fiction/index','id' => $fiction->id]) ?>"><?= $fiction->title ?></a>
                    <span>></span>
                    <a href="#this"><?= $chapter->title ?></a>
                </div>
                <div class="center ">
                    <p class="title">
                        <?= $chapter->title ?>
                    </p>
                    <p class="desc">
                        <span>更新时间：<?= $chapter->created_at ?></span><span>字数：<?= $chapter->char ?></span>
                    </p>
                    <div class="content">
                        <?= \common\popular\Handle::formatContent($chapter->content) ?>
                    </div>
                    <div class="btns">

                        <?php if ($up): ?>
                            <a href="<?= Url::to(['chapter/index','id' => $up->id]) ?>">上一章</a>
                        <?php else: ?>
                            <a href="#this">上一章</a>
                        <?php endif; ?>
                        <a href="<?= Url::to(['fiction/chapters','id' => $fiction->id]) ?>">目录</a>
                        <?php if ($down): ?>
                            <a href="<?= Url::to(['chapter/index','id' => $down->id]) ?>">下一章</a>
                        <?php else: ?>
                            <a href="#this">下一章</a>
                        <?php endif; ?>
                    </div>
                </div>


            </div>
            <div class="right_bar_list">
                <dl>
                    <!--<dd class="read-report-btn">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#JubaoModal">
                            <svg t="1535526743271" class="icon" style="" viewBox="0 0 1127 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 p-id="1498" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="16">
                                <defs>
                                    <style type="text/css"></style>
                                </defs>
                                <path d="M1108.468296 824.890547C1159.055032 910.219597 1097.227863 1024 990.429373 1024L130.432879 1024C29.258031 1024-32.574625 910.219597 18.012112 824.890547L450.825613 68.266574C473.306472 22.754136 518.276424 0 563.240888 0 608.209469 0 653.173934 22.754136 675.660283 68.266574L1108.468296 824.890547 1108.468296 824.890547 1108.468296 824.890547 1108.468296 824.890547ZM1020.384123 877.110641 1019.583053 875.735153 586.77504 119.111177 583.854223 113.62523C580.333998 106.500274 573.244216 102.4 563.240888 102.4 553.240806 102.4 546.151071 106.500212 542.636068 113.61633L539.710577 119.111663 106.096287 877.110641C95.301134 895.319767 109.937021 921.6 130.432879 921.6L990.429373 921.6C1016.30634 921.6 1031.298263 895.520476 1020.384123 877.110641L1020.384123 877.110641 1020.384123 877.110641 1020.384123 877.110641ZM558.08319 307.2C532.482248 307.2 512 322.819385 512 342.344809L512 579.251379C512 598.776801 532.482248 614.4 558.08319 614.4L568.321812 614.4C593.922749 614.4 614.4 598.776801 614.4 579.251379L614.4 342.344809C614.4 322.819385 593.922749 307.2 568.321812 307.2L558.08319 307.2 558.08319 307.2 558.08319 307.2 558.08319 307.2ZM512 766.885176C512 780.001705 517.522432 793.032632 526.999818 802.305669 536.477199 811.577487 549.797038 816.975247 563.200625 816.975247 576.602962 816.975247 589.927798 811.577487 599.405184 802.305669 608.882565 793.032632 614.4 780.001705 614.4 766.885176 614.4 753.772319 608.882565 740.741391 599.405184 731.469573 589.927798 722.19776 576.602962 716.8 563.200625 716.8 549.797038 716.8 536.477199 722.19776 526.999818 731.469573 517.522432 740.741391 512 753.772319 512 766.885176L512 766.885176 512 766.885176 512 766.885176Z"
                                      p-id="1499" fill="#C2C2C2"></path>
                            </svg>
                            <span>举报</span>
                        </a>
                    </dd>-->
                    <dd>
                        <a href="javascript:scroll(0,0)">
                            <svg t="1534319389742" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 p-id="25160" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20">
                                <defs>
                                    <style type="text/css"></style>
                                </defs>
                                <path d="M534.6 403.5l294.2 294.2c12.5 12.5 32.8 12.5 45.3 0l0 0c12.5-12.5 12.5-32.8 0-45.3L557.3 335.6c-25-25-65.5-25-90.5 0L150 652.4c-12.5 12.5-12.5 32.8 0 45.3l0 0c12.5 12.5 32.8 12.5 45.3 0l294.1-294.2C501.9 391 522.1 391 534.6 403.5z"
                                      p-id="25161" fill="#C2C2C2"></path>
                            </svg>
                            <span>TOP</span>
                        </a>
                    </dd>
                    <!--<dd>
                        <a href="#" target="_blank">
                            <svg t="1534317589111" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 p-id="10154" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20">
                                <defs>
                                    <style type="text/css"></style>
                                </defs>
                                <path d="M523.636364 954.181818c-79.476364 0-158.114909-18.269091-228.305455-52.852363l-136.866909 28.811636a34.885818 34.885818 0 0 1-41.355636-41.332364l23.016727-109.358545C78.824727 704.907636 46.545455 616.843636 46.545455 523.636364 46.545455 286.208 260.561455 93.090909 523.636364 93.090909 786.688 93.090909 1000.727273 286.208 1000.727273 523.636364 1000.727273 761.041455 786.688 954.181818 523.636364 954.181818z m-223.441455-124.462545c5.608727 0 11.194182 1.373091 16.244364 4.002909C379.438545 866.862545 451.095273 884.363636 523.636364 884.363636 748.194909 884.363636 930.909091 722.548364 930.909091 523.636364S748.194909 162.909091 523.636364 162.909091C299.054545 162.909091 116.363636 324.724364 116.363636 523.636364c0 81.547636 30.254545 158.626909 87.528728 222.976 7.377455 8.261818 10.402909 19.549091 8.098909 30.370909l-15.546182 73.821091 96.535273-20.340364c2.397091-0.488727 4.794182-0.744727 7.214545-0.744727z m37.236364-306.082909a46.545455 46.545455 0 1 1-93.090909-0.046546 46.545455 46.545455 0 0 1 93.090909 0.046546z m232.727272 0a46.545455 46.545455 0 1 1-93.090909-0.046546 46.545455 46.545455 0 0 1 93.090909 0.046546z m232.727273 0a46.545455 46.545455 0 1 1-93.090909-0.046546 46.545455 46.545455 0 0 1 93.090909 0.046546z"
                                      fill="#C2C2C2" p-id="10155"></path>
                            </svg>
                            <span>评论</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#dasanModal" class="bask">
                            <svg t="1534470744131" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 p-id="12279" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32">
                                <defs>
                                    <style type="text/css"></style>
                                </defs>
                                <path d="M882.36 597.26l-81-190.59a260.89 260.89 0 0 0-150-143 583.55 583.55 0 0 0 26.2-80.07A95.39 95.39 0 0 0 585 64.77H438.28a95.39 95.39 0 0 0-92.58 118.81 583.7 583.7 0 0 0 26.2 80.07 260.9 260.9 0 0 0-150 143L141 597.26a260.94 260.94 0 0 0 240.52 363.5h260.32a260.94 260.94 0 0 0 240.52-363.5zM407.72 167.77a30.94 30.94 0 0 1 5.61-26.8 31.38 31.38 0 0 1 24.95-12.21H585A31.38 31.38 0 0 1 610 141a30.94 30.94 0 0 1 5.61 26.8c-7.79 30.54-17.19 58.16-27.57 81.18q-10-1-20.12-1.31h-0.59c-2.07-0.05-4.14-0.08-6.22-0.09h-98.88c-2.08 0-4.15 0-6.22 0.09h-0.59q-10.14 0.27-20.13 1.31c-10.38-23.06-19.78-50.68-27.57-81.21z m398.69 640.56a196.84 196.84 0 0 1-164.56 88.44H381.48a197.32 197.32 0 0 1-181.62-274.48l81-190.59A197 197 0 0 1 420.69 316c0.9-0.1 1.81-0.24 2.71-0.42a200.47 200.47 0 0 1 34.14-4h0.24q2.22-0.06 4.42-0.06h98.92q2.2 0 4.42 0.06h0.25a200.28 200.28 0 0 1 34.13 4c0.91 0.19 1.83 0.32 2.74 0.43A197 197 0 0 1 742.49 431.7l81 190.59a196.84 196.84 0 0 1-17.08 186.04z"
                                      fill="#C2C2C2" p-id="12280"></path>
                                <path d="M617.84 606.38a32 32 0 0 0 0-64h-50.75l25.37-44a32 32 0 1 0-55.43-32l-25.37 44-25.37-44a32 32 0 1 0-55.43 32l25.37 44h-50.74a32 32 0 1 0 0 64h74.18v42.17h-74.18a32 32 0 0 0 0 64h74.18v74.18a32 32 0 1 0 64 0v-74.18h74.17a32 32 0 0 0 0-64h-74.18v-42.17z"
                                      fill="#C2C2C2" p-id="12281"></path>
                            </svg>
                            <span>打赏</span>
                        </a>
                    </dd>
                    <dd>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#dasanModal" class="monthCoupon">
                            <svg t="1534317963249" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                 p-id="22771" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20">
                                <defs>
                                    <style type="text/css"></style>
                                </defs>
                                <path d="M512.64 379.392 457.472 346.816 359.936 512 351.04 512 233.728 351.552 182.016 389.312 271.744 512 192 512 192 576 320 576 320 640 192 640 192 704 320 704 320 768 384 768 384 704 512 704 512 640 384 640 384 576 512 576 512 512 434.304 512Z"
                                      p-id="22772" fill="#C2C2C2"></path>
                                <path d="M896 192 128 192C57.408 192 0 249.408 0 320l0 448c0 70.592 57.408 128 128 128l768 0c70.592 0 128-57.408 128-128l0-32.64 0-64-64-5.248c-50.112-17.344-86.4-64.576-86.4-120.512 0-55.936 36.224-103.104 86.4-120.448l64-5.312 0-64L1024 320C1024 249.408 966.592 192 896 192zM128 832c-35.264 0-64-28.672-64-64L64 320c0-35.264 28.736-64 64-64l512 0 0 576L128 832zM960 358.464c-85.888 19.072-150.4 95.616-150.4 187.136 0 91.584 64.512 168.064 150.4 187.2L960 768c0 35.328-28.672 64-64 64l-192 0L704 256l192 0c35.328 0 64 28.736 64 64L960 358.464z"
                                      p-id="22773" fill="#C2C2C2"></path>
                            </svg>
                            <span>月票</span>
                        </a>
                    </dd>-->
                </dl>


            </div>

        </div>
    </div>

    <?php $this->beginContent('@frontend/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>

    <div class="modal fade" id="JubaoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
                </div>
                <div class="modal-body">
                    <form action="">
                        <p>
                            为配合相关政府部门对互联网环境的清查整顿，<?= Yii::$app->params['platform.name'] ?>小说网积极开展自查、他查工作。维护互联网环境的和谐稳定是<?= Yii::$app->params['platform.name'] ?>小说网应尽的责任和义务，我们将尽一切努力杜绝色情、反动等违规信息在<?= Yii::$app->params['platform.name'] ?>小说网出现，对于违法违规的内容、现象，我们都将予以严肃处理。为更有效的打击色情、反动信息诚意邀请所有网友对<?= Yii::$app->params['platform.name'] ?>小说网上的内容进行监督，对涉嫌色情、反动描写的内容进行举报，为建设和谐清新的互联网环境出一份力！
                        </p>
                        <p>
                            <span>请选择举报理由：</span>
                            <select name="" id="" style="width: 250px;height: 44px;">
                                <option value="1">作品内含有反动信息</option>
                                <option value="2">作品内含有暴力血腥</option>
                                <option value="3">作品内含有色情信息</option>
                                <option value="4">作品涉及抄袭他人</option>
                            </select>
                        </p>
                        <button type="submit">提交</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dasanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#dasan" aria-controls="dasan" role="tab" data-toggle="tab">打赏</a>
                        </li>
                        <li role="presentation">
                            <a href="#yuepiao" aria-controls="yuepiao" role="tab" data-toggle="tab">月票</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dasan">
                            <form action="">
                                    <span>
                                        <input type="radio" id="r1" name="radio">
                                        <label for="r1">100午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r2" name="radio">
                                        <label for="r2">200午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r3" name="radio">
                                        <label for="r3">300午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r4" name="radio">
                                        <label for="r4">500午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r5" name="radio">
                                        <label for="r5">1000午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r6" name="radio">
                                        <label for="r6">2000午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r7" name="radio">
                                        <label for="r7">5000午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r8" name="radio">
                                        <label for="r8">10000午币</label>
                                    </span>
                                <span>
                                        <input type="radio" id="r9" name="radio">
                                        <label for="r9">20000午币</label>
                                    </span>
                                <p style="margin:10px 0">账户余额：0 午币 <a href="#" style="color:#bf0409">去充值 >></a> </p>
                                <textarea name="" id=""  maxlength="180">这本书太棒了~~~</textarea>
                                <button  type="submit" style="margin-left: 147px;">确认打赏</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="yuepiao">月票</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<?php $this->beginBlock('window.onload'); ?>

$(document).ready(function () {
var leftBar = $('.bar-list'),
nowLeftTop = leftBarTop = 124;
$(window).scroll(function () {
var winScrollTop = $(window).scrollTop();
if (winScrollTop >= leftBarTop) {
nowLeftTop = 0;
leftBar.css('top', nowLeftTop);
} else {
console.log('a')
nowLeftTop = leftBarTop - winScrollTop;
leftBar.css('top', nowLeftTop);
}
}).trigger('scroll')
$('.up-link').click(function () {
$('html ,body').animate({ scrollTop: 0 }, 300);
return false;
})
$('dd .close').click(function () {
$(this).parents('dd').removeClass('open');
return false;
})
$('dd .mulu-link,dd .shezhi-link').click(function () {
$(this).parents('dd').siblings('dd').removeClass('open')
$(this).parents('dd').toggleClass('open');
return false;
})
$('.font-size').val(parseInt($('.center .content').css('font-size')))
$('.f-size,.s-size').click(function () {
var $this = $(this),
fs = $('.font-size').val();
if ($this.hasClass('f-size')) {

if (fs > 48) {
return false;
}
fs++;
$('.font-size').val(fs);
$('.center .content').css('font-size', fs);
return false;
} else {
if (fs <= 12) {
return false;
}
fs--;
$('.font-size').val(fs);
$('.center .content').css('font-size', fs);
return false;
}
})

$('.font-f').change(function () {
var id = $('.font-f:checked').data('id'),
$el = $('.center .content');
switch (id) {
case 1:
$el.css('font-family', 'MicrosoftYaHei')
break;
case 2:
$el.css('font-family', '宋体')
break;
case 3:
$el.css('font-family', '楷体')
break;
case 4:
$el.css('font-family', '黑体')
break;
}
})
$('.font-c').change(function () {
var id = $('.font-c:checked').data('id');
$('body').attr('class', function (i, cls) { return cls.replace(/skin-\d+ /g, ''); });
$('body').removeClass();
$('body').addClass('skin-' + id);
})
})

<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['window.onload'],\yii\web\View::POS_END); ?>
