<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cartorio */

$this->title = 'Create Cartorio';
$this->params['breadcrumbs'][] = ['label' => 'Cartorio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartorio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
