<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 8:22
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

<?=$form->field($Test,"description")->label('Назва тесту')?><!--<div class="g-recaptcha" data-sitekey="6Le_H1AUAAAAACGhLY9m0oXjwgD1AS0iEWH9giph"></div>-->
<?=$form->field($Test,'number')->label('Кількість запитань')->textInput(['type' => 'number'])?>
<?=$form->field($Test,'time')->label('Максимальний час проходження тесту')->textInput(['type' => 'number'])?>
<?//=$form->field($Test,'date')->label('')->textInput(['type' => 'date'])?>
<?=$form->field($Test,'Doc')->label('Посилання на джерело з інформацією про препарат')?>
<?php //$form->field($Registration,"password_repeat")?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
    <!---->
<?php ActiveForm::end ()?>