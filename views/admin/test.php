<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 10.06.2018
 * Time: 13:03
 */


 if (isset($question)){
    echo '<div class="row">
    <div class="col-md-6 mb-4 position-sticky">
        <a class="btn btn-success mr-3" role="button" href="/admin/add_question" data-toggle="tooltip" title="Додати запитання">Додати запитання</a>
    </div>
</div>';

 echo '<div class="container">
            <div class="alert alert-secondary" style="margin-top: 15px;">
                Тест : '.$test['description'].'
            </div>
       </div>';

    echo '
    <div class="container">
    <div class="alert alert-secondary" style="margin-top: 15px;">
        <table width="90%" >
            <tr>
                <th>№</th>
                <th>Запитання</th>

            </tr>';
             foreach ($question as $answ):?>
                <tr>
                    <th><?=$answ['id']?></th>
                    <th><a href="/admin/question?id_question=<?=$answ['id']?>"><?=$answ['question']?></a></th>
                    <th><a href="#/admin/edit_test/<?=$answ['id']?>"> Редагувати</th>
                    <th><a href="#/admin/drop_test/<?=$answ['id']?>"> Видалити</th>
                </tr>
            <?php endforeach;?>

        </table>
    </div>
</div>
<?php

    if ($question == null){
        echo '<div class="alert alert-warning" role="alert">';
        echo 'До цього тесту немає ще жодного запитання. <br> але ви можете додати його <a href="#add quest">тут</a></div>';
    }
}else{
    echo '<div class="alert alert-warning" role="alert">';
    echo 'До цього препарату ще не створено тест <br> але ви можете створити його <a href="/admin/add_test?id_pr='.$id_pr.'">тут</a></div>';
}
////var_dump($_SESSION['arr']);


?>


