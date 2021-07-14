<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sale_goods".
 *
 * @property int $id chiqim bolgan mahsulot id raqami
 * @property int|null $sale_id chiqim jadvali bn boglanadi
 * @property int|null $goods_id mahsulotlar jadvali bn boglanadi
 * @property string|null $amount mahsulot olchov birligi
 * @property int|null $cost mahsulotning chiqim soni
 *
 * @property Sale $sale
 */
class SaleGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_id', 'goods_id', 'cost', 'count'], 'integer'],
            [['amount'], 'string', 'max' => 255],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sale::className(), 'targetAttribute' => ['sale_id' => 'id']],
            [['goods_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goods_id' => 'id']],
            ['count','validateSale'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sale_id' => 'Sale ID',
            'goods_id' => 'Goods ID',
            'amount' => 'Amount',
            'cost' => 'Cost',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Sale]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function validateSale($attribute, $params)
    {
        $model = Goods::find()->where(['id' => $this->goods_id])->one();
        
        if ($this->$attribute > $model->count)
        {
            $this->addError($attribute,"Bazada ".$model->count." mahsulot bor");
        }
        else{
            $model->count = $model->count - $this->$attribute;
            
            $model->save();
        }
    }

    public function getAmount()
    {
       switch ($this->amount) {
           case 1: return "Dona";
           case 2: return "Kilogramm";
       }
    }
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'sale_id']);
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
    public function getSaleList()
    {
        $prixod = Sale::find()->all();
        return ArrayHelper::map($prixod, 'id', 'number');
    }
}
