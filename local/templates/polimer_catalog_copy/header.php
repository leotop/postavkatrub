<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <title><?$APPLICATION->ShowTitle()?></title>

    <?$APPLICATION->AddHeadScript("/js/jquery-1.7.1.min.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.core.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.widget.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.position.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.mouse.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.slider.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.selectmenu.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/jquery.jcarousel.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/cufon-yui.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/Europe_400-Europe_700.font.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/jquery.prettyPhoto.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/logic.js"); ?>

    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.selectmenu.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.slider.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/skin.carousel.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/prettyPhoto.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/styles.css"); ?>

    <? $APPLICATION->ShowHead(); ?>
    <script>
        $(function() {
            basket_hover();
            // button3();  
        });
    </script>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper-holder">
<div class="header">
    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="114" id="tryba" align="middle">
        <param name="movie" value="/swf/tryba.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#000000" />
        <param name="play" value="true" />
        <param name="loop" value="true" />
        <param name="wmode" value="transparent" />
        <param name="scale" value="showall" />
        <param name="menu" value="true" />
        <param name="devicefont" value="false" />
        <param name="salign" value="" />
        <param name="flashVars" value="t=7" />
        <param name="allowScriptAccess" value="sameDomain" />
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="/swf/tryba.swf" width="100%" height="114">
            <param name="movie" value="/swf/tryba.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#000000" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="transparent" />
            <param name="scale" value="showall" />
            <param name="menu" value="true" />
            <param name="devicefont" value="false" />
            <param name="salign" value="" />
            <param name="flashVars" value="t=7" />
            <param name="allowScriptAccess" value="sameDomain" />
            <!--<![endif]-->
            <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
            </a>
            <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
    </object>
    <div class="header-wrapper">

        <div class="h-tube">
            <div class="h-tube-a"></div>
            <div class="h-tube-b"></div>
            <div class="h-tube-c"></div>
        </div>

        <div class="header-phones">
            <?$APPLICATION->IncludeFile(
                    "/inc/phone_shop.php",
                    Array(),
                    Array("MODE"=>"HTML")
                );?>
            <?$APPLICATION->IncludeFile(
                    "/inc/phone_warehouse.php",
                    Array(),
                    Array("MODE"=>"HTML")
                );?>

            <?require_once($_SERVER['DOCUMENT_ROOT'].'/local/templates/.default/include/login_popup.php');?> 
        </div>
        <div class="lout header-content">
            <a href="/">
                <?$APPLICATION->IncludeFile(
                        "/inc/logo.php",
                        Array(),
                        Array("MODE"=>"HTML")
                    );?>
            </a>
            <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top_menu",
                    Array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "top",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    ),
                    false
                );?>
        </div>
    </div>
</div>
<div class="wrapper">
<div class="lout clearfix">

<div class="left-column">
    <div class="blue-block">
        <div class="enter_wrapper"> 
            <div class="enter_content">
                <div class="enter_titles">
                    <div>каталог продукции</div>

                </div>

            </div>
        </div>
        <div class="rubricator-holder">
            <?/*$APPLICATION->IncludeComponent(
                "bitrix:catalog.section.list",
                "left_menu",
                Array(
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID" => "28",
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_CODE" => "",
                "SECTION_URL" => "",
                "COUNT_ELEMENTS" => "N",
                "TOP_DEPTH" => "2",
                "SECTION_FIELDS" => array(),
                "SECTION_USER_FIELDS" => array(),
                "ADD_SECTIONS_CHAIN" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_GROUPS" => "Y"
                )
            );*/?>
            <?$APPLICATION->IncludeComponent("nocache:catalog.section.list", "left_menu", array(),false);?>  
        </div>
    </div>
    <?$APPLICATION->IncludeFile(
            "/inc/news_subscribe.php",
            Array(),
            Array("MODE"=>"HTML")
        );?>
</div>
<div class="main-column">
<?$APPLICATION->IncludeFile(
        "/inc/search_bar_inner.php",
        Array(),
        Array("MODE"=>"HTML")
    );?>
<div class="container-head">
    <h1 class="page-title">
        <?=$APPLICATION->ShowTitle(false);?>
    </h1>

    <div id="basket-line_wrapper">
        <div class="basket" id="basket-line">

            <?
                //если пользователь авторизован, то начинаем движение "летающей" корзины с учетом админ. панели                
                if ($_SESSION['SESS_AUTH']['LOGIN'])
                    $start_fly_px=305;

                else $start_fly_px=250;
            ?>

            <?
                $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "bitronic", array(
                    "PATH_TO_ORDER" => "/personal/order/make/",
                    "COLOR_SCHEME" => "ice",
                    "NEW_FONTS" => "Y",
                    "INCLUDE_JQUERY" => "Y",
                    "INCLUDE_JGROWL" => "Y",
                    "VIEW_PROPERTIES" => "N",
                    "QUANTITY_LOGIC" => "q_positions",
                    "CHANGE_QUANTITY" => "N",
                    "CONTROL_QUANTITY" => "N",
                    "IMAGE" => "",
                    "CURRENCY" => "",
                    "MARGIN_TOP" => "0",
                    "MARGIN_SIDE" => "0",
                    "START_FLY_PX" => $start_fly_px,
                    "MARGIN_TOP_FLY_PX" => "0",
                    "BASKET_POSITION" => "LEFT"
                    ),
                    false
                );?>
        </div>
    </div>
            </div>