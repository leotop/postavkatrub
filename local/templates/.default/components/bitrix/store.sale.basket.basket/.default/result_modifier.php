<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult['TABLE_HEADER'] = array();
$arResult['ROOT_ITEMS'] = array();


foreach($arResult["ITEMS"]["AnDelCanBuy"] as $key => $arBasketItem) {

	/** Заполняем заголовки таблицы */

		foreach($arBasketItem['PROPS'] as $arProperty) {

			if(!$key) {
				if($arProperty['CODE'] != 'CML2_LINK') {
					$arResult['TABLE_HEADER'][] = $arProperty['NAME'];
				}
			}

			if($arProperty['CODE'] == 'CML2_LINK') {
				$rootID = $arProperty['VALUE'];
			}
		}

	if(empty($arResult['ROOT_ITEMS'][$rootID])) {
		$arItem = CIBlockElement::GetByID($rootID)->GetNext();
		$arItem['OFFER_KEYS'] = array($key);

		$cl = CIBlockElement::GetProperty($arItem['IBLOCK_ID'], $arItem['ID'], array(), array("CODE"=>"DEV_PHOTO"));
		if ( $arProperty = $cl->Fetch() )
			$arItem['DEV_PHOTO'] = $arProperty;

		$arResult['ROOT_ITEMS'][$rootID] = $arItem;
	} else {
		$arResult['ROOT_ITEMS'][$rootID]['OFFER_KEYS'][] = $key;
	}




}
?>
