<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:29
 */

namespace app\controllers;
use app\models\Connect;
use app\models\List_user;
use app\models\Product;
use app\models\Test;
use app\models\Test_stat;

class PharmController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "pharm"){

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

    public function actionStatistic()
    {
        if ($this->privelegy() == "pharm") {

            $stat = test_stat::find()->asArray()->all();

            $e = 0;
            foreach($stat as $sta){
                $val = test::find()->select('description')->where(['id'=> $sta['id_test']])->asArray()->One();

                $val2 = List_user::find()->select();
                $stat[$e]['description'] = $val['description'];
              //  echo $stat[$e]['description'].'<br>' ;
                $e++;
            }

            return $this->render('statistic',compact('stat'));
        }
    }
}