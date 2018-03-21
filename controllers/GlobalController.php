<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 20.03.2018
 * Time: 18:32
 */

namespace app\controllers;

use app\models\City;
use app\models\Phar;
use app\models\Firm;
use app\models\Region;
use yii\web\Controller;
use Yii;

class GlobalController extends controller{

	public function actionIndex() {

		$Phar = Firm::find()->asArray()->All();
		$ret= null ;
		foreach($Phar as $phar) {
			$ret = $ret . "<option value=\"" . $phar[ "firm_id" ] . "\">" . $phar[ "name_firm" ] . "</option> \n";
		}

		$regionArr = Region::find()->asArray()->All();

		$region = null;

		foreach($regionArr as $reg) {
			$region = $region."<option value='".$reg["region_id"]."'>".$reg["name_region"]."</option> \n";
		}

		return $this->render("index",compact(["region","ret"]));
	}

	public function actionCity($region_id){
		$Phar = City::find()->asArray()->where( 'region_id = ' . $region_id)->All();
		$ret= null ;
		foreach($Phar as $phar) {
			$ret = $ret . "<option value=\"" . $phar[ "city_id" ] . "\">" . $phar[ "name_city" ] . "</option> \n";
		}
		return $ret;
	}

	public function actionPharm($city_id = 66 ,$firm_id =  1 ){

		$Phar = Phar::find()->asArray()->where( 'city_id = ' . $city_id)->All();
		$retu= null ;
		foreach($Phar as $phar) {
			$retu = $retu . "<option value=\"\">" . $phar[ "name_phar" ] . "</option> \n";
		}
		return $this->render("phar",compact("retu"));
	}

}