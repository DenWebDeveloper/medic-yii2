<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 18.04.2018
 * Time: 0:43
 */

namespace app\models;
use yii\db\ActiveRecord;


class Login extends ActiveRecord
{

    public static function tableName(){
        return 'user';
    }


    public function attributeLabels(){
        return [
            'pass'=>'Пароль',
            //'password_repeat'=>'Перевірка паролю',
            'login'=>'email',
            ];
    }

    public function rules(){
        return [
            [['pass','login'],'required','message'=>'Обов\'язкове поле'],
            ['login','email'],
            ['login','myRule']
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