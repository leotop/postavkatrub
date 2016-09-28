<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>


<?/*
<?if($APPLICATION->GetTitle(false) == "Монтаж металлопластиковых труб своими руками"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/17/">Как спрятать батарею отопления</a></p>
<p><a href="/information/16/">Как покрасить батарею отопления</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как спрятать батарею отопления"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/16/">Как покрасить батарею отопления</a></p>
<p><a href="/information/15/">Как соединить кран с трубой</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как покрасить батарею отопления"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/15/">Как соединить кран с трубой</a></p>
<p><a href="/information/14/">Трубы из поливинилхлорида</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как соединить кран с трубой"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/14/">Трубы из поливинилхлорида</a></p>
<p><a href="/information/13/">ПВХ трубы для канализационных систем</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Трубы из поливинилхлорида"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/13/">ПВХ трубы для канализационных систем</a></p>
<p><a href="/information/12/">Что собой представляет биметаллический радиатор</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "ПВХ трубы для канализационных систем"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/12/">Что собой представляет биметаллический радиатор</a></p>
<p><a href="/information/11/">Шаровые краны: как отличить подделку от фирменного изделия</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Что собой представляет биметаллический радиатор"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/11/">Шаровые краны: как отличить подделку от фирменного изделия</a></p>
<p><a href="/information/10/">Утепление труб в системах трубопроводов</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Шаровые краны: как отличить подделку от фирменного изделия"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/10/">Утепление труб в системах трубопроводов</a></p>
<p><a href="/information/9/">Канализационные люки</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Утепление труб в системах трубопроводов"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/9/">Канализационные люки</a></p>
<p><a href="/information/1/">Септик – выбор места и типа конструкции</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Канализационные люки"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/1/">Септик – выбор места и типа конструкции</a></p>
<p><a href="/information/2/">Септик своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Септик - выбор места и типа конструкции"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/2/">Септик своими руками</a></p>
<p><a href="/information/3/">Трубы для отопления - какие выбрать?</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Септик своими руками"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/3/">Трубы для отопления - какие выбрать?</a></p>
<p><a href="/information/4/">Трубы отопления из стали - медь, нержавейка</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Трубы для отопления - какие выбрать?"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/4/">Трубы отопления из стали - медь, нержавейка</a></p>
<p><a href="/information/5/">Промывка радиаторов отопления – методы</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Трубы отопления из стали - медь, нержавейка"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/5/">Промывка радиаторов отопления – методы</a></p>
<p><a href="/information/6/">Радиаторы отопления – замена и способы подключения</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Промывка радиаторов отопления - методы"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/6/">Радиаторы отопления – замена и способы подключения</a></p>
<p><a href="/information/7/">Выбираем счетчик для воды – какой лучше?</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Радиаторы отопления - замена и способы подключения"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/7/">Выбираем счетчик для воды – какой лучше?</a></p>
<p><a href="/information/8/">Установка счетчика воды своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Выбираем счетчик для воды - какой лучше?"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/8/">Установка счетчика воды своими руками</a></p>
<p><a href="/information/9/">Отопление от компании «Полимерстрой»</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Установка счетчика воды своими руками"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/otoplenie/">Отопление от компании «Полимерстрой»</a></p>
<p><a href="/vodosnabzhenie/">Водоснабжение дома</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Отопление от компании «Полимерстрой»"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/vodosnabzhenie/">Водоснабжение дома</a></p>
<p><a href="/kanalizatsiya-dlya-doma/">Канализация для дома</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif(strpos($APPLICATION->GetTitle(false), "Водоснабжение") !== false):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/kanalizatsiya-dlya-doma/">Канализация для дома</a></p>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Канализация для дома | Все необходимое для организации канализации"):?>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/17/">Как спрятать батарею отопления</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?endif?>
*/?>


<?if($APPLICATION->GetTitle(false) == "Монтаж металлопластиковых труб своими руками"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/17/">Как спрятать батарею отопления</a></p>
<p><a href="/information/16/">Как покрасить батарею отопления</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как спрятать батарею отопления"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/16/">Как покрасить батарею отопления</a></p>
<p><a href="/information/15/">Как соединить кран с трубой</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как покрасить батарею отопления"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/15/">Как соединить кран с трубой</a></p>
<p><a href="/information/14/">Трубы из поливинилхлорида</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Как соединить кран с трубой"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/14/">Трубы из поливинилхлорида</a></p>
<p><a href="/information/13/">ПВХ трубы для канализационных систем</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?$APPLICATION->AddChainItem($APPLICATION->GetTitle(false));?>								
<?elseif($APPLICATION->GetTitle(false) == "Трубы из поливинилхлорида"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/13/">ПВХ трубы для канализационных систем</a></p>
<p><a href="/information/12/">Что собой представляет биметаллический радиатор</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "ПВХ трубы для канализационных систем"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/12/">Что собой представляет биметаллический радиатор</a></p>
<p><a href="/information/11/">Шаровые краны: как отличить подделку от фирменного изделия</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Что собой представляет биметаллический радиатор"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/11/">Шаровые краны: как отличить подделку от фирменного изделия</a></p>
<p><a href="/information/10/">Утепление труб в системах трубопроводов</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Шаровые краны: как отличить подделку от фирменного изделия"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/10/">Утепление труб в системах трубопроводов</a></p>
<p><a href="/information/9/">Канализационные люки</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Утепление труб в системах трубопроводов"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/9/">Канализационные люки</a></p>
<p><a href="/information/1/">Септик – выбор места и типа конструкции</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Канализационные люки"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/1/">Септик – выбор места и типа конструкции</a></p>
<p><a href="/information/2/">Септик своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Септик - выбор места и типа конструкции"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/2/">Септик своими руками</a></p>
<p><a href="/information/3/">Трубы для отопления - какие выбрать?</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Септик своими руками"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/3/">Трубы для отопления - какие выбрать?</a></p>
<p><a href="/information/4/">Трубы отопления из стали - медь, нержавейка</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Трубы для отопления - какие выбрать?"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/4/">Трубы отопления из стали - медь, нержавейка</a></p>
<p><a href="/information/5/">Промывка радиаторов отопления – методы</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Трубы отопления из стали - медь, нержавейка"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/5/">Промывка радиаторов отопления – методы</a></p>
<p><a href="/information/6/">Радиаторы отопления – замена и способы подключения</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Промывка радиаторов отопления - методы"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/6/">Радиаторы отопления – замена и способы подключения</a></p>
<p><a href="/information/7/">Выбираем счетчик для воды – какой лучше?</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Радиаторы отопления - замена и способы подключения"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/7/">Выбираем счетчик для воды – какой лучше?</a></p>
<p><a href="/information/8/">Установка счетчика воды своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Выбираем счетчик для воды - какой лучше?"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/8/">Установка счетчика воды своими руками</a></p>
<p><a href="/information/9/">Отопление от компании «Полимерстрой»</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Установка счетчика воды своими руками"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/otoplenie/">Отопление от компании «Полимерстрой»</a></p>
<p><a href="/vodosnabzhenie/">Водоснабжение дома</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Отопление от компании «Полимерстрой»"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/vodosnabzhenie/">Водоснабжение дома</a></p>
<p><a href="/kanalizatsiya-dlya-doma/">Канализация для дома</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif(strpos($APPLICATION->GetTitle(false), "Водоснабжение") !== false):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/kanalizatsiya-dlya-doma/">Канализация для дома</a></p>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Канализация для дома | Все необходимое для организации канализации"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/17/">Как спрятать батарею отопления</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Как выбрать трубы для водопровода"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/20/">Что делать если в трубе замерзла вода</a></p>
<p><a href="/information/21/">Эффективные методы промывки канализационных труб</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>

<?elseif($APPLICATION->GetTitle(false) == "Что делать если в трубе замерзла вода"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/21/">Эффективные методы промывки канализационных труб</a></p>
<p><a href="/information/22/">Технология демонтажа и ремонта задвижек</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Эффективные методы промывки канализационных труб"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/22/">Технология демонтажа и ремонта задвижек</a></p>
<p><a href="/information/23/">Способы соединения пнд труб</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Технология демонтажа и ремонта задвижек"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/23/">Способы соединения пнд труб</a></p>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?elseif($APPLICATION->GetTitle(false) == "Способы соединение пнд труб"):?>
<div style="background-color:#E5E1D3; border:1px solid #000; padding:15px;">
	<div style="display:inline-block; font-weight: bold;">Понравилась статья? - Расскажите друзьям: </div>
	<div style="display:inline-block;" class="soc_bot"><script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
	<div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yasharetheme="counter" data-yasharetype="small">&nbsp;</div>
	</div>
</div>
<br>
<h2>Читайте также:</h2>
<p><a href="/information/18/">Монтаж металлопластиковых труб своими руками</a></p>
<p><a href="/information/19/">Как выбрать трубы для водопровода</a></p>
<p><a href="/information/">Вернуться к разделу</a></p>
<?endif?>



					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer">
          <?$APPLICATION->IncludeComponent(
          "bitrix:menu",
          "bot_menu",
          Array(
            "ROOT_MENU_TYPE" => "top",
            "MAX_LEVEL" => "1",
            "CHILD_MENU_TYPE" => "top",
            "USE_EXT" => "N",
            "DELAY" => "N",
            "ALLOW_MULTI_SELECT" => "N",
            "MENU_CACHE_TYPE" => "N",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MENU_CACHE_GET_VARS" => ""
          ),
        false
        );?>
    	<div class="footer-content">
    		<?$APPLICATION->IncludeFile(
    			"/inc/footer_text.php",
    			Array(),
    			Array("MODE"=>"HTML")
    		);?>
    	</div>
</div>
		<div class="md-modal md-effect-10" id="modal-10">
			<div class="md-content">
				<p class="title">Обратная связь</p>
				<div>
                <form id="form1">
                                <input type="text" name="name1" placeholder="Имя" required/>
                                <input type="text" name="phone1" placeholder="Телефон" required/>
                                <input type="email" name="email1" placeholder="E-mail" required/>
                                <textarea name="text1" placeholder="Сообщение" required></textarea>
                <input type="submit" name="send1" class="send" value="Отправить"/>
                </form>
                <div id="success" style="display:none;"> Спасибо за сообщение!<br>Наши менеджеры свяжутся с Вами в ближайшее время</div>
				</div>
                <button class="md-close">&times;</button>

			</div>
		</div>

		<div class="md-modal2 md-effect-10" id="modal-11">
			<div class="md-content2">
				<p class="title">Заказать обратный звонок</p>
				<div>
                    <form id="form2">
    					<input type="text" name="name2" placeholder="Ваше имя" required/>
                        <input type="text"name="phone2" placeholder="Ваш телефон" required/>
                        <input type="text" style="width: 50px;" name="from" placeholder="Желаемое время звонка"/>
                        <input type="submit" name="send2" class="send" value="Заказать"/>
						<button class="md-close">&times;</button>
						<br />
						<p style="font-size:12px;">* время заказа звонка с 9.00 до 17.00 и по будням с пн по пт</p>
                    </form>
                    <div id="success2" style="display:none;"> Заявка отправлена!<br>Наши менеджеры свяжутся с Вами в ближайшее время</div>
				</div>
			</div>
		</div>

		<div class="md-modal md-effect-10" id="modal-100">
			<div class="md-content">
				<p class="title">Оставить заявку</p>
				<div>
                	<form id="form3">
                        <input type="text" name="name3" placeholder="Имя" required/>
                        <input type="text" name="phone3" placeholder="Телефон" required/>
                        <input type="email" name="email3" placeholder="E-mail" required/>
                        <textarea name="text3" placeholder="Сообщение" required></textarea>
            			<input type="file" name="file" />
        				<input type="submit" class="send" value="Отправить"/>
                	</form>
                	<div id="success3" style="display:none;"> Заявка отправлена!<br>Наши менеджеры свяжутся с Вами в ближайшее время</div>
				</div>
                <button class="md-close">&times;</button>
			</div>
		</div>

    <div class="md-overlay"></div>

    <?$APPLICATION->AddHeadScript("/js/jquery-1.7.1.min.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.core.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.widget.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.position.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.mouse.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.slider.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/ui/jquery.ui.selectmenu.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/jquery.jcarousel.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/cufon-yui.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/Europe_400-Europe_700.font.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/jquery.prettyPhoto.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/logic.js"); ?>
    <?$APPLICATION->AddHeadScript("/js/jquery.form.js"); ?>
    
	<script src="/bitrix/js/classie.js"></script>
		<script src="/bitrix/js/modalEffects.js"></script>
        <script src="/bitrix/js/modalEffects1.js"></script>

		<!-- for the blur effect -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>


        <script src="/bitrix/js/common.js"></script>
        <script src="/bitrix/js/common2.js"></script>
</body>
</html>