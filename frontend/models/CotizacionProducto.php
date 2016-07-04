<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cotizacion_producto".
 *
 * @property integer $id_cotizacion_producto
 * @property integer $id_cotizacion
 * @property integer $id_producto
 */
class CotizacionProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion', 'id_producto'], 'required'],
            [['id_cotizacion', 'id_producto'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion_producto' => 'Id Cotizacion Producto',
            'id_cotizacion' => 'Id Cotizacion',
            'id_producto' => 'Id Producto',
        ];
    }
}
