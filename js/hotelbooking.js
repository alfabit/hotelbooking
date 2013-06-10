/**
 * TODO: 
 * V Отдельная стриница модуля
 * V Регистрация
 * V Вход
 * V Востановления пароля
 * V Редактирования личных данных
 * V Список заказов
 * V Поиск номера, ввод возрастных данных о детях
 * - Сортировка в результатах поиска
 * V Даты
 * - LiqPay
 * - Ввод суммы
 * 
 */

$(function(){
   //load
   showUserInfo();
    
   //all
   $("button").button();
   
    
   //search control
   $( "#dfrom" ).datepicker({minDate: +1, maxDate: "+1Y",dateFormat:"dd.mm.yy",
                    onSelect: function(dateText, inst) {
                        try{
                            var d = dateText.split('.');
                            var date = new Date(d[2],d[1],d[0],0,0,0,0);
                            date.setDate(date.getDate() + 2);
                            
                            var sdate = zr(date.getUTCDate())+"."+zr(date.getUTCMonth())+"."+date.getUTCFullYear();
                            //alert(date.getUTCDate());
                            $( "#dto" ).datepicker("option","minDate",sdate);
                        }
                        catch(e){
                            alert(e);
                        }
                    }
                });                
   $( "#dto" ).datepicker({minDate: +3, maxDate: "+1Y",dateFormat:"dd.mm.yy"});
   $( "#dfrom" ).datepicker( "option",
   $.datepicker.regional["ru"] ); 
   $("#room-search-button").button({
                    icons: {
                        primary: "ui-icon-search"
                    }
                });
   $("#list").height(window.innerHeight-270);
    
    document.body.onresize = function (){
     $("#list").height(window.innerHeight-270);
    }    
});

function zr(num){if(num<10)return "0"+num;else return num;}


/*
 *USER account------------------------------------------------------------------
 **/

function showUserInfo(){
    $(".user-info").load("controllers/user/user_control.php",function(d){
        $(".user-info button").button();
        $(".buttonset").buttonset();
    });
}

function signIn(){
    if ($('#signin-dialog').length == 0) {
        $("body").append("<div id='signin-dialog'></div>");
        $('#signin-dialog').dialog(
            {title: 'Вход',
                modal: true,
                height: 240,
                width: 400,
                autoOpen:false,
                show:'slide',
                hide:'slide',
                buttons: {
                            "Войти": signInOkClick,
                            "Отмена": function() {
                                $( this ).dialog( "close" );
                            }
			}
            });
    }
    $('#signin-dialog').load("views/user/signin.php",function(d){
        $('#signin-dialog').dialog("open");
    });    
}

function signInOkClick(){
    $.post("controllers/user/signin.php",{email:$("#email").val(),pass:$("#pass").val()}, function(r){
        if(r!="1"){
            alert("Неверный пароль!");
        }else{
            showUserInfo();
        }
        $( "#signin-dialog" ).dialog( "close" );
    });
}

function signOut(){
    $.get("controllers/user/signout.php", function(d){
        showUserInfo();
    })
    
}

function signUp(){
    if ($('#signup-dialog').length == 0) {
        $("body").append("<div id='signup-dialog'></div>");
        $('#signup-dialog').dialog(
            {title: 'Регистрация',
                modal: true,
                height: 700,
                width: 400,
                autoOpen:false,
                show:'slide',
                hide:'slide',
                buttons: {
                            "Зарегистрироваться": signUpOkClick, //controllers/user/signout.php
                            "Отмена": function() {
                                $( this ).dialog( "close" );
                            }
			}
            });
    }
    $('#signup-dialog').load("views/user/signup.php",function(d){
        $('#signup-dialog').dialog("open");
    });   
}

function signUpOkClick(){
    var email = $("#reg-email").val();
    var pass = $("#reg-pass").val();
    var pass2 = $("#reg-pass2").val();

    var firstname = $("#reg-firstname").val();
    var middlename = $("#reg-middlename").val();
    var lastname = $("#reg-lastname").val();

    var country = document.getElementById("reg-country").selectedIndex+1;
    var birth = $("#reg-birth").val();
    var addr = $("#reg-addr").val();
    var passport = $("#reg-passport").val();
    var contact = $("#reg-contact").val();
    
    if(!validateEmail(email)){messageDialog("Ошибка","Вы ввели неверный email!");return false;}
    if(pass!=pass2){messageDialog("Ошибка","Вы ввели разные пароли!");return false;}
    if(pass.length<6){messageDialog("Ошибка","Вы ввели короткий пароль пароль! Минимальная длина - 6 символов");return false;}
    
    if(firstname.length<1){messageDialog("Ошибка",'Поле <b>"Имя"</b>  обязательно для заполенения');return false;}
    if(middlename.length<1){messageDialog("Ошибка",'Поле <b>"Отчество"</b>  обязательно для заполенения');return false;}
    if(lastname.length<1){messageDialog("Ошибка",'Поле <b>"Фамилия"</b>  обязательно для заполенения');return false;}
    if(!validateDate(birth)){messageDialog("Ошибка",'Поле <b>"Дата рождения"</b>  обязательно для заполенения. Пример: 20.10.1980');return false;}
    if(addr.length<3){messageDialog("Ошибка",'Поле <b>"Аддресс"</b>  обязательно для заполенения');return false;}
    if(passport.length<3){messageDialog("Ошибка",'Поле <b>"Паспорт"</b>  обязательно для заполенения');return false;}
    if(contact.length<3){messageDialog("Ошибка",'Поле <b>"Контактный телефон"</b>  обязательно для заполенения');return false;}
    
    
    $.post("controllers/user/signup.php",{
        'email':email,
        'pass':pass,
        'firstname':firstname,
        'middlename':middlename,
        'lastname':lastname,
        'birth':birth,
        'addr':addr,
        'passport':passport,
        'contact':contact,
        'country':country},
    
        function(r){
            if(r!="1"){
                messageDialog("Системная ошибка",r);
            }else{
                showUserInfo();
                $( "#signup-dialog" ).dialog( "close" );
            }            
        });
}
    
function profile(){
    loadDialog("profile-dialog", "Мой профиль", true, 600, 650, {
        "Сохранить": profileSaveClick,
        "Отмена": function() {
            $( this ).dialog( "close" );
        }
    }, "", "controllers/user/profile_show.php");
}

function profileSaveClick(){
    
    var pass = $("#reg-pass").val();
    var npass = $("#reg-npass").val();
    var npass2 = $("#reg-npass2").val();

    var firstname = $("#reg-firstname").val();
    var middlename = $("#reg-middlename").val();
    var lastname = $("#reg-lastname").val();
    var country = document.getElementById("reg-country").selectedIndex+1;
    var birth = $("#reg-birth").val();
    var addr = $("#reg-addr").val();
    var passport = $("#reg-passport").val();
    var contact = $("#reg-contact").val();
        
    if(npass!=npass2){messageDialog("Ошибка","Вы ввели разные пароли!");return false;}
    if((npass.length>1)&&(npass.length<6)){messageDialog("Ошибка","Вы ввели слишком короткий новый пароль пароль! Минимальная длина - 6 символов");return false;}
    
    if(firstname.length<1){messageDialog("Ошибка",'Поле <b>"Имя"</b>  обязательно для заполенения');return false;}
    if(middlename.length<1){messageDialog("Ошибка",'Поле <b>"Отчество"</b>  обязательно для заполенения');return false;}
    if(lastname.length<1){messageDialog("Ошибка",'Поле <b>"Фамилия"</b>  обязательно для заполенения');return false;}
    if(!validateDate(birth)){messageDialog("Ошибка",'Поле <b>"Дата рождения"</b>  обязательно для заполенения. Пример: 20.10.1980');return false;}
    if(addr.length<3){messageDialog("Ошибка",'Поле <b>"Аддресс"</b>  обязательно для заполенения');return false;}
    if(passport.length<3){messageDialog("Ошибка",'Поле <b>"Паспорт"</b>  обязательно для заполенения');return false;}
    if(contact.length<3){messageDialog("Ошибка",'Поле <b>"Контактный телефон"</b>  обязательно для заполенения');return false;}
    
    if(pass.length>4){
        $.post("controllers/user/profile_save.php",{
            'pass':pass,
            'npass':npass,
            'firstname':firstname,
            'middlename':middlename,
            'lastname':lastname,
            'birth':birth,
            'addr':addr,
            'passport':passport,
            'contact':contact,
            'country':country},
            function(r){
                switch(r){
                    case '1':showUserInfo();closeDialog("profile-dialog");break;
                    case '530':
                        alert("Вы ввели неверный текущий пароль!");
                        break;
                    default:
                        alert("Вы неверно заполнили поля!");
                        closeDialog("profile-dialog");
                        break;
                }                
            });
    }else {
        closeDialog("profile-dialog");
    }
}

function restorePassword(){
    loadDialog("forgot-dialog", "Востановление пароля", true, 300, 350,{
        "Востановить": restoreClick,
        "Отмена": function() {
            $( this ).dialog( "close" );
        }
    }, "", "views/user/restore.php");
}

function restoreClick(){
    var email = $("#rest-email").val();
    var code = $("#rest-code").val();
    if(!validateEmail(email)){
        messageDialog("Ошибка","Вы ввели неверный email!");return ;
    }
    
    if(code.length<3){messageDialog("Ошибка",'Введите код!');return ;}
    
     $.post("controllers/user/restore.php",{
            'email':email,
            'code':code},
            function(r){
                switch(r){
                    case 'code':messageDialog("Ошибка","Вы ввели неверный код!");closeDialog("forgot-dialog");break;
                    case 'email':
                        messageDialog("Ошибка","Пользователя с таким email не существует!");closeDialog("forgot-dialog");break;
                    case '1':
                        messageDialog("Пароль востановлен","На Вашу электронную почту был выслан новый имейл.");closeDialog("forgot-dialog");break;
                    case '0':
                        messageDialog("Пароль не был востановлен","Не возможно изменить Ваш пароль. Обратитесь в службу поддержки.");closeDialog("forgot-dialog");break;
                        
                    default:
                        alert("Вы неверно заполнили поля!");
                        closeDialog("forgot-dialog");
                        break;
                }                
            });
}
    
//------------------------------------------------------------------------------    
    
function categoryList(_selector, dfrom,dto,qadult,qchild,sortField, sortDirection){
    this.selector = _selector;
    $("#list").html("<h1>Поиск..</h1>");
    $("#list").load("controllers/category/list.php",{
        'dfrom':dfrom,
        'dto':dto,
        'qadult':qadult,
        'qchild':qchild,
        'sort':sortField,
        'd':sortDirection
    },function(){
        $("button.order").button({
            icons: {
                primary: "ui-icon-cart"
            }
        });
        
        $(".show-category").button({
            icons: {
                primary: "ui-icon-extlink"
            }
        });
    });
}
//
//function invokeServiceProcedure(name,args, callback){
//    var sa="";
//    if(args!=null){
//        for(var i=0;i<args.length;i++){
//            sa+="&name"+args[i].name+"="+args[i].value;
//        }
//    }
//    $.getScript("service.php?proc="+name+sa, callback);
//}

function orderRoom(category,p,name){
    $("#cl-"+category).attr("active","true");
$.get("controllers/user/isauth.php",function(r){
        if(r=="1"){
            var qa = document.getElementById("qadult").selectedIndex+1;
            var qc = document.getElementById("qchild").selectedIndex;
            loadDialog("order-create-dialog", "Бронирование номера", true, 600, 250, {
                "Бронировать": orderCreateClick,
                "Отмена": function() {
                    $( this ).dialog( "close" );
                }

            }, "", "controllers/order/create.php?cat="+category+"&qa="+qa+"&qc="+qc+"&dfrom="+$("#dfrom").val() + "&dto="+$("#dto").val()+"&p="+p+"&name="+name);
        }else{
            messageDialog("Пожалуйста, зарегистрируйтесь!","Для бронирования номера, Вам необходимо <a href='#' onclick='signUp();return false;'>зарегистрироватся</a> или <a href='#' onclick='signIn();return false;'>выполнить вход!</a>");
        }
    });
}

function orderCreateClick(){
    $.get("controllers/user/isauth.php",function(r){
        if(r=="1"){
             try{        
                var bron_qadult = $("#bron_qadult").val();
                var bron_qchild = $("#bron_qchild").val();
                var bron_dfrom = $("#bron_dfrom").val();
                var bron_dto = $("#bron_dto").val();
                var bron_cat = $("#bron_cat").val();

                if($("#ri-fio-0").val().length<5){
                    messageDialog("Ошибка", "Заполните, пожалуйста, ифнормацию о гостях! <br><br> Необходимо указать хотя бы одного гостя.")
                    return;
                }

                var names = "";    

                $("input[id^='ri-fio']").each(function(i){
                    names+=$(this).val()+",";
                });
                names = names.substr(0, names.length-1);

                var passport="";
                $("input[id^='ri-passport']").each(function(i){
                    passport+=$(this).val()+",";
                });    
                passport = passport.substr(0, passport.length-1);

                var births="";
                $("input[id^='ri-birth']").each(function(i){
                    births+=$(this).val()+",";
                });    
                births = births.substr(0, births.length-1);


                $.post('controllers/bron/add.php',{
                    'cat':bron_cat,
                    'dfrom':bron_dfrom,
                    'dto':bron_dto,
                    'qadult':bron_qadult,
                    'qchild':bron_qchild,
                    'births':births,
                    'names':names,
                    'passports':passport,
                    'dserv':''

                },function(r){
                    if(r=="1"){
                        messageDialog("Готово", "Выбраный Вами номер был забронирован, а заказ добавлен в Вашу корзину. Если Вы её в скорем времени не оплатите, бронь анулируется.");
                        closeDialog("order-create-dialog");
                    }else{
                        messageDialog("Ошибка",r);
                    }
                });
            }
            catch(e){
                messageDialog("Ошибка",e);
            }
        }else{
            messageDialog("Пожалуйста, зарегистрируйтесь!","Для бронирования номера, Вам необходимо <a href='#' onclick='signUp();return false;'>зарегистрироватся</a> или <a href='#' onclick='signIn();return false;'>выполнить вход!</a>");
        }
            
    });
    
   
}

function searchRoom(sortField,sortDirection){
    
    if(($("#dfrom").val().length<5)||($("#dto").val().length<5)){
        messageDialog("Ошибка", "Выберите даты заезда и отъезда!")
        return;
    }

    categoryList("#list", $("#dfrom").val(),
                          $("#dto").val(),
                          document.getElementById("qadult").selectedIndex+1,
                          document.getElementById("qchild").selectedIndex, sortField, sortDirection);
    
}

function cart(){
    loadDialog("cart", "Бронированные номера", true, 800, 600, {
        "Оплатить": createInvoice,
        "Закрыть":function(){
            $(this).dialog("close");
        }
    }, "", "controllers/bron/list.php");
}

function selectPayment(){
    if( $("#cart-content input:checked").length==0){
        messageDialog("Ошибка", "Выберите бронь для оплаты!");
        return;
    }
    
    loadDialog("payment-dialog", "Способ оплаты", true, 450, 200, {
        "Выбрать":createInvoice,
        "Отмена":function(){
            $(this).dialog("close");
        }
    }, "", "views/invoice/payments.php");
}

function createInvoice(){ 
    //var Opl_ID = $("#payment-type").val();
    var Opl_ID = 2;
    closeDialog("payment-dialog");
    
    if( $("#cart-content input:checked").length==0){return;}
    
    var bronIds = "";
    $("#cart-content input:checked").each(function(i){
       bronIds+=$(this).attr("bron")+",";
    });
    bronIds = bronIds.substr(0, bronIds.length-1);
    
    $.post("controllers/invoice/create.php",{
            ids:bronIds,
            'Opl_ID':Opl_ID
       },function(r){
           if(r>0){
               showInvoice(r);  
               cart();
           }else{
               messageDialog("Ошибка", r);
           }
       });
}

function showInvoice(id){
   loadDialog("invoice-dialog", "Рахунок №"+id, true, 1000, 600, {
       "Печать":printInvoice,
       "Оплатить через Visa, MasterCard или LiqPay":function(){
           payAmount(id);
       },
       "Закрыть":function(){
           $(this).dialog("close");
       }
   }, "", "controllers/invoice/show.php?id="+id);
}

function payAmount(id){
   loadDialog("pay-amount-dialog", "Введите сумму", true,500, 250, {
            "Оплатить":function(){
                payCard(id);
            },
            "Отмена":function(){
               $(this).dialog("close");
            }
        },"", "controllers/invoice/pay_amount.php?id="+id);
       
}

function payCard(id){
    var amount = $("#pay_amount_value").val();
    window.location = "controllers/liqpay/pay.php?id="+id+"&amount="+amount;    
}


function printInvoice(){
    printContent("invoice-view");
}

function printContent(id){
    var node=document.getElementById(id);
    if(node!=null){
    var content=node.innerHTML;
    var pwin=window.open('','print_content','width=100,height=100');

    pwin.document.open();
    pwin.document.write('<html><body onload="window.print()">'+content+'</body></html>');
    pwin.document.close();

    setTimeout(function(){pwin.close();},1000);
    }
}
    
function convertDate(dateText){
    try{
        return Math.floor(Date.parse(dateText)/86400000 + 25568);
    }
    catch(e){
        alert(e);
    }
}

//--------------Cookies---------------------------------------------------------
function addCategoryToCookie(category){
    
}

function getCategoriesFromCookies(){
    try{
        var cats = getCookie("cats").split(",");
        
    }
    catch(e){

    }
}

function getCookie(c_name)
{
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
      x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
      y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
      x=x.replace(/^\s+|\s+$/g,"");
      if (x==c_name)
        {
        return unescape(y);
        }
      }
     return null;
}

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}
//--------------------------

function messageDialog(title,message){
    showDialog('message-dialog',title,true,500,200,{
        "OK": function() {
            $( this ).dialog( "close" );
        }
    },"<img src='images/info.png' width='64' style='float:left;margin:10px'><h4>" + message + "</h4>");
}

function showLoadingDialog(){
    showDialog("loading-dialog","Подождите..",true,300,150,{},"<h1 style='text-align:center; margin:20px;text-decoration:blink'>Загрузка..</h1>");
}

function closeLoadingDialog(){
    closeDialog("loading-dialog");
}

function showDialog(id,title,modal,width,height, buttons,content){
    loadDialog(id,title,modal,width,height, buttons,content, null);
}

function loadDialog(id,title,modal,width,height, buttons,content,url){

if ($('#'+id).length == 0) {
        $("body").append("<div id='"+id+"'>"+content+"</div>");
        $('#'+id).dialog(
            {'title': title,
                'modal': modal,
                'height': height,
                'width': width,
                autoOpen:false,
                show:'slide',
                hide:'slide',
                'buttons': buttons			
            });
    }
    else{        
        $('#'+id).dialog("option","title",title);
        $('#'+id).html(content);
    }
    
    if(url!=null){
        if(id!="loading-dialog"){
            showLoadingDialog();
        }
        $('#'+id).load(url,function(d){
            $('#'+id).html(d);
            closeLoadingDialog();
            $('#'+id).dialog("open");
            //alert(d);
        });   
    }
    else{
        closeLoadingDialog();
        $('#'+id).dialog("open");
    }
    
}

function closeDialog(id){
    $('#'+id).dialog('close');
}

//------
function validateEmail(elementValue){  
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return emailPattern.test(elementValue);  
 } 
 
function validateDate(date){
    var datePattern = "(0?[1-9]|[12][0-9]|3[01]).(0?[1-9]|1[012]).((19|20)\\d\\d)";  
   return date.match((datePattern));
} 