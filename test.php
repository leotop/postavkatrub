<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small", 
	"bitronic_original", 
	array(
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
		"MARGIN_TOP" => "0",
		"MARGIN_SIDE" => "0",
		"START_FLY_PX" => $start_fly_px,
		"MARGIN_TOP_FLY_PX" => "0",
		"BASKET_POSITION" => "LEFT",
		"COMPONENT_TEMPLATE" => "bitronic_original",
		"PATH_TO_BASKET" => "/personal/basket.php",
		"SHOW_DELAY" => "Y",
		"SHOW_NOTAVAIL" => "Y",
		"SHOW_SUBSCRIBE" => "Y"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>