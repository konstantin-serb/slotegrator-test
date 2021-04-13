<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="jumbotron">
            <h1>Здравствуйте <?php echo Yii::$app->user->identity->username ?>!</h1>

            <p><a class="btn btn-lg btn-success" href="">Получить подарок!</a></p>
        </div>
    <?php else: ?>
        <div class="jumbotron">
            <h1>Вам нужно авторизоваться</h1>
            <br>
            <p><a class="btn btn-lg btn-info" href="<?=Url::to(['/site/login'])?>">Войти</a></p>
        </div>
    <?php endif; ?>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
