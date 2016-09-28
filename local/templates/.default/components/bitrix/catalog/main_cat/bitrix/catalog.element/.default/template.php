<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

        <div class="product-block clearfix">
        <?//arshow($arResult);?>
        
        <?    
                        //свойства торговоых предложений
                        $IBLOCK_ID = $arResult["IBLOCK_ID"]; 
                        $ID = $arResult["ID"]; 
                        $arInfo = CCatalogSKU::GetInfoByProductIBlock($IBLOCK_ID); 
                        if (is_array($arInfo)) 
                        {                                
                            $rsOffers = CIBlockElement::GetList(array(),array('IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'PROPERTY_'.$arInfo['SKU_PROPERTY_ID'] => $ID)); 
                            while ($arOffer = $rsOffers->GetNext()) 
                            {
                                //список торговых предложений
                                //arshow($arOffer);
                                $ar_res = CPrice::GetBasePrice($arOffer["ID"]);
                                
                                //список свойств торгового предлодежия
                                $elLink = CIBlockElement::GetByID($arOffer["ID"]);
                                $el = $elLink->GetNextElement();
                                $props_SKU = $el->GetProperties();
                                //arshow($props_SKU);
                               
                            } 
                        } 
                    ?>
        
            <div class="product-img">
                
                <a href="<?=$arResult['DETAIL_PICTURE']['SRC']; ?>" rel="prettyPhoto[gal]" class="main-img" style="background:url('/upload/images/188/170/<?=$arResult['DETAIL_PICTURE']['ID']; ?>_auto.jpg') no-repeat center center;"></a>
            
            </div>
            <div class="product-descr">
            <?
                if(count($arResult['DISPLAY_PROPERTIES']['FEATURES']['VALUE'])) {
            ?>
                <ul class="product-features">
            <?
                    foreach($arResult['DISPLAY_PROPERTIES']['FEATURES']['VALUE'] as $key => $featureName) {
            ?>
                    <li><span><?=$featureName; ?>:</span> <?=$arResult['DISPLAY_PROPERTIES']['FEATURES']['DESCRIPTION'][$key]; ?></li>
            <?
                }
            ?>
                </ul>
            <?
                }
            ?>
            </div>
        </div>
        <?
            if(count($arResult['DISPLAY_PROPERTIES']['CERTIFICATES']['FILE_VALUE'])) {
        ?>
        <ul class="product-files">
        <?
                foreach($arResult['DISPLAY_PROPERTIES']['CERTIFICATES']['FILE_VALUE'] as $arFile) {
        ?>
            <li><a href="<?=$arFile['SRC']; ?>"><?=$arFile['DESCRIPTION']; ?></a></li>
        <?
                }
        ?>
        </ul>
        <?
            }
             
            //свойства торговоых предложений
                        $IBLOCK_ID = $arResult["IBLOCK_ID"]; 
                        $ID = $arResult["ID"]; 
                        $arInfo = CCatalogSKU::GetInfoByProductIBlock($IBLOCK_ID); 
                        if (is_array($arInfo)) 
                        {                                
                           
        ?>
        <div class="product-list">
            <div class="product-row">
                <div class="product-row-inner">
                    <table class="product-list-head" cellpadding="0" cellspacing="0">
                        <colgroup>
                            <col width="141">
                            <col width="76">
                            <col width="83">
                            <col width="81">
                            <col width="91">
                            <col width="81">
                        </colgroup>
                        <tr>
                            <td>Наименование</td>
                            <td>Код</td>
                            <td>Размер</td>
                            <td>Ед. измер.</td>
                            <td>Цена за ед.</td>
                            <td>Кол в упак.</td>
                            <td>Заказ товара</td>
                        </tr>
                    </table>
                    <div class="product-descr-out">
                        <div class="product-desr clearfix">
                            <div class="product-img">
                                <a href="#" style="background:url('/upload/images/120/106/<?=$arResult['DETAIL_PICTURE']['ID']; ?>_crop.jpg') no-repeat;"></a>
                            </div>
                            <table class="product-offers" cellpadding="0" cellspacing="0">
                                <colgroup>
                                    <col width="76">
                                    <col width="83">
                                    <col width="81">
                                    <col width="91">
                                    <col width="81">
                                
                                </colgroup>
                                <tbody>
                                      <?$rsOffers = CIBlockElement::GetList(array(),array('IBLOCK_ID' => $arInfo['IBLOCK_ID'], 'PROPERTY_'.$arInfo['SKU_PROPERTY_ID'] => $ID)); 
                            while ($arOffer = $rsOffers->GetNext())  {
                                //список торговых предложений
                                //arshow($arOffer);
                                $ar_res = CPrice::GetBasePrice($arOffer["ID"]);
                                
                                //список свойств торгового предлодежия
                                $elLink = CIBlockElement::GetByID($arOffer["ID"]);
                                $el = $elLink->GetNextElement();
                                $props_SKU = $el->GetProperties();
                                //arshow($props_SKU);?>
                                    <tr>
                                        <td><?=$props_SKU["CML2_ARTICLE"]["VALUE"]?></td>
                                        <td><?=$props_SKU["razmr"]["VALUE"] ?></td>
                                        <td><?=$props_SKU["CML2_BASE_UNIT"]["VALUE"] ?></td>
                                        <td>
                                         <?=$ar_res["PRICE"]?>
                                        </td>
                                        <td><?=$props_SKU["quantity_in_pack"]["VALUE"] ?></td>
                                        <td>
                                            <input type="text" id="quantity_<?=$arOffer['ID']; ?>" value="<? ShowUncachedContent("offerQuantity_".$arOffer['ID']); ?>">
                                            <button value="<?=$arOffer['ID']; ?>" class="addToCart"></button>
                                        </td>
                                    </tr>
                                   <?}?>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?
        }
        ?>
        <img src="/images/certs.png">
        <?
            if(count($arResult['SIMILAR'])) {
        ?>
        <div class="similiar-products">
            <h4>Продукты со схожими характеристиками:</h4>
            <ul class="">
        <?
                foreach($arResult['SIMILAR'] as $arItem) {
        ?>
                <li>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']; ?>"><img src="/upload/images/77/67/<?=$arItem['DETAIL_PICTURE']; ?>_crop.jpg"></a>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']; ?>"><?=$arItem['NAME']; ?></a>
                </li>
        <?
                }
        ?>
            </ul>
        </div>
        <?
            }
            
            if(count($arResult['WITH_LOOK'])) {
        ?>
        <div class="also-buy-products">
            <h4>С этим продуктом также смотрят:</h4>
            <ul class="">
        <?
                foreach($arResult['WITH_LOOK'] as $arItem) {
        ?>
                <li>
                    &rarr;
                    <a href="<?=$arItem['DETAIL_PAGE_URL']; ?>"><?=$arItem['NAME']; ?></a>
                </li>
        <?
                }
        ?>                        
            </ul>
        </div>
        <?
            }
        ?>
        <?=$arResult['PREVIEW_TEXT']; ?>
