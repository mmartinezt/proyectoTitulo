<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ClienteServicioEjecucion;

/**
 * ClienteServicioEjecucionSearch represents the model behind the search form about `backend\models\ClienteServicioEjecucion`.
 */
class ClienteServicioEjecucionSearch extends ClienteServicioEjecucion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente_ejecucion', 'id_cliente_peticion', 'id_empleado'], 'integer'],
            [['fecha', 'observacion'], 'safe'],
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
        $query = ClienteServicioEjecucion::find();

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
            'id_cliente_ejecucion' => $this->id_cliente_ejecucion,
            'id_cliente_peticion' => $this->id_cliente_peticion,
            'id_empleado' => $this->id_empleado,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
