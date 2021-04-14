<?php

namespace app\controllers;

use app\models\Account;
use app\models\SignUpForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest) {return $this->redirect(['/site/login']);}
        $currentUser = Yii::$app->user->identity->getId();
        if($currentUser) {
            $userInfo = Account::find()->where(['user_id' => $currentUser])->one();

            if(!$userInfo) {
                $userInfo = new Account();
                $userInfo->user_id = $currentUser;
                $userInfo->save();
            }
        }

        return $this->render('index', [
            'userInfo' => $userInfo,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionSignup()
    {
        if(!Yii::$app->user->isGuest){return $this->redirect(['/']);}
        $model = new SignUpForm();
        if($model->load(Yii::$app->request->post())){
            if($userId = $model->save()) {
                $user = User::findOne($userId);
                Yii::$app->user->login($user);
                return $this->redirect(['/']);
            }
        }

        return $this->render('singup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
