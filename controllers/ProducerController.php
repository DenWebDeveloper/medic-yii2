<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:30
 */

namespace app\controllers;


class ProducerController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "firm"){
            return $this->render('index');
        }else{
            return $this->redirect('/global/exit');
        }
    }
}