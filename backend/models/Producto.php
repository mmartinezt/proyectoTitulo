<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_prodcto
 * @property integer $id_categoria_producto
 * @property integer $id_subcategoria_producto
 * @property string $nombre_producto
 * @property string $marca_producto
 * @property integer $stock
 * @property string $path_imagen
 * @property integer $precio_compra
 * @property integer $precio_venta
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria_producto', 'id_subcategoria_producto', 'nombre_producto', 'marca_producto', 'stock', 'path_imagen', 'precio_compra', 'precio_venta'], 'required'],
            [['id_categoria_producto', 'id_subcategoria_producto', 'stock', 'precio_compra', 'precio_venta'], 'integer'],
            [['nombre_producto'], 'string', 'max' => 500],
            [['marca_producto'], 'string', 'max' => 100],
            [['path_imagen'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prodcto' => 'Id',
            'id_categoria_producto' => 'Categoría',
            'id_subcategoria_producto' => 'Subcategoría',
            'nombre_producto' => 'Nombre',
            'marca_producto' => 'Marca',
            'stock' => 'Stock',
            'path_imagen' => 'Imagen',
            'precio_compra' => 'Precio Compra',
            'precio_venta' => 'Precio Venta',
        ];
    }
}
