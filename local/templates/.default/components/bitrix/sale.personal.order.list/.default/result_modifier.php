<?    
    foreach ($arResult['ORDERS'] as $arOrderItem) {
        $arOrderItemID[$arOrderItem["ORDER"]["ID"]] = $arOrderItem["BASKET_ITEMS"];
        foreach ($arOrderItem["BASKET_ITEMS"] as $arBasketItem) {
            if (!in_array($arBasketItem['PRODUCT_ID'], $arBasketItemID)) {                
                $arBasketItemID[] = $arBasketItem['PRODUCT_ID'];
            }            
        }
    }       
    $arSelect = Array("ID", "CATALOG_QUANTITY");
    $arFilter = Array("ID" => $arBasketItemID);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while ($arFields = $res->Fetch()) {
        $arItemsQuantity[$arFields["ID"]] = $arFields["CATALOG_QUANTITY"];    
    }
    
    foreach ($arResult['ORDERS'] as $arOrderItemID => $arOrderItem) {
        if ($arOrderItem['ORDER']["STATUS_ID"] != 'S') {
            foreach ($arOrderItem["BASKET_ITEMS"] as $arBasketItem) {
                /*echo 'В корзине: '.$arBasketItem['QUANTITY'].' На складе: '.$arItemsQuantity[$arBasketItem['PRODUCT_ID']].'<br>'; */       
                if (($arOrderItem['ORDER']['PERSON_TYPE_ID'] == INDIVIDUAL_USER_TYPE) && ($arBasketItem['QUANTITY'] > $arItemsQuantity[$arBasketItem['PRODUCT_ID']])) {
                    $arResult['ORDERS'][$arOrderItemID]["ORDER"]['AVAILABLE_FOR_ONLINE_PAY'] = 'N';    
                }     
            }            
        } 
    }
?>