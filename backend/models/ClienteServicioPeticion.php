<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente_servicio_peticion".
 *
 * @property integer $id_cliente_servicio_peticion
 * @property integer $id_cliente
 * @property integer $id_cotizacion
 * @property string $fecha
 */
class ClienteServicioPeticion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente_servicio_peticion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_cotizacion', 'fecha'], 'required'],
            [['id_cliente', 'id_cotizacion'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_servicio_peticion' => 'Id Cliente Servicio Peticion',
            'id_cliente' => 'Id Cliente',
            'id_cotizacion' => 'Id Cotizacion',
            'fecha' => 'Fecha',
        ];
    }
}
