<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат оплаты");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.payment.receive", 
	"", 
	array(
		"PAY_SYSTEM_ID" => "",
		"PERSON_TYPE_ID" => "",
		"PAY_SYSTEM_ID_NEW" => "12"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>