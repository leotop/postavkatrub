<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax", 
	"postavkatrub.sale.order.ajax", 
	array(
		"DISPLAY_IMG_WIDTH" => "90",
		"DISPLAY_IMG_HEIGHT" => "90",
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_PERSONAL" => "/personal/order/",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"PATH_TO_AUTH" => "/auth/",
		"PAY_FROM_ACCOUNT" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"COUNT_DELIVERY_TAX" => "N",
		"ALLOW_AUTO_REGISTER" => "N",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"DELIVERY_NO_AJAX" => "Y",
		"DELIVERY_NO_SESSION" => "N",
		"TEMPLATE_LOCATION" => ".default",
		"DELIVERY_TO_PAYSYSTEM" => "p2d",
		"SET_TITLE" => "Y",
		"USE_PREPAYMENT" => "N",
		"DISABLE_BASKET_REDIRECT" => "N",
		"PRODUCT_COLUMNS" => "",
		"PROP_3" => "",
		"PROP_4" => "",
		"COMPONENT_TEMPLATE" => "postavkatrub.sale.order.ajax",
		"COMPATIBLE_MODE" => "Y",
		"USE_PRELOAD" => "N",
		"ALLOW_NEW_PROFILE" => "N",
		"PRODUCT_COLUMNS_VISIBLE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PROPS",
		),
		"ADDITIONAL_PICT_PROP_36" => "-",
		"ADDITIONAL_PICT_PROP_37" => "-",
		"ADDITIONAL_PICT_PROP_40" => "-",
		"BASKET_IMAGES_SCALING" => "standard",
		"SHOW_PAYMENT_SERVICES_NAMES" => "N",
		"SHOW_STORES_IMAGES" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>