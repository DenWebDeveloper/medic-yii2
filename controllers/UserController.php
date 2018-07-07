<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 1:55
 */

namespace app\controllers;
use app\models\Product;
use app\models\Connect;
use app\models\Test;
use app\models\Intest;
use app\models\Answer;
use app\models\Resul;
use Yii;


class UserController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "user"){

            $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm'=>$_SESSION['id_firm_pharm']])->All();

            if ($ph != null){
                $product = null;
                $e =0 ;
                foreach($ph as $ph2){
//                    $ph2['id_product'];
                    $product[$e] = Product::find()->select(['id','title','description'])->where(['id'=>$ph2['id_product']])->One();
                    $e++;
                }
                //var_dump($product);
                return $this->render('index',compact('product'));
            }else {
                $alert = "Ваша мережа ще не підписала договору з жодною фірмою!";
                return $this->render('index',compact('alert'));
            }
        }else{
            return $this->redirect('/global/exit');
        }
    }

    public function actionTest($id_pr){

        if ($_SESSION['test'] == null) {
            $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm' => $_SESSION['id_firm_pharm']])->where(['and', 'id_product = ' . $id_pr])->One();

            if ($ph != null) {
                $product = null;

                $test = test::find()->asArray()->where(['id_product' => $id_pr])->One();

                return $this->render('test', compact('test'));
            } else {
                $alert = "У вашої мережі немає договору на цей препарат!    ";
                return $this->render('index', compact('alert'));
            }
        }else{
            $this->redirect('/user/intest?id_question=');
        }
    }

    public function actionIntest($id_test=null,$id_question = null){

        $Resul = new Resul;

        if ( $Resul->load ( Yii::$app->request->post ())){
            if ($_SESSION['lasttime'] > time()) {
            $Resul->question =  $_SESSION['arr'][$id_question-1]['id'];
            $istrue = Answer::find()->select('is_true')->asArray()->where(['id_question' => $Resul->question])->where(['and', 'id = ' . $Resul->answer])->One();
            if ($istrue['is_true'] == 1){
                $answer['is_true'] = true;
                $_SESSION['ident']++;
                Yii::$app->session->SetFlash ( 'success' , 'Відповідь вірна !' );
            } else {
                $answer['is_true'] = false ;
                Yii::$app->session->SetFlash ( 'error' , 'Не вірна відповідь' );
            }
            if(!is_array($_SESSION['answer'])){
                $_SESSION['answer'] = [];
            }

            $answer['id_question'] = $_SESSION['arr'][$id_question-1]['id'];
            $answer['id_answer'] = $Resul->answer;

            array_push($_SESSION['answer'],$answer);
            array_splice($_SESSION['arr'], $id_question-1, 1);

            }else{
               return $this->redirect('/user/exi');
            }
            return $this->refresh ();
        }

        if ($_SESSION['lasttime'] == null) {
            $id_pr = test::find()->select(['id_product', 'number', 'time'])->where(['id' => $id_test])->asArray()->One();

            if ($id_pr['id_product'] != null) {
                $ph = Connect::find()->select('id_product')->asArray()->where(['id_pharm' => $_SESSION['id_firm_pharm']])->where(['and', 'id_product = ' . $id_pr['id_product']])->One();
            }
            if (isset($ph)) {
                $product = null;

                $intest = Intest::find()->asArray()->where(['id_test' => $id_test])->All();

                $_SESSION['arr'] = [];
                $_SESSION['lasttime'] = time() + (60 * $id_pr['time']);
                $_SESSION['test'] = $id_test;

                for ($i = 0; $i < $id_pr ['number']; $i++) {
                    $rand = rand(0, count($intest) - 1);
                    array_push($_SESSION['arr'], $intest[$rand]);
                    array_splice($intest, $rand, 1);
                }

                return $this->refresh('&id_question=1');
            } else {
                $alert = "У вашої мережі немає договору на цей препарат!    ";
                return $this->render('index', compact('alert','Resul'));
            }
        }else{
            if ($id_question==null || $id_question > count($_SESSION['arr'])|| $id_question < 1) {
                if (count($_SESSION['arr'])>0) {
                    $id_question = 1;
                }else{
                    $this->redirect('/user/exi');
                }
            }

            $question = $_SESSION['arr'][$id_question-1]['question'];

            $answer = answer::find()->where(['id_question'=> $_SESSION['arr'][$id_question-1]['id']])->asArray()->All();

            return $this->render('intest',compact('question','answer','Resul'));
        }

    }

    public function actionExi(){
       // var_dump($_SESSION['answer']);
        $_SESSION['test'] = null;
        $_SESSION['lasttime'] = null;
        $_SESSION['arr'] = null;
        $_SESSION['answer'] = null;
        $_SESSION['ident'] = null;
    return $this->redirect('/user');
    }
}