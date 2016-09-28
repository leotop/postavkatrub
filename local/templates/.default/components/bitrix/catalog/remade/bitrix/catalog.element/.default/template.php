<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//arshow($arResult)?>

<?
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


 <?
//проверяем есть ли товар в корзине и сохраняем в переменную кол-во
          if (array_key_exists($arResult['ID'], $arBasketGoods)) {
              $goodQuant=$arBasketGoods[$arResult['ID']];
          }
                else {
                   $goodQuant='0'; 
                }
                                    ?>



 <script>
 $(function() {
    //добавление товара в корзину при нажатии на Enter 
         $(".quant2").keypress(function(event) {
         if (event.which == '13' || event.which == '10') {
          $(".addToCart2").click();
          }
     });
     
     
     $(".addToCart2").click(function() {
            if ($('.quant2').val()=='') {
        
           var el = $(this);
            $.ajax({
                        type: 'POST',
                        url: '/catalog/ajax2.php',
                        data: '',
                        success: function(response) {
                            var $tip = $('<div class="tipsy tipsy-w" style="position:absolute;left:884px; top:518px"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                            $tip.find('.tipsy-inner').html(response);
                            $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                            var pos = el.offset();
                            $tip.css({ top:518 + 'px', left:880 + 'px' });
                            $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                            window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                        },
                });
            
            } else {
                var productID = $(this).val();
                var quantity = parseInt($("#quantity2_"+productID).val());
             //   alert(quantity);
                var el = $(this);
                var thisId = parseInt($("#quantity2_"+productID).val());
                quantity=$("#id2_"+productID).val()*1+quantity;
              //  alert(quantity);
                
                $('.el_id').each(function() {
                    if (parseInt($(this).val())==thisId) {
                        $(this).parent().find('.yen-bs-txt').val(quantity);
                    }
                });
                //el.css('backgroundImage', 'url(/images/ajax-loader.gif)');
                $.ajax({
                        type: 'POST',
                        url: '/catalog/ajax.php',
                        data: 'action=ADD2BASKET&id='+productID+'&quantity='+quantity,
                        success: function(response) {
                            $("#basket-line").html(response);
                            el.css('backgroundImage', 'url(/images/cart_min.png)');
                            var $tip = $('<div class="tipsy tipsy-w"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                            $tip.find('.tipsy-inner').html(response);
                            $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                            var pos = el.offset();
                            $tip.css({ top:518 + 'px', left:880 + 'px' });
                            $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                            window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                            $("#id2_"+productID).val(quantity);
                            
                            $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-parseInt($('#basketOrderButton3').css('width'))-20+'px');
                        },
                });
    }
        });
       
 });
 </script>

<div class="product-block clearfix">
    <?//arshow($arResult);?>

    <input type="hidden" id="id2_<?=$arResult['ID']?>" value="<?=$goodQuant?>" />
    
    <div class="product-img-card">
<div class="product-img-card_inner">
        <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
</div>
    </div>

    <div class="product-descr">
    <h2><?=$arResult['NAME']?></h2>
        <?
            if(count($arResult['PROPERTIES'])) {
            ?>
            <ul class="product-features">

                <li><span><?=$arResult['PROPERTIES']['_']['NAME']?>:</span>&nbsp; <?=$arResult['PROPERTIES']['_']['VALUE']?></li>
                <li><span><?=$arResult['PROPERTIES']['_size']['NAME']?>:</span>&nbsp; <?=$arResult['PROPERTIES']['_size']['VALUE']?></li>
                <li><span>Количество:</span>&nbsp; <input class="quant2" type="text" id="quantity2_<?=$arResult['ID']; ?>" value="<?// ShowUncachedContent("offerQuantity_".$arOffer['ID']); ?>">
                </li>
                <li><span>Цена:</span>
               
               <?$ar_res = GetCatalogProductPriceList($arResult['ID'],array(),array()); 
                                            $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                                            if ($ar_res[0]['CURRENCY']=='RUB') {$newval=$val;} 
                                            elseif ($ar_res[0]['CURRENCY']=='USD') {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                                            }
                                            else {
                                            $newval = CCurrencyRates::ConvertCurrency($val, "EUR", "RUB");                                                
                                            }
                                            $newval=number_format(round($newval, 2), 2, ',', ' '); 
                                           // echo $newval;
                                            
                                            
                                         //   $exp_price=explode('.',$newval);
                                          //  $cop=substr($exp_price[1],0,2); ?>
                
                &nbsp; <?/*$ar_res = GetCatalogProductPriceList($arResult['ID'],array(),array()); 
                        $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                        $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                        $exp_price=explode('.',$newval);
                        $cop=substr($exp_price[1],0,2);
                        echo $exp_price[0].','.$cop.*/ echo $newval?> рублей&nbsp;&nbsp; <button value="<?=$arResult['ID']; ?>" class="addToCart2"></button></li>

            </ul>
            <?
            }
        ?>
    </div>
</div>
<?
    if(count($arResult["PROPERTIES"]['FILES']['VALUE'])) {
    ?>
    <ul class="product-files">
        <?
            foreach($arResult["PROPERTIES"]['FILES']['VALUE'] as $arFile) {
             $rsFile = CFile::GetByID($arFile);
        $arFile_info = $rsFile->Fetch();   
            ?>
            <li><a href="<?=CFile::GetPath($arFile)?>"><?=$arFile_info['ORIGINAL_NAME']; ?></a></li>
            <?
            }
        ?>
    </ul>
    <?
}   ?>

<div class="product_description">
    <?=$arResult['DETAIL_TEXT']?>
</div>


<img src="/images/certs.png">

    <?
    if(count($arResult["PROPERTIES"]['buy_with']['VALUE'])) {
    ?>
    <div class="also-buy-products">
    <!--    <h4>РЎ СЌС‚РёРј РїСЂРѕРґСѓРєС‚РѕРј С‚Р°РєР¶Рµ СЃРјРѕС‚СЂСЏС‚:</h4>   -->
        <ul class="">
            <?
                foreach($arResult["PROPERTIES"]['buy_with']['VALUE'] as $arItem) {
                 $res = CIBlockElement::GetByID($arItem);
         $ar_res = $res->GetNext();
                    ?>
                <li>
                    <a href="/catalog/<?=$ar_res['IBLOCK_SECTION_ID']?>/<?=$ar_res['ID']?>/"><?=$ar_res['NAME']; ?></a>
                </li>
                <?
                }
            ?>                        
        </ul>
    </div>
    <?
    }
?>
      
