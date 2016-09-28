<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//arshow($arResult);?>
<div class="news-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?$f_path=CFile::GetPath($arItem["PROPERTIES"]["PRICELIST"]["VALUE"]);?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a href="<?echo $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
        <?/*if ($f_path) {?>
        <div class="download_price"><a href="<?=$f_path?>" title="Скачать прайс-лист">Скачать прайс-лист</a></div>
        <?}*/?>
    </div>
<?endforeach;?>
</div>
