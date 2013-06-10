<div class="float-right" style="margin: 10px 50px 0 0px; ">
<b>Сортировка по цене:</b>
<button id="Price4" onclick="searchRoom('Price',4)">&dArr;</button>
<button id="Price3" onclick="searchRoom('Price',3)">&uArr;</button>
</div>

<div style="margin: 10px 0px 0 10px">
<b>Сортировка по названию:</b>

<button id="Cat4" onclick="searchRoom('Cat',4)">&dArr;</button>
<button id="Cat3" onclick="searchRoom('Cat',3)">&uArr;</button>
</div>

<script>
$(function(){
    $("#list button").button();    
    $("#<?php echo $_POST['sort'].$_POST['d']?>").addClass("ui-state-focus");
});

function hoverIn(obj){
    $(obj).addClass("ui-state-focus");
}

function hoverOut(obj){
    if($(obj).attr('active')!="true")
        $(obj).removeClass("ui-state-focus");
}

</script>

<div class="price-disclaymer">* Цена за <b>весь период</b> проживания</div>
<div class="clear"></div>
<ul class='category-list'>

    <?php
    global $list;
    
    
    
    foreach ($list as $cat) {
        echo "<li id='cl-".$cat['RClass_ID']."' class='ui-corner-all  ui-widget-content' onmouseover='hoverIn(this)' onmouseout='hoverOut(this)'>
                <h3 class='ui-corner-top'><a href='".$cat['URL']."' target='_blank'>".$cat['Cat']." (Основных мест: ".$cat['QP'].", доп. мест: ".$cat['QPD'].")</a></h3> 
                <div class='taken-places'>Для резервирования основных мест: ".$cat['cQP'].", доп. мест: ".$cat['cQPD']."</div>
                <div class='list-price'>".$cat['Price']."грн</div></h3>
                <div class='right-buttons'>
                    <a href='".$cat['URL']."' class='show-category' target='_blank'>Посмотреть</a>
                    <button class='order' onclick='orderRoom(".$cat['RClass_ID'].",".$cat['Price'].",\"".$cat['Cat']."\")'>Заказать</button>
                </div>
                <br/>
                <p>".$cat['Descript']."</p>                
              </li>";
    }
    ?>
    
</ul>