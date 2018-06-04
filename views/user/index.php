<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 14.05.2018
 * Time: 2:14
 */

?>


<h2 class="medicine__title">Препарати</h2>
<div class="row">
</div>
<div class="card-deck">

    <?php if(isset($product)):?>
        <?php foreach ($product as $prod):?>
            <div class="card"><a class="card-body" href="<?=$prod['id']?>"">
                <h5 class="card-title"><?=$prod['title']?></h5></a>
                <div class="card-footer"><a class="btn btn-info" role="button" href="#" data-toggle="tooltip" title="Список мереж яким доступні матеріали">Пройти тест</a></div>
                <div class="card-footer"><small class="text-muted">Останнє оновлення файлів ... днів тому</small></div>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    <?php if(isset($alert)):?>
        <div class="alert alert-danger" role="alert">
            <?=  $alert?>
        </div>
    <?php endif;?>

<div class="row">
<!--    <button class="btn btn-lg btn-primary mx-auto mb-4" type="button">Показати ще</button>-->
</div>
