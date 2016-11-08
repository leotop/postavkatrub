<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 
    if (!empty($arResult['BASKET_ITEMS'])) {
        $_SESSION["AVAILABLE_FOR_ONLINE_PAY"] = "Y";
        foreach($arResult['BASKET_ITEMS'] as $arBasketItem){
            $arBasketItemID[] = $arBasketItem["PRODUCT_ID"];
        };
        
        $arSelect = Array("ID", "CATALOG_QUANTITY");
        $arFilter = Array("ID" => $arBasketItemID);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        while ($arFields = $res->Fetch()) {
            $arResult["CATALOG_QUANTITY"][$arFields["ID"]] = $arFields["CATALOG_QUANTITY"];
        }
        
        foreach ($arResult['BASKET_ITEMS'] as $arBasketItem) {
            foreach ($arResult["CATALOG_QUANTITY"] as $ItemID => $ItemQuantity) {
                if(($arBasketItem["PRODUCT_ID"] == $ItemID) && ($arBasketItem["QUANTITY"] > $ItemQuantity)) {    
                    $_SESSION["AVAILABLE_FOR_ONLINE_PAY"] = "N";
                }    
            }
        }    
    }
?>