<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoria_producto".
 *
 * @property integer $id_tipo_producto
 * @property string $nombre
 * @property string $descripcion
 */
class CategoriaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria_producto' => 'Identificador',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }
}
