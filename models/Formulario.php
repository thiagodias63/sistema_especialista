<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formulario".
 *
 * @property int $cod_formulario
 * @property string $desc_formulario
 *
 * @property Pergunta[] $perguntas
 */
class Formulario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formulario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desc_formulario'], 'required'],
            [['desc_formulario'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_formulario' => 'Cod Formulario',
            'desc_formulario' => 'Desc Formulario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerguntas()
    {
        return $this->hasMany(Pergunta::className(), ['cod_formulario' => 'cod_formulario']);
    }
}
