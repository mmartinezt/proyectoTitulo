<?php
namespace frontend\models;

use common\models\User;
use frontend\models\Cliente;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
	
	//datos de cliente
	public $nombres;
	public $apellidos;
	public $telefono;
	
	//datos de direccion
	public $calle;
	public $numero;
	public $comuna;
	
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de usuario ya está registrado'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este eMail ya siendo utilizado por otro usuario'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			[['nombres', 'apellidos', 'telefono', 'calle', 'numero', 'comuna'], 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($calle, $numero, $comuna)
    {
        if (!$this->validate()) {
            return null;
        }
        //crea usuario en tabla user
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
		$user->save();
        
		//Crea clienteen tabla cliente
		$cliente = new Cliente();
		$cliente->id_usuario = $user->id;
		$cliente->nombres = $this->nombres;
		$cliente->apellidos = $this->apellidos;
		$cliente->telefono = $this->telefono;
		$cliente->comuna = $comuna;
		$cliente->numero = $numero;
		$cliente->calle = $calle;
		$cliente->save();
		
		return $user;
    }
	public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuario',
            'password' => 'Contraseña',
            'email' => 'eMail',
			'telefono' => 'Teléfono',
        ];
    }
	
}
