<?php
/**
 * 基础控制器
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/26 0026
 * Time: 21:47
 */

namespace frontend\controllers\base;

use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true;
    }
}