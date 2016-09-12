<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:main.map",
	"",
	Array(
		"LEVEL" => "3",
		"COL_NUM" => "1",
		"SHOW_DESCRIPTION" => "N",
		"SET_TITLE" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => ""
	),
false
);*/?>
<table class="map-columns">
	<tbody>
		<tr>
			<td>
				<ul>	
					<li>
					 <a href="/">Главная</a>
					</li>
					<li>
					 <a href="/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/">Внутреннее водоснабжение и отопление</a>
					</li>
					<li>
					 <a href="/catalog/naruzhnoe_vodosnabzhenie/">Наружное водоснабжение</a>
					</li>
					<li>
					 <a href="/catalog/vnutrennyaya_kanalizatsiya/">Внутренняя канализация</a>
					</li>
					<li>
					 <a href="/catalog/naruzhnaya_kanalizatsiya/">Наружная канализация</a>
					</li>
					<li>
					 <a href="/catalog/radiatory/">Радиаторы</a>
					</li>
					<li>
					 <a href="/catalog/zapornaya_armatura/">Запорная арматура</a>
					</li>
					<li>
					 <a href="/catalog/inzhenernoe_oborudovanie/">Инженерное оборудование</a>
					</li>
					<li>
					 <a href="/catalog/kotly_i_vodonagrevateli/">Котлы и водонагреватели</a>
					</li>
					<li>
					 <a href="/catalog/nasosy/">Насосы</a>
					</li>
					<li>
					 <a href="/catalog/santekhnicheskie_pribory/">Сантехнические приборы</a>
					</li>
					<li>
					 <a href="/catalog/ochistnye_ustanovki/">Очистные установки</a>
					</li>
					<li>
					 <a href="/catalog/lyuki/">Люки</a>
					</li>
					<li>
					 <a href="/tech_info/">Оплата и доставка</a>
					</li>
					<li>
					 <a href="/news/">Новости</a>
					</li>
					<li>
					 <a href="/about/">О компании</a>
					</li>
					<li>
					 <a href="/reviews/">Отзывы</a>
					</li>
					<li>
					 <a href="/contacts/">Контакты</a>
					</li>
					<li>
					 <a href="/information/">Полезная информация</a>
					</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>