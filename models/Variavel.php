<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variavel".
 *
 * @property int $cod_variavel
 * @property string $desc_variavel
 *
 * @property Pergunta[] $perguntas
 * @property Resposta[] $respostas
 */
class Variavel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'variavel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_variavel'], 'required'],
            [['desc_variavel'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_variavel' => 'Cod Variavel',
            'desc_variavel' => 'Desc Variavel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerguntas()
    {
        return $this->hasMany(Pergunta::className(), ['cod_variavel' => 'cod_variavel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespostas()
    {
        return $this->hasMany(Resposta::className(), ['cod_variavel' => 'cod_variavel']);
    }
}
