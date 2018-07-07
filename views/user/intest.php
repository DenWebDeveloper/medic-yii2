<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 10.06.2018
 * Time: 13:03
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

//var_dump($_SESSION['answer']);
echo $_SESSION['lasttime']." ".time()."<br>";
if ($_SESSION['ident'] == null){
    echo "0";
}
echo $_SESSION['ident']."/".count($_SESSION['answer'])."<br>";
if(Yii::$app->session->hasFlash ('success')):?>
    <div class="alert alert-success" role="alert">
        <?= Yii::$app->session->getFlash ('success')?>
    </div>
<?php endif;?>

<?php if(Yii::$app->session->hasFlash ('error')):?>
    <div class="alert alert-danger" role="alert">
        <?=  Yii::$app->session->getFlash ('error')?>
    </div>
<?php endif;


if (isset($question)){
    echo $question;
}

if (isset($answer)) {
    echo '<br>';
    echo '<br>';
    $form = ActiveForm::begin();
    foreach ($answer as $answ) {
        echo  $form->field($Resul, 'answer')->radio(['label' => $answ['answer'], 'value' => $answ['id'], 'uncheck' => null]);
    }
    echo Html::submitButton ("Відправити", ['class' => "btn btn-success"]);
     ActiveForm::end ();
//        echo '<a class="btn btn-info  btn-outline-success" role="button" href="/user/" data-toggle="tooltip" >Відповісти</a>';
//var_dump($_SESSION['arr']);
}

$e = 0 ;
echo '<nav aria-label="..." style="margin-top: 20px"><ul class="pagination pagination-mg ">';
foreach($_SESSION['arr'] as $inte){
    $e++;

    echo '
    <li class="page-item ">
      <a class="page-link" href="/user/intest/?id_question='.$e.'" tabindex="-1">'.$e.'</a>
    </li>
  ';
    // echo '<a href="/user/intest/?id_question='.$e.'">'.$e.'</a>';
    // echo $inte['question'];
    echo" ".' '.' '.' ';
}
echo '<a class="btn btn-info btn-outline-danger" style="margin-left: 20px" role="button" href="/user/exi" data-toggle="tooltip" >Завершити тест</a>
</ul>
</nav>';
