HelloWorld

<button id="qwe" class="btn btn-success">click me ...</button>

<?php

$JS = <<<JS
$('#sel')[0].addEventListener('change',function (){
    $.ajax ({
        url: 'index.php?r=global/city',
        data:{region_id : $(this).val()},
        type : 'Get',
        success: function(res){
            // console.log(res);
           $('#sel2').append(res);
            //document.getElementById("sel2").textContent =res ;
            
        },
        error:     function (){
            alert("error");
        }
    })
});

$('#sel2')[0].addEventListener('change',function (){
    $.ajax ({
        url: 'index.php?r=global/pharm',
        data:{city_id : $(this).val(),firm_id : $('#select').val()},
        type : 'Get',
        success: function(res1){
            // console.log(res);
           alert(res1);
           $('#select2').append(res1);
            //document.getElementById("sel2").textContent =res ;
            
        },
        error:     function (){
            alert("error");
        }
    })
});
JS;

$this->registerJs($JS);

?>
<br>
<select id="sel">
<?=$region?>
</select>

<select id="select">
	<?=$ret?>
</select>

<select id="sel2"></select>
<br/>
<select id="select2"></select>

