<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Просмотр задолженности';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="tax-arrear-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать запрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nameRu',
            'iinBin',
            'totalArrear',
            //'totalTaxArrear',
            //'pensionContributionArrear',
            //'socialContributionArrear',
            //'appealledAmount',
            //'modifiedTermsAmount',
            //'rehabilitaionProcedureAmount',
            //'sendTime',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
        ],
    ]); ?>


</div>
