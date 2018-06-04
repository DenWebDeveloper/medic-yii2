<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 25.05.2018
 * Time: 22:26
 */

namespace app\models;


use yii\db\ActiveRecord;

class Connect extends ActiveRecord
{

    public function rules(){
        return [
            [['id_product','id_pharm'],'required','message'=>'Обов\'язкове поле'],
//            ['email','email'],
//            ['phone','number','max'=>999999999 ,'min'=>99999999],
            //['phone','match', 'pattern' => ' [0-9]{9}$', 'message' => 'Невірний номер' ]
//			['secondname','myRule'],
            //['verificationCode', 'captcha']
        ];
    }

}