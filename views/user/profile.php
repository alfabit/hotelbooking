<?php
    global $profile;
    $name = explode(" ",$profile['KontrName']);
	$str = $profile['Passport'];
	if($profile['birth'] == "01.01.2000"){
		$fisic = false;
		$passport = $profile['Passport'];
	}else{
		$passport = $profile['Passport'];
		$fisic = true;
	};
	if($passport == null || $passport == 'null'){
		$passport = '';
	}
?>

<style>
    #signup-form input{
        width:200px;
    }
    
    #reg-additional input, #reg-additional select{
        width:350px;
    }
</style>

<script>
$(function() {
       // $( "#profile-tabs" ).tabs();
        try{
            document.getElementById("reg-country").selectedIndex = '<?php echo $profile['Country_ID']; ?>'-1;
        }
        catch(e){}
});

</script>

<div id="profile-tabs">
<!--    <ul>
        <li><a href="#profile-info">Данные</a></li>
        <li><a href="#profile-orders">Заказы</a></li>        
    </ul>-->
    <div id="profile-info">
        <div id="signup-form">
            <div style="text-align:center;font-size: 10pt;font-weight: bold;">Все поля обязательны для заполнения!</div>
            <img src='images/add_user.png' border="0" width="128" style="float:right"/>
            <div>
                <div class="label">Email</div>
                <div style="font-weight: bold;"><?php echo $profile['email']; ?></div>
            </div>

            <div>
                <div class="label">Текущий пароль (введите для изменения Ваших данных)</div>        
                <input type="password" id="reg-pass" name="pass"/>        
            </div>

            <div>
                <div class="label">Новый пароль (введите для смены пароля)</div>        
                <input type="password" id="reg-npass"/>        
            </div>
            
            <div>
                <div class="label">Подтвердите новый пароль</div>        
                <input type="password" id="reg-npass2"/>        
            </div>

            <div id="reg-additional">
          <?php if($fisic): ?>
    		<div id="fisic">
                <br/><br/>
                <div>
                    <div class="label">Фамилия</div>        
                    <input type="text" id="reg-lastname" name="lastname" value="<?php echo $name[0]; ?>"/>        
                </div>
    
                <div>
                    <div class="label">Имя</div>        
                    <input type="text" id="reg-firstname" name="firstname" value="<?php echo $name[1]; ?>"/>        
                </div>
    
                <div>
                    <div class="label">Отчество</div>        
                    <input type="text" id="reg-middlename" name="middlename" value="<?php echo $name[2]; ?>"/>        
                </div>
                <div>
                    <div class="label">Дата рождения</div>        
                    <input type="text" id="reg-birth" name="birth" value="<?php echo $profile['birth']; ?>"/>        
                </div>  
                           
                <div>
                    <div class="label">Паспорт (серия, номер, кем и когда выдан)</div>        
                    <input type="text" id="reg-passport" name="passport" value="<?php echo $passport; ?>"/>        
                </div>

		</div>
        <?php endif; ?>
        <?php if(!$fisic): ?>
            <div id="juridic">
                <br/><br/>
                <div>
                    <div class="label">Название компании</div>        
                    <input type="text" id="reg-addr" name="addr" value="<?php echo $profile["Addr"]; ?>"/>        
                </div>
                <div>
                    <div class="label">Код ЕДРПО *</div>        
                    <input type="text" id="reg-passport" name="code" value="<?php echo $passport; ?>"/>        
                </div>
            </div>
            <?php endif; ?>
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
                <div class="label">Контактный телефон</div>        
                <input type="text" id="reg-contact" name="contact" value="<?php echo $profile['Contact']; ?>"/>        
            </div>


            </div>
        </div>
    </div>
	<?php if($fisic){ ?>
        <script>
            document.getElementById('juridic').style.display = 'none';
            document.getElementById('fisic').style.display = 'block';
        </script>
    
    <?php }else{ ?>
        <script>
            document.getElementById('fisic').style.display = 'none';
            document.getElementById('juridic').style.display = 'block';
        </script>
    <?php } ?>
<!--    <div id="profile-orders">
        
    </div>-->
</div>