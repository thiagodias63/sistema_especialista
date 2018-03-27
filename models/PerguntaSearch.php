<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pergunta;

/**
 * PerguntaSearch represents the model behind the search form of `app\models\Pergunta`.
 */
class PerguntaSearch extends Pergunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_pergunta', 'ordem',], 'integer'],
            [['desc_pergunta', 'proximo_no', 'cod_formulario', 'cod_variavel'], 'safe'],
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
        $query = Pergunta::find();

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
        $query->joinWith(['formulario','variavel']);
        
        // grid filtering conditions
        $query->andFilterWhere([
            'cod_pergunta' => $this->cod_pergunta,
            'ordem' => $this->ordem,
        ]);

        $query->andFilterWhere(['like', 'desc_pergunta', $this->desc_pergunta])
            ->andFilterWhere(['like', 'proximo_no', $this->proximo_no])
            ->andFilterWhere(['like', 'formulario.desc_formulario', $this->cod_formulario])
            ->andFilterWhere(['like', 'variavel.desc_variavel', $this->cod_variavel]);
        return $dataProvider;
    }
}
