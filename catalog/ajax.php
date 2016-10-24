<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$data=array();
if (!$_POST['quantity'] || $_POST['quantity']==0) {echo iconv("CP1251", "UTF-8", '¬ведите количество товара');} else {
$productID = intval($_REQUEST['id']);
if(($_REQUEST['action'] == "ADD2BASKET") && $productID > 0) {
	if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) {
		$paramList = array("CML2_LINK", "COL_IN_PACK", "SIZE", "ARTICUL");
		
		$QUANTITY = intval($_POST['quantity']);
		if($QUANTITY <= 1)
			$QUANTITY = 0; 
			
		CSaleBasket::Init();
		$dbRes = CSaleBasket::GetList(array(),
			array(
				"FUSER_ID" => $_SESSION["SALE_USER_ID"],
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL",
				"PRODUCT_ID" => $productID,
			)
		);
		
		$arBasketItem = $dbRes->GetNext();
		
		if(!is_array($arBasketItem)) {
			$obItem = CIBlockElement::GetByID($productID)->GetNextElement();
			$arProperties = $obItem->GetProperties();
			$arParams = array();
			
			foreach($arProperties as $arProperty) {
				if(in_array($arProperty['CODE'], $paramList)) {
					$arParams[] = array("NAME" => $arProperty['NAME'], "CODE" => $arProperty['CODE'], "VALUE" => $arProperty['VALUE']);
				}
			}

			Add2BasketByProductID($productID, $QUANTITY, $arParams);
		} else {
			CSaleBasket::Update($arBasketItem['ID'], array("QUANTITY" => $QUANTITY));
		}
	  
	}
}?>


<?
    //если пользователь авторизован, то начинаем движение "летающей" корзины с учетом админ. панели                
                    if ($_SESSION['SESS_AUTH']['LOGIN'])
                        $start_fly_px=345;
                    
                    else $start_fly_px=295;
                    ?>

<?
$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "bitronic_reedit", array(
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
<?}


//echo json_encode($data);
?>