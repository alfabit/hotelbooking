<ul class='service-list'>

    <?php
    global $service_price;

    foreach ($service_price as $s) {
        echo "<li id='service-".$s['Good_ID']."' class='ui-corner-all  ui-widget-content'>
                <h3 class='ui-corner-top'><a>".$s['GoodName']."</a>                    
                <div class='list-price'>".$s['Price']."грн/".$s['DimName']."</div></h3>                
                <button class='order' onclick='orderService(".$s['Good_ID'].")'>Заказать</button>                
              </li>";
    }
    ?>
    
</ul>