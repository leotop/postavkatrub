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
        <td style="border-left: 1px solid #2E65A8;"><?=iconv("CP1251", "UTF-8", '������������')?></td>
        <td><?=iconv("CP1251", "UTF-8", '������')?></td>
        <td><?=iconv("CP1251", "UTF-8", '��. �����.')?></td>
        <td><?=iconv("CP1251", "UTF-8", '���� �� ��. ���.<span style="color: red;">*</span>')?></td>
        <td><?=iconv("CP1251", "UTF-8", '����� ������')?></td>
        <td colspan="2" style="padding-right: 36px; border-right: 1px solid #2E65A8;"><?=iconv("CP1251", "UTF-8", '���-�� � �������')?></td>
    </tr>
</table>
<?
    if(count($arResult['ITEMS'])) {
   // arshow($arResult['ITEMS']['NAME']);
        $arBasketGoods=array();
        
   //��� ������ ���������� ������� � �������:     
      //  �������� ������� �������� ������������ � �������� ������ �� �������, ����������� � �������
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
//��������� ���� �� ����� � ������� � ��������� � ���������� ���-��
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
                                            $val = $ar_res[0]['PRICE']; // сумма в USD
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
                                    <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", '������� ����� �� �������')?>"><img src="/images/del1.png" /></a></td>
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
                                            $val = $ar_res[0]['PRICE']; // сумма в USD
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
                                    <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", '������� ����� �� �������')?>"><img src="/images/del1.png" /></a></td>
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
                                    $val = $ar_res[0]['PRICE']; // сумма в USD
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
                            <td><a class="cart-shelve-item" href="" title="<?=iconv("CP1251", "UTF-8", '������� ����� �� �������')?>"><img src="/images/del1.png" /></a></td>
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
        <?=iconv("CP1251", "UTF-8", '<noindex><div style="color: #000; font: normal 12px Tames;" ><span style="color: red;">*</span> ��� �������������� �� ����� ����������, ���������� ��������� �������, ����� �������������� �������� � �� �������� ��������� �������, ������������ ����������� ������ 437 (2) ������������ ������� ��. ��� ��������� ��������� ���������� � ���������, ������ � �������� �������� ������� ���������� � ����� ������.</div></noindex>')?>
        
</div> 