<?php
    $cat = $_GET['cat'];
    $cat_qa = $_GET['qa'];
    $cat_qc = $_GET['qc'];
    $dfrom = $_GET['dfrom'];
    $dto = $_GET['dto'];
    $price = $_GET['p'];
    $name = $_GET['name'];
    
?>
<script>

    $(function(){
       
    });
    
    
</script>

<style>
    #resident-info{
        display: none;
    }
    
    #resident-info .ri-header{
        font-weight: bold;
        
    }
    
    .col-fio{
        float:left;
        width:400px;
    }
    
    .col-fio input{
        width:370px;
    }
    
    .col-passport{
        float:left;
        width:200px;
    }
    
    .col-passport input{
        width:170px;
    }
    
    .col-bith{
        float:left;
        width:200px;
    }
</style>

<input type="hidden" id="bron_qadult" value="<?php echo $cat_qa?>"/>
<input type="hidden" id="bron_qchild" value="<?php echo $cat_qc?>"/>
<input type="hidden" id="bron_dfrom" value="<?php echo dateRead($dfrom)?>"/>
<input type="hidden" id="bron_dto" value="<?php echo dateRead($dto)?>"/>
<input type="hidden" id="bron_cat" value="<?php echo $cat?>"/>



<div>
    <div class="ui-corner-bottom ui-widget ui-widget-content" style="padding:10px;">        
        <img src ="images/info.png" class="float-left" width="100" style="margin-right:10px;"/>
        <p>Бронирование номера <b>"<?php echo $name?>"</b> c <b><?php echo $dfrom?></b> по <b><?php echo $dto?></b>.</p>
        <p>Количество гостей: <b><?php echo $cat_qa?></b>(взрослых), <b><?php echo $cat_qc?></b>(детей). </p>
        <p>Всего: <b><?php echo $price?>грн.</b></p>
            <h4></h4>
        </div>
    
    <div id="resident-info">
        <h4>Информация о гостях: *</h4>
        
        <div class="ri-header">
            <div class="col-fio">ФИО</div>
            <div class="col-passport">Паспорт</div>
            <div class="col-birth">Дата рождения</div>
        </div>
        
        <div>
            <div class="col-fio"><input type="text" id="ri-fio-0" value="<?php echo $_SESSION['KontrName']?>"/></div>
            <div class="col-passport"><input type="text" id="ri-passport-0" value="<?php echo $_SESSION['Passport']?>"/></div>
            <div class="col-birth"><input type="text" id="ri-birth-0" value="<?php echo $_SESSION['birth']?>"/></div>  
        </div>
    <?php
        for($i=1;$i<$cat_qa+$cat_qc;$i++){?>

        <div>
            <div class="col-fio"><input type="text" id="ri-fio-<?php echo $i?>"/></div>
            <div class="col-passport"><input type="text" id="ri-passport-<?php echo $i?>"/></div>
            <div class="col-birth"><input type="text" id="ri-birth-<?php echo $i?>"/></div>  
        </div>

        <?php            
        }
    ?>
        <p class="float-right">(* Необходимо указать хотябы одного гостя.)</p>
    </div>
    
    <div id="service-list"></div>
</div>