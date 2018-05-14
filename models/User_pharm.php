<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 04.05.2018
 * Time: 21:08
 */

namespace app\models;

use yii\db\ActiveRecord;

class User_pharm extends ActiveRecord{

    public static function tableName(){
        return 'user_pharm_firm';
    }
}