<?php

/** @var $this yii\web\View
 * @var $bonusThing app\models\Things
 */

use yii\helpers\Url;

$this->title = 'Получение денежного приза';
?>
<div class="site-index">
    <h1>Поздравляем! Вы выиграли приз!</h1>
    <h3><?=$bonusThing->title?> на сумму: $<?=$bonusThing->price?></h3>

    <a href="<?=Url::to(['/transfer/thing-to-post', 'id' => $bonusThing->id])?>" class="btn btn-success">Получить по почте</a>
    <a href="<?=Url::to(['/transfer/thing-to-bonus', 'id' => $bonusThing->id])?>" class="btn btn-success">Перевести в бонусные баллы: </a>
    <a href="<?=Url::to(['/transfer/thing-to-money', 'id' => $bonusThing->id])?>" class="btn btn-success">Получить деньгами на счет: </a>
</div>
