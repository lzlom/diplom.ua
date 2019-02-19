<?php         
    include("include/db_connect.php");
    include("functions/functions.php");
    include("include/auth_cookie.php"); 
    session_start();
     
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="style/reset.css" rel="stylesheet" type="text/css" />
<link href="style/css.css" rel="stylesheet" type="text/css" />
<link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/trackbar/jquery.trackbar.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript" src="/js/shop-script.js"></script>
<script type="text/javascript" src="/js/TextChange.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#form_reg').validate({
rules:{
"reg_login":{
required: true,
minlength: 5,
maxlength: 15,
remote: {
type: "post",
url: "/reg/check_login.php"
}
},
"reg_pass":{
required: true,
minlength: 7,
maxlength: 15
},
"reg_surname":{
required: true,
minlength: 3,
maxlength: 15
},
"reg_name":{
required: true,
minlength: 3,
maxlength: 15
},
"reg_patronymic":{
required: true,
minlength: 3,
maxlength: 15
},
"reg_email":{
required: true,
email: true
},
"reg_phone":{
required: true
},
"reg_address":{
required: true
},
"reg_captcha":{
required: true,
remote: {
type: "post",
url: "/reg/check_captcha.php"
}
}
},

messages:{
"reg_login":{
required: "Укажите Логин!",
minlength: "От 5 до 15 символов!",
maxlength: "От 5 до 15 символов!",
remote: "Логин занят!"
},
"reg_pass":{
required: "Укажите Пароль!",
minlength: "От 7 до 15 символов!",
maxlength: "От 7 до 15 символов!"
},
"reg_surname":{
required :"Укажите Фамилию!",
minlength: "От 3 до 15 символов!",
maxlength: "От 3 до 15 символов!"
},
"reg_name":{
required :"Укажите Имя!",
minlength: "От 3 до 15 символов!",
maxlength: "От 3 до 15 символов!"
},
"reg_patronymic":{
required : "Укажите Отчество!",
minlength: "От 3 до 15 символов!",
maxlength: "От 3 до 15 символов!"
},
"reg_email":{
required: "Укажите E-mail!",
email: "Не корректный E-mail!"
},
"reg_phone":{
required: "Укажите номер телефона!",
digits: "Не корректный номер!"
},
"reg_captcha":{
required: "Введите код с картинки!",
remote: "Не верный код проверки!"
}
},

     submitHandler: function(form) {
     $(form).ajaxSubmit({
     success: function(data) {

if (data == 'true')
{
$("#block-form-registration").fadeOut(300,function() {
$("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
$("#form_submit").hide();

});
}
else
{
$("#reg_message").addClass("reg_message_error").fadeIn(400).html("Не коректный ввод");
}
}
});
}
});

$('#reloadcaptcha').click(function() {
$('#block-captcha > img').attr("src","/reg/reg_captcha.php?r="+ Math.random());
}); 



});
</script>

<title>Регистрация</title>
</head>
<body>
<div id="block-body">

<?php
	include("include/block-header.php");
?>
<div id="block-right">
<?php
	include("include/block-category.php");
    include("include/block-parameter.php");
    include("include/block-news.php");
?>

</div>
<div id="block-content">
<h2 class="h2-title">Регистрация</h2>
<form method="post" id="form_reg" action="reg/handler_reg.php">
<p id="reg_message"></p>
<div id="block-form-registration">
<ul id="form-registration">
<li>
<label>Логин</label>
<span class="star">*</span>
<input type="text" name="reg_login" id="reg_login"/>
</li>
<li>
<label>Пароль</label>
<span class="star">*</span>
<input type="text" name="reg_pass" id="reg_pass"/>
<span id="gen_pass">Сгенерировать</span>
</li>
<li>
<label>Фамилия</label>
<span class="star">*</span>
<input type="text" name="reg_surname" id="reg_surname"/>
</li>
<li>
<label>Имя</label>
<span class="star">*</span>
<input type="text" name="reg_name" id="reg_name"/>
</li>
<li>
<label>Отчество</label>
<span class="star">*</span>
<input type="text" name="reg_patronymic" id="reg_patronymic"/>
</li>
<li>
<label>E-mail</label>
<span class="star">*</span>
<input type="text" name="reg_email" id="reg_email"/>
</li>
<li>
<label>Мобильный телефон</label>
<span class="star">*</span>
<input type="text" name="reg_phone" id="reg_phone"/>
</li>
<li>
<label>Адрес доставки</label>
<span class="star">*</span>
<input type="text" name="reg_address" id="reg_address"/>
</li>
<li>
<div id="block-captcha">
<img src="/reg/reg_captcha.php"/>
<input type="text" name="reg_captcha" id="reg_captcha"/>
<p id="reload_captcha">Обновить</p>

</div></li>
</ul>
</div>
<p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"/></p>
</form>


</div>
<?php
	include("include/block-footer.php");
?>
</div>

</body>
</html>