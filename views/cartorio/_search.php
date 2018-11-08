<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CartorioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-cartorio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Nome']) ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'placeholder' => 'Documento']) ?>
    
    <?php  echo $form->field($model, 'is_ativo')->dropDownList([1 => 'Sim', 0 => 'Não'],['prompt' => 'Selecione'])  ?>
    
    <?php  echo $form->field($model, 'sem_telefone')->dropDownList([1 => 'Sim', 0 => 'Não'],['prompt' => 'Selecione'])  ?>

    <?php /* echo $form->field($model, 'endereco')->textInput(['maxlength' => true, 'placeholder' => 'Endereco']) */ ?>

    <?php /* echo $form->field($model, 'bairro')->textInput(['maxlength' => true, 'placeholder' => 'Bairro']) */ ?>

    <?php /* echo $form->field($model, 'cidade')->textInput(['maxlength' => true, 'placeholder' => 'Cidade']) */ ?>

    <?php /* echo $form->field($model, 'uf')->textInput(['maxlength' => true, 'placeholder' => 'Uf']) */ ?>

    <?php /* echo $form->field($model, 'telefone')->textInput(['maxlength' => true, 'placeholder' => 'Telefone']) */ ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'tabeliao')->textInput(['maxlength' => true, 'placeholder' => 'Tabeliao']) */ ?>

    <?php /* echo $form->field($model, 'is_ativo')->textInput(['placeholder' => 'Is Ativo']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Limpar',['cartorio/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
