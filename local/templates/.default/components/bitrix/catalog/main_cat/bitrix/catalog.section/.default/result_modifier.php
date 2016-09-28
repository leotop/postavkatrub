<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->SetPageProperty("PAGE_TITLE", "Подтверждение заказа");

$arResult['OFFER_IDS'] = array();

foreach($arResult['ITEMS'] as $arItem) {
	foreach($arItem['OFFERS'] as $arOffer) {
		$arResult['OFFER_IDS'][] = $arOffer['ID'];
	}
}


$cp = $this->__component;
$cp->SetResultCacheKeys(array("OFFER_IDS", "ID"));
?>