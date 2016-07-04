<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MarcaProducto;

/**
 * MarcaProductoSearch represents the model behind the search form about `backend\models\MarcaProducto`.
 */
class MarcaProductoSearch extends MarcaProducto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_marca_producto'], 'integer'],
            [['nombre', 'descripcion', 'procedencia'], 'safe'],
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
        $query = MarcaProducto::find();

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
            'id_marca_producto' => $this->id_marca_producto,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'procedencia', $this->procedencia]);

        return $dataProvider;
    }
}
