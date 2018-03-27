<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formulario".
 *
 * @property int $cod_formulario
 * @property string $desc_formulario
 * @property int $diagnostico_final
 *
 * @property Variavel $diagnosticoFinal
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
            [['desc_formulario', 'diagnostico_final'], 'required'],
            [['diagnostico_final'], 'integer'],
            [['desc_formulario'], 'string', 'max' => 200],
            [['diagnostico_final'], 'exist', 'skipOnError' => true, 'targetClass' => Variavel::className(), 'targetAttribute' => ['diagnostico_final' => 'cod_variavel']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_formulario' => 'Codigo do Formulario',
            'desc_formulario' => 'Titulo do Formulario',
            'diagnostico_final' => 'Diagnostico Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariavel()
    {
        return $this->hasOne(Variavel::className(), ['cod_variavel' => 'diagnostico_final']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerguntas()
    {
        return $this->hasMany(Pergunta::className(), ['cod_formulario' => 'cod_formulario']);
    }
}
