<style>
.bananer {/*display: none;*/}
div#b1 {position:relative; height:110px; margin: 15px 0px 10px 0px;}
div#b1 ul li {float:left; position:absolute; list-style: none;}
div#b1 ul li.show {z-index:500;}
div#b2 {position:relative; height:110px;}
div#b2 ul li {float:left; position:absolute; list-style: none;}
div#b2 ul li.show {z-index:500;}
</style>




<div class="bananer">

<script type="text/javascript">
function theRotator1() {
	$('div#b1 ul li').css({opacity: 0.0});
	$('div#b1 ul li:first').css({opacity: 1.0});
	setInterval('rotate1()',5000);
}
function rotate1() {	
	var current = ($('div#b1 ul li.show')?  $('div#b1 ul li.show') : $('div#b1 ul li:first'));
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#b1 ul li:first') :current.next()) : $('div#b1 ul li:first'));	

	// var sibs = current.siblings();
	// var rndNum = Math.floor(Math.random() * sibs.length );
	// var next = $( sibs[ rndNum ] );
 
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
};
$(document).ready(function() {		
	theRotator1();
});
</script>

<div id="b1">
  <ul>
    <li class="show"><a href="/catalog/radiatory/stalnye_panelnye/"><img src="/images/banner/4.png" /></a></li>
    <li><a href="/catalog/naruzhnaya_kanalizatsiya/"><img src="/images/banner/3.png" /></a></li>
	<li><a href="/catalog/naruzhnaya_kanalizatsiya/korsis_gofrirovannye/"><img src="/images/banner/2.png" /></a></li>
    <li><a href="/catalog/naruzhnoe_vodosnabzhenie/pnd/truby_dlya_vody/"><img src="/images/banner/1.png" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/alta.jpg" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/kesson.jpg" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/alta-m.jpg" /></a></li>
	<li><a href="/catalog/radiatory/"><img src="/images/banner/5.png" /></a></li>
  </ul> 
</div>

<script type="text/javascript">
function theRotator2() {
	$('div#b2 ul li').css({opacity: 0.0});
	$('div#b2 ul li:first').css({opacity: 1.0});
	setInterval('rotate2()',5000);
}
function rotate2() {	
	var current = ($('div#b2 ul li.show')?  $('div#b2 ul li.show') : $('div#b2 ul li:first'));
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#b2 ul li:first') :current.next()) : $('div#b2 ul li:first'));	

	// var sibs = current.siblings();
	// var rndNum = Math.floor(Math.random() * sibs.length );
	// var next = $( sibs[ rndNum ] );
 
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
};
$(document).ready(function() {		
	theRotator2();
});
</script>

<div id="b2">
  <ul>
    <li class="show"><a href="/catalog/radiatory/"><img src="/images/banner/5.png" /></a></li>
    <li><a href="/catalog/radiatory/stalnye_panelnye/"><img src="/images/banner/4.png" /></a></li>
    <li><a href="/catalog/naruzhnaya_kanalizatsiya/"><img src="/images/banner/3.png" /></a></li>
	<li><a href="/catalog/naruzhnaya_kanalizatsiya/korsis_gofrirovannye/"><img src="/images/banner/2.png" /></a></li>
    <li><a href="/catalog/naruzhnoe_vodosnabzhenie/pnd/truby_dlya_vody/"><img src="/images/banner/1.png" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/alta.jpg" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/kesson.jpg" /></a></li>
    <li><a href="/ochistnye_ustanovki_alta/"><img src="/images/banner/alta-m.jpg" /></a></li>
  </ul>
</div>

</div>

<style>
.vk {
	text-align: center;
    padding: 20px 0;
}
.vk a {}
.vk p {
	font-weight: bold;
    font-size: 17px;
}
.vk img {
	height: 140px;
}
</style>

<div class='vk'>
<p>Мы в соцсетях:</p>
<a href='http://vk.com/postavkatrub' target='_blank'><img src='/images/vk.png' /></a>
</div>