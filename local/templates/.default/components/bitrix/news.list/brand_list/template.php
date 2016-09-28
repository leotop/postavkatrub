<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="vendor-list-scroll">
<div class="vendor-list-holder">
	<ul class="vendor-list">
<?
	foreach($arResult['ITEMS'] as $arItem) {
?><li><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']; ?>" title="<?=$arItem['NAME']; ?>" alt="<?=$arItem['NAME']; ?>"></li><?
	}
?>
	</ul>
</div>
</div>