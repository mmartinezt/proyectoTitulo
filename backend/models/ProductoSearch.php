<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `backend\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prodcto', 'id_categoria_producto', 'id_subcategoria_producto', 'stock', 'precio_compra', 'precio_venta'], 'integer'],
            [['nombre_producto', 'marca_producto', 'path_imagen'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Producto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_prodcto' => $this->id_prodcto,
            'id_categoria_producto' => $this->id_categoria_producto,
            'id_subcategoria_producto' => $this->id_subcategoria_producto,
            'stock' => $this->stock,
            'precio_compra' => $this->precio_compra,
            'precio_venta' => $this->precio_venta,
        ]);

        $query->andFilterWhere(['like', 'nombre_producto', $this->nombre_producto])
            ->andFilterWhere(['like', 'marca_producto', $this->marca_producto])
            ->andFilterWhere(['like', 'path_imagen', $this->path_imagen]);

        return $dataProvider;
    }
}
