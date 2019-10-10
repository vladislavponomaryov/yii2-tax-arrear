<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxArrear */

$this->title = 'Создать запрос';
$this->params['breadcrumbs'][] = ['label' => 'Tax Arrears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-arrear-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($taxArrearForm, 'iin')->label('Введите ИИН'); ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
