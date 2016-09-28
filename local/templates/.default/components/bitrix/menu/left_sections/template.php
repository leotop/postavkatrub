<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="menu-title">Каталог</div>
<ul class="rubricator">
<? $nn = 0 ?>
<? $p  = 1 ?>
<? foreach($arResult as $arItem):?>
	<? for ( $i = $p - $arItem['DEPTH_LEVEL']; $i > 0; $i-- ) : ?>
		</li></ul>
	<? endfor; ?>

	<? if ( $arItem['DEPTH_LEVEL'] == 1 ) : ?>
		<? if ( $nn++ > 0 ) : ?>
		</li>
		<? endif; ?>
		<li class="root<?if ($arItem["SELECTED"]):?> selected<?endif;?>"><a href="<?=$arItem["LINT"]?>" class="root"><?=$arItem["TEXT"]?></a>
	<? else : ?>
		<? if ( $arItem['DEPTH_LEVEL'] > $p ) : ?>
			<ul<?if ($arItem["SELECTED"]):?> class="selected"<?endif;?>>
		<? endif; ?>
		<? if ( $arItem['DEPTH_LEVEL'] == $p ) : ?>
			</li>
		<? endif; ?>
		<li<?if ($arItem["SELECTED"]):?> class="selected"<?endif;?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<? endif; ?>

	<? $p = $arItem['DEPTH_LEVEL'] ?>

<? endforeach; ?>
</ul>
