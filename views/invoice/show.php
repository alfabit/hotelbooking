<?php
    global $invoice;
    global $rekviz;
    
    function formatDate($d){
        $date = new DateTime($d);
        return $date->format('d.m.Y');        
    }
    
    function formatMoney($money){
         return sprintf("%01.2f", $money);
    }
?>
<div id="invoice-view">
    <style>
        table{
            width:100%;
            border: 1px solid lightgray;

        }
        th{
            background-color: #eeeeee;
            font-weight: bold;
            border-bottom: 1px solid lightgray;
        }
        td{
            border-left: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            text-align: right;
            padding-left: 10px;
            padding-right: 10px;
        }


        .align-left{
            text-align:left;
        }
    </style>
    <div style="padding: 50px; background-color: white">
        <h4><?php echo $rekviz[0]['KontrName']?></h4>
        <h5>р/р:<?php echo $rekviz[0]['F4']?>, МФО: <?php echo $rekviz[0]['F5']?></h5>
        <h5>Код ЕДРПОУ: <?php echo $rekviz[0]['F6']?>, ИНН:<?php echo $rekviz[0]['F7']?>, св.№ <?php echo $rekviz[0]['F8']?></h5>
        <p>Адресс: <?php echo $rekviz[0]['F']?></p>
        <p>Тел.: <?php echo $rekviz[0]['F1']?>, факс: <?php echo $rekviz[0]['F2']?>, e-mail:<?php echo $rekviz[0]['F3']?></p>
        <br/>
        <p>Тип платежа: <?php echo $invoice[0]['PayTName']?></p>
        <p>Плательщик: <?php echo $invoice[0]['KontrName']?></p>

        <div style="text-align: center;font-weight: bold; font-size: 16pt">Счёт-фактура №<?php echo $invoice[0]['DocNumber']?>  от  <?php echo formatDate($invoice[0]['DateMod'])?></div>
    <!--    <div style="float:left; width:80%">Гість:  <?php echo $invoice[0]['PayTName']?></div>
        <div>Номер: </div>-->
        <div style="float:left; width:80%">Период:  <?php echo formatDate($invoice[0]['DocDate'])?>	 до	 <?php echo formatDate($invoice[0]['DocDateTo'])?> </div>

        <table cellpaddin="0" cellspacing="0">
            <tr>
                <th>№ п/п</th>
                <th>Наименование</th>
                <th>Цена грн.</th>
                <th>К-во</th>
                <th>Ед. изм.</th>
                <th>Сумма з НДС</th>            
            </tr>

        <?php 
        $i=1;
        $disc = $invoice[0]['DocSumWOTS'] - $invoice[0]['DocSumDiscWOTS'];
        foreach($invoice as $good){?>

            <tr>
                <td><?php echo $i ?></td>
                <td class="align-left"><?php echo $good['GoodName'] ?></td>
                <td><?php echo formatMoney($good['Price']) ?></td>
                <td><?php echo $good['Quant'] ?></td>
                <td><?php echo $good['DimName'] ?></td>
                <td><?php echo formatMoney($good['Price'] * $good['Quant']) ?></td>
            </tr>
        <?php  
            $i++;
        }?>        
            <tr>
                <td colspan="5">Всего:</td>
                <td><?php echo formatMoney($invoice[0]['DocSumWOTS'])?></td>
            </tr>
            
            <?php if($disc>0){ ?>
            <tr>
                <td colspan="5">Скидка:</td>
                <td><?php echo formatMoney($disc)?></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="5">В т.ч. НДС:</td>
                <td><?php echo formatMoney( $invoice[0]['DocSumDiscWOTS']*0.2)?></td>
            </tr>
            <tr>
                <td colspan="5">К оплате:</td>
                <td><?php echo formatMoney($invoice[0]['DocSumDisc'])?></td>
            </tr>

        </table>
        <br/>
        <div>Виписал: online-бронирование.</div>
    
        <br/>
        <pre id="comment">
<?php include '../../config/comment.php';?>
        </pre>
    </div>

</div>