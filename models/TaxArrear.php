<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tax_data".
 *
 * @property int $id
 * @property string $nameRu
 * @property string $nameKk
 * @property string $iinBin
 * @property double $totalArrear
 * @property double $totalTaxArrear
 * @property int $pensionContributionArrear
 * @property int $socialContributionArrear
 * @property int $appealledAmount
 * @property int $modifiedTermsAmount
 * @property int $rehabilitaionProcedureAmount
 * @property string $sendTime
 */
class TaxArrear extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tax_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['totalArrear', 'totalTaxArrear'], 'number'],
            [['pensionContributionArrear', 'socialContributionArrear', 'appealledAmount', 'modifiedTermsAmount', 'rehabilitaionProcedureAmount'], 'default', 'value' => null],
            [['pensionContributionArrear', 'socialContributionArrear', 'appealledAmount', 'modifiedTermsAmount', 'rehabilitaionProcedureAmount'], 'integer'],
            [['nameRu', 'nameKk'], 'string', 'max' => 255],
            [['iinBin'], 'string', 'max' => 12],
            [['sendTime'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameRu' => 'Name Ru',
            'nameKk' => 'Name Kk',
            'iinBin' => 'Iin Bin',
            'totalArrear' => 'Total Arrear',
            'totalTaxArrear' => 'Total Tax Arrear',
            'pensionContributionArrear' => 'Pension Contribution Arrear',
            'socialContributionArrear' => 'Social Contribution Arrear',
            'appealledAmount' => 'Appealled Amount',
            'modifiedTermsAmount' => 'Modified Terms Amount',
            'rehabilitaionProcedureAmount' => 'Rehabilitaion Procedure Amount',
            'sendTime' => 'Send Time',
        ];
    }
}
