<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//arshow($arResult)?>

<script>
    $(function() {
        button2(); 
    });
</script>

<div class="section">
    <div class="title"><?=GetMessage("SOA_TEMPL_SUM_TITLE")?></div>
    <div class="product-desr clearfix">
        <table class="product-list-head" cellpadding="0" cellspacing="0">
            <colgroup>
                <col width="193">
                <col width="97">
                <col width="153">
                <col width="97">
                <col width="">
            </colgroup>
            <tr>
                <td>Наименование</td>
                <td>Размер</td>
                <td>Цена за ед., руб.</td>
                <td>Количество</td>
                <td>Сумма, руб.</td>
            </tr>
        </table>
    </div>


    <div class="product-list">
        <div class="product-row">
            <div class="product-row-inner">
                <?/*<h4><a href="/catalog/<?=$section_id?>/<?=$arBasketItems['PRODUCT_ID']?>/" target="_blank" title="<?=$arBasketItems['NAME'];?>"><?=$arBasketItems['NAME'];?></a></h4>*/?>
                <div class="product-desr clearfix">

                    <table class="product-offers" cellpadding="0" cellspacing="0">
                        <colgroup>
                            <col width="200">
                            <col width="100">
                            <col width="155">
                            <col width="100">
                            <col width="155">
                        </colgroup>
                        <tbody>
                            <?
                                foreach($arResult["BASKET_ITEMS"] as $arBasketItems) {
                                    // arshow($arBasketItems);

                                    $res = CIBlockElement::GetByID($arBasketItems['PRODUCT_ID']);
                                    if($ar_res = $res->GetNext())
                                        $section_id=$ar_res['IBLOCK_SECTION_ID'];
                                ?>



                                <?

                                    $res = CIBlockElement::GetList(Array(), array('ID'=>$arBasketItems['PRODUCT_ID']), false, false, array('PROPERTY__size', 'PROPERTY__'));
                                    while($ob = $res->Fetch())
                                    {
                                        $size=$ob['PROPERTY__SIZE_VALUE'];
                                        // $arBasketItems['MEASURE_TEXT']=$ed_izm; 
                                    }   


                                    // echo $arBasketItems["PRODUCT_ID"]; 
                                    $res = CIBlockElement::GetByID($arBasketItems["PRODUCT_ID"]);
                                    if($ar_res = $res->GetNext())
                                        // arshow($ar_res);
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
                                    ?> <td class="prod_name"><a href="/catalog/<?=$sect_id?>/<?=$arBasketItems["PRODUCT_ID"]?>/"><?=$arBasketItems['NAME']; ?></a></td>
                                    <td><?=$size?></td>
                                    <td class="cart-item-price"><?
                                        echo number_format($arBasketItems["PRICE"], 2, '.', ' ');?></td>

                                    <td class="cart-item-quantity"><?=$arBasketItems["QUANTITY"]?></td>

                                    <td>
                                        <span class="sum"><?=number_format($arBasketItems['PRICE']*$arBasketItems['QUANTITY'], 2, '.', ' ');?></span>&nbsp;
                                    <?//=iconv("CP1251", "UTF-8", 'руб.')?></td>

                                </tr>




                                <?
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br /><br />
    <div class="title"><?=GetMessage("SOA_TEMPL_SUM_ADIT_INFO")?></div>

    <table class="sale_order_table">
        <tr>
            <td class="order_comment">
                <div><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></div>
                <textarea name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea>
            </td>
        </tr>
    </table>
</div>