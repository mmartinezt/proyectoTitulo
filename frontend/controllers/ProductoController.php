<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Producto;
use frontend\models\Cliente;
use frontend\models\Cotizacion;
use frontend\models\CotizacionProducto;
use frontend\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\ClienteServicioPeticion;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    /**
     * @inheritdoc
     */
	 public $contador=0;
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
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	

    /**
     * Displays a single Producto model.
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
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_prodcto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionFormulario()
    {
       $model = new Producto();
		if ($model->load(Yii::$app->request->post())) {
						
			$cliente = new Cliente();
			$cotizacion = new Cotizacion();
			$solicitud = new ClienteServicioPeticion();
			
			//crear cliente	
			$cliente->rut_cliente = $model->rut;
			$cliente->nombres = $model->nombre;
			$cliente->descripcion = $model->correo;
			$cliente->celular = $model->fono;
			$cliente->save();

			//crear cotización
			$cotizacion->fecha = date('Y/m/d h:i:s');
			$cotizacion->comentario = "Cotización software en linea";
			$cotizacion->id_cliente = $cliente->id_cliente;
			$cotizacion->save();
			
			//crear cotizacionProducto
			$session = Yii::$app->session;
			foreach($session['producto'] as $indice => $producto){
				if($producto!=null){
					$cotizacionProducto= new CotizacionProducto();
					$cotizacionProducto->id_cotizacion = $cotizacion->id_cotizacion;
					$cotizacionProducto->id_producto = $producto;
					$cotizacionProducto->save();
				}
			}
			//crear solicitud de servicio si corresponde
			if($model->instalacion=='si'){
				$solicitud->id_cliente = $cliente->id_cliente;
				$solicitud->id_cotizacion = $cotizacion->id_cotizacion;
				$solicitud->fecha = date('Y/m/d h:i:s');
				$solicitud->save();
			}
			
			
            return $this->redirect(['cotizacion/pdf', 'id' => $cotizacion->id_cotizacion]);
        } else {
					$this->layout = 'mainModal';
					return $this->render('_formulario', [
						'model' => $model,
					]);
				}
    }
	
	public function actionVitrina($id)
    {
        $searchModel = new ProductoSearch();
		if($id != 0){
			$searchModel->id_subcategoria_producto = $id;
		}
			
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('vitrina', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionAgregar($id)
    {
		$session = Yii::$app->session;
		
		if($id==0){
			return $this->render('carrito');
		}
		else{
			
			
			// directamente usando $_SESSION (asegura te de que Yii::$app->session->open() ha sido llamado)
			if(!isset($session['producto'])){
				$_SESSION['contador']=1;
				$_SESSION['producto'][1] = $id;
				
			}else{
				if(in_array($id, $session['producto'])){
				}
				else{
					$contador=$session['contador'];
					$_SESSION['contador'] = $contador+1;
					$_SESSION['producto'][$contador+1] = $id;
				}
			}
			
            return $this->render('carrito');
        }
    }
	
	public function actionEliminar($id)
    {
		$session = Yii::$app->session;

		if(in_array($id, $session['producto'])){
			foreach($session['producto'] as $indice => $producto){
				if($producto==$id){
					$_SESSION['producto'][$indice] = null;
					
					}
			}
			echo("Producto eliminado del carrito de compras");
			
		}
		else{
			echo("El producto seleccionado no se encuentra en el carrito de compras");
			
		}

		return $this->render('carrito');
        
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_prodcto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
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
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
