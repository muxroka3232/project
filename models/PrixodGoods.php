<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "prixod_goods".
 *
 * @property int $id kirim bolgan mahsulot id raqami
 * @property int|null $prixod_id kirim jadvali bn boglanadi
 * @property int|null $goods_id mahsulotlar jadvali bn boglanadi
 * @property string|null $amount mahsulot olchov birligi
 * @property int|null $cost mahsulotning kirim narxi
 * @property int|null $count mahsulotning kirim soni
 *
 * @property Prixod $prixod
 */
class PrixodGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prixod_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prixod_id', 'goods_id', 'cost', 'count'], 'integer'],
            [['amount'], 'string', 'max' => 255],
            [['prixod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prixod::className(), 'targetAttribute' => ['prixod_id' => 'id']],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prixod_id' => 'Prixod ID',
            'goods_id' => 'Goods ID',
            'amount' => 'Amount',
            'cost' => 'Cost',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Prixod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrixod()
    {
        return $this->hasOne(Prixod::className(), ['id' => 'prixod_id']);
    }
    public function getGoods()
    {
        return $this->hasOne(Goods::className(), ['id' => 'goods_id']);
    }
    public function getGoodsList()
    {
        $goods = Goods::find()->all();
        return ArrayHelper::map($goods, 'id', 'name');
    }
    public function getPrixodList()
    {
        $prixod = Prixod::find()->all();
        return ArrayHelper::map($prixod, 'id', 'number');
    }

    public function getAmount()
    {
       switch ($this->amount) {
           case 1: return "Dona";
           case 2: return "Kilogramm";
       }
    }
    
}
