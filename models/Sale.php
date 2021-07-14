<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "sale".
 *
 * @property int $id chiqim id raqami
 * @property string|null $date mahsulotning chiqim bolgan vaqti
 * @property string|null $number mahsulotning chiqim nomeri
 *
 * @property SaleGoods[] $saleGoods
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[SaleGoods]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->date = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function formatDate()
    {
        return \Yii::$app->formatter->asDate($this->date, 'd-MM-Y');
    }
    
    public function getSaleList($id)
    {
        $query = SaleGoods::find()
        ->with(['goods'])
        ->with(['sale'])
        ;

        $query->andFilterWhere(['sale_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
    
    public function getSaleGoods()
    {
        return $this->hasMany(SaleGoods::className(), ['sale_id' => 'id']);
    }
}
