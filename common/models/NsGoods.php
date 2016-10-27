<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ns_goods".
 *
 * @property integer $g_id
 * @property string $g_name
 * @property integer $g_value
 * @property integer $g_sales
 * @property string $g_content
 * @property integer $c_id
 *
 * @property NsClassify $c
 */
class NsGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $g_image;
    public static function tableName()
    {
        return 'ns_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_name', 'g_value', 'g_content', 'c_id'], 'required'],
            [['g_id', 'g_value', 'g_sales', 'c_id'], 'integer'],
            [['g_content'], 'string'],
            [['g_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'g_id' => '序号',
            'g_name' => '商品名称',
            'g_value' => '商品价格',
            'g_sales' => '销售数量',
            'g_content' => '商品内容',
            'c_id' => '所属类别',
            'g_image' => '封面图片',
            'g_img' => '封面路径'
        ];
    }
    public function getC()
    {
        return $this->hasOne(NsClassify::className(), ['c_id' => 'c_id']);
    }
    public function beforeSave($insert)
    {
        $this->g_img = '.' . substr(strrchr($this->g_image->name, '.'),1);
        return true;
    }
}
