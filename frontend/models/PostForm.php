<?php
/**
 * 文章表单模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/26 0026
 * Time: 22:44
 */

namespace frontend\models;

use common\models\PostModel;
use yii\base\Model;
use Yii;


class PostForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cat_id;
    public $tags;

    public $_lsatError = '';

    //定义场景
    const SCENARIOS_CREATE = 'create';
    const SCENARIOS_UPDATE = 'update';

    //定义事件
    const EVENT_AFTER_CREATE = 'eventAfterCreate';
    const EVENT_AFTER_UPDATE = 'eventAfterUpdate';

    /**
     * 场景设置
     */
    public function scenarios()
    {
        $scenarios = [
            self::SCENARIOS_CREATE => ['title', 'content', 'label_img', 'cat_id', 'tags'],
            self::SCENARIOS_UPDATE => ['title', 'content', 'label_img', 'cat_id', 'tags'],
        ];

        return array_merge(parent::scenarios(), $scenarios);
    }

    public function rules()
    {
        return [
            [['id', 'title','content', 'cat_id'], 'required'],
            [['id', 'cat_id'], 'integer'],
            ['title', 'string', 'min' => 4, 'max' => 50],
        ];
    }

    /**
     * 字段映射
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id'        => '编码',//这里最好用语言包 Yii::t('common', 'id')
            'title'     => '标题',
            'content'   => '内容',
            'label_img' => '标签图',
            'tags'      => '标签图',
            'cat_id'    => '分类',
        ];
    }

    /**
     * 添加文章
     * @return bool
     * @throws \yii\db\Exception
     */
    public function create()
    {
        //事务
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $model = new PostModel();
            $model->setAttributes($this->attributes);
            $model->summary = $this->_getSummary();
            $model->user_id = Yii::$app->user->identity->id;
            $model->user_name= Yii::$app->user->identity->username;
            $model->is_valid = PostModel::IS_VALID;
            $model->updated_at = time();
            $model->created_at = time();
            if (!$model->save()) {
                throw new \Exception('文章保存失败');
            }
            $this->id = $model->id;
            //调用事件
            $data = array_merge($this->getAttributes(), $model->getAttributes());
            $this->_eventAfterCreate($data);
            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $this->_lsatError = $e->getMessage();
            $transaction->rollBack();
            return false;
        }
    }

    /**
     * 文章摘要
     * @param int $s
     * @param int $e
     * @param string $char
     * @return null|string
     */
    private function _getSummary($s = 0, $e = 90, $char = 'utf-8')
    {
        if (empty($this->content)) {
            return null;
        }

        return mb_substr(str_replace('&nbsp;', '', strip_tags($this->content)), $s, $e, $char);
    }

    /**
     * 文件创建后的事件
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function _eventAfterCreate($data)
    {
        //添加事件
        $this->on(self::EVENT_AFTER_CREATE, [$this, '_eventAddTag'], $data);
        //触发事件
        $this->trigger(self::EVENT_AFTER_CREATE);
    }

    /**
     * 添加标签
     * @return [type] [description]
     */
    public function _eventAddTag()
    {

    }

}