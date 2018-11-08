<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Cartorio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cartorio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartorio-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Cartorio'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id',
        'nome',
        'razao',
        'documento',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'telefone',
        'email:email',
        'tabeliao',
        'is_ativo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
