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
    public function rules()
    {
        return [
            [['id_producto', 'descripcion'], 'required'],
            [['id_producto', 'valor_oferta', 'descuento_porcentaje'], 'integer'],
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
