<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empleado;

/**
 * EmpleadoSearch represents the model behind the search form about `backend\models\Empleado`.
 */
class EmpleadoSearch extends Empleado
{
    /**
     * @inheritdoc
     */
	 
	public $tipoempleado;
    
	public function rules()
    {
        return [
            [['rut_empleado', 'nombres', 'apellido_paterno', 'apellido_materno', 'direccion', 'correo_electronico', 'tipoempleado'], 'safe'],
            [['numero_empleado', 'id_tipo_empleado'], 'integer'],
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
        $query = Empleado::find();
		$query->joinWith(['tipoempleado']);

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
		
		$dataProvider->sort->attributes['tipoempleado'] = [
			'asc' => ['tipo_empleado.descripcion' => SORT_ASC],
			'desc' => ['tipo_empleado.descripcion' => SORT_DESC],
		];

        // grid filtering conditions
        $query->andFilterWhere([
            'numero_empleado' => $this->numero_empleado,
            'id_tipo_empleado' => $this->id_tipo_empleado,
        ]);

        $query->andFilterWhere(['like', 'rut_empleado', $this->rut_empleado])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo_electronico', $this->correo_electronico])
			->andFilterWhere(['like', 'tipo_empleado.descripcion', $this->tipoempleado]);


        return $dataProvider;
    }
}
