<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comentario_cotizacion".
 *
 * @property integer $id_comentario_cotizacion
 * @property integer $id_cotizacion
 * @property integer $id_usuario
 * @property string $pregunta
 * @property string $respuesta
 * @property string $fecha
 */
class ComentarioCotizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario_cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion', 'id_usuario', 'pregunta', 'respuesta', 'fecha'], 'required'],
            [['id_cotizacion', 'id_usuario'], 'integer'],
            [['fecha'], 'safe'],
            [['pregunta', 'respuesta'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comentario_cotizacion' => 'Id Comentario Cotizacion',
            'id_cotizacion' => 'Id Cotizacion',
            'id_usuario' => 'Id Usuario',
            'pregunta' => 'Pregunta',
            'respuesta' => 'Respuesta',
            'fecha' => 'Fecha',
        ];
    }
}
