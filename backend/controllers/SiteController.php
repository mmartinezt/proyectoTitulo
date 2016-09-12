<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\User;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'logout'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'viewmap'],
                        'allow' => true,
                        'roles' => ['@'],
						'matchCallback' => function ($rule, $action) {
							return User::isUserAdmin(Yii::$app->user->identity->id);
							},
                    ],
					[
                        'actions' => ['error', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],
						'matchCallback' => function ($rule, $action) {
							//Llamada al método que comprueba si es un administrador
							return User::isUserSimple(Yii::$app->user->identity->id);
							},
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }
	
	public function actionUser(){
		return $this->render("producto/create");
	} 
	
	public function actionAdmin(){
		return $this->render("producto/create");
	}

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
	public function actionViewmap()
    {
		$this->layout = 'mainMapa';
        return $this->render('viewmap');
    }
	
    public function actionIndex()
    {

        return $this->render('index');
	
    }

    public function actionLogin()
	 {
		 if (!\Yii::$app->user->isGuest) {
			if (User::isUserAdmin(Yii::$app->user->identity->id))
				return $this->redirect(["site/index"]);
			else
				return $this->redirect(["site/error"]);
		 }
		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			if (User::isUserAdmin(Yii::$app->user->identity->id))
				return $this->redirect(["index"]);
			else
				return $this->redirect(["error"]);

		}else{
			 return $this->render('login', [
				 'model' => $model,
			 ]);
		 }
	 }

    public function actionLogout()
    {
        Yii::$app->user->logout();
		
		
        return $this->goHome();
    }
	
	public function actionPdf() {
 
        $mpdf = new mPDF;
        $mpdf->WriteHTML('<p>Hallo World</p>');
        $mpdf->Output();
        exit;
    }
}
