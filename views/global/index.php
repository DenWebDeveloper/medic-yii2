<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$JS = <<<JS

//
// select city with region
//

$('#registrationform-region')[0].addEventListener('change',function (){
    $.ajax ({
        url: 'index.php?r=ajax/city',
        data:{region_id : $(this).val()},
        type : 'Get',
        success: function(res){
            // console.log(res);
           $('#registrationform-city').append(res);
           document.getElementById("registrationform-city").disabled = false;
            //document.getElementById("sel2").textContent =res ;

        },
        error:     function (){
            alert("error");
        }
    })
});

//
// select firm with city
//
$('#registrationform-city')[0].addEventListener('change',function (){
    $.ajax ({
        url: 'index.php?r=ajax/firm',
        data:{city_id : $(this).val()},
        type : 'Get',
        success: function(res1){
            // console.log(res);
          // alert(res1);
           $('#registrationform-firm_pharmacy').append(res1);
           document.getElementById("registrationform-firm_pharmacy").disabled = false;
            //document.getElementById("sel2").textContent =res ;

        },
        error:     function (){
            alert("error");
        }
    })
});

$('#registrationform-firm_pharmacy')[0].addEventListener('change',function (){
    $.ajax ({
        url: 'index.php?r=ajax/pharm',
        data:{city_id : $('#registrationform-city').val(),firm_id : $(this).val()},
        type : 'Get',
        success: function(res1){
            // console.log(res);
          // alert(res1);
           $('#registrationform-id_phar').append(res1);
           document.getElementById("registrationform-id_phar").disabled = false;
           //alert(res1);
            //document.getElementById("sel2").textContent =res ;

        },
        error:     function (){
            alert("error");
        }
    })
});
JS;

$this->registerJs($JS);
?>

<?php if(Yii::$app->session->hasFlash ('success')):?>
	<?= Yii::$app->session->getFlash ('success')?>
<?php endif;?>

<?php if(Yii::$app->session->hasFlash ('error')):?>
	<?=  Yii::$app->session->getFlash ('error')?>
<?php endif;?>
<?php $form = ActiveForm::begin()?>

<?=$form->field($Registration, 'region')->dropDownList($region,['prompt'=>'Виберіть олбасть'])?>
<?=$form->field($Registration, 'city')->dropDownList ([],['prompt'=>'Виберіть місто','disabled'=>'true'])?>
<?=$form->field($Registration, 'firm_pharmacy')->dropDownList ([],['prompt'=>'Виберіть мережу аптек','disabled'=>'disabled'])?>
<?=$form->field($Registration, 'Id_phar')->dropDownList ([],['prompt'=>'Виберіть аптеку','disabled'=>'true'])?>
<?=$form->field($Registration,'secondname')?>
<?=$form->field($Registration,"name")?>
<?=$form->field($Registration,"surname")?>
<?=$form->field($Registration,"phone")?>
<?=$form->field($Registration,"email")?>
<?=$form->field($Registration,"password")->passwordInput()?>
<!--<div class="g-recaptcha" data-sitekey="6Le_H1AUAAAAACGhLY9m0oXjwgD1AS0iEWH9giph"></div>-->
<?php //$form->field($Registration,"password_repeat")?>
<?=Html::submitButton ("Відправити", ['class' => "btn btn-success"])?>
<!---->
<?php ActiveForm::end ()?>

