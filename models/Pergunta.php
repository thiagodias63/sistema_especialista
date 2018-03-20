<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pergunta".
 *
 * @property int $cod_pergunta
 * @property int $ordem
 * @property int $proximo_no
 * @property int $cod_formulario
 * @property int $cod_variavel
 *
 * @property Formulario $codFormulario
 * @property Variavel $codVariavel
 * @property Resposta[] $respostas
 */
class Pergunta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pergunta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ordem', 'cod_formulario', 'cod_variavel'], 'required'],
            [['ordem', 'cod_formulario', 'cod_variavel'], 'integer'],
            [['proximo_no'], 'string', 'max' => 1],
            [['cod_formulario'], 'exist', 'skipOnError' => true, 'targetClass' => Formulario::className(), 'targetAttribute' => ['cod_formulario' => 'cod_formulario']],
            [['cod_variavel'], 'exist', 'skipOnError' => true, 'targetClass' => Variavel::className(), 'targetAttribute' => ['cod_variavel' => 'cod_variavel']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_pergunta' => 'Cod Pergunta',
            'ordem' => 'Ordem',
            'proximo_no' => 'Proximo No',
            'cod_formulario' => 'Cod Formulario',
            'cod_variavel' => 'Cod Variavel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodFormulario()
    {
        return $this->hasOne(Formulario::className(), ['cod_formulario' => 'cod_formulario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodVariavel()
    {
        return $this->hasOne(Variavel::className(), ['cod_variavel' => 'cod_variavel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespostas()
    {
        return $this->hasMany(Resposta::className(), ['cod_pergunta' => 'cod_pergunta']);
    }
}
