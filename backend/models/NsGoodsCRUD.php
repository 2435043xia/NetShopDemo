<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NsGoods;

/**
 * NsGoodsCRUD represents the model behind the search form about `backend\models\NsGoods`.
 */
class NsGoodsCRUD extends NsGoods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['g_id', 'g_value', 'g_sales', 'c_id'], 'integer'],
            [['g_name', 'g_content'], 'safe'],
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
        $query = NsGoods::find();

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
            'g_id' => $this->g_id,
            'g_value' => $this->g_value,
            'g_sales' => $this->g_sales,
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'g_name', $this->g_name])
            ->andFilterWhere(['like', 'g_content', $this->g_content]);

        return $dataProvider;
    }
}
