<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SignUpForm extends Model
{
    public $username;
    public $lastName;
    public $surname;
    public $email;
    public $password;
    public $repeatPassword;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password', 'repeatPassword','username','surname'], 'required'],
            [['email','username','surname','lastName'], 'trim'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class],
            [['username', 'lastName', 'surname'], 'string'],
            [['password'], 'string', 'length' => [2, 10]],
            [['repeatPassword'], 'compare', 'compareAttribute' => 'password'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'lastName' => 'Last Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'status' => 'Status',
            'password' => 'Password',
            'repeatPassword' => 'Repeat Password',
        ];
    }


    public function save()
    {
        if ($this->validate()) {

            $user = new User();

            $user->username = $this->username;
            $user->lastName = $this->lastName;
            $user->surname = $this->surname;
            $user->email = $this->email;
            $user->status = User::STATUS_VISIBLE;
            $user->passwordHash = Yii::$app->security->generatePasswordHash($this->password);
            $user->authKey = Yii::$app->security->generateRandomString(10);
            $user->time_create = time();
            $user->user_type = User::ROLE_CLIENT;

            if ($user->save()) {
                return Yii::$app->db->getLastInsertID();

            }
        }
    }

}
