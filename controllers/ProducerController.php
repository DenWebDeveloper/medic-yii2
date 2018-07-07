<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:30
 */

namespace app\controllers;

use app\models\Product;
use app\models\RegistrationForm;
use app\models\Test_stat;
use app\models\Test;
use app\models\User_pharm;

class ProducerController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "firm"){
            $product = Product::find()->select( [ 'id','title','description' ] )->where(['id_producer' => $_SESSION['producer_id']])->AsArray()->All();

            return $this->render('index',compact('product'));
        }else{
            return $this->redirect('/global/exit');
        }
    }

    public function actionStatistic($id_pr)
    {
        if ($this->privelegy() == "firm") {

            $stat = test_stat::find()->where(['id_product' => $id_pr])->asArray()->all();

            if ($stat[0]['id_product'] == null){
                $error = "Тест на цей препарат ще не пройдено";
                echo $stat['id_product'];
            }

            $e = 0;
            foreach($stat as $sta){
                $val = test::find()->select('description')->where(['id'=> $sta['id_test']])->asArray()->One();

                $val2 = RegistrationForm::find()->asArray()->where(['user_id'=>$sta['id_user_phar']])->One();

                //var_dump($val2);
                $val3 = $val2['surname'].' '.$val2['name'].' '.$val2['secondname'];
                $stat[$e]['description'] = $val['description'];
                $stat[$e]['fullname'] = $val3;
               // echo $stat[$e]['description'].'<br>' ;
                $e++;
            }
            return $this->render('statistic',compact('stat','error'));
        }
    }
}