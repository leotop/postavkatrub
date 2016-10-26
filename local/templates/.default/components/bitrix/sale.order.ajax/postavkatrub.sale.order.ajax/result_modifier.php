<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    $GLOBALS["ShowSberbank"] = 'Y';
    foreach($arResult['BASKET_ITEMS'] as $arBasketItem){
        $arBasketItemID[] = $arBasketItem["PRODUCT_ID"];
    };
    $arSelect = Array("CATALOG_QUANTITY");
    $arFilter = Array("ID" => $arBasketItemID);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while ($arFields = $res->Fetch()) {
        if ($arFields["CATALOG_QUANTITY"] == 0) {
            $GLOBALS["ShowSberbank"] = "N";       
        }    
    }
?>