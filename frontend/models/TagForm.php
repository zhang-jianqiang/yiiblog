<?php
/**
 * 标签表单模型
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/8
 * Time: 7:19
 */

namespace frontend\models;


use yii\base\Model;

class TagForm extends Model
{
    public $id;
    public $tags;

    public function rules()
    {
        return [
            ['tags', 'required'],
            ['tags', 'each', 'rule' => ['string']],
        ];
    }

    public function saveTags()
    {
        $ids = [];
        if (!empty($this->tags)) {

        }

        return $ids;
    }
}