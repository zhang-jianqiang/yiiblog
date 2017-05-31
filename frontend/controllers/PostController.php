<?php
/**
 * 文章控制器
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/26 0026
 * Time: 22:00
 */

namespace frontend\controllers;

use frontend\controllers\base\BaseController;
use frontend\models\PostForm;


class PostController extends BaseController
{
    /**
     * 文章列表
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @desc 创建文章
     *
     * @return string
     */
    public function actionCreate()
    {
        $model = new PostForm();
        return $this->render('create', ['model' => $model]);
    }
}