<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
    <title><?$APPLICATION->ShowTitle(false)?></title>



    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.selectmenu.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/jquery.ui.slider.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/skin.carousel.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/prettyPhoto.css"); ?>
    <?$APPLICATION->SetAdditionalCSS("/css/styles.css"); ?>

    <?// $APPLICATION->ShowHead(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>" />
    <?
        $seo_pages = array(
            '/',
            '/catalog/radiatory/',
            '/catalog/naruzhnoe_vodosnabzhenie/',
            '/catalog/naruzhnoe_vodosnabzhenie/pnd/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/',
            '/catalog/vnutrennyaya_kanalizatsiya/truby_i_fitingi/',
            '/catalog/naruzhnaya_kanalizatsiya/drenazhnie-truby/',
            '/catalog/radiatory/alyuminievye/',
            '/catalog/radiatory/bimetallicheskie-radiatory/',
            '/catalog/radiatory/stalnye_panelnye/',
            '/catalog/inzhenernoe_oborudovanie/schetchiki/vody/',
            '/catalog/ochistnye_ustanovki/septiki/',
            '/catalog/zapornaya_armatura/zadvizhki_zatvory/',
            '/catalog/inzhenernoe_oborudovanie/kollektory_dlya_teplogo_pola_i_shkafy/',
            '/catalog/lyuki/',
            '/catalog/zapornaya_armatura/sharovye_krany/',
            '/catalog/ochistnye_ustanovki/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/polipropilen/',
            '/kanalizatsiya-dlya-doma/',
            '/vodosnabzhenie/',
            '/otoplenie/',
            //                '/catalog/zapornaya_armatura/germetik-lyon/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/metalloplastik/truby_i_fitingi_rehau/',
            '/catalog/naruzhnoe_vodosnabzhenie/pvkh/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/',
            '/catalog/zapornaya_armatura/danfoss/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/teploizolyatsiya/',
            '/catalog/naruzhnoe_vodosnabzhenie/pnd/oborudovanie-dlya-svarki-trub-pnd/',
            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/polipropilen/byudzhetnyy_polipropilen_rossiya_turtsiya/',
            '/catalog/inzhenernoe_oborudovanie/schetchiki/',
            '/catalog/inzhenernoe_oborudovanie/schetchiki/tepla/',
            '/catalog/naruzhnoe_vodosnabzhenie/pnd/oborudovanie-dlya-svarki-trub-pnd/'
        );
        if(in_array($APPLICATION->GetCurPage(),$seo_pages)){
            $APPLICATION->ShowMeta("keywords");
            $APPLICATION->ShowMeta("description");
        }
        else{?>
        <meta name="description" content="<?$APPLICATION->ShowProperty('description1')?>"/>
        <?}
    ?>
    <?$APPLICATION->ShowMeta("robots")?>
    <?$APPLICATION->ShowCSS()?>
    <?$APPLICATION->ShowHeadStrings()?>
    <?$APPLICATION->ShowHeadScripts()?>
    
    <script>
        $(function() {
            basket_hover();
            //  button3();


            /*  $('.yen-bs-count').hover(function() {
            $('.yen-bs-bag-popup').css('display', 'block');
            },
            function() {
            $('.yen-bs-bag-popup').css('display', 'none');
            });*/
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

    <link rel="stylesheet" href="/css/tinycarousel.css" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/bitrix/templates/.default/components/bitrix/sale.recommended.products/polimer/style.css">



    <script type="text/javascript">
        $(document).ready(function()
            {
                $('#slider2').tinycarousel();


                $('.product-desr .product_img_inner img').click(function () {                
                    var o=$(this).parent();
                    var p = o.position();
                    var oleft = p.left;
                    var otop = p.top;                
                    var url=o.find('img').attr('src');
                    var owidth = o.width() + 50;
                    var oheight = o.height() + 50;
                    console.log(owidth);
                    console.log(oheight);
                    //var html='<a href="#" class="clone"><img style="max-height:300px; max-width:300px; margin:0;" src="'+url+'" /></a>'
                    var html='<div style="background-color:#ffffff; padding:10px;" class="clone"><img style="border:2px solid #b6babc; max-height:'+oheight+'px; max-width:'+owidth+'px; margin:0;" src="'+url+'" /></div>';
                    //var html='<div class="clone"><img style="border:2px solid #b6babc; max-width:'+owidth+'px; margin:0;" src="'+url+'" /></div>';
                    o.append(html);
                    o=o.find('.clone');
                    o.css('top',otop);
                    o.css('left',oleft);
                    //o.animate({width:'200%',height:'200%'});
                    o.animate({width:owidth,height:oheight});
                    //o.animate({width:owidth});
                    o.click(function () {
                        $(this).remove();
                    });
                });        
                $('.product-img-card_inner img').click(function () {                
                    var o=$(this).parent();
                    var p = o.position();
                    var oleft = p.left;
                    var otop = p.top;                
                    var owidth = o.width() + 50;
                    var oheight = o.height() + 50;
                    var url=o.find('img').attr('src');                
                    console.log(owidth);
                    console.log(oheight);
                    //var html='<a href="#" class="clone"><img style="max-height:300px; max-width:300px; margin:0;" src="'+url+'" /></a>'
                    var html='<div style="background-color:#ffffff;" class="clone"><img style="border:2px solid #b6babc; min-height:'+oheight+'px; min-width:'+owidth+'px; margin:0;" src="'+url+'" /></div>';
                    //var html='<div class="clone"><img style="border:2px solid #b6babc; min-width:'+owidth+'px; margin:0;" src="'+url+'" /></div>';
                    o.append(html);
                    o=o.find('.clone');
                    o.css('top',otop);
                    o.css('left',oleft);
                    //o.animate({width:'200%',height:'200%'});
                    //o.animate({width:owidth,height:oheight});
                    o.animate({height:oheight});
                    o.click(function () {
                        $(this).remove();
                    });
                });        

        });
    </script>

    <link rel="stylesheet" type="text/css" href="/css/component.css" />
</head>
<body>
<div id='toTop' style='z-index:200;cursor:pointer;display:none;width:70px;height:35px;position:fixed;right:10%;bottom:110px;background:rgba(64, 71, 79, 0.4);border-radius:5px;'>
    <span style='display:block;border-left:2px solid #999;border-top:2px solid #999;width:10px;height:10px;transform:rotate(45deg);position:absolute;top:13px;left:30px;'></span></div>    
<?if(false):?>
    <pre style='display:none'>
        <?print_r($APPLICATION->ShowProperty('description1'));?>
    </pre>
    <?endif?>
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
<div class="clearfix">
<?if(ERROR_404 != 'Y'):?>
    <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "nav",
            array(
                "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => "s1"
            ),
            false
        );?>
    <?endif?>
<div class="left-column">
    <div class="blue-block">
        <div class="enter_wrapper">
            <div class="enter_content">
                <div class="enter_titles">
                    <div>Каталог продукции</div>

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
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_GROUPS" => "Y",
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
<div class="main-column">


<div class="container-head">



    <div id="basket-line_wrapper">
        <div class="basket" id="basket-line">
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
                    $start_fly_px=345;

                else $start_fly_px=295;
            ?>

            <?
                $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "bitronic_reedit", Array(
    "PATH_TO_ORDER" => "/personal/order/make/",    // Страница куда направлять по нажатию кнопки "Оформить заказ"
        "COLOR_SCHEME" => "ice",    // Цветовая схема
        "NEW_FONTS" => "Y",    // Включить новый шрифт
        "INCLUDE_JQUERY" => "Y",    // Подключить jQuery из ядра Битрикса
        "INCLUDE_JGROWL" => "Y",    // Подключить jGrowl (всплывающие окна)
        "VIEW_PROPERTIES" => "N",    // Включить вывод характеристик (используетя для функционала "покупка с характеристиками")
        "QUANTITY_LOGIC" => "q_positions",    // В общем количестве выводить
        "CHANGE_QUANTITY" => "N",    // Запретить изменение количества
        "CONTROL_QUANTITY" => "N",    // Ограничение кол-ва товара, в зависимости от кол-ва на складе
        "IMAGE" => "",    // Стандартное поле или код свойства с изображением товара
        "CURRENCY" => "",    // Подпись валюты (не конвертация)
        "MARGIN_TOP" => "0",    // Отступ корзины сверху (px)
        "MARGIN_SIDE" => "0",    // Отступ корзины сбоку (px)
        "START_FLY_PX" => $start_fly_px,    // Количествово проскролированных пикселей на странице до взлета корзины (px)
        "MARGIN_TOP_FLY_PX" => "0",    // Отступ корзины сверху, в состояние полета (px)
        "BASKET_POSITION" => "LEFT",    // Расположение корзины
        "COMPONENT_TEMPLATE" => "bitronic",
        "PATH_TO_BASKET" => "/personal/basket.php",
        "SHOW_DELAY" => "Y",    // Показывать отложенные товары
        "SHOW_NOTAVAIL" => "Y",    // Показывать товары, недоступные для покупки
        "SHOW_SUBSCRIBE" => "Y",    // Показывать товары, на которые подписан покупатель
    ),
    false
);?>
        </div>     
    </div>
</div>
<div class="right-block">

<?$APPLICATION->IncludeFile(
        "/inc/banner.php",
        Array(),
        Array("MODE"=>"html")
    );?>

<div class="blue-block-inner">
<?if(ERROR_404 != 'Y'):?>
    <h1 class="page-title">
        <?php
            if ($_SERVER['REQUEST_URI'] =='/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/metalloplastik/truby_i_fitingi_rehau/') {
            ?>
            Трубы Rehau (Рехау) в Туле
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/radiatory/') {
            ?>
            Радиаторы отопления
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/teploizolyatsiya/') {
            ?>
            Теплоизоляция для труб 
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/inzhenernoe_oborudovanie/schetchiki/vody/') {
            ?>
            Счетчики для воды   
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/naruzhnoe_vodosnabzhenie/pnd/') {
            ?>
            Полиэтиленовые трубы ПНД
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/') {
            ?>
            Трубы для отопления
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/vnutrennyaya_kanalizatsiya/truby_i_fitingi/') {
            ?>
            Канализационные трубы
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/naruzhnaya_kanalizatsiya/drenazhnie-truby/') {
            ?>
            Дренажные трубы
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/inzhenernoe_oborudovanie/schetchiki/vody/') {
            ?>
            Счетчики воды
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/zapornaya_armatura/zadvizhki_zatvory/') {
            ?>
            Задвижка
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/inzhenernoe_oborudovanie/kollektory_dlya_teplogo_pola_i_shkafy/') {
            ?>
            Оборудование для теплого пола
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/lyuki/') {
            ?>
            Чугунные и пластиковые люки
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/ochistnye_ustanovki/') {
            ?>
            Очистное сооружение
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/polipropilen/') {
            ?>
            Трубы полипропиленовые
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/naruzhnoe_vodosnabzhenie/pvkh/') {
            ?>
            Пластиковые трубы ПВХ
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/naruzhnoe_vodosnabzhenie/pnd/') {
            ?>
            Полиэтиленовые трубы ПНД
            <?php
            }
            elseif ($_SERVER['REQUEST_URI'] =='/catalog/zapornaya_armatura/danfoss/') {
            ?>
            Цены на Danfoss
            <?php
            } else {
            ?>

            <?
                $APPLICATION->AddBufferContent('ShowCondTitle');
                if(!function_exists('ShowCondTitle')){
                    function ShowCondTitle()
                    {
                        global $APPLICATION;
                        $seo_pages = array(
                            '/',
                            '/catalog/radiatory/',
                            '/catalog/naruzhnoe_vodosnabzhenie/',
                            '/catalog/naruzhnoe_vodosnabzhenie/pnd/',
                            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/',
                            '/catalog/vnutrennyaya_kanalizatsiya/truby_i_fitingi/',
                            '/catalog/naruzhnaya_kanalizatsiya/drenazhnie-truby/',
                            '/catalog/radiatory/alyuminievye/',
                            '/catalog/radiatory/bimetallicheskie-radiatory/',
                            '/catalog/radiatory/stalnye_panelnye/',
                            '/catalog/inzhenernoe_oborudovanie/schetchiki/vody/',
                            '/catalog/ochistnye_ustanovki/septiki/',
                            '/catalog/zapornaya_armatura/zadvizhki_zatvory/',
                            '/catalog/inzhenernoe_oborudovanie/kollektory_dlya_teplogo_pola_i_shkafy/',
                            '/catalog/lyuki/',
                            '/catalog/zapornaya_armatura/sharovye_krany/',
                            '/catalog/ochistnye_ustanovki/',
                            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/polipropilen/',
                            '/kanalizatsiya-dlya-doma/',
                            '/vodosnabzhenie/',
                            '/otoplenie/',
                            //                '/catalog/zapornaya_armatura/germetik-lyon/',
                            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/metalloplastik/truby_i_fitingi_rehau/',
                            '/catalog/naruzhnoe_vodosnabzhenie/pvkh/',
                            '/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/',
                            '/catalog/zapornaya_armatura/danfoss/',
                            '/catalog/naruzhnoe_vodosnabzhenie/pnd/oborudovanie-dlya-svarki-trub-pnd/'
                        );
                        if ($APPLICATION->GetPageProperty('page_title') && in_array($APPLICATION->GetCurPage(),$seo_pages))
                            return $APPLICATION->GetPageProperty('page_title');
                        else
                            return $APPLICATION->GetTitle();
                    }
                }
            ?>
            <?//if(!in_array($APPLICATION->GetCurPage(),$seo_pages)):?>
            <?//=$APPLICATION->GetTitle(false)?>
            <?//$APPLICATION->ShowTitle(false)?>
            <?//else:?>
            <?=ShowCondTitle()?>
            <?//endif?>
            <?php
            }
        ?>
    </h1>
    <?else:?>
    <h1 class="page-title">Страница не найдена</h1>
    <?endif?>