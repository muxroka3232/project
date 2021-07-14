<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PrixodGoods;

/**
 * PrixodGoodsSearch represents the model behind the search form about `app\models\PrixodGoods`.
 */
class PrixodGoodsSearch extends PrixodGoods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'prixod_id', 'goods_id', 'cost', 'count'], 'integer'],
            [['amount'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PrixodGoods::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'prixod_id' => $this->prixod_id,
            'goods_id' => $this->goods_id,
            'cost' => $this->cost,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'amount', $this->amount]);

        return $dataProvider;
    }
}
