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
<?$sections = array(
				'4503' => array(324691,324693,324688,324689,324690,324692,322574,322575,322576,322577,322578,322641,322640,322639,322638,322637,322636,322635,322634,322633,322632,322631,322630),
				'4471' => array(278973,278977,278981,278985,275839,275840,275841,275842,275843,275844) /*,
				'4487' => array(277701,277702,277703,277704,277965,277966,277967,277968,277968,277969,277970) */
			)?>
<?if(array_key_exists($arResult['ID'],$sections)):?>
	<?$arResult['SUB_ITEMS'] = array()?>
	<?$res = CIBlockElement::GetList(array(),array('IBLOCK_ID' => 37,'ID' => $sections[$arResult['ID']]))?>
	<?while($row = $res->Fetch()):?>
		<?$row['PREVIEW_PICTURE'] = CFile::GetFileArray($row['PREVIEW_PICTURE'])?>
		<?$row['DETAIL_PICTURE'] = CFile::GetFileArray($row['DETAIL_PICTURE'])?>
		<?$row['PROPERTIES']['_image'] = CIBLockElement::GetProperty(37,$row['ID'],array(),array('ID' => 328))->Fetch()?>
		<?$row['PROPERTIES']['_image']['VALUE'] = $row['PROPERTIES']['_image']['VALUE_ENUM']?>
		<?$row['PROPERTIES']['_size'] = CIBLockElement::GetProperty(37,$row['ID'],array(),array('ID' => 329))->Fetch()?>
		<?$row['PROPERTIES']['_size']['VALUE'] = $row['PROPERTIES']['_size']['VALUE_ENUM']?>
		<?$row['PROPERTIES']['_'] = CIBLockElement::GetProperty(37,$row['ID'],array(),array('ID' => 330))->Fetch()?>
		<?$row['PROPERTIES']['_']['VALUE'] = $row['PROPERTIES']['_']['VALUE_ENUM']?>
		<?$arResult['SUB_ITEMS'][$row['ID']] = $row?>
	<?endwhile?>
<?endif?>
