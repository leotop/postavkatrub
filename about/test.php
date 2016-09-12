<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
$rand = rand(0, 1000);
$arFields = array(
	"ACTIVE" => "Y",
	"LOGIN" => "user".$rand,
	"PASSWORD" => '123123',
	"CONFIRM_PASSWORD" => '123123',
	"EMAIL" => 'user'.$rand.'@mail.ru',
	"GROUP_ID" => array(1),
);
$user = new CUser;


$user->Add($arFields);
echo $rand;
?>