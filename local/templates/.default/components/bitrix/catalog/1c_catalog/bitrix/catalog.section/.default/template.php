<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<table class="product-list-head" cellpadding="0" cellspacing="0">
		<!-- colgroup>
			<col width="383">
			<col width="83">
			<col width="51">
			<col width="91">
			<col width="81">
		</colgroup -->
		<colgroup>
			<col width="354">
			<col width="78">
			<col width="51">
			<col width="91">
			<col width="81">
		</colgroup>
		<tr>
			<td>Наименование</td>
			<td>Код</td>
			<td>ед.</td>
			<td>Цена за ед.</td>
			<td>Заказ товара</td>
		</tr>
	</table>
	<?
	if(count($arResult['ITEMS'])) {
	?>
	<div class="product-list">
	<?
		foreach($arResult['ITEMS'] as $arElement) {
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));

	?>
		<div class="product-row"  id="<?=$this->GetEditAreaId($arElement['ID']);?>">
			<div class="product-row-inner">
				<h4><?=$arElement['NAME']; ?></h4>
				<div class="product-desr clearfix">
					<div class="product-img">
						<a href="<?=$arElement['DETAIL_PAGE_URL']; ?>" style="background:url('/upload/images/120/106/<?=$arElement['PROPERTIES']['DEV_PHOTO']['VALUE']; ?>_crop.jpg') no-repeat;"></a>
					</div>
	<?
			if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])) {
	?>
					<table class="product-offers" cellpadding="0" cellspacing="0">
						<colgroup>
							<col width="240">
							<col width="78">
							<col width="51">
							<col width="91">
							<col width="81">
						</colgroup>
						<tbody>
	<?
				foreach($arElement['OFFERS'] as $arOffer) {
					//print_r($arOffer);
	?>
							<tr>
								<td><a href="<?= $arOffer['XDETAIL_PAGE_URL'] ?>"><?=$arOffer['NAME']; ?></a></td>
								<td><?=$arOffer['DISPLAY_PROPERTIES']['CML2_ARTICLE']['DISPLAY_VALUE']; ?></td>
								<td><?=$arOffer['DISPLAY_PROPERTIES']['CML2_BASE_UNIT']['DISPLAY_VALUE']; ?></td>
								<td>
	<?
					foreach($arOffer["PRICES"] as $code=>$arPrice) {
						if($arPrice["CAN_ACCESS"]) {
							if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]) {
	?>
									<?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
	<?
							} else {
	?>
									<?=$arPrice["PRINT_VALUE"]?>
	<?
							}
						}
					}
	?>
								</td>
								<td>
									<input type="text" id="quantity_<?=$arOffer['ID']; ?>" value="<? ShowUncachedContent("offerQuantity_".$arOffer['ID']); ?>">
									<button value="<?=$arOffer['ID']; ?>" class="addToCart"></button>
								</td>
							</tr>
	<?
				}
			}
	?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?
		}
		?>
	</div>
	<?
	}
	?>