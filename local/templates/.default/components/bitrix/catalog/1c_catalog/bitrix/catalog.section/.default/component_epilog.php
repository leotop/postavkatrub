<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->SetPageProperty("PAGE_TITLE", "");
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


CModule::IncludeModule("iblock");
$arMetaKeys = array("UF_META_TITLE", "UF_META_KEYWORDS", "UF_META_DESCRIPTION");
$arSection = CIBlockSection::GetList(array(), array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ID" => $arResult['ID']), false, $arMetaKeys)->GetNext();

if($arSection['UF_META_TITLE']) {
	$APPLICATION->SetTitle($arSection['UF_META_TITLE']);
} else {
	$APPLICATION->SetTitle($arSection['NAME']);
}

$APPLICATION->SetPageProperty("keywords", $arSection['UF_META_KEYWORDS']);
$APPLICATION->SetPageProperty("description", $arSection['UF_META_DESCRIPTION']);

?>