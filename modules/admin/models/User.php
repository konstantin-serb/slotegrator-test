<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $passwordHash
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int|null $is_admin
 * @property int|null $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_admin', 'status'], 'integer'],
            [['username', 'email', 'passwordHash', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'passwordHash' => 'Password Hash',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'is_admin' => 'Is Admin',
            'status' => 'Status',
        ];
    }
}
