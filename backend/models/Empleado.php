<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property string $rut_empleado
 * @property integer $numero_empleado
 * @property integer $id_tipo_empleado
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $direccion
 * @property string $correo_electronico
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut_empleado', 'id_tipo_empleado', 'nombres', 'apellido_paterno', 'apellido_materno', 'direccion', 'correo_electronico'], 'required'],
            [['numero_empleado', 'id_tipo_empleado'], 'integer'],
            [['rut_empleado'], 'string', 'max' => 30],
            [['nombres'], 'string', 'max' => 200],
            [['apellido_paterno', 'apellido_materno'], 'string', 'max' => 100],
            [['direccion', 'correo_electronico'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rut_empleado' => 'Rut Empleado',
            'numero_empleado' => 'Número Empleado',
            'id_tipo_empleado' => 'Tipo de Empleado',
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'direccion' => 'Dirección',
            'correo_electronico' => 'Correo Electrónico',
        ];
    }
}
