<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
CSaleBasket::Init();
$dbBasketItems = CSaleBasket::GetList(
        array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
        array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => "NULL"
            ));
			
$arBasketItems = array();
$arResult['TOTAL_SUM'] = 0;
while($arBasketItem = $dbBasketItems->GetNext()) {

	$arBasketItem['QUANTITY'] = round($arBasketItem['QUANTITY']);
	$arResult['TOTAL_SUM'] += $arBasketItem['PRICE'] * $arBasketItem['QUANTITY'];
}

$arResult['TOTAL_SUM'] = number_format($arResult['TOTAL_SUM'], 2, ',', ' ');
?>