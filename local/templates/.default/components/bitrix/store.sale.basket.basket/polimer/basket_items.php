<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//arshow($arUrlTempl);?>

<?

    //arshow($_SESSION);?>

<script>
    $(document).ready(function() {
        //width(); 
        //new_quantityBasket();
        $('.cart-item-quantity input:text').blur(function() {
            price=parseFloat($(this).val());
            measure = $(this).data('measure');
            if (price % measure != 0) {
                price = Math.ceil(price / measure) * measure;
            };
            $(this).val(price); 
            if (isNaN(price)) {price=0;}
            quantity=parseFloat($(this).parent().parent().find('.cart-item-price').html());
            //alert(quantity);
            if (isNaN(quantity)) {quantity=0;}
            sum=price*quantity;
            //sum=sum.toFixed(2);
            if (isNaN(sum)) {sum=0;}
            sum = number_format(sum, 2, '.', ' ');
            $(this).parent().parent().find('.sum').text(sum);
            //alert($(this).val());

            var total_sum;
            var total_price=0;
            var total_quant=0;

            $('.sum').each(function() {
                total_price+=parseFloat($(this).html());
                total_price=total_price.toFixed(2);
                if (isNaN(total_price)) {total_price=0;}
                //total_quant+=parseFloat($(this).parent().parent().find('.cart-item-quantity input:text'));
            });

            $('.cart-item-quantity input:text').each(function() {
                total_quant+=parseFloat($(this).val());
                total_quant=total_quant.toFixed(2);
                if (isNaN(total_quant)) {total_quant=0;}
            });

            //alert($('.total-price').html());
            total_sum=total_quant*total_price;
            total_sum=total_sum.toFixed(2);
            if (isNaN(total_sum)) {total_sum=0;}

            $('.total-price b').text(total_sum+' pуб.');
        }); 

        /* $('button[name=BasketDelete]').click(function(e) {
        e.preventDefault();
        $('.cart-shelve-item').click();
        });  */
    });
    /*$(document).ready(function() {
    // при изменении поля вручную, округляем до большего значения
    $('.cart-item-quantity-input').change(function () {                
    var measure = $(this).data('measure');
    if ($(this).val() < measure) {
    $(this).val(measure);    
    }  else if ($(this).val() % measure != 0) {
    $(this).val(Math.ceil($(this).val() / measure) * measure);       
    };
    $(this).change();
    return false;
    });
    });*/
</script>

<?//arshow($arResult["ITEMS"]);?>

<div class="blue-block">
    <div class="cart-items" id="id-cart-list">
        <?if(count($arResult["ITEMS"]["AnDelCanBuy"]) > 0):?>
            <div class="product-desr clearfix">
                <table class="product-list-head">
                    <colgroup>
                        <col width="193">
                        <col width="66">
                        <col width="91">
                        <col width="102">
                        <col width="148">
                        <col width="">
                    </colgroup>
                    <tr>
                        <td>Наименование</td>
                        <td>Размер</td>
                        <td>Цена за ед., руб.</td>
                        <td>Количество</td>
                        <td>Сумма, руб.</td>
                        <td></td>

                        <?/*
                            <?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
                            <td class="cart-item-name">РќР°РёРјРµРЅРѕРІР°РЅРёРµ</td>
                            <?endif;?>
                            <? foreach($arResult['TABLE_HEADER'] as $headerName) { ?>
                            <td><?=$headerName; ?></td>
                            <? } ?>
                            <?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
                            <td class="cart-item-price"><?= GetMessage("SALE_PRICE")?></td>
                            <?endif;?>
                            <?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
                            <td class="cart-item-quantity"><?= GetMessage("SALE_QUANTITY")?></td>
                            <?endif;?>
                            <td class="cart-item-actions">
                            <?if (in_array("DELETE", $arParams["COLUMNS_LIST"]) || in_array("DELAY", $arParams["COLUMNS_LIST"])):?>
                            <?=iconv("CP1251", "UTF-8", 'Сумма')?>
                            <?endif;?>
                            </td>
                        */?>
                    </tr>
                </table>
            </div>

            <div class="product-list">
                <?
                    foreach($arResult['ROOT_ITEMS'] as $arItem) {
                    ?>
                    <div class="product-row">
                        <div class="product-row-inner">
                            <h4><a href="<?=$arItem['DETAIL_PAGE_URL']; ?>"><?=$arItem['NAME']; ?></a></h4>
                            <div class="product-desr clearfix">

                                <table class="product-offers" cellpadding="0" cellspacing="0">
                                    <colgroup>
                                        <col width="185">
                                        <col width="75">
                                        <col width="102">
                                        <col width="112">
                                        <col width="170">
                                        <col width="83">
                                    </colgroup>
                                    <tbody>
                                        <?
                                            foreach($arItem['OFFER_KEYS'] as $offerKey) {
                                                $arBasketItem = $arResult["ITEMS"]["AnDelCanBuy"][$offerKey];

                                                $res = CIBlockElement::GetList(Array(), array('ID'=>$arBasketItem['PRODUCT_ID']), false, false, array('PROPERTY__size'));
                                                while($ob = $res->Fetch())
                                                {
                                                    $size=$ob['PROPERTY__SIZE_VALUE'];
                                                }   


                                                $res = CIBlockElement::GetByID($arBasketItem["PRODUCT_ID"]);
                                                if($ar_res = $res->GetNext())
                                                    $sect_id=$ar_res['IBLOCK_SECTION_ID'];
                                            ?>
                                            <tr>

                                                <?  
                                                    foreach($arBasketItem['PROPS'] as $arProp) {
                                                        if($arProp['CODE'] != 'CML2_LINK') {
                                                        ?>

                                                        <?
                                                        }
                                                    }
                                                ?> <td class="prod_name"><a href="/catalog/<?=$sect_id?>/<?=$arBasketItem["PRODUCT_ID"]?>/"><?=html_entity_decode($arBasketItem['NAME']); ?></a></td>
                                                <td><?=$size?></td>
                                                <?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
                                                    <td class="cart-item-price"><?
                                                        echo number_format($arBasketItem['PRICE'], 2, '.', ' ');?></td>
                                                    <?endif;?>
                                                <?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
                                                    <td class="cart-item-quantity"> 
                                                        <input class="cart-item-quantity-input" maxlength="15" type="text" data-measure="<?if (!empty($arBasketItem["MEASURE"])){ echo $arBasketItem["MEASURE"];} else { echo "1"; }?>" name="QUANTITY_<?=$arBasketItem["ID"] ?>" value="<?=$arBasketItem["QUANTITY"]?>" size="3" onkeyup="validateInt(this)">
                                                        <input class="goodId" type="hidden" value="<?=$arBasketItem['PRODUCT_ID']?>" />
                                                    </td>
                                                    <?endif;?>
                                                <td><span class="sum"><?=number_format(round($arBasketItem['PRICE']*$arBasketItem['QUANTITY'], 2), 2, '.', ' ');?></span>&nbsp;<?//=iconv("CP1251", "UTF-8", 'руб.')?></td>
                                                <td class="cart-item-actions">
                                                    <a class="cart-shelve-item" href="<?=str_replace("#ID#", $arBasketItem["ID"], $arUrlTempl["delete"])?>" onclick="location.href='<?=str_replace("#ID#", $arBasketItem["ID"], $arUrlTempl["delete"])?>'" title="<?=iconv("CP1251", "UTF-8", 'Удалить товар из корзины')?>"><img src="/images/basket_del.png" /></a>
                                                </td>
                                            </tr>

                                            <?
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?
                    }
                ?>
            </div>
            <div class="total-price">
                Сумма заказа:
                <?if (doubleval($arResult["DISCOUNT_PRICE"]) > 0):?>
                    <p><?=$arResult["DISCOUNT_PRICE_FORMATED"]?></p>
                    <?endif;?>
                <?if ($arParams['PRICE_VAT_SHOW_VALUE'] == 'Y'):?>
                    <p><?=$arResult["allNOVATSum_FORMATED"]?></p>
                    <p><?=$arResult["allVATSum_FORMATED"]?></p>
                    <?endif;?>

                <b><?=$arResult["allSum_FORMATED"]?></b>


            </div>
            <div class="cart-ordering">
                <?if ($arParams["HIDE_COUPON"] != "Y"):?>
                    <div class="cart-code">
                        <input <?if(empty($arResult["COUPON"])):?>onclick="if (this.value=='<?=GetMessage("SALE_COUPON_VAL")?>')this.value=''" onblur="if (this.value=='')this.value='<?=GetMessage("SALE_COUPON_VAL")?>'"<?endif;?> value="<?if(!empty($arResult["COUPON"])):?><?=$arResult["COUPON"]?><?else:?><?=GetMessage("SALE_COUPON_VAL")?><?endif;?>" name="COUPON">
                    </div>
                    <?endif;?>
                <div class="cart-buttons clearfix">
                    <button class="bButton" type="submit" value="Очистить корзину" name="BasketDelete"><span>Очистить корзину</span></button>
                    <button class="bButton" type="submit" value="<?echo GetMessage("SALE_UPDATE")?>" name="BasketRefresh"><span>Пересчитать</span></button>
                    <button class="bButton" type="submit" value="<?echo GetMessage("SALE_ORDER")?>" name="BasketOrder" id="basketOrderButton2_1"><span>Оформить заказ</span></button>
                    <!--<button class="bButton" type="submit" value="<?echo GetMessage("SALE_ORDER")?>" name="BasketOrder" id="basketOrderButton2"><span><?=iconv("CP1251", "UTF-8", 'Оформить заказ')?></span></button>-->
                </div>
            </div>
            <?else:
                echo ShowNote(GetMessage("SALE_NO_ACTIVE_PRD"));
                endif;?>
    </div>
</div>
<?