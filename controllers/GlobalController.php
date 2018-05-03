<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 20.03.2018
 * Time: 18:32
 */

namespace app\controllers;

use app\models\List_user;
use app\models\Region;
use app\models\Login;
use yii\web\Controller;
use Yii;
use app\models\RegistrationForm;

class GlobalController extends controller{

    public $layout = 'global';

	public function actionIndex() {

		$Registration = new RegistrationForm();

		if ( $Registration->load ( Yii::$app->request->post () ) ){
			if ( $Registration->validate()) {

				$list_users = new List_user();
				$list_user  = List_user::find ()->where ( [ 'login' => $Registration->email ] )->count ();

				if ( $list_user < 1 ) {
					$list_users->login = $Registration->email;
					$list_users->pass  = password_hash(md5($Registration->password."GoodSaltU8Tf"),PASSWORD_DEFAULT);
					$list_users->type  = "user";
					$list_users->save ();
					$list_user = List_user::find ()->select ( [ 'id' ] )->AsArray ()->where ( [ 'login' => $list_users->login ] )->One ();

					if ( $list_user[ 'id' ] != null ) {
						$Registration->user_id = $list_user[ 'id' ];
						$Registration->phar_id = $Registration->Id_phar;
						//var_dump ( $Registration );
						$Registration->save ();
					}

					Yii::$app->session->SetFlash ( 'success' , 'Дані прийняті' );

					return $this->refresh ();
				} else {
					Yii::$app->session->SetFlash ( 'error' , 'Такий Email вже зареєстрований' );
				}
			} else {
				Yii::$app->session->SetFlash ( 'error' , 'Помилка' );
			}
		}

		$region = Region::find()->select(['name_region', 'region_id'])->indexBy('region_id')->column();

		return $this->render("index",compact(["region","Registration"]));
	}

    public function actionLogin()
    {
        $LoginModel = new Login();

        if ($LoginModel->load(Yii::$app->request->post())) {
            if ( $LoginModel->validate () ) {
               // var_dump($LoginModel->login);
                $user_hash  = Login::find()->select ( [ 'pass','id','type' ] )->AsArray()-> where ( [ 'login' => addslashes ($LoginModel->login)])->One();
                $ret = $user_hash["pass"];
                //var_dump($ret);
                if (isset($user_hash)){
                    //$ret = 1;
                    if (password_verify(md5($LoginModel->pass."GoodSaltU8Tf"), $user_hash["pass"])) {
                        if ($user_hash['type'] != null && $user_hash['id'] !=null ){
                            $_SESSION['user_type'] = $user_hash['type'];
                            $_SESSION['user_id'] = $user_hash['id'];
                            //$ret += 2 ;
                            return $this->redirect('/site/inlogin');
                        }
                      //  $ret += 3 ;
                    }else{
                        //$ret += 4 ;
                        $ret = "Помилка входу";
                    }
                }
            }
        }
        return($this->render("login",compact("ret","LoginModel")));
    }

    public function actionExit(){
        $session = Yii::$app->session;
        $session->remove('user_id');
        $session->remove('user_type');
        return $this->redirect('/');
    }

    public function actionPass() {

$str = "password";
    $hash = password_hash(md5($str."GoodSaltU8Tf"),PASSWORD_DEFAULT);

if (password_verify(md5($str."GoodSaltU8Tf"), $_SESSION['pass'])) {
    $res = "true";
}
else {
    $res = "false";
}
        return $this->render("pass",compact(["hash","res"]));
    }

}