<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

if($arResult['META_TITLE']) {
	$APPLICATION->SetTitle($arResult['META_TITLE']);
} else {
	$APPLICATION->SetTitle($arResult['NAME']);
}
$APPLICATION->SetPageProperty("PAGE_TITLE", $arResult['NAME']);

$APPLICATION->SetPageProperty("keywords", $arResult['META_KEYWORDS']);
$APPLICATION->SetPageProperty("description", $arResult['META_DESCRIPTION']);
$APPLICATION->SetPageProperty("description1", $arResult['META_DESCRIPTION']);

CModule::IncludeModule("sale");
CSaleBasket::Init();
$dbBasketItems = CSaleBasket::GetList(
	array(
			"NAME" => "ASC",
			"ID" => "ASC"
		),
	array(
			"FUSER_ID" => $_SESSION["SALE_USER_ID"],
			"LID" => SITE_ID,
			"ORDER_ID" => "NULL"
		),
	false,
	false,
	array("PRODUCT_ID", "QUANTITY")	
);
			
$arBasketItems = array();
$arQuantities = array();
while($arBasketItem = $dbBasketItems->GetNext()) {
	$arBasketItems[] = $arBasketItem['PRODUCT_ID'];
	$arQuantities[$arBasketItem['PRODUCT_ID']] = round($arBasketItem['QUANTITY']);
}

foreach($arResult['OFFER_IDS'] as $offerID) {

	$quantity = (in_array($offerID, $arBasketItems)) ? $arQuantities[$offerID] : '1';
	
	SetUncachedContent("offerQuantity_".$offerID, $quantity);

}

?>