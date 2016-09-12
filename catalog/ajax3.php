<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
    //если пользователь авторизован, то начинаем движение "летающей" корзины с учетом админ. панели                
                    if ($_SESSION['SESS_AUTH']['LOGIN'])
                        $start_fly_px=345;
                    
                    else $start_fly_px=295;
                    ?>

<?
$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "bitronic", array(
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
    "BASKET_POSITION" => "LEFT"
    ),
    false
);?>
