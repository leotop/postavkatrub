<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script>
$(function() {
   pedia_menu_scroll(); 
   new_quantity();
});
</script>

<?//arshow($arResult['ITEMS']);


foreach ($arResult['ITEMS'] as $v) {
  //  arshow($v['NAME']);
}
?>

 <div class="blue-block">
<table class="product-list-head" cellpadding="0" cellspacing="0">
    <colgroup>
        <col width="299">
        <col width="60">
        <col width="49">
        <col width="73">
        <col width="88">
        <col width="">
    </colgroup>
    <tr>
        <td style="border-left: 1px solid #2E65A8;"><?=iconv("CP1251", "UTF-8", 'Наименование')?></td>
        <td><?=iconv("CP1251", "UTF-8", 'Размер')?></td>
        <td><?=iconv("CP1251", "UTF-8", 'Ед. измер.')?></td>
        <td><?=iconv("CP1251", "UTF-8", 'Цена за ед. руб.<span style="color: red;">*</span>')?></td>
        <td><?=iconv("CP1251", "UTF-8", 'Заказ товара')?></td>
        <td colspan="2" style="padding-right: 36px; border-right: 1px solid #2E65A8;"><?=iconv("CP1251", "UTF-8", 'Кол-во в корзине')?></td>
    </tr>
</table>
<?
    if(count($arResult['ITEMS'])) {
   // arshow($arResult['ITEMS']['NAME']);
        $arBasketGoods=array();
        
   //Для вывода количества товаров в корзине:     
      //  получаем корзину текущего пользователя и собираем массив из товаров, находящихся в корзине
        $dbBasketItems = CSaleBasket::GetList(
        array(
                "NAME" => "ASC",
                "ID" => "ASC"
                ),
        array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => 's1',
                "ORDER_ID" => "NULL"
                ),
        false,
        false,
        array()
        );
        
        while ($arBasketItems = $dbBasketItems->Fetch()) {
          if (intval($arBasketItems['QUANTITY'])>0) {
              $arBasketGoods[$arBasketItems['PRODUCT_ID']]=intval($arBasketItems['QUANTITY']);
          }
            
        }
      //  arshow($arBasketGoods);  
        
?>
       
    <div class="product-list">
    <?foreach($arResult['ITEMS'] as $arElement) {
            //arshow($arElement['PROPERTIES']['_image']['VALUE']);
            //arshow($arElement);
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
        ?>

          <?
//проверяем есть ли товар в корзине и сохраняем в переменную кол-во
          if (array_key_exists($arElement['ID'], $arBasketGoods)) {
              $goodQuant=$arBasketGoods[$arElement['ID']];
          }
                else {
                   $goodQuant='0'; 
                }
                                    ?>
        
        <?
      //  echo isset($image_prop);
         if((isset($image_prop)==false)) {
                $image_prop=$arElement['PROPERTIES']['_image']['VALUE'];?>
            <div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                <div class="product-row-inner">
                    <h4><a href="javascript:void(0)"><?=$arElement['PROPERTIES']['_image']['VALUE']; ?></a></h4>
                    <div class="product-desr clearfix">
                        <div class="product-img">
                            <div class="product_img_inner">
                            <img src='<?=$arElement['PREVIEW_PICTURE']['SRC']?>'>
                            </div>
                        </div>

                        <table class="product-offers" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col width="160">
                                <col width="60">
                                <col width="50">
                                <col width="74">
                                <col width="87">
                                <col width="47">
                                <col width="27">    
                            </colgroup>
                            <tbody>

                                <tr>
                                    <td><a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a></td>
                                    <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                                    <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                                    <td>
                                        <?

                                        $ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array()); 
                                            //arshow($ar_res);
                                            $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                                            if ($ar_res[0]['CURRENCY']=='RUB') {$newval=$val;} 
                                            elseif ($ar_res[0]['CURRENCY']=='USD') {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                                            }
                                            else {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "EUR", "RUB");                                                
                                            }
                                            //echo $newval;
                                            $newval=number_format(round($newval, 2), 2, ',', ' '); 
                                            echo $newval;?>
                                    </td>
                                    <td>
                                        <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" value="<?// ShowUncachedContent("offerQuantity_".$arElement['ID']); ?>">
                                        <button value="<?=$arElement['ID']; ?>" class="addToCart"></button>
                                    </td>
                                  
                                    <td id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></td>
                                    <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", 'Удалить товар из корзины')?>"><img src="/images/del1.png" /></a></td>
                                </tr>
                                <?
                                }
                                elseif($image_prop==$arElement['PROPERTIES']['_image']['VALUE']){?>
                                <tr>                    <td><a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a></td>
                                    <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                                    <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                                    <td>
                                        <?
                                            $ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array()); 
                                            //arshow($ar_res);
                                            $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                                            if ($ar_res[0]['CURRENCY']=='RUB') {$newval=$val;} 
                                            elseif ($ar_res[0]['CURRENCY']=='USD') {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                                            }
                                            else {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "EUR", "RUB");                                                
                                            }
                                            $newval=number_format(round($newval, 2), 2, ',', ' '); 
                                            echo $newval;
                                        ?>
                                    </td>
                                    <td>
                                        <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" value="<?// ShowUncachedContent("offerQuantity_".$arElement['ID']); ?>">
                                        <button value="<?=$arElement['ID']; ?>" class="addToCart"></button>
                                    </td>
                                    <td id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></td>
                                    <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", 'Удалить товар из корзины')?>"><img src="/images/del1.png" /></a></td>
                                </tr>
                                <?} else {
                                    
                                   // arshow($arElement['PROPERTIES']['_image']);
                                    $image_prop=$arElement['PROPERTIES']['_image']['VALUE']?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                <div class="product-row-inner">
                    <h4><a href="javascript:void(0)"><?=$arElement['PROPERTIES']['_image']['VALUE']; ?></a></h4>
                    <div class="product-desr clearfix">
                        <div class="product-img">
                            <div class="product_img_inner">
                            <img src='<?=$arElement['PREVIEW_PICTURE']['SRC']?>'>
                            </div>
                        </div>
                        <table class="product-offers" cellpadding="0" cellspacing="0">
                        <colgroup>
                            <col width="160">
                                <col width="60">
                                <col width="50">
                                <col width="74">
                                <col width="87">
                                <col width="47">
                                <col width="27">    

                        </colgroup>
                        <tbody>
                     
                        <tr>
                            <td><a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a></td>
                            <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                            <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                            <td>
                                <?$ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array()); 
                                    //arshow($ar_res);
                                    $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                                    if ($ar_res[0]['CURRENCY']=='RUB') {$newval=$val;} 
                                            elseif ($ar_res[0]['CURRENCY']=='USD') {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                                            }
                                            else {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "EUR", "RUB");                                                
                                            }
                                    $newval=number_format(round($newval, 2), 2, ',', ' ');
                                    echo $newval;?>
                            </td>
                            <td>
                                <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" value="<?// ShowUncachedContent("offerQuantity_".$arElement['ID']); ?>">
                                <button value="<?=$arElement['ID']; ?>" class="addToCart"></button>
                            </td>
                            <td id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></td>
                            <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", 'Удалить товар из корзины')?>"><img src="/images/del1.png" /></a></td>
                        </tr> 
                        <?}
                   
        if ($arElement==end($arResult['ITEMS'])){?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div></div>   
        <?}}
    
    }
    

            ?>
        </div> 
        <?=iconv("CP1251", "UTF-8", '<noindex><div style="color: #000; font: normal 12px Tames;" ><span style="color: red;">*</span> Вся представленная на сайте информация, касающаяся стоимости товаров, носит информационный характер и не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса РФ. Для получения подробной информации о стоимости, сроках и условиях поставки просьба обращаться в отдел продаж.</div></noindex>')?>
        
</div> 