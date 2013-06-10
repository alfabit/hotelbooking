<style>
    #signup-form input{
        width:200px;
    }
    
    #reg-additional input, #reg-additional select{
        width:350px;
    }
</style>

<script>
    
</script>

<div id="signup-form">
    <div style="text-align:center;font-size: 10pt;font-weight: bold;">Все поля обязательны для заполнения!</div>
    <img src='images/add_user.png' border="0" width="128" style="float:right"/>
    <div>
        <div class="label">Email</div>
        <input type="email" id="reg-email" name="email"/>
    </div>
    
    <div>
        <div class="label">Пароль</div>        
        <input type="password" id="reg-pass" name="pass"/>        
    </div>
    
    <div>
        <div class="label">Повторите пароль</div>        
        <input type="password" id="reg-pass2" name="pass2"/>        
    </div>
    
    
    
    <br/><br/>
    
    <div id="reg-additional">
    
    <div>
        <div class="label">Фамилия</div>        
        <input type="text" id="reg-lastname" name="lastname"/>        
    </div>
    
    <div>
        <div class="label">Имя</div>        
        <input type="text" id="reg-firstname" name="firstname"/>        
    </div>
    
    <div>
        <div class="label">Отчество</div>        
        <input type="text" id="reg-middlename" name="middlename"/>        
    </div>
    
    <br/><br/>
    
    <div>
        <div class="label">Страна</div>        
        <select id="reg-country">
            <option value="1" selected>Украина</option>
            <option value="2">Россия</option>
            <option value="3">Белорусия</option>            
        </select>
    </div>
    
    <div>
        <div class="label">Дата рождения</div>        
        <input type="text" id="reg-birth" name="birth"/>        
    </div>
    
    <div>
        <div class="label">Адрес</div>        
        <input type="text" id="reg-addr" name="addr"/>        
    </div>
    
     <div>
        <div class="label">Паспорт (серия, номер, кем и когда выдан)</div>        
        <input type="text" id="reg-passport" name="passport"/>        
    </div>
    
    <div>
        <div class="label">Контактный телефон</div>        
        <input type="text" id="reg-contact" name="contact"/>        
    </div>
        
    </div>
    <small>* Ваша личная информация вводится сугубо для выставления счета, строго конфиденциальна и не будет распространятся 3м лицам.</small>
</div>
