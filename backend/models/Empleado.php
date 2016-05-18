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
 * @property string $apellido paterno
 * @property string $apellido materno
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
            [['rut_empleado', 'numero_empleado', 'id_tipo_empleado', 'nombres', 'apellido paterno', 'apellido materno', 'direccion', 'correo_electronico'], 'required'],
            [['numero_empleado', 'id_tipo_empleado'], 'integer'],
            [['rut_empleado'], 'string', 'max' => 30],
            [['nombres'], 'string', 'max' => 200],
            [['apellido paterno', 'apellido materno'], 'string', 'max' => 100],
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
            'numero_empleado' => 'Numero Empleado',
            'id_tipo_empleado' => 'Id Tipo Empleado',
            'nombres' => 'Nombres',
            'apellido paterno' => 'Apellido Paterno',
            'apellido materno' => 'Apellido Materno',
            'direccion' => 'Direccion',
            'correo_electronico' => 'Correo Electronico',
        ];
    }
}
