<?php

namespace app\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model
{
    public $email;
    public $password;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }


    public function login()
    {

        if ($this->validate()) {
            $user = User::findByEmail($this->email);
            Yii::$app->user->login($user);
            return $user;
        }
        return false;
    }


    public function validatePassword($attribute, $params)
    {
        $user = User::findByEmail($this->email);
        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Incorrect password');
        }
    }
}
