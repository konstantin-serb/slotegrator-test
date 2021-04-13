<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NumberOfPoints */

$this->title = 'Update Number Of Points: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Number Of Points', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="number-of-points-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
