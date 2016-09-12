<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?>
<?$APPLICATION->IncludeFile(SITE_DIR."include/about.php",    Array(),Array("MODE"=>"html"));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
