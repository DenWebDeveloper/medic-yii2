<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 18.04.2018
 * Time: 0:48
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
//echo $ret;
if ($ret!= null){
    echo "<div class=\"alert alert-danger\" role=\"alert\">";
echo $ret;
echo "</div>";
}
?>
<?php $form = ActiveForm::begin()?>
<?=$form->field($LoginModel,"login")?>
<?=$form->field($LoginModel,"pass")->passwordInput()?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
<?php $form = ActiveForm::end()?>
