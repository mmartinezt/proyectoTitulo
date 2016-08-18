<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `backend\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut_empresa'], 'integer'],
            [['nombre_empresa', 'nombre_fantasia', 'giro_empresa'], 'safe'],
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
        $query = Empresa::find();

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
            'rut_empresa' => $this->rut_empresa,
        ]);

        $query->andFilterWhere(['like', 'nombre_empresa', $this->nombre_empresa])
            ->andFilterWhere(['like', 'nombre_fantasia', $this->nombre_fantasia])
            ->andFilterWhere(['like', 'giro_empresa', $this->giro_empresa]);

        return $dataProvider;
    }
}
