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
use app\models\Phar;
//use app\models\Produser;


class loginWidget extends Widget{

    public $SesId ;

    public function run (){
        $session = Yii::$app->session;
       // $session->set("pass",password_hash(md5("password"."GoodSaltU8Tf"),PASSWORD_DEFAULT));
        if ($session->get('user_type') != null) {
            if ($session->get('user_type') == 'user') {
                $user = RegistrationForm::find()->select(['name','phar_id'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                $session->set('user_name',$user["name"]);
                $firm = Phar::find()->select(['firm_id'])->asArray()->where(['phar_id' => $user["phar_id"]])->One();
                $session->set('user_firm_id',$user["firm_id"]);
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >Вихід</a></li>';
            }
            if ($session->get('user_type') == 'pharm') {
                $user = Firm::find()->select(['name_firm'])->asArray()->where(['firm_id' => $session->get("id_firm_pharm")])->One();
                $session->set('user_name',$user["name_firm"]);
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">Представник мережі: ' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >Вихід</a></li>';
            }
            if ($session->get('user_type') == 'firm') {
                // $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">Представник Фірми, ' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >Вихід</a></li>';
            }
            // admin
            if ($session->get('user_type') == 'admin') {
                $session->set('user_name',$session->get("admin_id"));
                // $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                return '<li class="nav-item"><a class="nav-link nav-link--registration" href="">ADMIN # ' . $session->get("user_name") . '</a></li>
                        <li class="nav-item"><a class="nav-link nav-link--login" href="/global/exit" >Вихід</a></li>';
            }
        } else {
            return '<li class="nav-item"><a class="nav-link nav-link--registration" href="/global">Реєстрація</a></li>
                    <li class="nav-item"><a class="nav-link nav-link--login" href="/global/login" >Увійти</a></li>';
        }
    }

}