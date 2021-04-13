<?php


namespace app\modules\admin\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $password;


    public function rules() {
        return [
            [['password'], 'required'],
            [['password'], 'string', 'length' => [6-15]],
        ];

    }


    public function save($id)
    {
        if ($this->validate()) {
            $user = User::findOne($id);
            $user->passwordHash = Yii::$app->security->generatePasswordHash($this->password);

            if ($user->save()) {
                return true;
            }
            return false;
        }
    }

}