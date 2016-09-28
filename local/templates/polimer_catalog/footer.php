<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>				</div>
			</div>
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
	
	    <script src="/js/jquery.tinycarousel.js"></script>
		<!-- classie.js by @desandro: https://github.com/desandro/classie -->
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