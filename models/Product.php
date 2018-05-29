<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.05.2018
 * Time: 4:18
 */

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord {


    public function rules(){
        return [
            [['title','description','id_producer'],'required','message'=>'Обов\'язкове поле'],
//            ['email','email'],
//            ['phone','number','max'=>999999999 ,'min'=>99999999],
            //['phone','match', 'pattern' => ' [0-9]{9}$', 'message' => 'Невірний номер' ]
//			['secondname','myRule'],
            //['verificationCode', 'captcha']
        ];
    }
}