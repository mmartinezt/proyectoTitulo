<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
	 
	public $successUrl = 'Success';
   public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
           
            'rules' => [
				[                   
                    'actions' => ['login','error','index', 'auth', 'oAuthSuccess', 'signup'],            
                    'allow' => true,
                ],
				
                [
                    //El administrador tiene permisos sobre las siguientes acciones
                    'actions' => ['logout', 'index','vitrina'],
                    //Esta propiedad establece que tiene permisos
                    'allow' => true,
                    //Usuarios autenticados, el signo ? es para invitados
                    'roles' => ['@'],
                    //Este método nos permite crear un filtro sobre la identidad del usuario
                    //y así establecer si tiene permisos o no
                    'matchCallback' => function ($rule, $action) {
                        //Llamada al método que comprueba si es un administrador
                        return User::isUserAdmin(Yii::$app->user->identity->id);
                    },
                ],
                [
                   //Los usuarios simples tienen permisos sobre las siguientes acciones
                   'actions' => ['logout'],
                   //Esta propiedad establece que tiene permisos
                   'allow' => true,
                   //Usuarios autenticados, el signo ? es para invitados
                   'roles' => ['@'],
                   //Este método nos permite crear un filtro sobre la identidad del usuario
                   //y así establecer si tiene permisos o no
                   'matchCallback' => function ($rule, $action) {
                      //Llamada al método que comprueba si es un usuario simple
                      return User::isUserSimple(Yii::$app->user->identity->id);
                  },
               ],
            ],
        ],
 //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
 //sólo se puede acceder a través del método post
        'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'logout' => ['get', 'post'],
            ],
        ],
    ];
}

    /**
     * @inheritdoc
     */
	 
	public function actionUser(){
		return $this->render("index");
	} 
	
	public function actionAdmin(){
		return $this->render("index");
	}
	
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
			'auth' => [
				'class' => 'yii\authclient\AuthAction',
				'successCallback' => [$this, 'oAuthSuccess'],
			],
        ];		
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
	 {
		 if (!\Yii::$app->user->isGuest) {

	if (User::isUserAdmin(Yii::$app->user->identity->id))
	{
	 return $this->redirect(["site/index"]);
	}
	else
	{
	 return $this->redirect(["site/index"]);
	}
		 }

		 $model = new LoginForm();
		 if ($model->load(Yii::$app->request->post()) && $model->login()) {

			 if (User::isUserAdmin(Yii::$app->user->identity->id))
	{
	 return $this->redirect(["site/index"]);
	}
	else
	{
	 return $this->redirect(["site/index"]);
	}

		 } else {
			 return $this->render('login', [
				 'model' => $model,
			 ]);
		 }
	 }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
		
        if ($model->load(Yii::$app->request->post())) {
			$calle = $_POST['calle'];
			$comuna = $_POST['comuna'];
			$numero = $_POST['numero'];
            if ($user = $model->signup($calle, $numero, $comuna)) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	
	public function oAuthSuccess($client) {
	  // do some thing with user data. for example with $userAttributes['email']
	   $attributes = $client->getUserAttributes();
        // user login or signup comes here
        /*
        Checking facebook email registered yet?
        Maxsure your registered email when login same with facebook email
        die(print_r($attributes));
        */
       
        $user = \common\models\User::find()->where(['email'=>$attributes['email']])->one();
		
        if(!empty($user)){
            Yii::$app->user->login($user);
			$this->successUrl = \yii\helpers\Url::to(['index']);
        
        }else{
				$model = new SignupForm();
				$model->email = $attributes['email'];
				$model->username= $attributes['email'];
				$model->password='contraseña';
					if ($user = $model->signup()) {
						if (Yii::$app->getUser()->login($user)) {
						}
					}
				
            // Save session attribute user from FB
            $session = Yii::$app->session;
            $session['attributes']=$attributes;
            // redirect to form signup, variabel global set to successUrl
            $this->successUrl = \yii\helpers\Url::to(['index']);
        }
	}
	
	
}
