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
    </div>
    <div class="col-md-6">
        <div class="form">
            <div class="form-group">
    </div>
        </div>
    </div>
</div>
<div class="card-deck">

    <?php if(isset($product)):?>
        <?php foreach ($product as $prod):?>
            <div class="card"><a class="card-body" href="/producer/statistic?id_pr=<?=$prod['id']?>"">
                <h5 class="card-title"><?=$prod['title']?></h5></a>
                <div class="card-footer"><a class="btn btn-info" role="button" href="/producer/statistic?id_pr=<?=$prod['id']?>" data-toggle="tooltip" title="Список мереж яким доступні матеріали">Пройти тест</a></div>
                <div class="card-footer"><small class="text-muted"><?=$prod['description']?></small></div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>
<div class="row">
<!--    <button class="btn btn-lg btn-primary mx-auto mb-4" type="button">Показати ще</button>-->
</div>
