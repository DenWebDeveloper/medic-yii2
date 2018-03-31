<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 20.03.2018
 * Time: 18:32
 */

namespace app\controllers;

use app\models\City;
use app\models\List_user;
use app\models\Phar;
use app\models\Firm;
use app\models\Region;
use yii\web\Controller;
use Yii;
use app\models\RegistrationForm;

class GlobalController extends controller{

	public function actionIndex() {

		$Registration = new RegistrationForm();

		if ( $Registration->load ( Yii::$app->request->post () ) ){
			if ( $Registration->validate () ) {

				$list_users = new List_user();
				$list_user  = List_user::find ()->where ( [ 'login' => $Registration->email ] )->count ();

				if ( $list_user < 1 ) {
					$list_users->login = $Registration->email;
					$list_users->pass  = $Registration->password;
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

	public function actionCity($region_id){
		$Phar = City::find()->asArray()->where( 'region_id = ' . $region_id)->All();
		$ret= null ;
		foreach($Phar as $phar) {
			$ret = $ret . "<option value=\"" . $phar[ "city_id" ] . "\">" . $phar[ "name_city" ] . "</option> \n";
		}
		return $ret;
	}

	public function actionPharm($city_id  = null,$firm_id = Null  ){

		if ($city_id!=null && $firm_id!=null) {
			$Phar = Phar::find ()->asArray ()->where ( [ 'city_id' => $city_id , 'firm_id' => $firm_id ] )->All ();
			$retu = null;
			foreach ( $Phar as $phar ) {
				$retu = $retu . "<option value=\"".$phar["phar_id"]."\">" . $phar[ "name_phar" ] . "</option> \n";
			}

			return $retu;
		}
		//return $this->render("phar",compact("retu"));
	}

	public function actionFirm($city_id = null){

		if ($city_id!=null) {
			$Phar = Phar::find ()->asArray ()->where ( [ 'city_id' => $city_id ] )->All ();
			$retu = array();
			foreach ( $Phar as $phar ) {
				if (!in_array( $phar["firm_id"], $retu )){
					array_push ($retu , $phar["firm_id"]);
				}
			}

			$Firm = Firm::find ()->asArray ()->All ();

			$return = null ;
			foreach ($Firm as $value){
				if(in_array($value["firm_id"],$retu)){
					$return = $return."<option value=\"".$value["firm_id"]."\">".$value["name_firm"]."</option> \n";
				}
			}
			//var_dump ($return);

			return $return;
		}
		//return $this->render("phar",compact("retu"));
	}

}