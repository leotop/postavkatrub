<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
?>
Запрашиваемая страница не найдена. Возможно, Вы ввели неверный адрес или перешли по устаревшей ссылке.
Вы можете перейти на <a href="/">главную страницу</a> или <a href="/contacts/">страницу контактов</a>

<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>