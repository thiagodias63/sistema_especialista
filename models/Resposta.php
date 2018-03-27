<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta".
 *
 * @property int $cod_resposta
 * @property string $desc_resposta
 * @property int $reposta_certa
 * @property int $cod_pergunta
 *
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
            [['desc_resposta', 'reposta_certa', 'cod_pergunta'], 'required'],
            [['cod_pergunta'], 'integer'],
            [['desc_resposta'], 'string', 'max' => 255],
            [['reposta_certa'], 'string', 'max' => 1],
            [['cod_pergunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pergunta::className(), 'targetAttribute' => ['cod_pergunta' => 'cod_pergunta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_resposta' => 'Codigo da Resposta',
            'desc_resposta' => 'Texto da Resposta',
            'reposta_certa' => 'É a reposta certa?',
            'cod_pergunta' => 'Pergunta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPergunta()
    {
        return $this->hasOne(Pergunta::className(), ['cod_pergunta' => 'cod_pergunta']);
    }
}
