<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 1:55
 */

namespace app\controllers;
use app\models\Product;


class UserController extends AppController
{
    public function actionIndex()
    {
       if($this->privelegy() == "user"){

           $product  = Product::find()->select ( [ 'id','title','description' ] )->AsArray()->All();
           return $this->render('index',compact('product'));
       }else{
           return $this->redirect('/global/exit');
       }
    }

}