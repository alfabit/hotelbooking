<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>   
        <meta http-equiv="X-UA-Compatible" content="IE=9" />        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Бронирование номера</title>
        <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.12.custom.css" rel="stylesheet" />
        <link type="text/css" href="css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.12.custom.min.js"></script>

        <script type="text/javascript" src="js/hotelbooking.js"></script>
        <script>           

            $(function() {
                                
		$( "#hb-tabs" ).tabs();                
                $("#booking-dialog").dialog({
                    autoOpen:false,
                    modal:true,
                    title:'Поиск номера',
                    width:800,
                    height:600,
                    show: 'slide',
                    hide: 'slide'
                });
            });
	
        </script>
    </head>
    <body>
        <div id="test"></div>
        
        <div class="bar ui-corner-top ui-widget ui-widget-content header">
            <div class="user-info header-right">
                
            </div>
<!--            <h3 class="ui-widget-header ui-corner-top">Пансионат "Рута"</h3>-->
            <img class="logo" src="images/logo_rus.png">
            
            
        </div>
        
        <div class="search-bar ui-corner-bottom ui-widget ui-widget-content">
            <h3 class="ui-widget-header">Поиск номера</h3>
            <div class="column">
                <div><div class="room-search-field"><span class="ui-button-icon-primary ui-icon ui-icon-calendar float-left"></span>Дата заезда: </div><input type="text" id="dfrom"></div>
            </div>
            <div class="column">
                <div><div class="room-search-field"><span class="ui-icon ui-icon-calendar float-left"></span>Дата отъезда:</div><input type="text" id="dto"></div>
            </div>
           
            <div class="column" style="width:60px">
                <div>Взрослых:</div>
                <select id="qadult">
                    <option value="1">1</option>
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            <div class="column">
                <div>Детей:</div>
                <select id="qchild">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            
            <div class="column">
                <button id="room-search-button" onclick="searchRoom('Price',4)">Поиск</button>
            </div>
            
            
        </div>
        
        
        
        
        <div id="list" style="overflow: auto; width:100%;" class="search-results ui-corner-all ui-widget ui-widget-content">
            
            
        </div>

   
       

      
    </body>
</html>
