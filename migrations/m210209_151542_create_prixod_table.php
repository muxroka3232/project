<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prixod}}`.
 */
class m210209_151542_create_prixod_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prixod}}', [
            'id' => $this->primaryKey()->comment('kirim id raqami'),
            'date' => $this->datetime()->comment('kirim bolgan vaqti time stamp boladi')->notNull(),
            'number' => $this->string()->comment('mahsulotning kirim nomeri'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prixod}}');
    }
}
