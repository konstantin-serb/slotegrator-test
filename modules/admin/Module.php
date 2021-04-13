<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{

    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

        public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {

                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {

                            if(!empty(Yii::$app->user->identity->is_admin)) {
                                return Yii::$app->user->identity->is_admin;
                            } else {
                                return header("location: /site/index");
                            }


                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
