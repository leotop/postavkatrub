<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

	$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:store.menu.sections", "", array(
		"IBLOCK_TYPE_ID" => "catalog",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000"
		),
		false,
		Array('HIDE_ICONS' => 'Y')
	);

	$aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections","",Array(
			"IS_SEF" => "Y",
			"SEF_BASE_URL" => "/catalog/",
			"SECTION_PAGE_URL" => "#SECTION_ID#/",
			"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#",
			"IBLOCK_TYPE" => "catalog",
			"IBLOCK_ID" => "11",
			"DEPTH_LEVEL" => "10",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600"
		)
	);

	$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
