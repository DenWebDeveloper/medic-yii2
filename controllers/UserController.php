<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 1:55
 */

namespace app\controllers;


class UserController extends AppController
{
    public function actionIndex()
    {
       if($this->privelegy() == "user"){
           return $this->render('index');
       }else{
           return $this->redirect('/global/exit');
       }
    }

}