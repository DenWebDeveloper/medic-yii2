<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 3:02
 */

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

<h2 class="medicine__title">Препарати</h2>
<div class="row">
    <div class="col-md-6 mb-4 position-sticky">
        <a class="btn btn-success mr-3" role="button" href="/admin/add_product" data-toggle="tooltip" title="Додати новий препарат">Додати препарат</a><a class="btn btn-success mr-3" role="button" href="/admin/add_connect" data-toggle="tooltip" title="Додати новий звязок між фірмою та мережею">Додати звязок</a>
<!--        <a class="btn btn-danger" role="button" href="#" data-toggle="tooltip" title="Переглянути статистику по всім доступним данним">Аналітика</a>-->
    </div>
    <div class="col-md-6">
        <div class="form">

        </div>
    </div>
</div>
<div class="card-deck">
    <?php if(isset($product)):?>
        <?php foreach ($product as $prod):?>
            <div class="card"><a class="card-body" href="/admin/test?id_pr=<?=$prod['id']?>">
                <h5 class="card-title"><?=$prod['title']?></h5></a>
                <div class="card-footer"><a class="btn btn-info" role="button" href="#" data-toggle="tooltip" title="Список мереж яким доступні матеріали">Пройти тест</a></div>
                <div class="card-footer"><small class="text-muted"><?=$prod['description']?></small>
                    </div>
                <a href="/admin/drop?id=<?=$prod['id']?>" align="center" style>X</a>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    <?php if(isset($alert)):?>
        <div class="alert alert-danger" role="alert">
            <?=  $alert?>
        </div>
    <?php endif;?>
</div>
<div class="row">
    <button class="btn btn-lg btn-primary mx-auto mb-4" type="button">Показати ще</button>
</div>

