<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subcategoria_producto".
 *
 * @property integer $id_subcategoria_producto
 * @property string $nombre
 * @property string $descripcion
 */
class SubcategoriaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	public function getCategoria() {
		return $this->hasOne(CategoriaProducto::className(), ['id_categoria_producto' => 'id_categoria_producto']);
	}	
	 
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
            'id_subcategoria_producto' => 'Identificador',
            'id_categoria_producto' => 'Id Categoría Producto',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
        ];
    }
}
