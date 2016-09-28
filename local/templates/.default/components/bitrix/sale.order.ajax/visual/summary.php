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
                    <td><?=iconv("CP1251", "UTF-8", 'Наименование')?></td>
                    <td><?=iconv("CP1251", "UTF-8", 'Размер')?></td>
                    <td><?=iconv("CP1251", "UTF-8", 'Цена за ед., руб.')?></td>
                    <td><?=iconv("CP1251", "UTF-8", 'Количество')?></td>
                    <td><?=iconv("CP1251", "UTF-8", 'Сумма, руб.')?></td>
                    
                    
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
                <div class="product-row">
                        <div class="product-row-inner">
                            <?/*<h4><a href="/catalog/<?=$section_id?>/<?=$arBasketItems['PRODUCT_ID']?>/" target="_blank" title="<?=$arBasketItems['NAME'];?>"><?=$arBasketItems['NAME'];?></a></h4>*/?>
                            <div class="product-desr clearfix">
                
                <table class="product-offers" cellpadding="0" cellspacing="0">
                                    <colgroup>
                                         <col width="178">
                                         <col width="97">
                                        <col width="153">
                                        <col width="97">
                                        <col width="127">
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
                                                    echo $arBasketItems["PRICE"]?></td>
                                                
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


   

 <?/*
<table class="sale_data-table summary">
<thead>
	<tr>
		<th><?=GetMessage("SOA_TEMPL_SUM_PICTURE")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_NAME")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_PROPS")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_WEIGHT")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_QUANTITY")?></th>
		<th><?=GetMessage("SOA_TEMPL_SUM_PRICE")?></th>
	</tr>
</thead>
<tbody>
	<?
	foreach($arResult["BASKET_ITEMS"] as $arBasketItems)
	{
		?>
		<tr>
			<td>
				<?
				if (count($arBasketItems["DETAIL_PICTURE"]) > 0) {
					echo CFile::ShowImage($arBasketItems["DETAIL_PICTURE"], $arParams["DISPLAY_IMG_WIDTH"], $arParams["DISPLAY_IMG_HEIGHT"], "border=0", "", false);}
				elseif (count($arBasketItems["PREVIEW_PICTURE"]) > 0)
					echo CFile::ShowImage($arBasketItems["PREVIEW_PICTURE"], $arParams["DISPLAY_IMG_WIDTH"], $arParams["DISPLAY_IMG_HEIGHT"], "border=0", "", false);
				?>
			</td>
			<td><?=$arBasketItems["NAME"]?></td>
			<td>
				<?
				foreach($arBasketItems["PROPS"] as $val)
				{
					echo $val["NAME"].": ".$val["VALUE"]."<br />";
				}
				?>
			</td>
			<td><?=$arBasketItems["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>
			<td><?=$arBasketItems["WEIGHT_FORMATED"]?></td>
			<td><?=$arBasketItems["QUANTITY"]?></td>
			<td class="price"><?=$arBasketItems["PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
	</tbody>
	<tfoot>
	<tr class="">
		<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_WEIGHT_SUM")?></td>
		<td class="price"><?=$arResult["ORDER_WEIGHT_FORMATED"]?></td>
	</tr>
	<tr>
		<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></td>
		<td class="price"><?=$arResult["ORDER_PRICE_FORMATED"]?></td>
	</tr>
	<?
	if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
	{
		?>
		<tr>
			<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</td>
			<td class="price"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	if(!empty($arResult["arTaxList"]))
	{
		foreach($arResult["arTaxList"] as $val)
		{
			?>
			<tr>
				<td colspan="6" class="itog"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
				<td class="price"><?=$val["VALUE_MONEY_FORMATED"]?></td>
			</tr>
			<?
		}
	}
	if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
	{
		?>
		<tr>
			<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></td>
			<td class="price"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
		</tr>
		<?
	}
	if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
	{
		?>
		<tr>
			<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></td>
			<td class="price"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
		</tr>
		<?
	}
	?>
	<tr class="last">
		<td colspan="6" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
		<td class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
	</tr>
</tfoot>
</table>
*/?>





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