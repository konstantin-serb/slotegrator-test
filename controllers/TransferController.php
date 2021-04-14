<?php

namespace app\controllers;

use app\models\Account;
use app\models\NumberOfPoints;
use app\models\Things;
use app\models\User;
use Yii;
use yii\web\Controller;


class TransferController extends Controller
{
    public function actionToBonus($sum)
    {
        $userId = Yii::$app->user->identity->getId();
        $account = Account::find()->where(['user_id' => $userId])->one();
        $model = NumberOfPoints::find()->where(['type' => 'points'])->one();

        $points = ceil($sum * $model->coeff);
        $account->dollars = $account->dollars - $sum;
        $account->points = $account->points + $points;
        if($account->save()) {
            Yii::$app->session->setFlash('success',  $points . ' баллов зачислено на ваш счет');
            return $this->redirect(['/']);
        }
    }


    public function actionToBank($sum)
    {
        $userId = Yii::$app->user->identity->getId();
        $account = Account::find()->where(['user_id' => $userId])->one();

        $account->dollars = $account->dollars - $sum;
        if ($this->sendToTheBank($sum, $userId)) {
            if($account->save()) {
                Yii::$app->session->setFlash('success', 'Сумма в $' . $sum . 'переведена на ваш счет в банк');
                return $this->redirect(['/']);
            }
        }
    }


    public function actionThingToPost($id)
    {
        $userId = Yii::$app->user->identity->getId();
        $thing = Things::findOne($id);

        $thing->count = $thing->count - 1;
        if ($thing->save()) {
            $this->sendToPost($userId, $id);
            Yii::$app->session->setFlash('success', 'Ваш товар отправлен по почте');
            return $this->redirect(['/']);
        }

    }


    public function actionThingToBonus($id)
    {
        $userId = Yii::$app->user->identity->getId();
        $thing = Things::findOne($id);

        $thing->count = $thing->count-1;
        if ($thing->save()) {
            $account = Account::find()->where(['user_id'=>$userId])->one();
            $coeff = NumberOfPoints::find()->where(['type' => 'points'])->one()->coeff;
            $sum = $thing->price * $coeff;
            $account->points = $account->points + $sum;
            if($account->save()){
                Yii::$app->session->setFlash('success', 'Вы получили '.$sum.'бонусных баллов на свой счет');
                return $this->redirect(['/']);
            }
        }

    }


    public function actionThingToMoney($id)
    {
        $userId = Yii::$app->user->identity->getId();
        $thing = Things::findOne($id);

        $thing->count = $thing->count-1;
        if ($thing->save()) {
            $account = Account::find()->where(['user_id'=>$userId])->one();
            $account->dollars = $account->dollars + $thing->price;
            if($account->save()){
                Yii::$app->session->setFlash('success', 'Вы получили $'.$thing->price.' на свой счет');
                return $this->redirect(['/']);
            }
        }

    }

    private function sendToPost($userId, $thingId)
    {
        // Отправка сотруднику сообщения о необходимости отправки товара на почту
        return true;
    }


    private function sendToTheBank($sum, $userId)
    {
        $user = User::findOne($userId);
        $url = "https://bank/";
        $params = ['email' => $user->email, 'password' => $user->passwordHash, 'summ' => $sum];

//        $session = curl_init($url);
//        curl_setopt($session, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
//        curl_setopt($session, CURLOPT_PROXY, $proxy);
//        curl_setopt($session, CURLOPT_PROXYUSERPWD, $proxy_log_pass);
//        curl_setopt($session, CURLOPT_POST, true);
//        curl_setopt($session, CURLOPT_POSTFIELDS, $params);
//        curl_setopt($session, CURLOPT_HEADER, 1);
//        curl_setopt($session, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($session, CURLOPT_TIMEOUT, 30);
//        curl_setopt($session, CURLOPT_MAXREDIRS, 10);
//        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($session, CURLOPT_COOKIEJAR, $cookie_jar);

//        $response = curl_exec($session);
//        $json = json_decode(explode("\n", $response));
//        curl_close($session);

        return true;
    }
}
