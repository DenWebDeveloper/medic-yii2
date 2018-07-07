<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 6:39
 */

namespace app\models;


use yii\db\ActiveRecord;

class Answer extends ActiveRecord
{

    public function rules(){
        return [
            [['answer','is_true'],'required','message'=>'Обов\'язкове поле'],

            //['phone','match', 'pattern' => ' [0-9]{9}$', 'message' => 'Невірний номер' ]
//			['secondname','myRule'],
            //['verificationCode', 'captcha']
        ];
    }

}