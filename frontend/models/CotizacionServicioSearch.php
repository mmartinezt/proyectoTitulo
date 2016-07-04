<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\CotizacionServicio;

/**
 * CotizacionServicioSearch represents the model behind the search form about `frontend\models\CotizacionServicio`.
 */
class CotizacionServicioSearch extends CotizacionServicio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion_servicio', 'id_cotizacion', 'id_servicio'], 'integer'],
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
        $query = CotizacionServicio::find();

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
            'id_cotizacion_servicio' => $this->id_cotizacion_servicio,
            'id_cotizacion' => $this->id_cotizacion,
            'id_servicio' => $this->id_servicio,
        ]);

        return $dataProvider;
    }
}
