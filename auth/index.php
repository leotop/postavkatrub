<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?> 
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>