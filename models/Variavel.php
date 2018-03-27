<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variavel".
 *
 * @property int $cod_variavel
 * @property string $desc_variavel
 *
 * @property Formulario[] $formularios
 * @property Pergunta[] $perguntas
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
            'cod_variavel' => 'Codigo da Variavel',
            'desc_variavel' => 'Texto da Variavel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormularios()
    {
        return $this->hasMany(Formulario::className(), ['diagnostico_final' => 'cod_variavel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerguntas()
    {
        return $this->hasMany(Pergunta::className(), ['cod_variavel' => 'cod_variavel']);
    }
}
