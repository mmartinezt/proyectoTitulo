<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $rut_empresa
 * @property string $nombre_empresa
 * @property string $nombre_fantasia
 * @property string $giro_empresa
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut_empresa', 'nombre_empresa', 'nombre_fantasia', 'giro_empresa'], 'required'],
            [['rut_empresa'], 'integer'],
            [['nombre_empresa', 'nombre_fantasia', 'giro_empresa'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rut_empresa' => 'Rut Empresa',
            'nombre_empresa' => 'Nombre Empresa',
            'nombre_fantasia' => 'Nombre Fantasia',
            'giro_empresa' => 'Giro Empresa',
        ];
    }
}
