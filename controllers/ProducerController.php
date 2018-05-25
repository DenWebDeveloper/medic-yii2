<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:30
 */

namespace app\controllers;

use app\models\Product;

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
}