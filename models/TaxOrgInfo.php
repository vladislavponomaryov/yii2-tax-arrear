<?php

namespace app\models;

use yii\db\ActiveRecord;

class TaxOrgInfo extends ActiveRecord
{
    private $taxDataId;
    private $nameRu;
    private $nameKk;
    private $charCode;
    private $reportAcrualDate;
    private $totalArrear;
    private $totalTaxArrear;
    private $pensionContributionArrear;
    private $socialContributionArrear;
    private $socialHealthInsuranceArrear;
    private $appealledAmount;
    private $modifiedTermsAmount;
    private $rehabilitaionProcedureAmount;
    public $taxPayerInfo;

    public function rules()
    {
        return [
            [
                [
                    'taxDataId',
                    'nameRu',
                    'nameKk',
                    'charCode',
                    'reportAcrualDate',
                    'totalArrear',
                    'totalTaxArrear',
                    'pensionContributionArrear',
                    'socialContributionArrear',
                    'socialHealthInsuranceArrear',
                    'appealledAmount',
                    'modifiedTermsAmount',
                    'rehabilitaionProcedureAmount',
                    'taxPayerInfo'
                ],
                'safe'
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'taxDataId' => 'taxDataId',
            'nameRu' => 'Орган государственных доходов',
            'nameKk' => 'Орган государственных доходов',
            'charCode' => 'Код ОГД',
            'reportAcrualDate' => 'Фактическая дата сообщения',
            'totalArrear' => 'Всего задолженности:',
            'totalTaxArrear' => 'Итого задолженности в бюджет',
            'pensionContributionArrear' => 'Задолженность по обязательным пенсионным взносам, обязательным профессиональным пенсионным взносам',
            'socialContributionArrear' => 'Задолженность по социальным отчислениям',
            'socialHealthInsuranceArrear' => 'Задолженность по отчислениям и (или) взносам на обязательное социальное медицинское страхование',
            'appealledAmount' => 'Апелляционная сумма',
            'modifiedTermsAmount' => 'Сумма измененния условиями',
            'rehabilitaionProcedureAmount' => 'Сумма процедур реабилитации',
            'taxPayerInfo' => 'taxPayerInfo'
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        parent::save($runValidation, $attributeNames);// TODO: Change the autogenerated stub

        foreach ($this->taxPayerInfo as $key => $value)
        {
            if ($value != null)
            {
                $taxPayerInfo = new TaxPayerInfo();
                $taxPayerInfo->taxDataId = $this->getAttribute('taxDataId');
                $taxPayerInfo->load($value,'');
                $taxPayerInfo->save();
            }
        }

        return true;
    }
}
