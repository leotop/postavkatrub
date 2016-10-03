<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-detail">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
        <?endif?>
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
        <span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
        <?endif;?>
    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
        <h3 style="color: #9b2d30; text-align: center;"><?=$arResult["NAME"]?></h3>
        <?endif;?>
    <?/* if ($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["PREVIEW_TEXT"]):?>
        <p><?=$arResult["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
    <?endif; */ ?>
    <?if($arResult["NAV_RESULT"]):?>
        <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
        <?echo $arResult["NAV_TEXT"];?>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
        <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
        <?echo $arResult["DETAIL_TEXT"];?>
        <?else:?>
        <?echo $arResult["PREVIEW_TEXT"];?>
        <?endif?>
    <div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
        <div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
        <div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
            <div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
        </div>
    </div>
    <br />
    <?if(is_array($arResult["DISPLAY_PROPERTIES"]["SEE_ALSO"])){?>
        <h2>Читайте также:</h2>
        <?foreach($arResult["DISPLAY_PROPERTIES"]["SEE_ALSO"]["DISPLAY_VALUE"] as $DisplayValue){?>
            <p><?=$DisplayValue?></p>             
        <?}?>
        <br />    
    <?}?> 
    <?/*foreach($arResult["FIELDS"] as $code=>$value):?>
        <?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
        <br />
        <?endforeach;?>
        <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

        <?=$arProperty["NAME"]?>:&nbsp;
        <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
        <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
        <?else:?>
        <?=$arProperty["DISPLAY_VALUE"];?>
        <?endif?>
        <br />
        <?endforeach;?>
        <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

        <?=$arProperty["NAME"]?>:&nbsp;
        <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
        <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
        <?else:?>
        <?=$arProperty["DISPLAY_VALUE"];?>
        <?endif?>
        <br />
    <?endforeach;*/?>
    <?
        if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
        {
        ?>
        <div class="news-detail-share">
            <noindex>
                <?
                    $APPLICATION->IncludeComponent("bitrix:main.share", "", array(
                        "HANDLERS" => $arParams["SHARE_HANDLERS"],
                        "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                        "PAGE_TITLE" => $arResult["~NAME"],
                        "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                        "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                        "HIDE" => $arParams["SHARE_HIDE"],
                        ),
                        $component,
                        array("HIDE_ICONS" => "Y")
                    );
                ?>
            </noindex>
        </div>
        <?
        }
    ?>
</div>
