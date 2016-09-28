<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="blue-block">
    <table class="product-list-head" cellpadding="0" cellspacing="0">
        <colgroup>
            <col width="143">
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
    <?
    if(count($arResult['ITEMS'])) {
    ?>
    <div class="product-list">
    <?
        foreach($arResult['ITEMS'] as $arElement) {
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));

    ?><?echo $arElement['PROPERTIES']['_image']['VALUE']?>
        <div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
            <div class="product-row-inner">
                <h4><a href="<?=$arElement['DETAIL_PAGE_URL']; ?>"><?=$arElement['NAME']; ?></a></h4>
                <div class="product-desr clearfix">
                    <div class="product-img">
                        <a href="<?=$arElement['DETAIL_PAGE_URL']; ?>" style="background:url('/upload/images/120/106/<?=$arElement['DETAIL_PICTURE']['ID']; ?>_crop.jpg') no-repeat;"></a>
                    </div>
    <?
            if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])) {
    ?>
                    <table class="product-offers" cellpadding="0" cellspacing="0">
                        <colgroup>
                            <col width="76">
                            <col width="83">
                            <col width="81">
                            <col width="91">
                            <col width="81">
                        
                        </colgroup>
                        <tbody>
    <?
                foreach($arElement['OFFERS'] as $arOffer) {
    ?>
                            <tr>
                                <td><?=$arOffer['DISPLAY_PROPERTIES']['ARTICUL']['DISPLAY_VALUE']; ?></td>
                                <td><?=$arOffer['DISPLAY_PROPERTIES']['SIZE']['DISPLAY_VALUE']; ?></td>
                                <td><?=$arOffer['DISPLAY_PROPERTIES']['UNIT']['DISPLAY_VALUE']; ?></td>
                                <td>
    <?
                    foreach($arOffer["PRICES"] as $code=>$arPrice) {
                        if($arPrice["CAN_ACCESS"]) {
                            if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]) {
    ?>
                                    <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
    <?
                            } else {
    ?>
                                    <?=$arPrice["PRINT_VALUE"]?>
    <?
                            }
                        }
                    }
    ?>
                                </td>
                                <td><?=$arOffer['DISPLAY_PROPERTIES']['COL_IN_PACK']['DISPLAY_VALUE']; ?></td>
                                <td>
                                    <input type="text" id="quantity_<?=$arOffer['ID']; ?>" value="<? ShowUncachedContent("offerQuantity_".$arOffer['ID']); ?>">
                                    <button value="<?=$arOffer['ID']; ?>" class="addToCart"></button>
                                </td>
                            </tr>
    <?
                }
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
    <?
    }
    ?>
</div>