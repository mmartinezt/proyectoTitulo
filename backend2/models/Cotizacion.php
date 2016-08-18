<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property integer $id_cotizacion
 * @property string $fecha
 * @property integer $id_cliente
 * @property string $comentario
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    
	public $productos;
	public $servicios;
	
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'id_cliente'], 'required'],
            [['fecha', 'productos','servicios'], 'safe'],
            [['id_cliente'], 'integer'],
            [['comentario'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion' => 'Identificador',
            'fecha' => 'Fecha',
            'id_cliente' => 'Cliente',
            'comentario' => 'Comentario',
			'productos' => 'Productos',
			'servicios' => 'Servicios',
        ];
    }
}
