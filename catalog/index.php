<?	if(!empty($_GET)){
		$s = 0;
		foreach($_GET as $key => $value)
			if(empty($value))
				$s++;
		if($s == count($_GET)){
			header("HTTP/1.0 404 Not Found");
			header("HTTP/1.1 404 Not Found");
			header("Status: 404 Not Found");
			header("Location: /404.php");
/*			@define("ERROR_404","Y");
			$not_show_catalog = true;
			Redirect404();*/
			/*header("HTTP/1.1 301 Moved Permanently");
			header("Location: /");*/
			exit();
		}
	}
?> <?php 
if($_SERVER['REQUEST_URI'] == "/catalog/" && !$not_show_catalog) 
{
header("HTTP/1.1 301 Moved Permanently");
header("Location: /");
exit();
}
?> <?if(!$not_show_catalog):?> <?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Септик для дачи, септики для загородного дома и коттеджей");
$APPLICATION->SetTitle("Каталог");
$arrFilter = array('ACTIVE' => 'Y');
?> <?
	$arr = explode('/',$_SERVER['REQUEST_URI']);
	$id = (int)$arr[count($arr)-2];
	if($id != 0){
		$section = '';
		$element = "#SECTION_CODE#/#ELEMENT_ID#/";
		if(count($arr) == 6)
			$element = "#SECTION_PARENT#/#SECTION_CODE#/#ELEMENT_ID#/";
		elseif(count($arr) == 7)
			$element = "#SECTION_PARENT#/#SECTION_PARENT#/#SECTION_CODE#/#ELEMENT_ID#/";
	}
	elseif(count($arr) == 5)
		$section = "#SECTION_PARENT#/#SECTION_CODE#/";
	elseif(count($arr) == 6)
		$section = "#SECTION_PARENT#/#SECTION_PARENT#/#SECTION_CODE#/";
	else
		$section = "#SECTION_CODE#/";
?>


<?$APPLICATION->IncludeComponent(
	"bitrix:catalog",
	"remade_main",
	Array(
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
		"LIST_PROPERTY_CODE" => array("_image", "_size"),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"DETAIL_PROPERTY_CODE" => array(),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"PRICE_CODE" => array("Розничная"),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(),
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "Y",
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
		"ALSO_BUY_ELEMENT_COUNT" => "999",
		"ALSO_BUY_MIN_BUYES" => "1",
		"HIDE_NOT_AVAILABLE" => "N",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SEF_FOLDER" => "/catalog/",
		"SEF_URL_TEMPLATES" => Array(
			"section" => $section,
			"element" => $element,
			"compare" => "compare.php?action=#ACTION_CODE#"
		),
		"VARIABLE_ALIASES" => Array(
			"section" => Array(),
			"element" => Array(),
			"compare" => Array(
				"ACTION_CODE" => "action"
			),
		)
	)
);?> 
<?
$res = CIBlockElement::GetList(Array(), Array("IBLOCK_TYPE" => "37"), false, false, Array());
while($ar = $res->GetNext())
{
  echo $ar['name'];
}
?> <?endif?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>