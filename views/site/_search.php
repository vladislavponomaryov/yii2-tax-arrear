<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxArrearSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-arrear-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nameRu') ?>

    <?= $form->field($model, 'nameKk') ?>

    <?= $form->field($model, 'iinBin') ?>

    <?= $form->field($model, 'totalArrear') ?>

    <?php // echo $form->field($model, 'totalTaxArrear') ?>

    <?php // echo $form->field($model, 'pensionContributionArrear') ?>

    <?php // echo $form->field($model, 'socialContributionArrear') ?>

    <?php // echo $form->field($model, 'appealledAmount') ?>

    <?php // echo $form->field($model, 'modifiedTermsAmount') ?>

    <?php // echo $form->field($model, 'rehabilitaionProcedureAmount') ?>

    <?php // echo $form->field($model, 'sendTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
