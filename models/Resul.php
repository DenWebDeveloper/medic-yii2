<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 11:23
 */

namespace app\models;


use yii\db\ActiveRecord;

class Resul extends ActiveRecord
{

    public $answer;
    public $question;


    public function rules(){
        return [
            [['answer','question'],'required','message'=>'Обов\'язкове поле'],
            //['phone','match', 'pattern' => ' [0-9]{9}$', 'message' => 'Невірний номер' ]
//			['secondname','myRule'],
            //['verificationCode', 'captcha']
        ];
    }

}