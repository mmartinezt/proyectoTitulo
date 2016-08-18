<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ClienteServicioPeticion;

/**
 * ClienteServicioPeticionSearch represents the model behind the search form about `frontend\models\ClienteServicioPeticion`.
 */
class ClienteServicioPeticionSearch extends ClienteServicioPeticion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente_servicio_peticion', 'id_cliente', 'id_cotizacion'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = ClienteServicioPeticion::find();

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
            'id_cliente_servicio_peticion' => $this->id_cliente_servicio_peticion,
            'id_cliente' => $this->id_cliente,
            'id_cotizacion' => $this->id_cotizacion,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
