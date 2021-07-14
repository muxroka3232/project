<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string|null $kod mahsulot kodi unikalni
 * @property string $name mahsulot nomi
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['kod', 'name'], 'string', 'max' => 255],
            [['kod'], 'unique'],
            [['count'], 'integer'],
            ['count', 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kod' => 'Kod',
            'name' => 'Name',
            'count' => 'Count',
        ];
    }

    public function getPrixodGoods()
    {
        return $this->hasMany(PrixodGoods::className(), ['goods_id' => 'id']);
    }

    public function getSaleGoods()
    {
        return $this->hasMany(SaleGoods::className(), ['goods_id' => 'id']);
    }

}
