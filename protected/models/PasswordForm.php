<?php

class PasswordForm extends CFormModel
{
	public $username;
	public $oldPassword;
	public $newPassword;
	public $newPassword2;

	public function rules()
	{
		return array(
			array('username, oldPassword, newPassword, newPassword2', 'required'),
			array('oldPassword', 'authenticate'),
			array('newPassword', 'newPassComplience'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'Nazwa użytkownika',
			'oldPassword'=>'Stare hasło',
			'newPassword'=>'Nowe hasło',
			'newPassword2'=>'Potwierdź nowe hasło',
		);
	}

	public function newPassComplience($attribute, $params) {
		
		if ($this->newPassword != $this->newPassword2)
			$this->addError('newPassword', 'nowe hasła nie pasuja!');	
	}
	
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no input errors
		{
			$identity=new UserIdentity($this->username,$this->oldPassword);
			$identity->authenticate();
			switch($identity->errorCode)
			{
				case UserIdentity::ERROR_NONE:
					Yii::app()->user->login($identity,0);
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('username','Nazwa użytkownika jest niepoprawna');
					break;
				default: // UserIdentity::ERROR_PASSWORD_INVALID
					$this->addError('oldPassword','Obecne hasło jest niepoprawne');
					break;
			}
		}
	}
}
