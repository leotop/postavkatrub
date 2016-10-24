<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script>
$(function() {
   var basket_top = window.pageYOffset;
  // alert(basket_top);
   if (basket_top<300) {
              $('.yen-bs-box').removeClass('yen-bs-scrollBasket');
              $('.yen-bs-box .yen-bs-count').removeClass('yen-bs-box2');
              }
              else {
              $('.yen-bs-box').addClass('yen-bs-scrollBasket');
              $('.yen-bs-box .yen-bs-count').addClass('yen-bs-box2');

              var wrapper_width=parseInt($('.wrapper').css('width')); //ширина заполненной области
              var fly_width=parseInt($('.yen-bs-count').css('width')); //ширина летающей корзины
   // alert(fly_width+'/'+wrapper_width+'/'+parseInt($('body').css('width')));
    var left_fly=((parseInt($('body').css('width'))-wrapper_width)/2)*1+wrapper_width*1-fly_width-23;
    $('.yen-bs-scrollBasket .yen-bs-box2').css('left', left_fly+'px');
              }
});
</script>

<?if($arParams['IT_IS_AJAX_CALL'] != 'Y'):?>

<div class="yen-bs-box1">
<?endif;?>
    <div class="yen-bs-count yen-bs-up">
        
        <a href="/personal/cart/" class="basket-title basket-title-custom" title="<?=GetMessage('YS_BS_IN_BASKET');?>">
            <span class="e_basket_title">Ваша корзина</span>
            <span class="e_basket_icon"><i id="e_basket_count"><?= count($arResult['ITEMS']); ?></i></span>
            <span class="e_basket_amount">товаров <i id="e_basket_total"><?= count($arResult['ITEMS']); ?></i> шт.</span>
            <span class="e_basket_amount">на сумму <i id="e_basket_totalsum"><?=$arResult['allSum_FORMAT'];?></i> руб.</span>
        </a>
        
        <?/*<a href="/personal/cart/" class="basket-title" title="<?=GetMessage('YS_BS_IN_BASKET');?>">
            <span class="korzina"><?=GetMessage('YS_BS_IN_BASKET');?>:</span>
            <span class="basket-price"><?=$arResult['allSum_FORMAT'];?> руб.</span>
        </a>*/?>

        <div class="yen-bs-popup <?=$arParams['YS_BS_OPENED'] !='Y' ? 'yen-bs-closed' : 'yen-bs-opened';?> " id="yen-bs-bag-popup">
            <div class="yen-bs-rasp"></div>
            <a class="yen-bs-close" onclick="yenisite_bs_close()" title="<?=GetMessage('YS_BS_CLOSE');?>"><?=GetMessage("YS_BS_CLOSE_SYM{$arResult['FONTS']}");?></a>
            <table>
                <tbody>
                    <tr>
                        <td class="yen-bs-t_photo"><?=GetMessage('YS_BS_TH_PHOTO');?></td>
                        <td class="yen-bs-t_name"><?=GetMessage('YS_BS_TH_NAME');?></td>
                        <td class="yen-bs-t_price"><?=GetMessage('YS_BS_TH_PRICE');?></td>
                        <td class="yen-bs-t_count"><?=GetMessage('YS_BS_TH_COUNT');?></td>
                        <td class="yen-bs-t_delete"><?=GetMessage('YS_BS_TH_DELETE');?></td>
                    </tr>
                </tbody>
            </table>
            <?if ($arResult["READY"]=="Y"):?>
                <div class="yen-bs-bask_wr" id="yen-bs-scrollbar">
                    <table>
                        <tbody>
                            <?
                           // arshow($arResult['ITEMS']);
                           
                            foreach ($arResult['ITEMS'] as $i=>$arItem)
                            {
                             $res = CIBlockElement::GetByID($arItem["PRODUCT_ID"]);
                                                if($ar_res = $res->GetNext())
                                              //  arshow($ar_res);
                                                $sect_id=$ar_res['IBLOCK_SECTION_ID']; 
                                $link = str_replace($ar_res['CODE'],$ar_res['ID'],$ar_res['DETAIL_PAGE_URL']);
                                if($arItem['DELAY']=='N' && $arItem['CAN_BUY']=='Y')
                                {
                                   // arshow($arItem['DETAIL_PAGE_URL']);
                                    ?>
                                
                                <tr id="YS_BS_ROW_<?=$i;?>">
                                    <td class="yen-bs-t_photo">
                                        <?if(false):?><a href="/catalog/<?=$sect_id?>/<?=$arItem["PRODUCT_ID"]?>/" title="<?=$arItem['NAME'];?>"><?endif?>
                                        <a href="<?=$link?>" title="<?=$arItem['NAME'];?>">
                                        <img src="<?=$arItem['PRODUCT_PICTURE_SRC'] ? $arItem['PRODUCT_PICTURE_SRC'] : $arParams['PATH_TO_NO_PHOTO'];?>" alt="<?=$arItem['NAME'];?>">
                                        </a>
                                    </td>
                                    <td class="yen-bs-t_name">
                                        <h3>
                                        <?if(false):?>
                                            <a href="/catalog/<?=$sect_id?>/<?=$arItem["PRODUCT_ID"]?>/">
                                                <?=html_entity_decode($arItem['NAME']);?>
                                            </a>
                                        <?endif?>
                                            <a href="<?=$link?>">
                                                <?=html_entity_decode($arItem['NAME']);?>
                                            </a>

                                        </h3>
                                        <?if($arParams['VIEW_PROPERTIES'] == 'Y'):?>
                                            <?foreach($arItem['PROPS'] as $prop):?>
                                                <b><?=$prop['NAME'];?>: <?=$prop['VALUE'];?></b>
                                                <br />
                                            <?endforeach;?>
                                        <?endif;?>
                                    </td>
                                    <td class="yen-bs-t_price">
                                        <span class="yen-bs-price">
                                            <?=$arItem["YS_PRICE_FORMATED"];?> <span class="yen-bs-rubl"><?=$arResult['CURRENCY'];?></span>
                                            <input type="hidden" class="ys_bs_price" name="YS_BS_PRICE_<?=$arItem['ID'];?>" id="YS_BS_PRICE_<?=$i;?>" value="<?=$arItem["PRICE"];?>"/>
                                        </span>
                                    </td>
                                    
                                    <td class="yen-bs-t_count">
                                        <?if($arParams['CHANGE_QUANTITY'] != 'Y'):?>
                                        <input type="hidden" name="old_q" class="old_q" id="YS_BS_OLD_Q_<?=$i;?>" value="<?=$arItem["QUANTITY"];?>">
                                        <input type="hidden" class="el_id" name="el_id" value="<?=$arItem["PRODUCT_ID"];?>">
                                        <input autocomplete="off" type="text" name="YS_BS_QUANTITY_<?=$arItem['ID'];?>" id="YS_BS_QUANTITY_<?=$i;?>" value="<?=$arItem["QUANTITY"];?>" class="yen-bs-txt yen-bs-w32 yen-bs-q" onchange="yen_setQuantity('<?=$i;?>', 'c', <?=$arItem['PRODUCT_ID'];?>); return false;">
                                        <button onclick="yen_setQuantity('<?=$i;?>', 'p', <?=$arItem['PRODUCT_ID'];?>); return false;" class="yen-bs-button4" title="<?=GetMessage('YS_BS_BUTTON_PLUS');?>">+</button> <button onclick="yen_setQuantity('<?=$i;?>', 'm', <?=$arItem['PRODUCT_ID'];?>); return false;" class="yen-bs-button5" title="<?=GetMessage('YS_BS_BUTTON_MINUS');?>">-</button>
                                        <?else:?>
                                            <input type="text" name="YS_BS_QUANTITY_<?=$arItem['ID'];?>" id="YS_BS_QUANTITY_<?=$i;?>" disabled="disabled" value="<?=$arItem["QUANTITY"];?>" class="yen-bs-txt yen-bs-w32">
                                        <?endif;?>
                                    </td>
                                    <td class="yen-bs-t_delete">
                                        <button onclick="yen_setQuantity('<?=$i;?>', 'd', <?=$arItem['PRODUCT_ID'];?>); return false;" class="yen-ys-button6 yen-bs-sym" title="<?=GetMessage('YS_BS_BUTTON_DEL');?>"><?=GetMessage("YS_BS_DELETE{$arResult['FONTS']}");?></button>
                                        <hidden name="yen-bs-eid" class="yen-bs-eid" value="<?=$arItem['PRODUCT_ID'];?>"/>
                                    </td>
                                </tr>
                                <?
                                }
                            }?>
                        </tbody>
                    </table>
                </div><!--/bask_wr-->
            <?endif;?>
            <input type="hidden" name="all_sum" id="yen-bs-all-sum" value="<?=$arResult['allSum'];?>"/>
            <div class="yen-bs-make_order"><span class="yen-bs-sum"><?=GetMessage('YS_BS_IN_TOTAL');?><strong id="YS_BS_TOTALSUM"><?=$arResult['allSum_FORMAT'];?></strong> <strong><span class="yen-bs-rubl yen-bs-noabs"><?=$arResult['CURRENCY'];?></span></strong></span>
                <button id="basketOrderButton3" onclick="$('#yen-bs-basket_form').submit();  return false;" class="bButton"><span><?=GetMessage('YS_BS_ORDER');?></span></button><form id="yen-bs-basket_form" method="get" action="<?=$arParams["PATH_TO_ORDER"]?>"></form>
            </div> <!--/make_order-->
            <div class="yen-bs-pbot"></div>
        </div> <!-- /basket-popup -->
    </div> <!-- /yen-bs-count -->    
<?if($arParams['IT_IS_AJAX_CALL'] != 'Y'):?>
</div> <!-- /yen-bs-box -->
<?endif;?>
<!-- end basket small -->