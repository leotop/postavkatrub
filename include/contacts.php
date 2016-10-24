<script>
//функция вывода на печать первого изображения
function printImage(img) {
      printHTML(document.getElementById('contacts1').innerHTML, img);
   }
    
   function printHTML(html, img) {
        var frame = document.createElement('iframe');
       frame.style.cssText = 'border:none;position:fixed;left:100%;';
       frame.onload = function() {
         var that = this;
           var cssText = 'body{display:none} @media print{body{display:block}}';
         var style = this.contentDocument.createElement('style');
          if (style.readyState == 'loading') {
              style.onreadystatechange = function() {
                   alert(this.readyState);
                  if (this.readyState = 'complete') {
                       this.sheet.cssText = cssText;
                   }
              }
          } else {
              style.textContent = cssText;
           }
         this.contentDocument.getElementsByTagName('head')[0].appendChild(style);
         console.log(img);
           this.contentDocument.body.innerHTML = /*html + */'<img id="bxid_764797" src="'+ img +'" alt="Схема проезда"  />';
          
           
             that.contentWindow.print();
             setTimeout(function(){
              that.parentNode.removeChild(that);
              }, 3000);
        }
      document.body.appendChild(frame);
   }
   
   
   
//функция вывода на печать второго изображения   
   function printImage2(img) {
      printHTML(document.getElementById('contacts2').innerHTML, img);
   }
    
 /*  function printHTML(html) {
        var frame = document.createElement('iframe');
       frame.style.cssText = 'border:none;position:fixed;left:100%;';
       frame.onload = function() {

           var cssText = 'body{display:none} @media print{body{display:block}}';
         var style = this.contentDocument.createElement('style');
          if (style.readyState == 'loading') {
              style.onreadystatechange = function() {
                   alert(this.readyState);
                  if (this.readyState = 'complete') {
                       this.sheet.cssText = cssText;
                   }
              }
          } else {
              style.textContent = cssText;
           }
         this.contentDocument.getElementsByTagName('head')[0].appendChild(style);
           this.contentDocument.body.innerHTML = html;
          this.contentWindow.print();
           setTimeout(function(){
               frame.parentNode.removeChild(frame);
            }, 0);
        }
      document.body.appendChild(frame);
   }*/
   </script>
<p>
	<b>Отдел оптовых продаж</b>
</p>
 <br>
<table style="width: 325px; float: left;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Кучеров Михаил" src="/include/contacts/kucherov_mich.jpg">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Кучеров Михаил</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:kucherov@postavkatrub.ru" style="text-decoration: none;">kucherov@postavkatrub.ru</a>
		</p>
		<p>
			Мобильный: +7 920 751-81-81
		</p>
		<p>
			Рабочий: +7 (4872) 37-74-94
		</p>
		<p>
			 +7 (4872) 44-05-20 доб. 21
		</p>
	</td>
</tr>
</tbody>
</table>
 <?if(false):?>
<table style="width: 325px;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Климов Михаил" src="/include/contacts/klimov_mich.jpg">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Климов Михаил</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:klimov@postavkatrub.ru" style="text-decoration: none;">klimov@postavkatrub.ru</a>
		</p>
		<p>
			Мобильный: +7 920 276-88-22
		</p>
		<p>
			Рабочий: +7 (4872) 25-45-83
		</p>
		<p>
			 +7 (4872) 44-05-20 доб. 22
		</p>
	</td>
</tr>
</tbody>
</table>
 <?endif?>
<table style="width: 325px; float: left;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Никулочкина Ольга" src="/include/contacts/nikulochkina_olga.jpg" style="width:100px; height:100px;">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Никулочкина Ольга</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:nikulochkina@postavkatrub.ru" style="text-decoration: none;">nikulochkina@postavkatrub.ru</a>
		</p>
		<p>
			Рабочий: +7 (4872) 25-45-83
		</p>
		<p>
			 +7 (4872) 44-05-20 доб. 22
		</p>
		<p>
			<br>
		</p>
		<p>
			<br>
		</p>
	</td>
</tr>
</tbody>
</table>
<table style="width: 325px;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Шинкаркина Ольга" src="/include/contacts/shinkarkina_olga.jpg" style="width:100px; height:100px;">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Шинкаркина Ольга</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:shinkarkina@postavkatrub.ru" style="text-decoration: none;">shinkarkina@postavkatrub.ru</a>
		</p>
		<p>
			Рабочий: +7 (4872) 25-45-83
		</p>
		<p>
			 +7 (4872) 44-05-20 доб. 23
		</p>
	</td>
</tr>
</tbody>
</table>
 <? /*<table style="width: 325px; float: left;"> 
  <tbody> 
    <tr style="vertical-align: top;"> <td style="vertical-align: top;"><img src="/include/contacts/bakosh.jpg" alt="Бакош Дмитрий"  /></td> <th>&nbsp; 
        <br />
       </th> <td style="vertical-align: top;"> 
        <p><b>Бакош Дмитрий</b></p>
       
        <p>E-mail: <a rel="nofollow" target="_blank" href="mailto:bakosh@postavkatrub.ru" style="text-decoration: none;" >bakosh@postavkatrub.ru</a></p>
       
        <p>Мобильный: +7 920 923-78-90</p>
       
        <p>Рабочий: +7 (4872) 25-45-83</p>
        <p> +7 (4872) 44-05-20 доб. 23</p>
       </td> </tr>
   </tbody>
 </table>

 
<table style="width: 325px;"> 
  <tbody> 
    <tr style="vertical-align: top;"> <td style="vertical-align: top;"><img src="/include/contacts/bakoshsv.jpg" alt="Бакош Светлана"  /></td> <th>&nbsp; 
        <br />
       </th> <td style="vertical-align: top;"> 
        <p><b>Бакош Светлана</b></p>
       
        <p>E-mail: <a rel="nofollow" target="_blank" href="mailto:bakoshsv@postavkatrub.ru" style="text-decoration: none;" >bakoshsv@postavkatrub.ru</a></p>
       
        <p>Рабочий: +7 (4872) 25-45-83</p>
        <p> +7 (4872) 44-05-20 доб. 24</p>
       </td> </tr>
   </tbody>
 </table>
 */?>
<p>
	<b style="display:block; margin-top:75px;">Отдел закупок</b>
</p>
 <br>
<table style="width: 325px; float: left;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Апрелова Наталия" src="/include/contacts/aprelova.jpg">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Апрелова Наталия</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:zakupka@postavkatrub.ru" style="text-decoration: none;">zakupka@postavkatrub.ru</a>
		</p>
		<p>
			Мобильный: +7 910-949-14-19
		</p>
		<p>
			Рабочий: 8 (4872) 37-74-93
		</p>
	</td>
</tr>
</tbody>
</table>
<table style="width: 325px;">
<tbody>
<tr style="vertical-align: top;">
	<td style="vertical-align: top;">
		<img alt="Кучерова Екатерина" src="/include/contacts/kucherova_ekaterina.jpg">
	</td>
	<th>
		&nbsp; <br>
	</th>
	<td style="vertical-align: top;">
		<p>
			<b>Кучерова Екатерина</b>
		</p>
		<p>
			E-mail: <a rel="nofollow" target="_blank" href="mailto:zakupka1@postavkatrub.ru" style="text-decoration: none;">zakupka1@postavkatrub.ru</a>
		</p>
		<p>
			Рабочий: +7 (4872) 25-45-85
		</p>
		<p>
			 +7 (4872) 44-05-20 доб. 32
		</p>
	</td>
</tr>
</tbody>
</table>
 <br>
 <br>
<div class="contacts_content1">
	<div class="contacts1_buttons">
 <a href="/file_download_on_link.php?file=/cont_mag.jpg&file_name=shema_proezda_ofis.jpg" target="_blank">Скачать схему проезда</a> <a href="javascript:void(0);" onclick="printImage('/cont_mag.jpg')">Распечатать</a>
	</div>
	<div id="contacts1">
		<p>
			<b>1. Магазин</b>
		</p>
		<div class="c_info1">
			<div class="c_info_div">
				 Адрес: г.Тула, ул. Кауля, д. 29
			</div>
			<div class="c_info_div">
				 Тел./факс: (4872) 37-04-06, 37-74-94
			</div>
			<div class="c_info_div">
				 E-mail: <a href="mailto:polymerstroy@tula.net">ps-tula@mail.ru</a>
			</div>
			<div class="c_info_div">
				 Часы работы: <span>Пн-Пт 9.00 - 18.00 <br>
				 Сб 10.00 - 15.00</span>
			</div>
		</div>
		<p align="center">
		</p>
		<div id="image1">
 <img alt="http://www.postavkatrub.ru/map061014.jpg" src="http://www.postavkatrub.ru/map061014.jpg" style="display:none;" id="img1">
		</div>
	</div>
	 <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=aTbOehgZ-559YAMJXuC8CDXQdLB0H5u5&width=614&height=450"></script> <br>
 <br>
</div>
<div class="contacts_content2">
	<div class="contacts2_buttons">
 <a href="/file_download_on_link.php?file=/cont_baza.jpg&file_name=shema_proezda_baza.jpg" target="_blank">Скачать схему проезда</a> <a href="javascript:void(0);" onclick="printImage2('/cont_baza.jpg')">Распечатать</a>
	</div>
	<div id="contacts2">
		<p>
			<b>2. Торгово-строительная база</b>
		</p>
		<div class="c_info1">
			<div class="c_info_div">
				 Адрес: г.Тула, ул. Щекинское шоссе д.4
			</div>
		</div>
		<div class="c_info_div">
			 Тел./факс: (4872) 25-45-85, 25-45-84
		</div>
	</div>
	<div class="c_info_div">
 <span>E-mail: <a href="mailto:polymerstroy@tula.net">ps-tula@mail.ru</a></span>
	</div>
	<div class="c_info_div">
		 Часы работы: <span>Пн-Пт 9.00 - 18.00 <br>
		 Сб 10.00 - 15.00</span>
	</div>
</div>
<p align="center">
</p>
<p>
</p>
<div id="image2">
	 <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=VfOrXejdWijKTTjvpVeXmcdaxMMMd3KW&width=614&height=450"></script>
</div>
<br>