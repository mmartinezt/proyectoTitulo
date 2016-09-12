<?php

namespace backend\controllers;

use Yii;
use backend\models\Cotizacion;
use backend\models\CotizacionProducto;
use backend\models\CotizacionServicio;
use backend\models\CotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * CotizacionController implements the CRUD actions for Cotizacion model.
 */
class CotizacionController extends Controller
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
     * Lists all Cotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cotizacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$pros = CotizacionProducto::find()->where(['id_cotizacion' => $id])->all();
		$servi = CotizacionServicio::find()->where(['id_cotizacion' => $id])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
			'pros' => $pros,
			'servi' => $servi,
        ]);
    }
	
	
	
	public function actionViewmodal($id)
    {
		$pros = CotizacionProducto::find()->where(['id_cotizacion' => $id])->all();
		$servi = CotizacionServicio::find()->where(['id_cotizacion' => $id])->all();
		$this->layout = 'mainModal';
        return $this->render('viewModal', [
            'model' => $this->findModel($id),
			'pros' => $pros,
			'servi' => $servi,
        ]);
    }

    /**
     * Creates a new Cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cotizacion();

        if ($model->load(Yii::$app->request->post())) {
			
			if($model->save()){
					
					$pros=$model->productos;
					//guarda productos
					foreach( $pros as $n => $id){
							$model2 = new CotizacionProducto();
							$model2->id_cotizacion = $model->id_cotizacion;
							$model2->id_producto=$id;
							$model2->save();			
					}
					
					$servi=$model->servicios;
					//guarda servicios
					foreach($servi as $n => $id){
							$model2 = new CotizacionServicio();
							$model2->id_cotizacion = $model->id_cotizacion;
							$model2->id_servicio=$id;
							$model2->save();			
					}
					return $this->redirect(['view', 'id' => $model->id_cotizacion, 'pros'=>$pros, 'servi'=>$servi]);
			}else
			echo("Error al guardar el pack");
        } else {
			date_default_timezone_set('America/Santiago');
			$model->fecha = date('Y/m/d h:i:s');
            return $this->render('create', [
                'model' => $model,
				'pros'=>'',
				'servi'=>''
            ]);
        }
    }

    /**
     * Updates an existing Cotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cotizacion]);
        } else {
			
			$datosp= array();
			$pr = CotizacionProducto::find()->where(['id_cotizacion' => $id])->all();
			foreach($pr as $indice => $producto){
				array_push($datosp, $producto->id_producto);
			}
			
			$datoss= array();
			$sr = CotizacionServicio::find()->where(['id_cotizacion' => $id])->all();
			foreach($sr as $indice => $servicio){
				array_push($datoss, $servicio->id_servicio);
			}
			$model->productos = $datosp;
			$model->servicios = $datoss;
			return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cotizacion model.
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
     * Finds the Cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cotizacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	public function actionPdf($id_cotizacion) {
 
        $pdf = new Pdf([

        'content' => $this->renderPartial('formatoCotizacion', ['id' => $id_cotizacion]),
		//'content' =>'<p>Hallo World</p>',
        
    ]);
    return $pdf->render();
    }
	
}
