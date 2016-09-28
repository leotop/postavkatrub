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

$seo_pages = array(
            'radiatory',
            'naruzhnoe_vodosnabzhenie',
            'pnd',
            'vnutrennee_vodosnabzhenie_i_otoplenie',
            'truby_i_fitingi',
            'drenazhnie-truby',
            'alyuminievye',
            'bimetallicheskie-radiatory',
            'stalnye_panelnye',
            'schetchiki',
            'ochistnye_ustanovki',
            'zadvizhki_zatvory',
            'kollektory_dlya_teplogo_pola_i_shkafy',
            'lyuki',
            'sharovye_krany',
            'ochistnye_ustanovki',
            'polipropilen',
            'truby_i_fitingi_rehau',
            'pvkh',
            'vnutrennee_vodosnabzhenie_i_otoplenie',
            'danfoss',
            'teploizolyatsiya'
        );


CModule::IncludeModule("iblock");
$arMetaKeys = array("UF_META_TITLE", "UF_META_KEYWORDS", "UF_META_DESCRIPTION","IBLOCK_ID","ID","CODE");
$arSection = CIBlockSection::GetList(array(), array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ID" => $arResult['ID']), false, $arMetaKeys)->GetNext();

$obj = new \Bitrix\Iblock\InheritedProperty\SectionValues($arSection['IBLOCK_ID'],$arSection['ID']);
if(!empty($obj))
    $seo = $obj->GetValues();
if($seo['SECTION_META_TITLE']) 
    $APPLICATION->SetTitle($seo['SECTION_META_TITLE']);
if($seo['SECTION_META_KEYWORDS'])
    $APPLICATION->SetPageProperty("keywords", $seo['SECTION_META_KEYWORDS']);
if(!empty($seo['SECTION_META_DESCRIPTION']) && in_array($arSection['CODE'],$seo_pages))
    $APPLICATION->SetPageProperty("description", $seo['SECTION_META_DESCRIPTION']);
else{
//    $APPLICATION->SetPageProperty("description", $arResult['NAME'].' от компании Полимерстрой в Туле. Для оптовиков особые условия!');
    $APPLICATION->SetPageProperty("description1", $arResult['NAME'].' от компании Полимерстрой в Туле. Для оптовиков особые условия!');
}

if($seo['SECTION_PAGE_TITLE'])
    $APPLICATION->SetPageProperty("page_title", $seo['SECTION_PAGE_TITLE']);
?>
<script>
$('.quant').keyup(function(){
    if(event.keyCode==13)
       {
          $(addToCart).on("click");
          return false;
       }
})
</script>