<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%sale_goods}}`.
 */
class m210220_210602_add_count_column_to_sale_goods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('sale_goods', 'count', $this->integer()->comment('mahsulotning chiqim soni'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('sale_goods', 'count');
    }
}
