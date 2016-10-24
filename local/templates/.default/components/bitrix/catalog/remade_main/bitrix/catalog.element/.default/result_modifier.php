<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$arResult['SIMILAR'] = array();
$arResult['WITH_LOOK'] = array();

foreach($arResult['DISPLAY_PROPERTIES']['SIMILAR_PRODUCTS']['VALUE'] as $itemID) {
    $dbRes = CIBlockElement::GetList(array(), array("ID" => $itemID, "IBLOCK_ID" => $arResult['IBLOCK_ID']), false, false, array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "DETAIL_PAGE_URL"));
    $dbRes->SetUrlTemplates($arParams["DETAIL_URL"]);
    $arResult['SIMILAR'][] = $dbRes->GetNext();
}

foreach($arResult['DISPLAY_PROPERTIES']['WITH_THIS_LOOK']['VALUE'] as $itemID) {
    $dbRes = CIBlockElement::GetList(array(), array("ID" => $itemID, "IBLOCK_ID" => $arResult['IBLOCK_ID']), false, false, array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL"));
    $dbRes->SetUrlTemplates($arParams["DETAIL_URL"]);
    
    $arResult['WITH_LOOK'][] = $dbRes->GetNext();
}

$arResult['OFFER_IDS'] = array();
foreach($arResult['OFFERS'] as $arOffer) {
    $arResult['OFFER_IDS'][] = $arOffer['ID'];
}

$uncachedKeys = array("NAME", "OFFER_IDS");
$metaKeys = array("META_TITLE", "META_KEYWORDS", "META_DESCRIPTION");
$arResult['PROPERTIES']['META_DESCRIPTION']['VALUE'] = $arResult['NAME'].' от компании Полимерстрой в Туле. Для оптовиков особые условия!';
foreach($metaKeys as $metaKey) {
    if($arResult['PROPERTIES'][$metaKey]['VALUE']) {
        $arResult[$metaKey] = $arResult['PROPERTIES'][$metaKey]['VALUE'];
        $uncachedKeys[] = $metaKey;
    }
}

$cp = $this->__component;
$cp->SetResultCacheKeys($uncachedKeys);

?>