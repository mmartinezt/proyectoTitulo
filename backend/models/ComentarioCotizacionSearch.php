<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ComentarioCotizacion;

/**
 * ComentarioCotizacionSearch represents the model behind the search form about `backend\models\ComentarioCotizacion`.
 */
class ComentarioCotizacionSearch extends ComentarioCotizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comentario_cotizacion', 'id_cotizacion', 'id_usuario'], 'integer'],
            [['pregunta', 'respuesta', 'fecha'], 'safe'],
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
        $query = ComentarioCotizacion::find();

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
            'id_comentario_cotizacion' => $this->id_comentario_cotizacion,
            'id_cotizacion' => $this->id_cotizacion,
            'id_usuario' => $this->id_usuario,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'pregunta', $this->pregunta])
            ->andFilterWhere(['like', 'respuesta', $this->respuesta]);

        return $dataProvider;
    }
}
