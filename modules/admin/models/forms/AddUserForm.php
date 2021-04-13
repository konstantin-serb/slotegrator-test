<?php


namespace app\modules\admin\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class AddUserForm extends Model
{
    public $email;
    public $password;
    public $username;


    public function rules() {
        return [
            [['email', 'password', 'username'], 'required'],
            [['email'], 'email'],
            [['username'], 'string', 'length' => [2, 15]],
            [['password'], 'string', 'length' => [6-15]],
        ];

    }


    public function save()
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->passwordHash = Yii::$app->security->generatePasswordHash($this->password);
            $user->authKey = Yii::$app->security->generateRandomString(10);
            $user->accessToken = Yii::$app->security->generateRandomString(10);
            $user->is_admin = User::ADMIN;
            $user->status = User::STATUS_VISIBLE;

            if ($user->save()) {
                return true;
            }
            return false;
        }
    }

}