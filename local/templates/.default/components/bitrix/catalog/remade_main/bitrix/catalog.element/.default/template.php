<?//arshow($arResult)?>

<?
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
    //  arshow($arBasketGoods);

?>


<?
    //проверяем есть ли товар в корзине и сохраняем в переменную кол-во
    if (array_key_exists($arResult['ID'], $arBasketGoods)) {
        $goodQuant=$arBasketGoods[$arResult['ID']];
    }
    else {
        $goodQuant='0';
    }
?>



<script>
    $(function() {
        //добавление товара в корзину при нажатии на Enter
        $(".quant2").keypress(function(event) {
            if (event.which == '13' || event.which == '10') {
                $(".addToCart2").click();
            }
        });


        $(".addToCart2").click(function() {
            if ($('.quant2').val()=='') {

                var el = $(this);
                $.ajax({
                    type: 'POST',
                    url: '/catalog/ajax2.php',
                    data: '',
                    success: function(response) {
                        var $tip = $('<div class="tipsy tipsy-w" style="position:absolute;left:884px; top:518px"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                        $tip.find('.tipsy-inner').html(response);
                        $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                        var pos = el.offset();
                        $tip.css({ top:518 + 'px', left:880 + 'px' });
                        $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                        window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                    },
                });

            } else {
                var productID = $(this).val();
                var quantity = 1;
                //   alert(quantity);
                var el = $(this);
                var thisId = parseInt($("#quantity2_"+productID).val());
                //quantity=$("#id2_"+productID).val()*1+quantity;
                quantity = parseInt($("#quantity2_"+productID).val());
                //  alert(quantity);

                $('.el_id').each(function() {
                    if (parseInt($(this).val())==thisId) {
                        $(this).parent().find('.yen-bs-txt').val(quantity);
                    }
                });
                //el.css('backgroundImage', 'url(/images/ajax-loader.gif)');
                $.ajax({
                    type: 'POST',
                    url: '/catalog/ajax.php',
                    data: 'action=ADD2BASKET&id='+productID+'&quantity='+quantity,
                    success: function(response) {
                        $("#basket-line").html(response);
                        el.css('backgroundImage', 'url(/images/cart_min.png)');
                        var $tip = $('<div class="tipsy tipsy-w"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                        $tip.find('.tipsy-inner').html(response);
                        $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                        var pos = el.offset();
                        $tip.css({ top:518 + 'px', left:880 + 'px' });
                        $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                        window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                        $("#id2_"+productID).val(quantity);

                        $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-parseInt($('#basketOrderButton3').css('width'))-20+'px');
                    },
                });
            }
        });

    });
</script>

<div class="product-block clearfix">
    <?//arshow($arResult);?>

    <input type="hidden" id="id2_<?=$arResult['ID']?>" value="<?=$goodQuant?>" />

    <div class="product-img-card">
        <div class="product-img-card_inner">
            <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
        </div>
    </div>

    <div class="product-descr">
        <?$APPLICATION->SetPageProperty('title',$arResult['NAME']);?>
        <?if(false):?><h2><?=$arResult['NAME']?></h2><?endif?>
        <?
            if(count($arResult['PROPERTIES'])) {
        ?>
        <ul class="product-features">

            <li><b><?=$arResult['PROPERTIES']['_']['NAME']?>:</b>&nbsp; <?=$arResult['PROPERTIES']['_']['VALUE']?></li>
            <li><b><?=$arResult['PROPERTIES']['_size']['NAME']?>:</b>&nbsp; <?=$arResult['PROPERTIES']['_size']['VALUE']?></li>
            <li><b><?=GetMessage('CATALOG_QUANTITY')?></b>&nbsp; 
                <?if($arResult['CATALOG_QUANTITY'] > 0) {
                    echo $arResult['CATALOG_QUANTITY'];                    
                    } else {
                        echo GetMessage('CATALOG_QUANTITY_NONE');
                    }?>                
                </li>
                <?foreach($arResult["PROPERTIES"]["CML2_ATTRIBUTES"]["VALUE"] as $k=>$value):?>
                    <li><b><?=$value?>:</b>&nbsp;<?=$arResult["PROPERTIES"]["CML2_ATTRIBUTES"]["DESCRIPTION"][$k]?></li>
                    <?endforeach?>
            </ul>
            <?
            }
        ?>

        <div class="price_row">
            <span class="price">
                <?$ar_res = GetCatalogProductPriceList($arResult['ID'],array(),array());
                    $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                    if ($ar_res[0]['CURRENCY']=='RUB') {$newval=$val;}
                    elseif ($ar_res[0]['CURRENCY']=='USD') {
                        $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                    }
                    else {
                        $newval = CCurrencyRates::ConvertCurrency($val, "EUR", "RUB");
                    }
                    $newval=number_format(round($newval, 2), 2, ',', ' ');
                    // echo $newval;


                    //   $exp_price=explode('.',$newval);
                    //  $cop=substr($exp_price[1],0,2); ?>

                &nbsp; <?/*$ar_res = GetCatalogProductPriceList($arResult['ID'],array(),array());
                    $val = $ar_res[0]['PRICE']; // СЃСѓРјРјР° РІ USD
                    $newval = CCurrencyRates::ConvertCurrency($val, "USD", "RUB");
                    $exp_price=explode('.',$newval);
                    $cop=substr($exp_price[1],0,2);
                    echo $exp_price[0].','.$cop.*/ echo $newval?> руб.&nbsp;&nbsp;
            </span>
            <span class="minus">-</span>
            <input class="quant2" type="text" id="quantity2_<?=$arResult['ID']; ?>" value="1">
            <span class="plus">+</span>
            <button value="<?=$arResult['ID']; ?>" class="addToCart2">В корзину</button>
        </div>
    </div>
</div>
<?
    if(count($arResult["PROPERTIES"]['FILES']['VALUE'])) {
    ?>
    <ul class="product-files">
        <?
            foreach($arResult["PROPERTIES"]['FILES']['VALUE'] as $arFile) {
                $rsFile = CFile::GetByID($arFile);
                $arFile_info = $rsFile->Fetch();
            ?>
            <li><a href="<?=CFile::GetPath($arFile)?>"><?=$arFile_info['ORIGINAL_NAME']; ?></a></li>
            <?
            }
        ?>
    </ul>
    <?
}   ?>
<!--<img src="/images/certs.png">-->
<div class="product_description">
    <p class="title">Описание</p>
    <?=$arResult['DETAIL_TEXT']?>
</div>



<!-- < :) -->
<link href="/include/mb_better/css/styles-carousel.css" type="text/css" rel="stylesheet">
<? echo '<div class="sec_ch" style="/*display: none;*/">';
    $i = 0;

    //HTML
    function begin() {
        echo '<div class="hide"><div class="bx_item_list_recommended col3 also"><div class="bx_item_list_title">С этим товаром покупают</div><div class="overflow carousel shadow"><div class="carousel-button-left"><a href="#"></a></div> <div class="carousel-button-right"><a href="#"></a></div><div class="carousel-wrapper"> <div class="carousel-items">';
    }
    function done() {
        echo '</div></div></div></div>';
    }

    //SORT
    if ($arParams['SECTION_CODE'] == 'truby_i_fitingi_rehau'){
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"), array('IBLOCK_ID' => 37, 'ID' => array(4576, 4613)), false, array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'dizayn_turtsiya') || ($arParams['SECTION_CODE'] == 'ekoplastik_chekhiya') || ($arParams['SECTION_CODE'] == 'byudzhetnyy_polipropilen_rossiya_turtsiya')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4575, 4576, 4572)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'truby') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4573)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'tsangovye_fitingi') || (($arParams['SECTION_CODE'] == 'oborudovanie-dlya-montazha')) || ($arParams['SECTION_CODE'] == 'termozapornaya_armatura') || ($arParams['SECTION_CODE'] == 'fitingi_latunnye_rezbovye') || ($arParams['SECTION_CODE'] == 'klapany_reduktory_davleniya') || ($arParams['SECTION_CODE'] == 'manometry_termometry') || ($arParams['SECTION_CODE'] == 'baki_rasshiritelnye') || ($arParams['SECTION_CODE'] == 'gruppa_bezopasnosti') || ($arParams['SECTION_CODE'] == 'fitingi_rezbovye_iz_stali_i_chuguna')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4576),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'bologoe_rossiya') || ($arParams['SECTION_CODE'] == 'vp_kitay') || ($arParams['SECTION_CODE'] == 'itap_italiya') || ($arParams['SECTION_CODE'] == 'or_italiya') || ($arParams['SECTION_CODE'] == 'ventilya')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4622, 4598)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'filtry_dlya_vody_gruboy_ochistki_fmm_fmf') || ($arParams['SECTION_CODE'] == 'filtry_dlya_vody_tonkoy_ochistki') || ($arParams['SECTION_CODE'] == 'magnitnye_preobrazovateli_vody') || ($arParams['SECTION_CODE'] == 'filtry_bytovye') || ($arParams['SECTION_CODE'] == 'tsirkulyatsionnye') || ($arParams['SECTION_CODE'] == 'povysitelnye') || ($arParams['SECTION_CODE'] == 'gibkaya_podvodka_dlya_vody')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'press_fitingi') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4573),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'vanny_i_poddony') || ($arParams['SECTION_CODE'] == 'moyki') || ($arParams['SECTION_CODE'] == 'umyvalniki_i_aksessuary_k_nim') || ($arParams['SECTION_CODE'] == 'unitazy_bide_bachki_pissuary_i_komplektuyushchie')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4632, 4633, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'drenazhnie-truby') || ($arParams['SECTION_CODE'] == 'korsis_gofrirovannye')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4502, 4564)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ((($arParams['SECTION_CODE'] == 'vaillant') && ($arResult['IBLOCK_ID'] == 4635)) || (($arParams['SECTION_CODE'] == 'protherm') && ($arResult['IBLOCK_ID'] == 4636)) || (($arParams['SECTION_CODE'] == 'baxi') && ($arResult['IBLOCK_ID'] == 4637))) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4644, 4516)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ((($arParams['SECTION_CODE'] == 'vaillant_germaniya') && ($arResult['IBLOCK_ID'] == 4638)) || (($arParams['SECTION_CODE'] == 'protherm_sloveniya') && ($arResult['IBLOCK_ID'] == 4639)) || (($arParams['SECTION_CODE'] == 'baxi_italiya_1') && ($arResult['IBLOCK_ID'] == 4640))) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4554, 4516, 4644)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ((($arParams['SECTION_CODE'] == 'vaillant_germaniya_1') && ($arResult['IBLOCK_ID'] == 4641)) || (($arParams['SECTION_CODE'] == 'protherm_sloveniya_1') && ($arResult['IBLOCK_ID'] == 4642)) || (($arParams['SECTION_CODE'] == 'baxi_italiya_2') && ($arResult['IBLOCK_ID'] == 4643))) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4554, 4516)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'smesiteli_dlya_moek_i_umyvalnikov') || ($arParams['SECTION_CODE'] == 'smesiteli_vanno_dushevye_dlya_dusha_i_bide')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4633, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'skvazhinnye') || ($arParams['SECTION_CODE'] == 'gidroakkumulyatory')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4605, 4586, 4481)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'vody') || ($arParams['SECTION_CODE'] == 'tepla')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4537, 4586, 4593)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'fitingi_svarnye') || ($arParams['SECTION_CODE'] == 'fitingi_elektrosvarnye')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4634),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'drenazhnye') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4481, 4605)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'alyuminievye') || ($arParams['SECTION_CODE'] == 'bimetallicheskie-radiatory')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4507),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == '__88') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4494, 4502)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'septiki') || ($arParams['SECTION_CODE'] == 'kessony')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4494),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'zhirouloviteli') || ($arParams['SECTION_CODE'] == 'nasosnye_stantsii')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4490),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif (($arParams['SECTION_CODE'] == 'flantsy_stalnye') || ($arParams['SECTION_CODE'] == 'gidranty_kolonki') || ($arParams['SECTION_CODE'] == 'fitingi_privarnye_iz_stali')) {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4593),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'sifony_dlya_moek_umyvalnikov_vann_i_dushevykh_poddonov') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4633, 4576)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'polotentsesushiteli_i_krepleniya') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4598, 4576, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'kollektory_dlya_teplogo_pola_i_shkafy') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4475),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'remontnie-khomuty') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4593, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'truby_i_fitingi') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4492, 4584, 4574)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'zadvizhki_zatvory') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4594, 4596)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'truby_pvkh_beznapornye') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4497, 4502, 4615)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'lotki_i_dozhdepriemniki') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4615, 4494)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'truby_dlya_vody') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4606, 4607, 4605)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'truby_dlya_gaza') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4606, 4607)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'fitingi_kompressionnye') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4576, 4605)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'rastrubnye_truby') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4488, 4584)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'kleevye_truby') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4582, 4584)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'remontnie-khomuty') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => array(4593, 4586)),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}
    elseif ($arParams['SECTION_CODE'] == 'stalnye_panelnye') {
        $lib = CIBlockSection::GetList(array("SORT"=>"ASC"),array('IBLOCK_ID' => 37, 'ID' => 4507),false,array('NAME', 'SECTION_PAGE_URL', 'ID'), false);}

    //ITEMS
    if (isset($lib)) {
        echo begin(); 
        while($row = $lib->GetNext()){
            $i++;
            echo '<div class="carousel-block"><a href="'.$row['SECTION_PAGE_URL'].'" title="'.$row['NAME'].'"><img src="';
            //PIC
            $pic = CIBlockElement::GetList(array("rand"=>"ASC"), array('SECTION_ID' => $row['ID'], "INCLUDE_SUBSECTIONS" => "Y" ), false, array('nTopCount' => 1))->Fetch();
            $piclink = CFile::GetPath($pic['DETAIL_PICTURE']);
            echo $piclink;
            echo '" alt="'.$row['NAME'].'"/><p>'.$row['NAME'].'</p></a></div>';
        } 
        echo $i;
        echo done();}
    echo'</div>';?>
<?if ($i < 4):?>
    <script type="text/javascript">
        $('.carousel-button-left').remove();
        $('.carousel-button-right').remove();
    </script>
    <?endif?>
<script type="text/javascript" src="/include/mb_better/carousel.js"></script>
<!-- :) > -->



<?
    if(count($arResult["PROPERTIES"]['buy_with']['VALUE'])) {
    ?>
    <!--    <div class="also-buy-products">
    <ul class="">
    <?
        foreach($arResult["PROPERTIES"]['buy_with']['VALUE'] as $arItem) {
            $res = CIBlockElement::GetByID($arItem);
            $ar_res = $res->GetNext();
        ?>
        <li>
        <a href="/catalog/<?=$ar_res['IBLOCK_SECTION_ID']?>/<?=$ar_res['ID']?>/"><?=$ar_res['NAME']; ?></a>
        </li>
        <?
        }
    ?>
    </ul>
    </div>-->
    <?
    }
?>
<br>
<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "/include/stock.php",
    )
    );?>