<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
    "bitrix:sale.order.ajax",
    "visual",
    Array(
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
        "DELIVERY_TO_PAYSYSTEM" => "d2p",
        "SET_TITLE" => "Y",
        "USE_PREPAYMENT" => "N",
        "DISABLE_BASKET_REDIRECT" => "N",
        "PRODUCT_COLUMNS" => array(),
        "PROP_3" => array(),
        "PROP_4" => array()
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>