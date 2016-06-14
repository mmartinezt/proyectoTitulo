<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PackProducto;

/**
 * PackProductoSearch represents the model behind the search form about `backend\models\PackProducto`.
 */
class PackProductoSearch extends PackProducto
{
    /**
     * @inheritdoc
     */
	public $producto;
    public function rules()
    {
        return [
            [['id_pack_producto', 'id_pack', 'id_producto'], 'integer'],
			[['producto'], 'safe'],
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
        $query = PackProducto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$query->joinWith(['producto']);
		
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pack_producto' => $this->id_pack_producto,
            'id_pack' => $this->id_pack,
            'id_producto' => $this->id_producto,
        ]);

        return $dataProvider;
    }
}
