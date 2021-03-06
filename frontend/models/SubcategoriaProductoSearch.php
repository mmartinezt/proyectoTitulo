<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubcategoriaProducto;

/**
 * SubcategoriaProductoSearch represents the model behind the search form about `backend\models\SubcategoriaProducto`.
 */
class SubcategoriaProductoSearch extends SubcategoriaProducto
{
    /**
     * @inheritdoc
     */
	 public $categoria;
    public function rules()
    {
        return [
            [['id_subcategoria', 'id_categoria_producto'], 'integer'],
            [['nombre', 'descripcion', 'categoria'], 'safe'],
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
        $query = SubcategoriaProducto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$query->joinWith(['categoria']);
		
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_subcategoria' => $this->id_subcategoria,
            'id_categoria_producto' => $this->id_categoria_producto,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
			->andFilterWhere(['like', 'categoria_producto.nombre', $this->categoria]);

        return $dataProvider;
    }
}
