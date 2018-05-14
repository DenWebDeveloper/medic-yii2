<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:29
 */

namespace app\controllers;


class PharmController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "pharm"){
            return $this->render('index');
        }else{
            return $this->redirect('/global/exit');
        }
    }
}