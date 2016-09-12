<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente_servicio_ejecucion".
 *
 * @property integer $id_cliente_ejecucion
 * @property integer $id_cliente_peticion
 * @property integer $id_empleado
 * @property string $fecha
 * @property integer $estado
 * @property string $observacion
 */
class ClienteServicioEjecucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente_servicio_ejecucion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente_peticion', 'id_empleado', 'fecha', 'observacion'], 'required'],
            [['id_cliente_peticion', 'id_empleado', 'estado'], 'integer'],
            [['fecha'], 'safe'],
            [['observacion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_ejecucion' => 'Id Cliente Ejecucion',
            'id_cliente_peticion' => 'Id Cliente Peticion',
            'id_empleado' => 'Id Empleado',
            'fecha' => 'Fecha',
            'estado' => 'Estado',
            'observacion' => 'Observacion',
        ];
    }
}
