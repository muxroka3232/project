<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sale}}`.
 */
class m210209_152008_create_sale_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sale}}', [
            'id' => $this->primaryKey()->comment('chiqim id raqami'),
            'date' => $this->datetime()->comment('mahsulotning chiqim bolgan vaqti'),
            'number' => $this->string()->comment('mahsulotning chiqim nomeri'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sale}}');
    }
}
