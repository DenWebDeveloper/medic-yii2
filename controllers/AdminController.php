<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:31
 */

namespace app\controllers;
use app\models\Product;


class AdminController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "admin"){
                        $product = Product::find()->select(['id','title','description'])->all();
            return $this->render('index',compact('product'));
        }else{
            return $this->redirect('/global/exit');
        }
    }
}