<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if(!Yii::$app->user->isGuest):?>
    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p><a class="btn btn-lg btn-success" href="">Получить подарок!</a></p>
    </div>
    <?php endif;?>

    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
