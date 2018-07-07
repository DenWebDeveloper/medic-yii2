<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 10.06.2018
 * Time: 12:56
 */

namespace app\models;


use yii\db\ActiveRecord;

class Intest extends ActiveRecord
{

    public static function tableName(){
        return 'question';
    }
}