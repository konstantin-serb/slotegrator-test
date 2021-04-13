<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NumberOfPoints */

$this->title = 'Create Number Of Points';
$this->params['breadcrumbs'][] = ['label' => 'Number Of Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-of-points-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
