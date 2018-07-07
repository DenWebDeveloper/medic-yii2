<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 7:52
 */

?>
<div class="row">
    <div class="col-md-6 mb-4 position-sticky">
        <a class="btn btn-success mr-3" role="button" href="/admin/add_answer?id_question=<?=$question['id']?>" data-toggle="tooltip" title="Додати відповідь до даного запитання">Додати відповідь</a>
    </div>
</div>

<div class="container">
    <div class="alert alert-secondary" style="margin-top: 15px;">
        Тест : <?=$test['description']?>
    </div>
</div>

<div class="container">
    <div class="alert alert-secondary" style="margin-top: 15px;">
        Запитання : <?=$question['question']?>
    </div>
</div>

<?php
if (isset($answer)) {
    if ($answer == null) {
        echo '<div class="alert alert-warning" role="alert">';
        echo 'До цього запитання немає ще жодної відповіді.</div>';
    }
}

?>
<? if(isset($answer) && $answer != null):?>
<div class="container">
    <div class="alert alert-secondary" style="margin-top: 15px;">
        <table width="90%" >
            <tr>
                <th></th>
                <th>Відповідь</th>
                <th>Вірна/хибна</th>

            </tr>
            <?php foreach ($answer as $answ):?>
                <tr>
                    <th><?=$answ['id']?></th>
                    <th><?=$answ['answer']?></th>
                    <th><?php  if($answ['is_true'] == 0 ){
                        echo $answ['is_true'].'/Хибна';
                        }else{
                            echo $answ['is_true'].'/Вірна';
                        } ?></th>
                    <th><a href="#/admin/edit_test/<?=$answ['id']?>"> Редагувати</th>
                    <th><a href="#/admin/drop_test/<?=$answ['id']?>"> Видалити</th>
                </tr>
            <?php endforeach;?>

        </table>
    </div>
</div>
<? endif;?>