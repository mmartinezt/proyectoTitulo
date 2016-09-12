<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Producto;
use backend\models\CategoriaProducto;
use backend\models\SubcategoriaProducto;

/**
 * ProductoSearch represents the model behind the search form about `frontend\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
	 

	public $categoria;
	public $marca;
	public $subcategoria;
	
    public function rules()
    {
        return [
            [['id_prodcto', 'id_categoria_producto', 'id_subcategoria_producto', 'stock', 'precio_compra', 'precio_venta'], 'integer'],
            [['nombre_producto', 'id_marca_producto', 'descripcion', 'path_imagen','subcategoria' ,'categoria','marca'], 'safe'],
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
		
		$query->joinWith(['subcategoria','categoria','marca']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		

		
		$dataProvider->sort->attributes['categoria'] = [
			'asc' => ['categoria_producto.nombre' => SORT_ASC],
			'desc' => ['categoria_producto.nombre' => SORT_DESC],
		];
		
		$dataProvider->sort->attributes['subcategoria'] = [
			'asc' => ['subcategoria_producto.nombre' => SORT_ASC],
			'desc' => ['subcategoria_producto.nombre' => SORT_DESC],
		];
		
		$dataProvider->sort->attributes['marca'] = [
			'asc' => ['marca.nombre' => SORT_ASC],
			'desc' => ['marca.nombre' => SORT_DESC],
		];

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
            ->andFilterWhere(['like', 'id_marca_producto', $this->id_marca_producto])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'path_imagen', $this->path_imagen])
			 ->andFilterWhere(['like', 'id_subcategoria_producto', $this->id_subcategoria_producto])
			
			->andFilterWhere(['like', 'subcategoria_producto.nombre', $this->subcategoria])
			  ->andFilterWhere(['like', 'categoria_producto.nombre', $this->categoria])
			   ->andFilterWhere(['like', 'marca_producto.nombre', $this->marca]);

        return $dataProvider;
    }
}
