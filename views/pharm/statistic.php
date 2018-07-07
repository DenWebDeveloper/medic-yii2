<?php
/**
 * Created by PhpStorm.
 * User: NeoN
 * Date: 15.06.2018
 * Time: 12:15
 */
?>
    <div class="container">
        <div class="alert alert-secondary" style="margin-top: 15px;">
            <table width="90%" >
                <tr>
                    <th>Id Косистувача</th>
                    <th>№ тесту</th>
                    <th>Результат</th>
                    <th>Дата</th>
                </tr>
                <?php foreach ($stat as $answ):?>
                    <tr>
                        <th><?=$answ['id_user_phar']?></th>
                        <th><?=$answ['description']?></th>
                        <th><?=$answ['mark'];?></th>
                        <th><?=$answ['date']?></th>
                    </tr>
                <?php endforeach;?>

            </table>
        </div>
    </div>
