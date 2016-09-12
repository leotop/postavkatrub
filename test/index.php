<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?> <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small",
	"bitronic",
	Array(
		"PATH_TO_ORDER" => "/personal/order/make/",
		"COLOR_SCHEME" => "ice",
		"NEW_FONTS" => "Y",
		"INCLUDE_JQUERY" => "Y",
		"INCLUDE_JGROWL" => "Y",
		"VIEW_PROPERTIES" => "N",
		"QUANTITY_LOGIC" => "q_positions",
		"CHANGE_QUANTITY" => "N",
		"CONTROL_QUANTITY" => "N",
		"IMAGE" => "",
		"CURRENCY" => "",
		"MARGIN_TOP" => "10",
		"MARGIN_SIDE" => "10",
		"START_FLY_PX" => "100",
		"MARGIN_TOP_FLY_PX" => "10",
		"BASKET_POSITION" => "LEFT"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:subscribe.form",
	"",
	Array(
		"USE_PERSONALIZATION" => "Y",
		"PAGE" => "#SITE_DIR#about/subscr_edit.php",
		"SHOW_HIDDEN" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => ""
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>