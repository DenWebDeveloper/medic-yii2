<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 12:15
 */
?>
<?php if (isset($error)):?>
    <div class="alert alert-danger" role="alert">
        <?= $error?>
    </div>
<?php elseif(!isset($error)):?>
    <div class="container">
        <div class="alert alert-secondary" style="margin-top: 15px;">
            <table width="90%" >
                <tr>
                    <th>ПІО користувача</th>
                    <th>Назва тесту</th>
                    <th>Результат</th>
                    <th>Дата</th>
                </tr>
                <?php foreach ($stat as $answ):?>
                    <tr>
                        <th><?=$answ['fullname']?></th>
                        <th><?=$answ['description']?></th>
                        <th><?=$answ['mark'];?></th>
                        <th><?=$answ['date']?></th>
                    </tr>
                <? endforeach;?>

            </table>
        </div>
    </div>
<?php endif;?>
