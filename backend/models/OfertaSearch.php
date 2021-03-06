<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Oferta;

/**
 * OfertaSearch represents the model behind the search form about `backend\models\Oferta`.
 */
class OfertaSearch extends Oferta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_oferta', 'id_producto', 'valor_oferta', 'descuento_porcentaje'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = Oferta::find();

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
            'id_oferta' => $this->id_oferta,
            'id_producto' => $this->id_producto,
            'valor_oferta' => $this->valor_oferta,
            'descuento_porcentaje' => $this->descuento_porcentaje,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
