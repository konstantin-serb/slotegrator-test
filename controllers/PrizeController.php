<?php

namespace app\controllers;

use app\models\Account;
use app\models\NumberOfPoints;
use app\models\Things;
use app\models\User;
use Yii;
use yii\web\Controller;


class PrizeController extends Controller
{
    public function actionIndex()
    {
        $chance = random_int(1, 3);
        switch ($chance) {
            case 1:
                return $this->redirect(['get-money']);
                break;

            case 2:
                return $this->redirect(['get-points']);
                break;

            case 3:
                return $this->redirect(['get-thing']);
                break;
        }
    }


    public function actionGetMoney()
    {
        $currentUserId = Yii::$app->user->identity->getId();
        $user = User::findOne($currentUserId);
        if($user->count_chance == 0) {return $this->redirect(['/']);}
        $money = NumberOfPoints::find()->where(['type' => 'money'])->one();
        $randomSum = random_int($money->min, $money->max);
        if ($randomSum > $money->limit) {
            $random = random_int(1, 2);
            switch ($random) {
                case 1:
                    return $this->redirect(['get-thing']);
                    break;

                case 2:
                    return $this->redirect(['get-points']);
                    break;
            }
        }

        $account = Account::find()->where(['user_id' => $currentUserId])->one();
        if(!$account) {
            $account = new Account();
            $account->dollars = $randomSum;
            $account->user_id = $currentUserId;
        } else {
            $account->dollars = $account->dollars + $randomSum;
        }
        $money->limit = $money->limit - $randomSum;
        $account->save();
        $money->save();
        $user->count_chance--;
        $user->save();

        return $this->render('money', [
            'randomSum' => $randomSum,
        ]);
    }


    public function actionGetPoints()
    {
        $currentUserId = Yii::$app->user->identity->getId();
        $user = User::findOne($currentUserId);
        if($user->count_chance == 0) {return $this->redirect(['/']);}
        $points = NumberOfPoints::find()->where(['type' => 'points'])->one();
        $randomSum = random_int($points->min, $points->max);

        $account = Account::find()->where(['user_id' => $currentUserId])->one();
        if(!$account) {
            $account = new Account();
            $account->points = $randomSum;
            $account->user_id = $currentUserId;
        } else {
            $account->points = $account->points + $randomSum;
        }
        $account->save();
        $user->count_chance--;
        $user->save();

        return $this->render('points', [
            'randomSum' => $randomSum,
        ]);
    }

    public function actionGetThing()
    {
        $thing = Things::find()->where(['available' => 1])->andWhere(['!=', 'count', 0]);
        $count = $thing->count();

        if($count >= 1) {
            $randomId = random_int(1, $count);
            $randomNum = $randomId - 1;
        } else {
            $random = random_int(1, 2);
            switch ($random) {
                case 1:
                    return $this->redirect(['get-money']);
                    break;

                case 2:
                    return $this->redirect(['get-points']);
                    break;
            }
        }

        $bonusThing = $thing->all()[$randomNum];

        return $this->render('thing', [
            'bonusThing' => $bonusThing,
        ]);
    }
}
