<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:29
 */

namespace app\controllers;
use app\models\Connect;
use app\models\Product;

class PharmController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "pharm"){

            $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm'=>$_SESSION['id_firm_pharm']])->All();

            if ($ph!== null){
                $product = null;
                $e =0 ;
                foreach($ph as $ph2){
//                    $ph2['id_product'];
                    $product[$e] = Product::find()->select(['id','title','description'])->where(['id_producer'=>$ph2['id_product']])->One();
                    $e++;
                }
                return $this->render('index',compact('product'));
            }else {
                return $this->render('index',compact('product'));
            }
        }else{
            return $this->redirect('/global/exit');
        }
    }
}