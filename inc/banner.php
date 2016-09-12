<div style="margin-bottom: 2em;">
				<ul class="bxslider bxslider--banner">
					<li class="slide"><img src="/images/ban-1.jpg" /></li>
					<li class="slide"><img src="/images/ban-2.jpg" /></li>
					<li class="slide"><img src="/images/ban-3.jpg" /></li>
					<li class="slide"><img src="/images/ban-4.jpg" /></li>
				</ul>
			</div>
			<?$APPLICATION->SetAdditionalCSS('/css/jquery.bxslider.min.css', true);?>
			<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
			<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
			<script type="text/javascript" src="/js/jquery.fitvids.js"></script>
			<script type="text/javascript">
    			$(document).ready(function () {
    				/** slider */
		        	var slidesWrapper = $('.bxslider.bxslider--banner');
		            var slides = $('.slide', slidesWrapper);
		            
		            if (!slidesWrapper.length || !slides.length)
		                return;

		            var slider, viewport, wrapper, controls;
		            var sliderSettings = {
		                mode: 'fade',
		                speed: 800,
		                easing: 'easeInOutCirc',
		                useCSS: true,
		                randomStart: false,
		                startSlide: 0,
		                minSlides: 1,
		                maxSlides: 1,
		                moveSlides: 1,
		                shrinkItems: true,
		                slideWidth: 700,
		                slideMargin: 10,
		                adaptiveHeight: false,
		                responsive: true,
		                preloadImages: 'visible',
		                touchEnabled: true,
		                swipeThreshold: 60,
		                controls: false,
		                infiniteLoop: true,
		                hideControlOnEnd: true,
		                pager: false,
		                pagerSelector: null,
		                auto: true,
		                pause: 3000,
		                autoStart: false,
		                autoHover: false,
		                autoDelay: 1000,
		                captions: false
		            };
					
					slider = slidesWrapper.bxSlider(sliderSettings);
					slider.startAuto();
    			});
    		</script>