<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:31
 */

namespace app\controllers;
use app\models\Firm;
use app\models\Connect;
use app\models\Product;
use app\models\Producer;
use Yii;

class AdminController extends AppController
{
    public function actionIndex()
    {
        if($this->privelegy() == "admin"){
                        $product = Product::find()->select(['id','id_producer','title','description'])->all();
                        foreach ($product as  $prod){
                            $e = 0;
                            if ($prod['id_producer'] != NULL){
                            $producer[$e]['id_producer'] = Producer::find()->select('')->asArray()     ;
                                $e++;
                            }
                        }
            return $this->render('index',compact('product'));
        }else{
            return $this->redirect('/global/exit');
        }
    }

    public function actionAdd_product()
    {
        if ($this->privelegy() == "admin") {
            $Product = new Product();


//        var_dump($Product->title);
            if ($Product->load(Yii::$app->request->post())) {
//           var_dump($Product->title);
                if ($Product->validate()) {
                    $Product->save();
                    Yii::$app->session->SetFlash('success', 'Дані прийняті');
                    return $this->redirect('/' . $_SESSION['user_type']);
                } else {
                    Yii::$app->session->SetFlash('error', 'Помилка');
                }
            }
//            Yii::$app->session->SetFlash('success', 'Дані прийняті');


            $producer = Producer::find()->select(['name', 'id'])->indexBy('id')->column();

            return $this->render("add", compact('Product', 'producer'));
        }
    }

    public function actionAdd_connect()
    {
        if($this->privelegy() == "admin") {
            $Connect = new Connect();


//        var_dump($Product->title);
            if ($Connect->load(Yii::$app->request->post())) {
//           var_dump($Product->title);
                if ($Connect->validate()) {
//                    $Connect->save();
                    Yii::$app->session->SetFlash('success', 'Дані прийняті');
                    return $this->redirect('/' . $_SESSION['user_type']);
                } else {
                    Yii::$app->session->SetFlash('error', 'Помилка');
                }
            }
//            Yii::$app->session->SetFlash('success', 'Дані прийняті');


            $product = Product::find()->select(['description', 'id'])->indexBy('id')->column();
            $firm = Firm::find()->select(['name_firm', 'firm_id'])->indexBy('firm_id')->column();

            return $this->render("connect", compact('Connect', 'product','firm'));
        }

    }

    public function actionDrop($id)
    {
        if($this->privelegy() == "admin") {
            if ($id != NULL){

                $product = Product::findOne($id);
                $product->delete();
                Yii::$app->session->setFlash ('success',"Данні видалено!");
            }
        }
        return $this->redirect('/' . $_SESSION['user_type']);
    }
}