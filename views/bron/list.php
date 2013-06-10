<?php
    global $list;
?>

<script>
    $(function(){
        $("#cart-content button").button();
    });
    
</script>    

<style>
    .bron-head{
        font-weight: bold;
        font-size: 12pt;
    }
    .bron-item{
        padding:10px;
        margin: 5px;
    }
</style>

<div id="cart-content">
<?php
foreach($list as $bron){

    echo '<div class="bron-item ui-widget ui-widget-content ui-corner-all" >';
        

            echo "<div class='bron-head'>";
            if($bron['FL_Sch']=='false'){
                echo "<input type='checkbox' id='bron-".$bron['Doc_ID']."' bron='".$bron['Doc_ID']."'/>".$bron['AttrValue'];
            }else{
                echo $bron['AttrValue']." (<a href='#' onclick='showInvoice(".($bron['ID_Sch']-1).");return false;'>Счёт №".$bron['N_Sch']."</a>)";
            }
            echo
            "</div>
            <p>Бронь №".$bron['Doc_ID']."</p>
            <p>С <b>".$bron['DocDate']."</b> по <b>".$bron['DocDateTo']."</b></p>
            <p>К оплате: <b>".$bron['SumDolg']."грн.</b></p>
            ";

        
    echo '</div>';

}
?>
   
</div>
