<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property integer $id_cotizacion
 * @property string $fecha
 * @property integer $id_cliente
 * @property string $comentario
 * @property integer $id_servicio
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'id_cliente', 'comentario', 'id_servicio'], 'required'],
            [['fecha'], 'safe'],
            [['id_cliente', 'id_servicio'], 'integer'],
            [['comentario'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion' => 'Id Cotizacion',
            'fecha' => 'Fecha',
            'id_cliente' => 'Id Cliente',
            'comentario' => 'Comentario',
            'id_servicio' => 'Id Servicio',
        ];
    }
}
