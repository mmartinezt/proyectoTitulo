<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipo_empleado".
 *
 * @property integer $id_tipo_empleado
 * @property string $nombre_tipo_empleado
 * @property string $descripcion
 */
class TipoEmpleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo_empleado', 'descripcion'], 'required'],
            [['nombre_tipo_empleado'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_empleado' => 'Identificador',
            'nombre_tipo_empleado' => 'Área de trabajo',
            'descripcion' => 'Descripción',
        ];
    }
}
