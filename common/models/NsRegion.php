<?php

namespace common\models;

use Yii;

class NsRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ns_region';
    }
}