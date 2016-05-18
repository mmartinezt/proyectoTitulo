<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pack_producto".
 *
 * @property integer $id_pack_producto
 * @property integer $id_pack
 * @property integer $id_producto
 */
class PackProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pack_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pack', 'id_producto'], 'required'],
            [['id_pack', 'id_producto'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pack_producto' => 'Id Pack Producto',
            'id_pack' => 'Id Pack',
            'id_producto' => 'Id Producto',
        ];
    }
}
