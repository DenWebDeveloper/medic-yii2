<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 21.04.2018
 * Time: 15:59
 */

namespace app\controllers;
use app\models\Phar;
use app\models\Firm;
use app\models\City;
use yii\web\Controller;

class AjaxController extends Controller
{
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
            $Phar = Phar::Find()-> select(['firm_id']) -> distinct()-> asArray ()->where ( [ 'city_id' => $city_id ] )->All ();
            $retu = array();
            foreach ( $Phar as $phar ) {
                array_push ($retu , $phar["firm_id"]);
            }

            //var_dump($retu);
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