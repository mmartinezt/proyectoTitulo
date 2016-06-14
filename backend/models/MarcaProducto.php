<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "marca_producto".
 *
 * @property integer $id_marca_producto
 * @property string $nombre
 * @property string $descripcion
 * @property string $procedencia
 */
class MarcaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marca_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'procedencia'], 'required'],
            [['nombre', 'procedencia'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_marca_producto' => 'Identificador',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'procedencia' => 'Procedencia',
        ];
    }
}
