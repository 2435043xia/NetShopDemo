<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ns_shoplist".
 *
 * @property integer $s_id
 * @property integer $current_money
 * @property string $express
 * @property string $buytime
 * @property string $s_addr
 * @property integer $s_username
 * @property string $s_phone
 * @property integer $u_id
 * @property integer $g_id
 *
 * @property NsGoods $g
 * @property NsUser $u
 */
class NsShoplist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $surePwd;
    const Order = 0;
    const Bought = 1;
    const Express = 2;
    const Confirmed = 3;
    const Commented = 4;
    const Rejected = 5;
    const Reported = 6;
    public static function tableName()
    {
        return 'ns_shoplist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'current_money', 'buytime', 's_addr', 's_username','s_count', 's_phone', 'u_id', 'g_id','surePwd'], 'required'],
            [[ 'current_money', 'u_id', 'g_id','s_count'], 'integer'],
            [['buytime'], 'safe'],
            [['express'], 'string', 'max' => 30],
            [['s_addr'], 'string', 'max' => 100],
            [['s_phone'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            's_id' => '序号',
            'current_money' => '实付金额',
            'express' => '快递',
            'buytime' => '购买时间',
            's_count' => '购买数量',
            's_addr' => '地址',
            's_username' => '收件人',
            's_phone' => '手机号',
            'u_id' => '用户ID',
            'g_id' => '商品ID',
            'surePwd' => '确认密码'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getG()
    {
        return $this->hasOne(NsGoods::className(), ['g_id' => 'g_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(NsUser::className(), ['id' => 'u_id']);
    }
}
