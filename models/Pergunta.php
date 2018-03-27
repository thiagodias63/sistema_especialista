<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pergunta".
 *
 * @property int $cod_pergunta
 * @property string $desc_pergunta
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
            [['desc_pergunta', 'ordem', 'cod_formulario', 'cod_variavel'], 'required'],
            [['desc_pergunta'], 'string'],
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
            'cod_pergunta' => 'Codigo da Pergunta',
            'desc_pergunta' => 'Texto da Pergunta',
            'ordem' => 'Ordem',
            'proximo_no' => 'E ou Ou',
            'cod_formulario' => 'Formulario',
            'cod_variavel' => 'Variavel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulario()
    {
        return $this->hasOne(Formulario::className(), ['cod_formulario' => 'cod_formulario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariavel()
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
