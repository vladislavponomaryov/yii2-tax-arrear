<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaxArrear */

$this->title = 'Просмотр и сохранение данных';
$this->params['breadcrumbs'][] = ['label' => 'Tax Arrears', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="tax-arrear-create">

    <h1><?= Html::encode($this->title) ?></h1>

</div>

<?php if (!isset($taxData->iinBin)) {
    echo 'Данные не загружены';
} else {
?>

<?php $form = ActiveForm::begin([
    'action' => ['site/save-data']
]); ?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
</div>

<?php ActiveForm::end(); ?>

<div class="row">
    <div class="col-lg-12 taxArrearTable">

        <!-- View TaxData -->
        <table>
            <tr>
                <th>Наименование налогоплательщика:</th>
                <td><?= $taxData->nameRu ?></td>
            </tr>
            <tr>
                <th>ИИН налогоплательщика:</th>
                <td><?= $taxData->iinBin ?></td>
            </tr>
            <tr>
                <th>Всего задолженности (тенге):</th>
                <td><?= $taxData->totalArrear ?></td>
            </tr>
            <tr>
                <th>Итого задолженности в бюджет:</th>
                <td><?= $taxData->totalTaxArrear ?></td>
            </tr>
            <tr>
                <th>Задолженность по обязательным пенсионным взносам, обязательным профессиональным пенсионным
                    взносам:
                </th>
                <td><?= $taxData->pensionContributionArrear ?></td>
            </tr>
            <tr>
                <th>Задолженность по отчислениям и (или) взносам на обязательное социальное медицинское страхование:
                </th>
                <td><?= $taxData->socialContributionArrear ?></td>
            </tr>
            <?php if ($taxData->appealledAmount != null) { ?>
                <tr>
                    <th>Апелляционная сумма</th>
                    <td><?= $taxData->appealledAmount ?></td>
                </tr>
            <?php } ?>
            <?php if ($taxData->modifiedTermsAmount != null) { ?>
                <tr>
                    <th>Сумма измененния условиями</th>
                    <td><?= $taxData->modifiedTermsAmount ?></td>
                </tr>
            <?php } ?>
            <?php if ($taxData->rehabilitaionProcedureAmount != null) { ?>
                <tr>
                    <th>Сумма процедур реабилитации</th>
                    <td><?= $taxData->rehabilitaionProcedureAmount ?></td>
                </tr>
            <?php } ?>
        </table>

        <hr>

        <!-- View TaxOrgInfo -->
        <?php
        if ($taxData->taxOrgInfo != null) {
            $taxOrgInfo = $taxData->taxOrgInfo;
            foreach ($taxOrgInfo as $key => $value) {
                ?>

                <table>
                    <tr>
                        <th colspan="2">Орган государственных доходов <?= $value->nameRu ?> Код
                            ОГД <?= $value->charCode ?></th>
                    </tr>
                    <tr>
                        <th>
                            По состоянию на <?= date('Y-m-d', $value->reportAcrualDate) ?><br/>
                            Всего задолженности: <?= $value->totalArrear ?>
                        </th>
                    </tr>
                    <!-- Special block -->
                    <tr>
                        <th>Итого задолженности в бюджет</th>
                        <td><?= $value->totalTaxArrear ?></td>
                    </tr>
                    <tr>
                        <th>Задолженность по обязательным пенсионным взносам, обязательным
                            профессиональным пенсионным взносам
                        </th>
                        <td><?= $value->pensionContributionArrear ?></td>
                    </tr>
                    <tr>
                        <th>Задолженность по отчислениям и (или) взносам на обязательное социальное
                            медицинское страхование
                        </th>
                        <td><?= $value->socialHealthInsuranceArrear ?></td>
                    </tr>
                    <tr>
                        <th>Задолженность по социальным отчислениям</th>
                        <td><?= $value->socialContributionArrear ?></td>
                    </tr>
                    <?php if ($value->appealledAmount != null) { ?>
                        <th>
                        <td>Апелляционная сумма</td>
                        <td><?= $value->appealledAmount ?></td>
                        </th>
                    <?php } ?>
                    <?php if ($value->modifiedTermsAmount != null) { ?>
                        <th>
                        <td>Сумма измененния условиями</td>
                        <td><?= $value->modifiedTermsAmount ?></td>
                        </th>
                    <?php } ?>
                    <?php if ($value->rehabilitaionProcedureAmount != null) { ?>
                        <th>
                        <td>Сумма процедур реабилитации</td>
                        <td><?= $value->rehabilitaionProcedureAmount ?></td>
                        </th>
                    <?php } ?>

                </table>
                <hr>

                <!-- View TaxPayerInfo -->
                <?php if ($value->taxPayerInfo != null) {
                    $taxPayerInfo = $value->taxPayerInfo;
                    foreach ($taxPayerInfo as $key => $value) { ?>

                        <table>
                            <tr>
                                <th>Наименование налогоплательщика:</th>
                                <td><?= $value->nameRu ?></td>
                            </tr>
                            <tr>
                                <th>ИИН/БИН налогоплательщика:</th>
                                <td><?= $value->iinBin ?></td>
                            </tr>
                            <tr>
                                <th>ИИН/БИН налогоплательщика:</th>
                                <td><?= $value->totalArrear ?></td>
                            </tr>
                        </table>
                        <hr>

                        <!-- View BccArrearsInfo -->
                        <?php if ($value->bccArrearsInfo != null) {
                            $bccArrearsInfo = $value->bccArrearsInfo;
                            foreach ($bccArrearsInfo as $key => $value) {
                                ?>

                                <table>
                                    <tr>
                                        <th colspan="2">КБК: <?= $value->bcc ?> <?= $value->bccNameRu ?></th>
                                    </tr>
                                    <tr>
                                        <th>Задолженность по налогам:</th>
                                        <td><?= $value->taxArrear ?></td>
                                    </tr>
                                    <tr>
                                        <th>Задолженность пени:</th>
                                        <td><?= $value->poenaArrear ?></td>
                                    </tr>
                                    <tr>
                                        <th>Процент задолженности:</th>
                                        <td><?= $value->percentArrear ?></td>
                                    </tr>
                                    <tr>
                                        <th>Задолженность:</th>
                                        <td><?= $value->fineArrear ?></td>
                                    </tr>
                                    <tr>
                                        <th>Общая задолженность:</th>
                                        <td><?= $value->totalArrear ?></td>
                                    </tr>
                                </table>
                                <hr>
                                <?php
                            }
                        }
                    }
                }
            }
        }
        }
        ?>

    </div>
</div>
