<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 1:53
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    public $layout = 'global';

    public function privelegy()
    {
        if ($_SESSION['user_type'] != null) {
            if ($_SESSION['user_type'] == 'user') {
               // $session->set('user_name', $user["name"]);
                return 'user';
            }
            if ($_SESSION['user_type'] == 'pharm') {
                //$session->set('user_name', $user["name_firm"]);
                return 'pharm';
            }
            if ($_SESSION['user_type'] == 'firm') {
                // $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                return 'firm';
            }
            // admin
            if ($_SESSION['user_type'] == 'admin') {
                //$session->set('user_name', $session->get("admin_id"));
                // $user = RegistrationForm::find()->select(['name'])->asArray()->where(['user_id' => $session->get("user_id")])->One();
                return 'admin';
            }
            return $this->redirect('/global/exit');
        }else{
            return $this->redirect('/site');
        }
    }
}