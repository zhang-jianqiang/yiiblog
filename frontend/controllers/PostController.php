<?php
/**
 * 文章控制器
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/26 0026
 * Time: 22:00
 */

namespace frontend\controllers;

use common\models\CatModel;
use frontend\controllers\base\BaseController;
use frontend\models\PostForm;


class PostController extends BaseController
{
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ],
        ];
    }

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
        $cat = CatModel::getAllCats();
        return $this->render('create', ['model' => $model, 'cat' => $cat]);
    }
}