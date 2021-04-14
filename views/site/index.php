<?php

/** @var $this yii\web\View
 * @var $userInfo app\models\Account
 */

use yii\helpers\Url;

$this->title = 'Главная';
?>
<div class="site-index">
<?php Yii::$app->session->getFlash('success')?>
    <div class="">
        <h1>Здравствуйте <?php echo Yii::$app->user->identity->username ?>!</h1>
        <?php if(!Yii::$app->user->identity->is_admin == 1):?>
        <h3>На вашем счету:</h3>
        <p><b>Денежных средств: </b>$<?=$userInfo->getMoney()?></p>
        <p><b>Бонусных баллов: </b><?=$userInfo->getPoints()?></p>
        <?php if (Yii::$app->user->identity->count_chance > 0): ?>
            <p><a class="btn btn-lg btn-success" href="<?= Url::to(['/prize']) ?>">Получить подарок!</a></p>
        <?php endif; ?>
        <?php endif;?>
    </div>


    <div class="body-content">

        <div class="row">

        </div>

    </div>
</div>
