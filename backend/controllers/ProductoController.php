<?php

namespace backend\controllers;

use Yii;
use backend\models\Producto;
use backend\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\User;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
		$model = $this->findModel($id);
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

        if ($model->load(Yii::$app->request->post())) {
			
			$image = UploadedFile::getInstance($model,'image');
			
			if(empty($image)){
				//agregar imagen por defecto
				$model->path_imagen = 'producto.jpg';
			}
			else{
				$model->filename = $image->name;
				$ext=end((explode(".",$image->name)));
				$model->path_imagen = Yii::$app->security->generateRandomString().".".$ext;
				$path = $model->getImageFile();
				$image->saveAs($path);	
			}
			
			$model->save();
			return $this->redirect(['view', 'id' => $model->id_prodcto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	    public function actionCreate2()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post())) {
			
			$image = UploadedFile::getInstance($model,'image');
			if(empty($image)){
				//agregar imagen por defecto
			}
			else{
				$model->filename = $image->name;
				$ext=end((explode(".",$image->name)));
				$model->path_imagen = Yii::$app->security->generateRandomString().".".$ext;
				$path = $model->getImageFile();
				
				$image->saveAs($path);
			
			}	
			 $model->save();
				
            return $this->redirect(['view', 'id' => $model->id_prodcto]);
        } else {
			$this->layout = 'mainModal';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
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
