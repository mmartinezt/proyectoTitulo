<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id_cliente
 * @property integer $id_usuario
 * @property string $rut_empresa
 * @property string $nombres
 * @property string $apellidos
 * @property string $rut_cliente
 * @property string $comuna
 * @property string $ciudad
 * @property string $calle
 * @property integer $numero
 * @property integer $codigo_postal
 * @property string $telefono
 * @property string $celular
 * @property string $descripcion
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres'], 'required'],
            [['id_usuario', 'numero', 'codigo_postal'], 'integer'],
            [['rut_empresa'], 'string', 'max' => 30],
            [['nombres', 'apellidos'], 'string', 'max' => 200],
            [['rut_cliente'], 'string', 'max' => 20],
            [['comuna', 'ciudad', 'telefono', 'celular'], 'string', 'max' => 50],
            [['calle'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'id_usuario' => 'Id Usuario',
            'rut_empresa' => 'Rut Empresa',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'rut_cliente' => 'Rut Cliente',
            'comuna' => 'Comuna',
            'ciudad' => 'Ciudad',
            'calle' => 'Calle',
            'numero' => 'Numero',
            'codigo_postal' => 'Codigo Postal',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'descripcion' => 'Descripcion',
        ];
    }
}
