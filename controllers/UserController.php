<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 1:55
 */

namespace app\controllers;
use app\models\Product;
use app\models\Connect;



class UserController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "user"){

            $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm'=>$_SESSION['id_firm_pharm']])->All();

            if ($ph != null){
                $product = null;
                $e =0 ;
                foreach($ph as $ph2){
//                    $ph2['id_product'];
                    $product[$e] = Product::find()->select(['id','title','description'])->where(['id_producer'=>$ph2['id_product']])->One();
                    $e++;
                }
                return $this->render('index',compact('product'));
            }else {
                $alert = "Ваша мережа ще не підписала договору з жодною фірмою!";
                return $this->render('index',compact('alert'));
            }
        }else{
            return $this->redirect('/global/exit');
        }
    }

    public function actionHello () {
        if($this->privelegy() == "user") {
             echo 'hello';
        }
    }

}