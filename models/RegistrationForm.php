<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 26.03.2018
 * Time: 18:46
 */

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;


class RegistrationForm extends ActiveRecord {

	public static function tableName(){
		return 'phar_user';
	}

//	public $name;
//	public $secondname;
//	public $surname;
	public $password ;
	public $Id_phar ;
	public $region ;
	public $city ;
	public $firm_pharmacy ;
//	public $password_repeat ;
//	public $email;
//	public $phone ;

	public function attributeLabels(){
		return [
			'secondname'=>'Побатькові',
			'name'=>'Ім\'я',
			'surname'=>'Прізвище',
			'password'=>'Пароль',
			//'password_repeat'=>'Перевірка паролю',
			'email'=>'email',
			'phone'=>'Номер телефону'
		];
	}

	public function rules(){
		return [
			[['name','email','secondname','surname','password','phone','Id_phar'],'required','message'=>'Обов\'язкове поле'],
			['email','email'],
			['phone','number','max'=>999999999 ,'min'=>99999999],
//			['secondname','myRule'],
			//['verificationCode', 'captcha']
		];
	}

	public function myRule($attrs) {
		if (in_array($this->$attrs,['lolka','lol'])) {
			$this->addError ( $attrs , 'Wrong' );
		}
	}
}