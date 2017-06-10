<?php
/**
 * 文章列表组件
 */
namespace frontend\widgets\post;

use common\models\PostModel;
use frontend\models\PostForm;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\Url;

class PostWidget extends Widget
{
    public $title = '';//文章列表标题
    public $limit = 6;//显示条数
    public $more = true;//是否显示更多
    public $page = false;//是否显示分页

    public function run()
    {
        $curPage = Yii::$app->request->get('page', 1);
        //查询条件
        $cond = ['=', 'is_valid', PostModel::IS_VALID];
        $res = PostForm::getList($cond, $curPage, $this->limit);
        $result['title'] = $this->title ? $this->title : '最新文章';
        $result['more'] = Url::to(['post/index']);
        $result['body'] = $res['data'] ? : [];
        //是否显示分页
        if ($this->page) {
            $pages = new Pagination(['totalCount' => $res['count'], 'pageSize' => $res['pageSize']]);
            $result['page'] = $pages;
        }
        return $this->render('index', ['data' => $result]);
    }
}