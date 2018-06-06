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
                    $product[$e] = Product::find()->select(['id','title','description'])->where(['id'=>$ph2['id_product']])->One();
                    $e++;
                }
                //var_dump($product);
                return $this->render('index',compact('product'));
            }else {
                $alert = "Ваша мережа ще не підписала договору з жодною фірмою!";
                return $this->render('index',compact('alert'));
            }
        }else{
            return $this->redirect('/global/exit');
        }
    }

    public function actionTest($id_pr){

        $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm'=>$_SESSION['id_firm_pharm']])->where(['and','id_product = '.$id_pr])->One();

        if ($ph != null){
            $product = null;
         //echo $ph['id_product'] ;
            return $this->render('test');
        }else {
            $alert = "У вашої мережі немає договору на цей препарат!    ";
            return $this->render('index',compact('alert'));
        }

    }

    public function actionHello () {
        if($this->privelegy() == "user") {
             echo 'hello';
        }
    }

}