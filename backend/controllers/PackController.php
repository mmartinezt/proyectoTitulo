<?php

namespace backend\controllers;

use Yii;
use backend\models\Pack;
use backend\models\PackProducto;
use backend\models\PackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PackController implements the CRUD actions for Pack model.
 */
class PackController extends Controller
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
     * Lists all Pack models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pack model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model = $this->findModel($id);
			
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Pack model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	 
	
    public function actionCreate()
    {
        $model = new Pack();
		
		
        if ($model->load(Yii::$app->request->post())) {
			
			if($model->save()){
					$pros=$model->Productos;
					
					//guarda productos al pack
					foreach( $pros as $n => $id){
							$model2 = new PackProducto();
							$model2->id_pack = $model->id_pack;
							$model2->id_producto=$id;
							$model2->save();			
					}
					return $this->redirect(['view', 'id' => $model->id_pack]);
			}else
			echo("Error al guardar el pack");
			
			
        } else {
			
			
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pack model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$model = $this->findModel($id);
		
		$p=[];
		$cont=0;
		foreach($model->productos as $producto){
			$p[$cont] = $producto->producto->id_prodcto;
			$cont +=1;
		}
		
		$model->Productos=$p;

      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pack]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pack model.
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
     * Finds the Pack model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pack the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pack::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
