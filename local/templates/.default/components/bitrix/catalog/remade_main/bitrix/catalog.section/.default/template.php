<?php
    $for_up = CIBlockSection::GetList(array(),array('IBLOCK_ID' => 37,'ID' => $arResult['ID'],'CHECK_PERMISSIONS' => 'N'),false,array('UF_UP_TEXT'))->Fetch();
    $res = CIBlockSection::GetList(array("sort"=>"ASC"), array("SECTION_ID" => $arResult['ID'], "INCLUDE_SUBSECTIONS" => "N" ), false);
    $show_top = ($res->SelectedRowsCount() > 0);  
?>
 
<?if(!empty($for_up['UF_UP_TEXT'])):?>
    <div class='static-content'>
        <p style='margin-top:10px;'><?=$for_up['UF_UP_TEXT']?></p>
    </div>
    <?endif?>
<?
    if ($show_top)
    {
    ?>
    <div class="main_catalog-section-list">
        <ul>
            <?php
                $i=0;
                while ($row = $res->GetNext()) {
                    $res_img = CIBlockElement::GetList(array("name"=>"ASC"), array("SECTION_ID" => $row['ID'], "INCLUDE_SUBSECTIONS" => "Y" ), false, array('nTopCount' => 1))->Fetch();
                    $img = CFile::GetPath($row['PICTURE']);
                    $img1 = CFile::GetPath($res_img['PREVIEW_PICTURE']);
                    $i++;
                ?>
                <li style = "vertical-align: top; text-align: center; height: 160px; width: 160px; display: inline-block;">
                    <a style="text-decoration: none; color: #fff; text-align: center;" href="<?=$row["SECTION_PAGE_URL"]?>">
                        <div class="product_img_inner" style="padding: 0 0px 0 0px; width:203px;">
                            <img src="<?= $img ? $img : $img1?>">
                        </div>
                    <?=$row["NAME"]?></a>
                </li>
                <?php
                }
            ?>
        </ul>
    </div>

    <?php
    } if(!$show_top || !empty($arResult['SUB_ITEMS'])){
    ?>
    <?if(!empty($arResult['SUB_ITEMS'])) $arResult['ITEMS'] = $arResult['SUB_ITEMS']?>
    <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <script>
        $(function() {
            pedia_menu_scroll();
            new_quantity();
        });
    </script>

    <?if(empty($arResult['SUB_ITEMS'])){?>
        <a class='download' <?if(!empty($for_up['UF_UP_TEXT'])):?>style='float:right;'<?endif?> href='/excel/price.php?ID=<?=$arResult['ID']?>'>Скачать прайс</a>
        <?}?>

    <div class="blue-block">

        <?if(!empty($arResult['SUB_ITEMS'])){?>
            <?if (!empty($arResult['DESCRIPTION'])) {?>
                <?=$arResult['DESCRIPTION']?>
                <?}?>
            <?}?>

        <?
            if(count($arResult['ITEMS'])) {
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
            ?>

            <div class="product-list">
                <?foreach($arResult['ITEMS'] as $arElement) {
                        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <?                        
                        if($arElement['DETAIL_PAGE_URL'] == "/catalog/#SECTION_CODE_PATH#/#ELEMENT_ID#/"){
                            $arSelect = Array("DETAIL_PAGE_URL");
                            $arFilter = Array("IBLOCK_ID"=>"37", "ID"=>$arElement['ID'], "ACTIVE"=>"Y");
                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                            if($ob = $res->GetNextElement()){
                                $arFields = $ob->GetFields();
                                $rsParentSection = CIBlockSection::GetByID($arFields['IBLOCK_SECTION_ID']);
                                if ($arParentSection = $rsParentSection->GetNext())    {
                                    $rsParentSectionNext = CIBlockSection::GetByID($arParentSection['ID']);
                                    if ($arParentSectionNext = $rsParentSectionNext->GetNext())    {
                                        $arElement['DETAIL_PAGE_URL'] = '/catalog/'.$arParentSection['CODE'].'/'.$arFields['ID'].'/';
                                    }
                                }                
                            }
                        }
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
                        if((isset($image_prop)==false)) {
                            $image_prop=$arElement['PROPERTIES']['KARTINKA']['VALUE'];?>
                        <div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                            <div class="product-row-inner">
                                <h4><a href="javascript:void(0)"><?=$arElement['PROPERTIES']['KARTINKA']['VALUE']; ?></a></h4>
                                <div class="product-desr clearfix">
                                    <div class="product-img">
                                        <div class="product_img_inner">
                                            <img src='<?=$arElement['PREVIEW_PICTURE']['SRC']?>'>
                                        </div>
                                    </div>

                                    <table class="product-offers" cellpadding="0" cellspacing="0">
                                        <colgroup>
                                            <col width="160">
                                            <col width="85">
                                            <col width="50">
                                            <col width="85">
                                            <col width="75">
                                            <col width="100">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>Наименование</td>
                                                <td>Размер</td>
                                                <td>Ед. измер.</td>
                                                <td>Цена за ед.</td>
                                                <td>На складе</td>
                                                <td>Количество</td>
                                            </tr>    
                                            <tr>
                                                <td>
                                                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a>
                                                    <?if(false):?>
                                                        <a href="<?=$_SERVER['REQUEST_URI'].$arElement['ID']."/"?>"><?=$arElement['NAME']; ?></a><pre style='display:none'><?print_r($arElement)?></pre>
                                                        <?endif?>
                                                </td>
                                                <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                                                <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                                                <td>
                                                    <?

                                                        $ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array());
                                                        $val = $ar_res[0]['PRICE'];
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
                                                
                                                <td class="out-of-stock">
                                                    <? 
                                                        if($arElement['CATALOG_QUANTITY'] == 0) {
                                                            echo GetMessage('CATALOG_QUANTITY_NONE');    
                                                        } else {
                                                            echo $arElement['CATALOG_QUANTITY'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <span class="minus">-</span>
                                                    <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" data-measure="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>" value="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>">
                                                    <span class="plus">+</span>
                                                    <span style="display:none;" id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></span>    
                                                    <button value="<?=$arElement['ID']; ?>" class="addToCart"></button> <!--<a class="cart-shelve-item" href="" title="Удалить товар из корзины"><img src="/images/del1.png" /></a>-->
                                                </td>
                                            </tr>
                                            <?
                                            }
                                            elseif($image_prop==$arElement['PROPERTIES']['KARTINKA']['VALUE']){?>
                                            <tr>                    
                                                <td>
                                                    <a href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a>
                                                    <?if(false):?>
                                                        <a href="<?=$_SERVER['REQUEST_URI'].$arElement['ID']."/"?>"><?=$arElement['NAME']; ?></a><pre style='display:none'><?print_r($arElement)?></pre>
                                                        <?endif?>
                                                </td>
                                                <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                                                <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                                                <td>
                                                    <?
                                                        $ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array());
                                                        $val = $ar_res[0]['PRICE'];
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
                                                
                                                <td class="out-of-stock">
                                                    <?
                                                        if($arElement['CATALOG_QUANTITY'] == 0) {
                                                            echo GetMessage('CATALOG_QUANTITY_NONE');    
                                                        } else {
                                                            echo $arElement['CATALOG_QUANTITY'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <span class="minus">-</span>
                                                    <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" data-measure="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>" value="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>">
                                                    <span class="plus">+</span>
                                                    <span style="display:none;" id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></span>
                                                <button value="<?=$arElement['ID']; ?>" class="addToCart"></button><!--<a class="cart-shelve-item" href="" title="Удалить товар из корзины"><img src="/images/del1.png" /></a>--></td>
                                            </tr>
                                            <?} else {
                                                $image_prop=$arElement['PROPERTIES']['KARTINKA']['VALUE']?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                            <div class="product-row-inner">
                                <h4><a href="javascript:void(0)"><?=$arElement['PROPERTIES']['KARTINKA']['VALUE']; ?></a></h4>
                                <div class="product-desr clearfix">
                                    <div class="product-img">
                                        <div class="product_img_inner">
                                            <img src='<?=$arElement['PREVIEW_PICTURE']['SRC']?>'>
                                        </div>

                                    </div>
                                    <table class="product-offers" cellpadding="0" cellspacing="0">
                                        <colgroup>
                                            <col width="160">
                                            <col width="85">
                                            <col width="50">
                                            <col width="85">
                                            <col width="75">
                                            <col width="100"> 
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>Наименование</td>
                                                <td>Размер</td>
                                                <td>Ед. измер.</td>
                                                <td>Цена за ед.</td>
                                                <td>На складе</td>
                                                <td>Количество</td>
                                            </tr>     
                                            <tr>
                                                <td><a href="<?if(false):?><?=$_SERVER['REQUEST_URI'].$arElement['ID']."/"?><?endif?><?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']; ?></a></td>
                                                <td><?=$arElement['PROPERTIES']['_size']['VALUE']; ?></td>
                                                <td><?=$arElement['PROPERTIES']['_']['VALUE']; ?></td>
                                                <td>
                                                    <?$ar_res = GetCatalogProductPriceList($arElement['ID'],array(),array());
                                                        $val = $ar_res[0]['PRICE'];
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
                                                
                                                <td class="out-of-stock">
                                                    <? 
                                                        if($arElement['CATALOG_QUANTITY'] == 0) {
                                                            echo GetMessage('CATALOG_QUANTITY_NONE');    
                                                        } else {
                                                            echo $arElement['CATALOG_QUANTITY'];
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <span class="minus">-</span>
                                                    <input class="quant" type="text" id="quantity_<?=$arElement['ID']; ?>" data-measure="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>" value="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>">
                                                    <span class="plus">+</span>
                                                    <span style="display:none;" id='id_<?=$arElement['ID'];?>' class="good_quant"><?=$goodQuant?></span>
                                                <button value="<?=$arElement['ID']; ?>" class="addToCart"></button><!--<a class="cart-shelve-item" href="" title="Удалить товар из корзины"><img src="/images/del1.png" /></a>--></td>
                                            </tr>
                                            <?}

                                            if ($arElement==end($arResult['ITEMS'])){?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?}}

            }


        ?>
        <?if(empty($arResult['SUB_ITEMS'])){?>
            <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "/include/stock.php",
                )
            );?>
            <?}?>
    </div>

    <?php
    }
?>
<?if(empty($arResult['SUB_ITEMS'])){?>
    <?
        if (!empty($arResult['DESCRIPTION'])) {
        ?>
        <?=$arResult['DESCRIPTION']?>
        <?php
        } else {}
    ?>
    <?}?>
<?$APPLICATION->SetTitle($arResult['NAME'])?>

</tbody>
</table>
<?if ($arParams['SECTION_CODE'] == 'pvkh123456789'):?>   
    <div style="/*display: none;*/">
        <?if(CMOdule::IncludeModule('iblock')):?>
            <?$res = CIBlockElement::GetList(array('rand' => 'asc'),array('IBLOCK_ID' => 37, 'SECTION_ID' => 4487,'INCLUDE_SUBSECTIONS' => 'Y'),false,array('nTopCount' => 5),array('NAME','ID','IBLOCK_SECTION_ID','CATALOG_PRICE_2','CATALOG_GROUP_ID_2','CATALOG_CURRENCY_2'));?>
            <script>
                $(function() {
                    pedia_menu_scroll();
                    new_quantity();
                });
            </script>
            <?if (array_key_exists($row['ID'], $arBasketGoods)) {
                    $goodQuant=$arBasketGoods[$row['ID']];
                }else {
                    $goodQuant='0';
                }
            ?>
            <div class="product-row">
                <div class="product-row-inner">
                    <div class="product-desr clearfix">
                        <table style="width: 100%;"class="product-offers" cellpadding="0" cellspacing="0">
                        <tbody>
                            <?while($row = $res->GetNext()):?>
                                <tr>
                                    <td class="name_ad"><a style="width: inherit;" href="/catalog/naruzhnoe_vodosnabzhenie/pvkh/<?if(($row['IBLOCK_SECTION_ID']) == 4582){echo'kleevye_truby';} elseif(($row['IBLOCK_SECTION_ID']) == 4581){echo'rastrubnye_truby';}?>/<?=$row['ID']?>"><?=$row['NAME']?></a></td>
                                    <td class="p_ad">
                                        <?$ar_res = GetCatalogProductPriceList($row['ID'],array(),array());
                                            $val = $ar_res[0]['PRICE'];
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
                                    
                                                <td class="out-of-stock">
                                        <? 
                                                        if($arElement['CATALOG_QUANTITY'] == 0) {
                                                            echo GetMessage('CATALOG_QUANTITY_NONE');    
                                                        } else {
                                                            echo $arElement['CATALOG_QUANTITY'];
                                                        }
                                        ?>
                                    </td>
                                    <td class="plus_ad">
                                        <span class="minus">-</span>
                                        <input class="quant" type="text" id="quantity_<?=$row['ID']?>" data-measure="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>" value="<?if($arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]){ echo $arElement["PROPERTIES"]["KOEFFITSIENT"]["VALUE"]; } else { echo '1'; }?>">
                                        <span class="plus">+</span>
                                        <span style="display:none;" id='id_<?=$row['ID']?>' class="good_quant"><?=$goodQuant?></span>
                                        <button class="addToCart" value="<?=$row['ID']?>" class="addToCart"></button></td>
                                </tr>
                                <?endwhile?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <?endif?>
    <?endif?>  
<!-- ad > -->