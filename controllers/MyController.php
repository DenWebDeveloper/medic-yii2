<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.03.2018
 * Time: 11:00
 */

namespace app\controllers;


use yii\web\Controller;

class MyController extends Controller {

	Public function actionIndex ($id = null)
	{
		if (!$id)
		{
			$id = "test";
		}
		$hi = "hello world hi hi";
		$arr = ["name","surname"];
		return $this->render("index",["hello"=>$hi,"array"=>$arr,"user_id"=>$id]);
	}
}