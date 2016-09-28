<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->SetPageProperty("PAGE_TITLE", "Подтверждение заказа");

$arResult['OFFER_IDS'] = array();

foreach($arResult['ITEMS'] as $arItem) {
	$col = CIBlockElement::GetList(array(), array('PROPERTY_DEV_GROUP' => $arItem['ID']));
	while( $o = $col->GetNextElement() ) {
		$arFields = $o->GetFields();

//  		echo print_r( $arFields, true ); die;
		$arOffers = CIBlockPriceTools::GetOffersArray(
			$arResult["IBLOCK_ID"],
			array( $arFields['ID'] ),
			array(),
			array('NAME'),
			array('CML2_ARTICLE', 'CML2_BASE_UNIT'),
			array(),
 			$arResult["PRICES"],
			"Y"
		);


		foreach( $arOffers as &$arOffer ) {
			if( !$arOffer['ID'] ) continue;
			$res = CIBlockElement::GetByID($arOffer['ID']);
			if ( $ar = $res->GetNext() ) {
				$arOffer['XDETAIL_PAGE_URL'] = $arFields['DETAIL_PAGE_URL'];
				$arItem['OFFERS'][] = $arOffer;
			}
		}
	}
}


foreach($arResult['ITEMS'] as $arItem) {
	foreach($arItem['OFFERS'] as &$arOffer) {
		if ( !isset($arOffer['XDETAIL_PAGE_URL']) ) $arOffer['XDETAIL_PAGE_URL'] = $arItem['DETAIL_PAGE_URL'];
		$arResult['OFFER_IDS'][] = $arOffer['ID'];
	}
}


$cp = $this->__component;
$cp->SetResultCacheKeys(array("OFFER_IDS", "ID"));
?>