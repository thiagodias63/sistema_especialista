<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta".
 *
 * @property int $cod_resposta
 * @property int $reposta_certa
 * @property int $cod_variavel
 * @property int $cod_pergunta
 *
 * @property Variavel $codVariavel
 * @property Pergunta $codPergunta
 */
class Resposta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resposta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reposta_certa', 'cod_variavel', 'cod_pergunta'], 'required'],
            [['cod_variavel', 'cod_pergunta'], 'integer'],
            [['reposta_certa'], 'string', 'max' => 1],
            [['cod_variavel'], 'exist', 'skipOnError' => true, 'targetClass' => Variavel::className(), 'targetAttribute' => ['cod_variavel' => 'cod_variavel']],
            [['cod_pergunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pergunta::className(), 'targetAttribute' => ['cod_pergunta' => 'cod_pergunta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_resposta' => 'Cod Resposta',
            'reposta_certa' => 'Reposta Certa',
            'cod_variavel' => 'Cod Variavel',
            'cod_pergunta' => 'Cod Pergunta',
        ];
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
    public function getCodPergunta()
    {
        return $this->hasOne(Pergunta::className(), ['cod_pergunta' => 'cod_pergunta']);
    }
}
