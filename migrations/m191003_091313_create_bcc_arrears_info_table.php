<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bcc_arrears_info}}`.
 */
class m191003_091313_create_bcc_arrears_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bcc_arrears_info}}', [
            'id' => $this->primaryKey(),
            'taxDataId' => $this->integer(20),
            'bcc' => $this->char(10),
            'bccNameRu' => $this->string(500),
            'bccNameKz' => $this->string(500),
            'taxArrear' => $this->float(2),
            'poenaArrear' => $this->float(2),
            'percentArrear' => $this->float(2),
            'fineArrear' => $this->float(2),
            'totalArrear' => $this->float(2),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bcc_arrears_info}}');
    }
}
