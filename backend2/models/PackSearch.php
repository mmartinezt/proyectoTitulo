<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pack;

/**
 * PackSearch represents the model behind the search form about `backend\models\Pack`.
 */
class PackSearch extends Pack
{
    /**
     * @inheritdoc
     */
	public $productos;
    public function rules()
    {
        return [
            [['id_pack', 'precio', 'estado'], 'integer'],
            [['nombre', 'descripcion', 'path_imagen', 'productos'], 'safe'],
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
        $query = Pack::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$query->joinWith(['productos']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pack' => $this->id_pack,
            'precio' => $this->precio,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'path_imagen', $this->path_imagen]);

        return $dataProvider;
    }
}
