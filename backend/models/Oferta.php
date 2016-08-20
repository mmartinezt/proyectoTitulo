<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "oferta".
 *
 * @property integer $id_oferta
 * @property integer $id_producto
 * @property integer $valor_oferta
 * @property integer $descuento_porcentage
 * @property string $descripcion
 */
class Oferta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oferta';
    }

    /**
     * @inheritdoc
     */
	 
	public function getNombreproducto() {
		return $this->hasOne(Producto::className(), ['id_prodcto' => 'id_producto']);
	}
    public function rules()
    {
        return [
            [['id_producto', 'descripcion'], 'required'],
            [['valor_oferta', 'descuento_porcentaje'], 'integer'],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_oferta' => 'Identificador',
            'id_producto' => 'Producto',
            'valor_oferta' => 'Valor Oferta ($)',
            'descuento_porcentaje' => 'Descuento (%)',
            'descripcion' => 'Descripción',
        ];
    }
}
