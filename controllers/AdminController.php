<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:31
 */

namespace app\controllers;


class AdminController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "admin"){
            return $this->render('index');
        }else{
            return $this->redirect('/global/exit');
        }
    }
}