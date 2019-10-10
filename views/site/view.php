<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $taxData app\models\TaxData */

$taxData = $data['taxData'];
$taxOrgInfo = $data['taxOrgInfo'];

$this->title = "$taxData->nameRu $taxData->iinBin";
$this->params['breadcrumbs'][] = ['label' => 'Tax Arrears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tax-arrear-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $taxData,
        'attributes' => [
            'id',
            'nameRu',
            'nameKk',
            'iinBin',
            'totalArrear',
            'totalTaxArrear',
            'pensionContributionArrear',
            'socialContributionArrear',
            'appealledAmount',
            'modifiedTermsAmount',
            'rehabilitaionProcedureAmount',
            'sendTime',
        ],
    ]) ?>

    <?php
    foreach ($data as $key => $value) {
        if ($key != 'taxData') {
            if ($value != null) { ?>
                <hr>
                <?php foreach ($value as $key => $value)
                {
                    /** @var Model $value **/
                    $array = [];

                    foreach ($value->getAttributes() as $key => $item)
                    {
                        if ($key != 'taxDataId' and $key != 'id') {
                            $array += [$key => $item];
                        }
                    }

                    $array_keys = array_keys($array);

                    echo DetailView::widget([
                        'model' => $value,
                        'attributes' => $array_keys,
                    ]);
                }
            }
        }
    }
    ?>

</div>
