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
use app\models\Firm;
//use app\models\Produser;


class loginWidget extends Widget{

    public $SesId ;

    public function run (){
        $session = Yii::$app->session;
       // $session->set("pass",password_hash(md5("password"."GoodSaltU8Tf"),PASSWORD_DEFAULT));
        if ($session->has('user_id') || $session->has('id_firm_pharm') || $session->has('producer_id')) {
            if ($session->get('user_type') == 'user') {
                $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                $session->set('user_name',$user["name"]);
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >exit</a></li>';
            }
            if ($session->get('user_type') == 'pharm') {
                $user = Firm::find()->select(['name_firm'])->asArray()->where(['firm_id' => $session->get("id_firm_pharm")])->One();
                $session->set('user_name',$user["name_firm"]);
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">Представник мережі: ' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >exit</a></li>';
            }
            if ($session->get('user_type') == 'firm') {
               // $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">Представник Фірми, ' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >exit</a></li>';
            }
        } else {
            return '<li class="nav-item"><a class="nav-link nav-link--registration" href="/global">Реєстрація</a></li>
                    <li class="nav-item"><a class="nav-link nav-link--login" href="/global/login" >Увійти</a></li>';
        }
    }

}