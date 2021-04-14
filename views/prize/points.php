<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Получение денежного приза';
?>
<div class="site-index">
<h1>Поздравляем! Вам начислены бонусные баллы</h1>
<h3>в сумме: <?=$randomSum?> баллов</h3>
    <div>
        <a href="<?=Url::to(['/'])?>" class="btn btn-success">Ок</a>
    </div>
</div>

