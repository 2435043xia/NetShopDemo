<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NsShoplist;

/**
 * NsShoplistCRUD represents the model behind the search form about `common\models\NsShoplist`.
 */
class NsShoplistCRUD extends NsShoplist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['s_id', 'current_money', 's_username', 'u_id', 'g_id'], 'integer'],
            [['express', 'buytime', 's_addr', 's_phone'], 'safe'],
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
        $query = NsShoplist::find();

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
            's_id' => $this->s_id,
            'current_money' => $this->current_money,
            'buytime' => $this->buytime,
            's_username' => $this->s_username,
            'u_id' => $this->u_id,
            'g_id' => $this->g_id,
        ]);

        $query->andFilterWhere(['like', 'express', $this->express])
            ->andFilterWhere(['like', 's_addr', $this->s_addr])
            ->andFilterWhere(['like', 's_phone', $this->s_phone]);

        return $dataProvider;
    }
}
