<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ns_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $money
 * @property integer $created_at
 * @property integer $updated_at
 */
class NsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ns_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role', 'status', 'money', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username','email'],'unique']
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'username' => '用户名',
            'email' => '用户邮箱',
            'role' => '用户等级',
            'status' => '用户状态',
            'money' => '现有金额',
            'created_at' => '创建时间戳',
            'updated_at' => '更新时间戳'
        ];
    }
    /**
     * @inheritdoc
     */

}
