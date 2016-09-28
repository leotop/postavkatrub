<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//echo "<pre>"; print_r($arResult); echo "</pre>";
if (StrLen($arResult["ERROR_MESSAGE"])<=0)
{
	$arUrlTempl = Array(
		"delete" => $APPLICATION->GetCurPage()."?action=delete&id=#ID#",
		"shelve" => $APPLICATION->GetCurPage()."?action=shelve&id=#ID#",
		"add" => $APPLICATION->GetCurPage()."?action=add&id=#ID#",
	);
	?>
	<form method="post" action="<?=POST_FORM_ACTION_URI?>" class="basket_form" name="basket_form">
		<?
		//if ($arResult["ShowReady"]=="Y")
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");

		//if ($arResult["ShowDelay"]=="Y")
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_delay.php");

		//if ($arResult["ShowNotAvail"]=="Y")
			//include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items_notavail.php");
		?>
	</form>
	<?/*
	<script>
	<?if($arResult["ShowReady"] != "Y")
	{
		if($arResult["ShowDelay"] != "Y")
		{
			?>ShowBasketItems(3);<?
		}
		else
		{
			?>ShowBasketItems(2);<?
		}
	}
	?>
	</script>
	<?
	*/
}
else {
?>
<div class="blue-block">
	<div class="blue-block-inner">
<?
	echo $arResult["ERROR_MESSAGE"];
?>
	</div>
</div>
<?
}
?>