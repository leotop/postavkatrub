<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$quantity = 0;
$sum = 0;
$curr = 'RUB';
if (count($arResult["ITEMS"]>0)):
   foreach ($arResult["ITEMS"] as $arItem):
      $quantity += intval($arItem['QUANTITY']);
      $sum += $arItem['QUANTITY'] * $arItem['PRICE'];
      $curr = $arItem['CURRENCY'];
   endforeach;
endif;


//arshow($arResult);
?>

<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="basket-title">Корзина&nbsp;</a><a href="javascript:void(0)<?//=$arParams["PATH_TO_BASKET"]?>" class="basket-price"><?=$arResult['TOTAL_SUM']; ?> руб.</a>
