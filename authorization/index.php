<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?> <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"auth",
	Array(
		"REGISTER_URL" => "/registration/",
		"FORGOT_PASSWORD_URL" => "/registration/index.php?forgot_password=yes",
		"PROFILE_URL" => "",
		"SHOW_ERRORS" => "N"
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>