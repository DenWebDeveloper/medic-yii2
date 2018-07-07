<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 9:23
 */


use yii\widgets\ActiveForm;
use yii\helpers\Html;
//echo '<h1>add product</h1>';


if(Yii::$app->session->hasFlash ('success')):?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash ('success')?>
    </div>
<?php endif;?>

<?php if(Yii::$app->session->hasFlash ('error')):?>
    <div class="alert alert-danger" role="alert">
        <?=  Yii::$app->session->getFlash ('error')?>
    </div>
<?php endif;?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($Answer,"answer")->label('Текст відповіді')?><!--<div class="g-recaptcha" data-sitekey="6Le_H1AUAAAAACGhLY9m0oXjwgD1AS0iEWH9giph"></div>-->
<?=$form->field($Answer,'is_true')->label('Відповідь вірна ? 1 - якщо так /0 - якщо ні')?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
    <!---->
<?php ActiveForm::end ()?>