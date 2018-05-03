<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 17.04.2018
 * Time: 11:31
 */

namespace app\components;
use yii\base\Widget;
use Yii;
use app\models\RegistrationForm;


class loginWidget extends Widget{

    public $SesId ;

    public function run (){
        $session = Yii::$app->session;
       // $session->set("pass",password_hash(md5("password"."GoodSaltU8Tf"),PASSWORD_DEFAULT));
        if ($session->has('user_id')) {
            $this->SesId = $session->get("user_id");
            $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
            return   '<li class="nav-item"><a class="nav-link nav-link--registration" href="">hi, '.$user['name'].'</a></li>
                    <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >exit</a></li>';
        }else{
            return   '<li class="nav-item"><a class="nav-link nav-link--registration" href="/global">Реєстрація</a></li>
                    <li class="nav-item"><a class="nav-link nav-link--login" href="/global/login" >Увійти</a></li>';
        }
    }

}