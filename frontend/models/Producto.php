<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_prodcto
 * @property integer $id_categoria_producto
 * @property integer $id_subcategoria_producto
 * @property string $nombre_producto
 * @property string $id_marca_producto
 * @property string $descripcion
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
	 
	public $nombre;
	public $rut;
	public $correo;
	public $fono;
	public $instalacion;
	 

	
	public function getCategoria() {
		return $this->hasOne(CategoriaProducto::className(), ['id_categoria_producto' => 'id_categoria_producto']);
	}
	
	public function getMarca() {
		return $this->hasOne(MarcaProducto::className(), ['id_marca_producto' => 'id_marca_producto']);
	}	
	
	 
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
            [['id_categoria_producto', 'id_subcategoria_producto', 'nombre_producto', 'id_marca_producto', 'descripcion', 'stock', 'path_imagen', 'precio_compra', 'precio_venta'], 'required'],
            [['id_categoria_producto', 'id_subcategoria_producto', 'stock', 'precio_compra', 'precio_venta'], 'integer'],
            [['nombre_producto', 'descripcion'], 'string', 'max' => 500],
            [['id_marca_producto'], 'string', 'max' => 100],
            [['path_imagen'], 'string', 'max' => 200],
			[['nombre', 'correo', 'rut', 'fono', 'instalacion'],'safe'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prodcto' => 'Identificador',
            'id_categoria_producto' => 'Categoría',
            'id_subcategoria_producto' => 'Sub-categoría',
            'nombre_producto' => 'Nombre',
            'id_marca_producto' => 'Marca',
			'descripcion'=>'Descripción',
            'stock' => 'Stock',
            'path_imagen' => 'Imagen',
            'precio_compra' => 'Precio Compra',
            'precio_venta' => 'Precio Venta',
			'instalacion' => '¿Quiére solicitar instalación de estos productos?',
        ];
    }
}
