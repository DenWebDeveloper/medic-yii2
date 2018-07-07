<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 04.06.2018
 * Time: 10:25
 */

use app\models\test;

//var_dump($test)
?>
<div class="card-deck">
    <div class="card">
        <a target="_blank" class="card-body" href="<?=$test['Doc']?>">
            <h5 class="card-title">Матеріали для поглиблення знань про цей тест можна знайти тут.</h5><br>
        </a>
        <h5 style="margin-left: 20px;margin-top: -20px"></h5>
        <div class="card-footer"><a class="btn btn-info" role="button" href="<?=$test['Doc']?>" data-toggle="tooltip" title="">Ознайомитися з матеріалами</a></div>
        <div class="card-footer"></div>
    </div>

    <div class="card"><a class="card-body" href="/user/intest?id_test=<?=$test['id']?>">
            <h5 class="card-title"><?=$test['description']?></h5><br>
            </a>
        <h5 style="margin-left: 20px;margin-top: -20px">Тест складається з <?=$test['number']?> питань.</h5>
        <div class="card-footer"><a class="btn btn-info" href="/user/intest?id_test=<?=$test['id']?>" >Пройти тест</a></div>
        <div class="card-footer">Тривалість тесту <?=$test['time']?> хвилин.</div>
    </div>
</div>
<!-- <div class="card"><a class="card-body" href="/user/test?id_pr=--><?//=$prod['id']?><!--">-->
<!--                <h5 class="card-title">--><?//=$prod['title']?><!--</h5></a>-->
<!--<div class="card-footer"><a class="btn btn-info" role="button" href="#" data-toggle="tooltip" title="Список мереж яким доступні матеріали">Пройти тест</a></div>-->
<!--                <div class="card-footer"><small class="text-muted">Останнє оновлення файлів ... днів тому</small></div>-->
<!--</div>-->