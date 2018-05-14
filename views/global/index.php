<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$JS = <<<JS

//
// select city with region
//

$('#registrationform-region')[0].addEventListener('change',function (){
    $.ajax ({
        url: '/ajax/city',
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
        url: '/ajax/firm',
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
        url: '/ajax/pharm',
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

<?=$form->field($Registration, 'region')->label('Оберіть область')->dropDownList($region,['prompt'=>'Оберіть олбасть'])?>
<?=$form->field($Registration, 'city')->label('Оберіть населений пункт')->dropDownList ([],['prompt'=>'Оберіть місто','disabled'=>'true'])?>
<?=$form->field($Registration, 'firm_pharmacy')->label('Оберіть мережу аптек')->dropDownList ([],['prompt'=>'Оберіть мережу аптек','disabled'=>'disabled'])?>
<?=$form->field($Registration, 'Id_phar')->label('Оберіть аптеку')->dropDownList ([],['prompt'=>'Оберіть аптеку','disabled'=>'true'])?>
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

