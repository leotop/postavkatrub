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
    foreach($arResult['ITEMS']["AnDelCanBuy"] as $arElement) {
        $arItemID[] = $arElement["PRODUCT_ID"];        
    }          

    $arSelect = Array("ID", "PROPERTY_MEASURE");
    $arFilter = Array("ID" => $arItemID);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while($arFields = $res->Fetch()) { 
        if($arFields["PROPERTY_MEASURE_VALUE"]) {
            $arResult['MEASURE'][] = $arFields;        
        } else {
            $arProp["ID"] = $arFields["ID"];
            $arProp["PROPERTY_MEASURE_VALUE"] = '1';
            $arResult['MEASURE'][] = $arProp;  
        }          
    }
    foreach($arResult['ITEMS']["AnDelCanBuy"] as $ItemID => $arElement) {
        foreach($arResult['MEASURE'] as $MeasureProp) {
            if($arResult['ITEMS']["AnDelCanBuy"][$ItemID]['PRODUCT_ID'] == $MeasureProp["ID"]) {
                $arResult['ITEMS']["AnDelCanBuy"][$ItemID]['MEASURE'] = $MeasureProp["PROPERTY_MEASURE_VALUE"];        
            }     
        }      
    }
?>
