<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $surname
 * @property string $lastName
 * @property string $authKey
 * @property string $passwordHash
 * @property string $email
 * @property string $accessToken
 * @property int $is_admin
 * @property int $user_type
 * @property int $time_create
 * @property int $time_update
 * @property int $status
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const ADMIN = 1;
    const NO_ADMIN = 0;

    const ROLE_EMPLOYEE = 10;
    const ROLE_CLIENT = 9;

    const STATUS_VISIBLE = 10;
    const STATUS_INVISIBLE = 9;

    public static function tableName()
    {
        return 'user';
    }

    public static function findByEmail($email) {
        return self::find()->where(['email' => $email])->one();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwordHash);
    }



    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
