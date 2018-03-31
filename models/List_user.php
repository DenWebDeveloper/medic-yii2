<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 30.03.2018
 * Time: 11:05
 */

namespace app\models;


use yii\db\ActiveRecord;

class List_user extends ActiveRecord {

	public static function tableName(){
		return 'user';
	}
}