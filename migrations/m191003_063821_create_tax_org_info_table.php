<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tax_org_info}}`.
 */
class m191003_063821_create_tax_org_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tax_org_info}}', [
            'id' => $this->primaryKey(),
            'taxDataId' => $this->integer(20),
            'nameRu' => $this->string(500),
            'nameKk' => $this->string(500),
            'charCode' => $this->string(20),
            'reportAcrualDate' => $this->string(30),
            'totalArrear' => $this->float(2),
            'totalTaxArrear' => $this->float(2),
            'pensionContributionArrear' => $this->integer(),
            'socialContributionArrear' => $this->integer(),
            'socialHealthInsuranceArrear' => $this->integer(),
            'appealledAmount' => $this->integer(),
            'modifiedTermsAmount' => $this->integer(),
            'rehabilitaionProcedureAmount' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tax_org_info}}');
    }
}
