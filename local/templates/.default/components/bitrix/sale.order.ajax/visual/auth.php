<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="order_auth">
<h4>Если Вы уже совершали покупки в нашем магазине ранее,то авторизуйтесь для продолжения процедуры оформления заказа</h4>
<br>
<script>
$(function(){   
  $('.bx-system-auth-form table tr:nth-child(5)').css('display','none');
  $('.bx-system-auth-form table tr:nth-child(6)').css('display','none');  
})
</script>
<?$APPLICATION->IncludeComponent(
    "bitrix:system.auth.form",
    "",
    Array(
        "REGISTER_URL" => "/registration/index.php",
        "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "/personal/",
        "SHOW_ERRORS" => "N"
    ),
false
);?>
</div>
<div class="order_auth">
<h4>Если Вы новый покупатель,то зарегестрируйтесь для продолжения процедуры оформления заказа</h4>
<br>
<script>
$(function(){
  $( "input[name$='REGISTER[LOGIN]']" ).val( "a letter" ).parent('td').parent('tr').css('display','none');  
})
</script>
 <?if ($_GET['forgot_password']=='yes'){?> <?$APPLICATION->IncludeComponent(
    "bitrix:system.auth.forgotpasswd",
    ""
);?> <?} else {?> <?$APPLICATION->IncludeComponent(
    "bezb:main.register",
    "",
    Array(
        "USER_PROPERTY_NAME" => "",
        "SHOW_FIELDS" => array("NAME", "SECOND_NAME", "LAST_NAME", "PERSONAL_PHONE"),
        "REQUIRED_FIELDS" => array("NAME", "SECOND_NAME", "LAST_NAME", "PERSONAL_PHONE"),
        "AUTH" => "Y",
        "USE_BACKURL" => "Y",
        "SUCCESS_PAGE" => "",
        "SET_TITLE" => "Y",
        "USER_PROPERTY" => array()
    )
);}?>
</div> 