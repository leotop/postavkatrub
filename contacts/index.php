<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("description", "Контактная информация о компании Полимерстрой.");
$APPLICATION->SetPageProperty("keywords", "контакты");
?>
<?$APPLICATION->IncludeFile(SITE_DIR."include/contacts.php",    Array(),Array("MODE"=>"html"));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
