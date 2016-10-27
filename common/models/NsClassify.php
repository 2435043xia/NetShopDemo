<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ns_classify".
 *
 * @property integer $c_id
 * @property string $c_name
 * @property integer $c_level
 */
class NsClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ns_classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_name'], 'required'],
            [['c_level'], 'integer'],
            [['c_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => '序号',
            'c_name' => '栏目名称',
            'c_level' => '排序等级',
        ];
    }
}
