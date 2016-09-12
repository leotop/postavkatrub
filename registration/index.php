<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?> 
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
		"REQUIRED_FIELDS" => array("NAME", "PERSONAL_PHONE"),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => array()
	)
);?> <?}?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>