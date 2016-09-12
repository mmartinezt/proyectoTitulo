<?php

namespace backend\models;

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
            [['fecha','estado'], 'safe'],
            [['observacion'], 'string', 'max' => 500],
        ];
    }
	
	public function getPeticion() {
		return $this->hasOne(ClienteServicioPeticion::className(), ['id_cliente_servicio_peticion' => 'id_cliente_peticion']);
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente_ejecucion' => 'Identificador',
            'id_cliente_peticion' => 'Id Cliente Peticion',
            'id_empleado' => 'Empleado asignado',
            'fecha' => 'Fecha ejecución',
            'estado' => 'Estado',
            'observacion' => 'Observación',
        ];
    }
}
