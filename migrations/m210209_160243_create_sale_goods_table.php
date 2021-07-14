<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sale_goods}}`.
 */
class m210209_160243_create_sale_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sale_goods}}', [
            'id' => $this->primaryKey()->comment('chiqim bolgan mahsulot id raqami'),
            'sale_id' => $this->integer()->comment('chiqim jadvali bn boglanadi'),
            'goods_id' => $this->integer()->comment('mahsulotlar jadvali bn boglanadi'),
            'amount' => $this->string()->comment('mahsulot olchov birligi'),
            'cost' => $this->integer()->comment('mahsulotning chiqim narxi'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sale_goods}}');
    }
}
