<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prixod_goods}}`.
 */
class m210209_155828_create_prixod_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prixod_goods}}', [
            'id' => $this->primaryKey()->comment('kirim bolgan mahsulot id raqami'),
            'prixod_id' => $this->integer()->comment('kirim jadvali bn boglanadi'),
            'goods_id' => $this->integer()->comment('mahsulotlar jadvali bn boglanadi'),
            'amount' => $this->string()->comment('mahsulot olchov birligi'),
            'cost' => $this->integer()->comment('mahsulotning kirim narxi'),
            'count' => $this->integer()->comment('mahsulotning kirim soni'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%prixod_goods}}');
    }
}
