<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resposta;

/**
 * RespostaSearch represents the model behind the search form of `app\models\Resposta`.
 */
class RespostaSearch extends Resposta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_resposta', ], 'integer'],
            [['desc_resposta','cod_pergunta', 'reposta_certa'], 'safe'],
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
        $query = Resposta::find();

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
        $query->joinWith('pergunta');
        // grid filtering conditions
        $query->andFilterWhere([
            'cod_resposta' => $this->cod_resposta
        ]);

        $query->andFilterWhere(['like', 'desc_resposta', $this->desc_resposta])
            ->andFilterWhere(['like', 'reposta_certa', $this->reposta_certa])
            ->andFilterWhere(['like', 'pergunta.desc_pergunta', $this->cod_pergunta]);
        return $dataProvider;
    }
}
