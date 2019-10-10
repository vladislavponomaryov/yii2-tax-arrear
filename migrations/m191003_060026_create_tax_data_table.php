<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tax_data}}`.
 */
class m191003_060026_create_tax_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tax_data}}', [
            'id' => $this->primaryKey(),
            'nameRu' => $this->string(),
            'nameKk' => $this->string(),
            'iinBin' => $this->char(12),
            'totalArrear' => $this->float(2),
            'totalTaxArrear' => $this->float(2),
            'pensionContributionArrear' => $this->integer(),
            'socialContributionArrear' => $this->integer(),
            'appealledAmount' => $this->integer(),
            'modifiedTermsAmount' => $this->integer(),
            'rehabilitaionProcedureAmount' => $this->integer(),
            'sendTime' => $this->char(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tax_data}}');
    }
}
