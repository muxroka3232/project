<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "prixod".
 *
 * @property int $id kirim id raqami
 * @property string $date kirim bolgan vaqti time stamp boladi
 * @property string|null $number mahsulotning kirim nomeri
 *
 * @property PrixodGoods[] $prixodGoods
 */
class Prixod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prixod';
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
    /**
     * Gets query for [[PrixodGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrixodGoods()
    {
        return $this->hasMany(PrixodGoods::className(), ['prixod_id' => 'id']);
    }

    public function getPrixodList($id)
    {
        $query = PrixodGoods::find()
        ->with(['goods'])
        ->with(['prixod'])
        ;

        $query->andFilterWhere(['prixod_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
