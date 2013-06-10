<style>
    #restore-form input{
        width:230px;
    }
</style>
<center>
<div id="restore-form">
    <div>Введите Ваш email:</div>
    <div>
         <input type="email" id="rest-email"/>
    </div>
    <br/>
    
    <div>Код:</div>
    <div>
         <input type="email" id="rest-code"/>
    </div>
    <img id="siimage" style=" border: 0" src="securimage/securimage_show.php?sid=<?php echo md5(time()) ?>" />                            <br />
    <!-- pass a session id to the query string of the script to prevent ie caching -->
    <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage/securimage_show.php?sid=' + Math.random(); return false"><img src="securimage/images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a>
    
    
   
</div>
    </center>