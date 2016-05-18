<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subcategoria_producto".
 *
 * @property integer $id_categoria_prodcto
 * @property integer $id_categoria_producto
 * @property string $nombre
 * @property string $descripcion
 */
class SubcategoriaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcategoria_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria_producto', 'nombre', 'descripcion'], 'required'],
            [['id_categoria_producto'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria_prodcto' => 'Id Categoria Prodcto',
            'id_categoria_producto' => 'Id Categoria Producto',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }
}
