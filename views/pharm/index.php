<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:57
 */

?>

<h2 class="medicine__title">Препарати</h2>
<div class="row">
    <div class="col-md-6 mb-4 position-sticky">
        <button class="btn btn-success mr-3" type="button" data-toggle="tooltip" title="Переглянути список усіх доступних мереж">Список мереж</button><a class="btn btn-danger" role="button" href="#" data-toggle="tooltip" title="Переглянути статистику по всім доступним данним">Аналітика</a>
    </div>
    <div class="col-md-6">
        <div class="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Введіть назву препарату"><small class="text-muted">Пошук результатів буде по всіх прератах навіть якщо їх не видно на даний час у списку</small>
            </div>
        </div>
    </div>
</div>
<div class="card-deck">

    <?php if($product != null):?>
    <?php foreach ($product as $prod):?>
        <div class="card"><a class="card-body" href="<?=$prod['id']?>"">
            <h5 class="card-title"><?=$prod['title']?></h5></a>
            <div class="card-footer"><a class="btn btn-info" role="button" href="#" data-toggle="tooltip" title="Список мереж яким доступні матеріали">Пройти тест</a></div>
            <div class="card-footer"><small class="text-muted">Останнє оновлення файлів ... днів тому</small></div>
        </div>
    <?php endforeach;?>
    <?php endif;?>

    <?php if($alert != null):?>
    <div class="alert alert-danger" role="alert">
        <?=  $alert?>
    </div>
    <?php endif;?>

</div>
<div class="row">
    <button class="btn btn-lg btn-primary mx-auto mb-4" type="button">Показати ще</button>
</div>
