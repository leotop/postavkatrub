<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Трубы и комплектующие для водоснабжения, отопления и канализации от компании Водопласт");
$APPLICATION->SetPageProperty("keywords", "трубы вода, трубы для водоснабжения, водопласт");
$APPLICATION->SetPageProperty("description", "Компания «Водопласт» предлагает широкий ассортимент труб и комплектующих для водоснабжения, отопления и канализации по выгодным ценам.");
$APPLICATION->SetTitle("Трубы и комплектующие для водоснабжения, отопления и канализации");
?><?$APPLICATION->IncludeComponent(
    "bitrix:catalog", 
    "remade_main", 
    array(
        "AJAX_MODE" => "N",
        "SEF_MODE" => "Y",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "37",
        "USE_FILTER" => "N",
        "USE_REVIEW" => "N",
        "USE_COMPARE" => "N",
        "SHOW_TOP_ELEMENTS" => "N",
        "SECTION_COUNT_ELEMENTS" => "Y",
        "SECTION_TOP_DEPTH" => "3",
        "PAGE_ELEMENT_COUNT" => "999",
        "LINE_ELEMENT_COUNT" => "3",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "name",
        "ELEMENT_SORT_ORDER2" => "asc",
        "LIST_PROPERTY_CODE" => array(
            0 => "_image",
            1 => "_size",
            2 => "",
        ),
        "INCLUDE_SUBSECTIONS" => "Y",
        "LIST_META_KEYWORDS" => "-",
        "LIST_META_DESCRIPTION" => "-",
        "LIST_BROWSER_TITLE" => "-",
        "DETAIL_PROPERTY_CODE" => array(
            0 => "_image",
            1 => "_size",
            2 => "",
        ),
        "DETAIL_META_KEYWORDS" => "-",
        "DETAIL_META_DESCRIPTION" => "-",
        "DETAIL_BROWSER_TITLE" => "-",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "10800",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "PRICE_CODE" => array(
            0 => "Розничная",
        ),
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "BASKET_URL" => "/personal/basket.php",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "USE_PRODUCT_QUANTITY" => "Y",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRODUCT_PROPERTIES" => array(
        ),
        "LINK_IBLOCK_TYPE" => "",
        "LINK_IBLOCK_ID" => "",
        "LINK_PROPERTY_SID" => "",
        "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
        "USE_ALSO_BUY" => "N",
        "USE_STORE" => "N",
        "USE_ELEMENT_COUNTER" => "Y",
        "PAGER_TEMPLATE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "Y",
        "HIDE_NOT_AVAILABLE" => "N",
        "CONVERT_CURRENCY" => "Y",
        "CURRENCY_ID" => "RUB",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "SEF_FOLDER" => "/catalog/",
        "ALSO_BUY_ELEMENT_COUNT" => "5",
        "ALSO_BUY_MIN_BUYES" => "1",
        "AJAX_OPTION_ADDITIONAL" => "",
        "SEF_URL_TEMPLATES" => array(
            "sections" => "",
            "section" => "#SECTION_CODE_PATH#/",
            "element" => "#SECTION_CODE_PATH#/#ELEMENT_ID#/",
            "compare" => "compare.php?action=#ACTION_CODE#",
        ),
        "VARIABLE_ALIASES" => array(
            "compare" => array(
                "ACTION_CODE" => "action",
            ),
        )
    ),
    false
);?><?//$USER->Authorize(1)?> <?
//<div class="banner-holder">     <a id="bxid_551619" href="#" ><img id="bxid_289901" src="images/banner.png"  /></a> </div>
?> 
<!--<img style="cursor: default;" id="bxid_570227" src="/bitrix/components/bitrix/news.list/images/news_list.gif" />--><?//$USER->Authorize(1)?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>