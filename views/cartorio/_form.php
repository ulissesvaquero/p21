<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cartorio */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="cartorio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id')->textInput(['placeholder' => 'Id']) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Nome']) ?>

    <?= $form->field($model, 'razao')->textInput(['maxlength' => true, 'placeholder' => 'Razao']) ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'placeholder' => 'Documento']) ?>

    <?= $form->field($model, 'cep')->textInput(['maxlength' => true, 'placeholder' => 'Cep']) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true, 'placeholder' => 'Endereco']) ?>

    <?= $form->field($model, 'bairro')->textInput(['maxlength' => true, 'placeholder' => 'Bairro']) ?>

    <?= $form->field($model, 'cidade')->textInput(['maxlength' => true, 'placeholder' => 'Cidade']) ?>

    <?= $form->field($model, 'uf')->textInput(['maxlength' => true, 'placeholder' => 'Uf']) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true, 'placeholder' => 'Telefone']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'tabeliao')->textInput(['maxlength' => true, 'placeholder' => 'Tabeliao']) ?>

    <?= $form->field($model, 'is_ativo')->textInput(['placeholder' => 'Is Ativo']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
