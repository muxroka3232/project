<?php

use yii\db\Migration;

/**
 * Class m210209_160629_add_foreign_key
 */
class m210209_160629_add_foreign_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-prixod_goods-prixod_id', 'prixod_goods', 'prixod_id', false);
        $this->addForeignKey("fk-prixod_goods-prixod_id", "prixod_goods", "prixod_id", "prixod", "id",'CASCADE');
        $this->createIndex('idx-prixod_goods-goods_id', 'prixod_goods', 'goods_id', false);
        $this->addForeignKey("fk-prixod_goods-goods_id", "prixod_goods", "goods_id", "goods", "id",'CASCADE');

        $this->createIndex('idx-sale_goods-sale_id', 'sale_goods', 'sale_id', false);
        $this->addForeignKey("fk-sale_goods-sale_id", "sale_goods", "sale_id", "sale", "id",'CASCADE');
        $this->createIndex('idx-sale_goods-goods_id', 'sale_goods', 'goods_id', false);
        $this->addForeignKey("fk-sale_goods-goods_id", "sale_goods", "goods_id", "goods", "id",'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-prixod_goods-prixod_id','prixod_goods');
        $this->dropIndex('idx-prixod_goods-prixod_id','prixod_goods');

        $this->dropForeignKey('fk-prixod_goods-goods_id','prixod_goods');
        $this->dropIndex('idx-prixod_goods-goods_id','prixod_goods');

        $this->dropForeignKey('fk-sale_goods-sale_id','sale_goods');
        $this->dropIndex('idx-sale_goods-sale_id','sale_goods');

        $this->dropForeignKey('fk-sale_goods-goods_id','sale_goods');
        $this->dropIndex('idx-sale_goods-goods_id','sale_goods');
    }

}
