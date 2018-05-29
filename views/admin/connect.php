<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 29.05.2018
 * Time: 22:53
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
<?=$form->field($Connect, 'id_product')->label('Оберіть препарат')->dropDownList($product,['prompt'=>'Оберіть препарат'])?>
<?=$form->field($Connect, 'id_pharm')->label('Оберіть мережу')->dropDownList($firm,['prompt'=>'Оберіть мережу'])?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
    <!---->
<?php ActiveForm::end ()?>