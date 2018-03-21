<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 21.03.2018
 * Time: 19:42
 */

namespace app\models;


use yii\db\ActiveRecord;

class Phar extends ActiveRecord {

	public static function tableName(){
		return 'list_pharmacy';
	}

}