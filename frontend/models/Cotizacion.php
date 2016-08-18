<?php

namespace frontend\models;

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
    /**
     * @inheritdoc
     */
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
            [['fecha', 'id_cliente', 'comentario'], 'required'],
            [['fecha'], 'safe'],
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
            'id_cotizacion' => 'Id Cotizacion',
            'fecha' => 'Fecha',
            'id_cliente' => 'Id Cliente',
            'comentario' => 'Comentario',
        ];
    }
}
