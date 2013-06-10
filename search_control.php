<div id="room-search" class="ui-corner-all  ui-widget-content ui-widget">
            <h3 class="ui-widget-header ui-corner-top">Бронирование номера</h3>
            <div id="room-search-left">
                <div><div class="room-search-field"><span class="ui-button-icon-primary ui-icon ui-icon-calendar float-left"></span>Дата заезда: </div><input type="text" id="dfrom"></div>
                <div><div class="room-search-field"><span class="ui-icon ui-icon-calendar float-left"></span>Дата отъезда:</div><input type="text" id="dto"></div>
            </div>
           
            <div>
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
            <div>
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

                
 <button id="room-search-button" onclick="searchRoom()">Поиск</button>
            <div class="clear"></div>
        </div>