<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    if(!CModule::IncludeModule('catalog') || !CModule::IncludeModule('sale') || $_SERVER['REQUEST_METHOD'] != 'POST' || !$_POST['action'])
    return false;

    $id_basket_element = IntVal($_POST['id_basket_element']);
    $return_basket_small = false;
    console.log($_POST['action']);
    console.log($_POST['new_quantity']); 
    console.log($_POST['sign']);  
    switch($_POST['action'])
    {         
        case 'setQuantity':
            $new_quantity = IntVal($_POST['new_quantity']);
            $basketItem = CSaleBasket::GetByID($id_basket_element);
            $arSelect = Array("PROPERTY_KOEFFITSIENT");
            $arFilter = Array("ID" => $basketItem['PRODUCT_ID']);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            while($arFields = $res->Fetch()) { 
                if($arFields["PROPERTY_KOEFFITSIENT_VALUE"]) {
                    $measure = $arFields["PROPERTY_KOEFFITSIENT_VALUE"];      
                } else {
                    $measure = 1; 
                }          
            }
             
            if ($new_quantity % $measure != 0) {    
                if ($_POST['sign'] == 'm') {
                    $new_quantity = floor($new_quantity / $measure) * $measure;    
                } else {
                    $new_quantity = ceil($new_quantity / $measure) * $measure;
                }; 
            }; 

            if(!$basketItem['ORDER_ID'] && $basketItem['FUSER_ID'] == CSaleBasket::GetBasketUserID())
            {
                if($new_quantity > 0){
                    if($_POST['control_quantity'] == 'Y' && $_POST['product_id'])
                    {
                        $arProduct = CCatalogProduct::GetByID($_POST['product_id']);
                        if($arProduct['QUANTITY'] < $new_quantity)
                        {
                            echo 'err3';
                            return ;
                        }
                    }
                    if(CSaleBasket::Update($basketItem['ID'], array('QUANTITY' => $new_quantity)))
                        echo $new_quantity;
                    else
                        echo 'err1';
                }
                else{
                    if(CSaleBasket::Delete($basketItem['ID']))
                    {
                        echo 'del';
                        $return_basket_small = true;
                    }
                    else
                        echo 'err2';
                }
            }
            break;
}?>