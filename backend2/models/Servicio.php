<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "servicio".
 *
 * @property integer $id_servicio
 * @property string $nombre
 * @property string $descripcion
 * @property integer $valor
 */
class Servicio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'valor'], 'required'],
            [['valor'], 'integer'],
            [['nombre', 'descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_servicio' => 'Identificador',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'valor' => 'Valor',
        ];
    }
}
