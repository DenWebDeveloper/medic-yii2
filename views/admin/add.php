<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 28.05.2018
 * Time: 23:01
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

<?=$form->field($Product,'title')->label('Назва препарату')?>
<?=$form->field($Product,"description")->label('Опис препарату')?><!--<div class="g-recaptcha" data-sitekey="6Le_H1AUAAAAACGhLY9m0oXjwgD1AS0iEWH9giph"></div>-->
<?php //$form->field($Registration,"password_repeat")?>
<?=$form->field($Product, 'id_producer')->label('Оберіть виробника')->dropDownList($producer,['prompt'=>'Оберіть олбасть'])?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
    <!---->
<?php ActiveForm::end ()?>