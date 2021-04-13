<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Things */

$this->title = 'Create Things';
$this->params['breadcrumbs'][] = ['label' => 'Things', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="things-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
