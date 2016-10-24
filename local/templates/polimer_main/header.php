<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeTemplateLangFile(__FILE__);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->SetAdditionalCSS("/css/styles.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.selectmenu.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.slider.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/skin.carousel.css"); ?>

    <? $APPLICATION->ShowHead(); ?>
    <script type="text/javascript">
        $(function() {
            var width = 0;
            $(".vendor-list li").each(function() {
                width += 80;
                console.log(1);
            });

            $(".vendor-list-holder").width(width);

            $('.clearfix input[type=text]').css('float', 'right !important');
        });
    </script>
    <script>
        $(function() {
            basket_hover();
            // button3();
        });
    </script>

    <script>
        $(function() {         
            $(window).scroll(function() {         
                if($(this).scrollTop() != 0) {         
                    $('#toTop').fadeIn();         
                } else {         
                    $('#toTop').fadeOut();         
                }         
            });

            $('#toTop').click(function() {         
                $('body,html').animate({scrollTop:0},800);         
            });         
        });    
    </script>        


    <meta name="mailru-domain" content="heKkqj1lb4wytzC6" />

    <script type="text/javascript">
        $(document).ready(function()
            {
                $('#slider1').tinycarousel();
        });
    </script>

    <link rel="stylesheet" type="text/css" href="/css/component.css" />

</head>
<body>
<div id='toTop' style='z-index:200;cursor:pointer;display:none;width:70px;height:35px;position:fixed;right:10%;bottom:110px;background:rgba(64, 71, 79, 0.4);border-radius:5px;'>
    <span style='display:block;border-left:2px solid #999;border-top:2px solid #999;width:10px;height:10px;transform:rotate(45deg);position:absolute;top:13px;left:30px;'></span></div>    
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="wrapper-holder">
<div class="header">

    <div class="header-wrapper">

        <div class="h-tube">
            <div class="h-tube-a"></div>
            <div class="h-tube-b"></div>
            <div class="h-tube-c"></div>
        </div>

        <div class="header-phones">

            <?require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/.default/include/login_popup.php');?> 
        </div>
        <div class="lout header-content">
            <a href="/" class="logo">
                <?$APPLICATION->IncludeFile(
                        "/inc/logo.php",
                        Array(),
                        Array("MODE"=>"HTML")
                    );?>
            </a>
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
            <div class="clear"></div>
            <div class="back_buttons">
                <a class="md-trigger m1" data-modal="modal-10">Обратная связь</a>
                <a class="md-trigger" data-modal="modal-11">Заказать звонок</a>
                <a class="md-trigger m-order" data-modal="modal-100">Оставить заявку</a>
            </div>
            <div class="menu_area">
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
                <?$APPLICATION->IncludeFile(
                        "/inc/search_bar_inner.php",
                        Array(),
                        Array("MODE"=>"HTML")
                    );?>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clear"></div>

    </div>
</div>
<div class="wrapper">

<div class="lout clearfix clearfix2">                

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


            <?/*$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "left_menu", array(
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID" => "37",
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_CODE" => "",
                "COUNT_ELEMENTS" => "N",
                "TOP_DEPTH" => "3",
                "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
                ),
                "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
                ),
                "SECTION_URL" => "",
                "CACHE_TYPE" => "N",
                "CACHE_TIME" => "36000000000000000000000000",
                "CACHE_GROUPS" => "N",
                "ADD_SECTIONS_CHAIN" => "Y"
                ),
                false
            );*/?>
            <?$APPLICATION->IncludeComponent("nocache:catalog.section.list", "left_menu", array(),false);?>  
        </div>
    </div>
    <?$APPLICATION->IncludeFile(
            "/inc/news_subscribe.php",
            Array(),
            Array("MODE"=>"HTML")
        );?>
    <?$APPLICATION->IncludeFile(
            "/include/banner.php",
            Array(),
            Array("MODE"=>"HTML")
        );?>
</div>
<div class="main-column ">

<div class="container-head main">

    <div class="basket <?if ($APPLICATION->GetCurPage()=='/personal/order/make/') {echo 'topmin30';}?>" id="basket-line">
        <?/*$APPLICATION->IncludeComponent(
            "bitrix:sale.basket.basket.line",
            "",
            Array(
            "BUY_URL_SIGN" => "action=ADD2BASKET",
            "PATH_TO_BASKET" => "/personal/cart/",
            "PATH_TO_PERSONAL" => "/personal/",
            "SHOW_PERSONAL_LINK" => "Y"
            ),
            false
        );*/?>

        <?
            //если пользователь авторизован, то начинаем движение "летающей" корзины с учетом админ. панели
            if ($_SESSION['SESS_AUTH']['LOGIN'])
                $start_fly_px=305;

            else $start_fly_px=250;
        ?>

        <?
            $APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket.small", 
    "bitronic_edit", 
    array(
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
        "BASKET_POSITION" => "LEFT",
        "COMPONENT_TEMPLATE" => "bitronic_edit",
        "PATH_TO_BASKET" => "/personal/basket.php",
        "SHOW_DELAY" => "Y",
        "SHOW_NOTAVAIL" => "Y",
        "SHOW_SUBSCRIBE" => "Y"
    ),
    false
);?>
    </div>
</div>

<?$APPLICATION->IncludeFile(
    "/inc/banner.php",
    Array(),
    Array("MODE"=>"html")
    );?>