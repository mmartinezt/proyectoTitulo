<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cotizacion_servicio".
 *
 * @property integer $id_cotizacion_servicio
 * @property integer $id_cotizacion
 * @property integer $id_servicio
 */
class CotizacionServicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion_servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion', 'id_servicio'], 'required'],
            [['id_cotizacion', 'id_servicio'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion_servicio' => 'Id Cotizacion Servicio',
            'id_cotizacion' => 'Id Cotizacion',
            'id_servicio' => 'Id Servicio',
        ];
    }
}
