<?php


namespace app\components;

use Yii;

abstract class AdminBase
{
    const ADMIN = 1;

    public static function isAdmin()
    {
        $user = Yii::$app->user->identity;
        if (!empty($user)) {
            if ($user->user_status == self::ADMIN) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

}