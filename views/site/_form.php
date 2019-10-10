<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxArrear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-arrear-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nameRu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nameKk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iinBin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalArrear')->textInput() ?>

    <?= $form->field($model, 'totalTaxArrear')->textInput() ?>

    <?= $form->field($model, 'pensionContributionArrear')->textInput() ?>

    <?= $form->field($model, 'socialContributionArrear')->textInput() ?>

    <?= $form->field($model, 'appealledAmount')->textInput() ?>

    <?= $form->field($model, 'modifiedTermsAmount')->textInput() ?>

    <?= $form->field($model, 'rehabilitaionProcedureAmount')->textInput() ?>

    <?= $form->field($model, 'sendTime')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
