<?php
/**
 * 文章表单模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/26 0026
 * Time: 22:44
 */

namespace frontend\models;

use yii\base\Model;


class PostForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cat_id;
    public $tags;

    public $_lsatError = '';

    public function rules()
    {
        return [
            [['id', 'title','content', 'cat_id'], 'required'],
            [['id', 'cat_id'], 'integer'],
            ['title', 'string', 'min' => 4, 'max' => 50],
        ];
    }

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

}