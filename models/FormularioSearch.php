<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formulario;

/**
 * FormularioSearch represents the model behind the search form of `app\models\Formulario`.
 */
class FormularioSearch extends Formulario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_formulario'], 'integer'],
            [['desc_formulario'], 'safe'],
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
        $query = Formulario::find();

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
            'cod_formulario' => $this->cod_formulario,
        ]);

        $query->andFilterWhere(['like', 'desc_formulario', $this->desc_formulario]);

        return $dataProvider;
    }
}
