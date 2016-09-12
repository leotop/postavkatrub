<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Оплата и доставка");
$APPLICATION->SetTitle("Оплата и доставка");
$APPLICATION->SetPageProperty("description", "Информация об оплате и доставке продукции.");
$APPLICATION->SetPageProperty("keywords", "оплата, доставка");
?>
<h2>ДОСТАВКА</h2>
 
<p class="MsoNormal">Купленные товары покупатель забирает самостоятельно со склада продавца.</p>
 
<br />
 
<h2>ОПЛАТА</h2>
 
<p><b>Для физических лиц</b>: оплата принимается в офисах продаж. </p>

<ul> 
  <li>наличный расчет; </li>
 
  <li>безналичный расчет с использованием карт VISA/Mastercard. </li>
</ul>

<p></p>
 
<br />
 
<p><b>Для юридических лиц</b>: оплата принимается по безналичному расчету на основании выставленного счета. Возможна оплата наличными в точках продаж. </p>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>