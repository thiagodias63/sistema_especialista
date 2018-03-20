<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Variavel;

/**
 * VariavelSearch represents the model behind the search form of `app\models\Variavel`.
 */
class VariavelSearch extends Variavel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_variavel'], 'integer'],
            [['desc_variavel'], 'safe'],
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
        $query = Variavel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cod_variavel' => $this->cod_variavel,
        ]);

        $query->andFilterWhere(['like', 'desc_variavel', $this->desc_variavel]);

        return $dataProvider;
    }
}
