<?php

/** @var $this yii\web\View
 * @var $randomSum app\models\NumberOfPoints
 */

use yii\helpers\Url;

$this->title = 'Получение денежного приза';
?>
<div class="site-index">
    <h1>Поздравляем! Вы выиграли денежный приз</h1>
    <h3>в сумме: $<?=$randomSum?> </h3>
    <div>
        <a href="<?=Url::to(['/'])?>" class="btn btn-success">Ок</a>
        <a href="<?=Url::to(['/transfer/to-bonus', 'sum' => $randomSum])?>" class="btn btn-success">Перевести в бонусные баллы: </a>
        <a href="<?=Url::to(['/transfer/to-bank', 'sum' => $randomSum])?>" class="btn btn-success">Отправить в банк: </a>
    </div>
</div>
