<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pack".
 *
 * @property integer $id_pack
 * @property string $nombre
 * @property string $descripcion
 * @property string $path_imagen
 * @property integer $precio
 * @property integer $estado
 */
class Pack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pack';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'path_imagen', 'precio', 'estado'], 'required'],
            [['precio', 'estado'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500],
            [['path_imagen'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pack' => 'Id Pack',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'path_imagen' => 'Path Imagen',
            'precio' => 'Precio',
            'estado' => 'Estado',
        ];
    }
}
