<?php

namespace backend\controllers;

use Yii;
use backend\models\SubcategoriaProducto;
use backend\models\SubcategoriaProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubcategoriaProductoController implements the CRUD actions for SubcategoriaProducto model.
 */
class SubcategoriaProductoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SubcategoriaProducto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubcategoriaProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SubcategoriaProducto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SubcategoriaProducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubcategoriaProducto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_subcategoria_producto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SubcategoriaProducto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_subcategoria_producto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SubcategoriaProducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SubcategoriaProducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SubcategoriaProducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubcategoriaProducto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	

	public function actionLists($id)
    {		

        $countCategorias = SubcategoriaProducto::find()
                ->where(['id_categoria_producto' => $id])
                ->count();
 
        $categorias = SubcategoriaProducto::find()
                ->where(['id_categoria_producto' => $id])
                ->all();
 
        if($countCategorias > 0 )
        {
            foreach($categorias as $categoria ){
                echo "<option value='".$categoria->id_subcategoria_producto."'>".$categoria->nombre."</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }
 
    }
	
	
	
}
