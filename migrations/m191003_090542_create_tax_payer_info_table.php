<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tax_payer_info}}`.
 */
class m191003_090542_create_tax_payer_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tax_payer_info}}', [
            'id' => $this->primaryKey(),
            'taxDataId' => $this->integer(20),
            'nameRu' => $this->string(),
            'nameKk' => $this->string(),
            'iinBin' => $this->char(12),
            'totalArrear' => $this->float(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tax_payer_info}}');
    }
}
