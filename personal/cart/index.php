<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>

<?/*if($_REQUEST["action"] == "clear") {
   if (CModule::IncludeModule("sale")){CSaleBasket:DeleteAll(CSaleBasket::GetBasketUserID());}
}*/?>

<?$APPLICATION->IncludeComponent("bitrix:store.sale.basket.basket", "polimer", Array(
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",	// Рассчитывать скидку для каждой позиции (на все количество товара)
		"COLUMNS_LIST" => array(	// Выводимые колонки
			0 => "NAME",
			1 => "PROPS",
			2 => "PRICE",
			3 => "QUANTITY",
			4 => "DELETE",
			5 => "DELAY",
		),
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"PATH_TO_ORDER" => "/personal/order/make/",	// Страница оформления заказа
		"HIDE_COUPON" => "Y",	// Спрятать поле ввода купона
		"QUANTITY_FLOAT" => "N",	// Использовать дробное значение количества
		"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>