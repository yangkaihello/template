<?php

namespace frontend\modules\template\interfaces\controllers;

/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/5/2
 * Time: 17:56
 */
interface HomeInterface
{
    //首页
    public function Index() : array;

    //书籍列表
    public function Books() : array;

    //排行榜列表
    public function Ranks() : array;

    //章节列表
    public function Chapters() : array;

    //排行榜
    public function Rank() : array;

    //书籍详情
    public function Book() : array;

    //阅读小说
    public function Chapter() : array;

}