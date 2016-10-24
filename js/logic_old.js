
// изменение количества товара в каталоге соотвественно кратности 
$(document).ready(function() {
    // при клике на минус
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var measure = $input.data('measure');
        var count = parseInt($input.val()) - measure;
        count = count < measure ? measure : count;
        $input.val(count);
        $input.change();
        return false;
    });
    // при клике на плюс
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        var measure = $input.data('measure');
        $input.val(parseInt($input.val()) + measure);
        $input.change();
        return false;
    });
    // при изменении поля вручную, округляем до большего значения
    $('.quant').change(function () {                
        var measure = $(this).data('measure');
        if ($(this).val() < measure) {
            $(this).val(measure);    
        }  else if ($(this).val() % measure != 0) {
            $(this).val(Math.ceil($(this).val() / measure) * measure);       
        };
        $(this).change();
        return false;
    });
});


function width() {
    var width1=parseInt($('.basket-title').css("width"))*1+parseInt($('.basket-price').css("width"));
    var height1=parseInt($('#id-cart-list').css("height"));
    //   alert(width1);
    $('#basketOrderButton2').css('right', width1*1-7+'px');
    $('#basketOrderButton2').css('top', '-'+height1*1-64+'px');

    $('div.yen-bs-box').css('width', parseInt($('.basket-price').css("width"))*1+parseInt($('.basket-title').css("width")));
}



function button2() {
    var width2=parseInt($('.basket-title').css("width"))*1+parseInt($('.basket-price').css("width"));
    var height2=parseInt($('#order_form_content').css("height"));
    //   alert(width1);
    $('.confirm_butt2').css('right', width2*1+27+'px');
    $('.confirm_butt2').css('top', '-'+61+'px');
}    




//изменение количества товара в разделе каталога при нажатии на "+" и "-" в "летающей" корзине
function new_quantity() {
    //изменение количества товара в разделе каталога при нажатии на "+" в "летающей" корзине
    $('.yen-bs-button4').live('click', function() {
        var new_quant=$(this).parent().find('.yen-bs-txt').val()*1+1;
        var elId=parseInt($(this).parent().find('.el_id').val());
        $('.good_quant').each(function() {
            if (parseInt($(this).attr('id').slice(3))==elId) {
                $(this).html(new_quant);
                $(this).closest('table').find('.quant').val('');
            }
        });
    });


    //изменение количества товара в разделе каталога при нажатии на "-" в "летающей" корзине
    $('.yen-bs-button5').live('click', function() {
        var new_quantMinus=$(this).parent().find('.yen-bs-txt').val()*1-1;
        var elIdMinus=parseInt($(this).parent().find('.el_id').val());
        $('.good_quant').each(function() {
            if (parseInt($(this).attr('id').slice(3))==elIdMinus) {
                $(this).html(new_quantMinus);
                $(this).closest('table').find('.quant').val('');
            }
        });
    });


    //изменение количества товара в разделе каталога при ручном вводе количества товара в "летающей"" корзине 
    $('.yen-bs-txt').live('keyup',function(){
        if ($(this).val()) {var new_quantThis=$(this).val();}
        else {var new_quantThis=0;}
        var elIdThis=parseInt($(this).parent().find('.el_id').val());
        $('.good_quant').each(function() {
            if (parseInt($(this).attr('id').slice(3))==elIdThis) {
                $(this).html(new_quantThis);
                $(this).closest('table').find('.quant').val('');
            }
        });
    });
}



//удаление количества товара в разделе каталога при нажатии на "удалить" в "летающей"" корзине
$('.yen-ys-button6').live('click', function() {
    //  alert(1);
    var new_quantDel=0;
    var elIdDel=parseInt($(this).parent().parent().find('.el_id').val());
    // $(this).parent().parent().find('.old_q').val(new_quantDel);
    //  alert(elIdDel);
    $('#id2_'+elIdDel).val(new_quantDel);
    $('.good_quant').each(function() {
        if (parseInt($(this).attr('id').slice(3))==elIdDel) {
            //  alert(parseInt($(this).attr('id').slice(3)));
            // alert($(this).html());
            $(this).html(new_quantDel);
            $(this).closest('table').find('.quant').val('');
        }
    });
});




////////////////////////////




//изменение количества товара в корзине при нажатии на "+" и "-" в "летающей"" корзине
function new_quantityBasket() {
    //изменение количества товара в разделе каталога при нажатии на "+" в "летающей"" корзине
    $('.yen-bs-button4').live('click', function() {
        var new_quantBasket=$(this).parent().find('.yen-bs-txt').val()*1+1;
        var elIdBasket=parseInt($(this).parent().find('.el_id').val());
        $('.goodId').each(function() {
            if (parseInt($(this).val())==elIdBasket) {
                $(this).parent().find('.cart-item-quantity-input').val(new_quantBasket);
                var priceItem = parseFloat($(this).parent().parent().find('.cart-item-price').html());
                if (isNaN(priceItem)) {priceItem=0;}
                sum=new_quantBasket*priceItem;
                sum=sum.toFixed(2);
                if (isNaN(sum)) {sum=0;}
                $(this).parent().parent().find('.sum').text(sum);
            }
        });
    });


    //изменение количества товара в корзине при нажатии на "-" в "летающей"" корзине
    $('.yen-bs-button5').live('click', function() {
        var new_quantMinusBasket=$(this).parent().find('.yen-bs-txt').val()*1-1;
        var elIdMinusBasket=parseInt($(this).parent().find('.el_id').val());
        $('.goodId').each(function() {
            if (parseInt($(this).val())==elIdMinusBasket) {
                $(this).parent().find('.cart-item-quantity-input').val(new_quantMinusBasket);
                var priceItemMinus = parseFloat($(this).parent().parent().find('.cart-item-price').html());
                if (isNaN(priceItemMinus)) {priceItemMinus=0;}
                sumMinus=new_quantMinusBasket*priceItemMinus;
                sumMinus=sumMinus.toFixed(2);
                if (isNaN(sumMinus)) {sumMinus=0;}
                $(this).parent().parent().find('.sum').text(sumMinus);
            }
        });
    });


    //изменение количества товара в корзине при ручном вводе количества товара в "летающей"" корзине  
    $('.yen-bs-txt').live('keyup',function(){
        if ($(this).val()) {var new_quantThisBasket=$(this).val();}
        else {var new_quantThisBasket=0;}
        var elIdThisBasket=parseInt($(this).parent().find('.el_id').val());
        $('.goodId').each(function() {
            if (parseInt($(this).val())==elIdThisBasket) {
                $(this).parent().find('.cart-item-quantity-input').val(new_quantThisBasket);
                var priceItem2 = parseFloat($(this).parent().parent().find('.cart-item-price').html());
                if (isNaN(priceItem2)) {priceItem2=0;}
                sum2=new_quantThisBasket*priceItem2;
                sum2=sum2.toFixed(2);
                if (isNaN(sum2)) {sum2=0;}
                $(this).parent().parent().find('.sum').text(sum2);
            }
        });
    });


    //удаление количества товара в корзине при нажатии на "удалить" в "летающей"" корзине
    $('.yen-ys-button6').live('click', function() {
        //  alert(1);
        //   var new_quantDelBasket=0;
        var elIdDelBasket=parseInt($(this).parent().parent().find('.el_id').val());
        //  alert(elIdDel);
        $('.goodId').each(function() {
            if (parseInt($(this).val())==elIdDelBasket) {
                //  alert(parseInt($(this).attr('id').slice(3)));
                // alert($(this).html());
                $(this).parent().parent().find('.cart-shelve-item').click();
            }
        });
    });


}






function pedia_menu_scroll(){
    if (navigator.userAgent.search(/Firefox/) > 0) {

    }
    //обрабатываем клики по меню

    //  alert($(".main-column").css("height"));

    //при перезагрузке страницы проверяем текущий слайд
    var scroll_top = parseInt($(window).scrollTop());

    //текущее положение меню относительно верхнего края страницы
    var menu_top = $(".enter_wrapper").offset().top;      

    //если страница проскроленна выше чем начинается меню, начинаем его перемещать вниз
    if (scroll_top > menu_top*1+255) {
        if (navigator.userAgent.search(/Firefox/) > 0) {
            var dif = scroll_top - menu_top; 
        }
        $(".left-column").css("margin-top",dif + "px");         
    }
    //если ксролл страницы меньше положения меню, ставим его не место
    else {         
        $(".left-column").css("margin-top","0px");
    }

    //если скролл меню + его высота превышает высоту родительского блока (то есть меню вылазит вниз), то приклеиваем его к нижнему краю его родительского блока. 
    //расчет положения производится по формуле ниже

    if (parseInt($(".left-column").css("margin-top"))*1 + parseInt($(".left-column").outerHeight())*1 > parseInt($(".main-column").css("height"))) {
        $(".left-column").css("margin-top",0 + "px");
    }  



    //движение меню при скролле страницы
    if (parseInt($(".main-column").css("height"))-(parseInt($(".left-column").css("margin-top"))*1 + parseInt($(".left-column").outerHeight()))>300) {
        $(document).scroll(function() {         

            //при перезагрузке страницы проверяем текущий слайд

            var scroll_top = parseInt($(window).scrollTop());

            // console.log(scroll_top+'#'+menu_top);

            if (scroll_top > menu_top*1+55) {
                if (navigator.userAgent.search(/Firefox/) > 0) {
                    var dif = scroll_top - menu_top;
                }
                else {var dif = scroll_top - menu_top;} 
                $(".left-column").css("margin-top",dif + "px");        
            }

            else {          
                $(".left-column").css("margin-top","0px");            
            }

            // alert(parseInt($(".left-column").css("margin-top"))*1 + parseInt($(".left-column").outerHeight()));
            // alert(($(".main-column").css("height")));

            if (parseInt($(".left-column").css("margin-top"))*1 + parseInt($(".left-column").outerHeight())*1 > parseInt($(".main-column").css("height"))) {
                $(".left-column").css("margin-top",parseInt($(".main-column").css("height")) - parseInt($(".left-column").outerHeight()) *1 + "px");
            }

        });
    }

    /*
    // alert(parseInt($(".main-column").css("height")));

    //при перезагрузке страницы проверяем текущий слайд
    var scroll_top = parseInt($(window).scrollTop());

    //текущее положение меню относительно верхнего края страницы
    var menu_top = parseInt($(".catalog-section-list").offset().top);      

    //alert(menu_top);
    //если страница проскроленна выше чем начинается меню, начинаем его перемещать вниз
    if (scroll_top > menu_top) {
    var dif = scroll_top - menu_top;       
    $(".left-column").css("margin-top",dif + "px");         
    }
    //если ксролл страницы меньше положения меню, ставим его не место
    else {         
    $(".left-column").css("margin-top","0px");
    }

    //если скролл меню + его высота превышает высоту родительского блока (то есть меню вылазит вниз), то приклеиваем его к нижнему краю его родительского блока. 
    //расчет положения производится по формуле ниже

    //движение меню при скролле страницы
    $(document).scroll(function(){         

    //при перезагрузке страницы проверяем текущий слайд
    var scroll_top = parseInt($(window).scrollTop());
    //alert(menu_top);

    if (scroll_top > menu_top) {
    var dif = scroll_top - menu_top;              
    $(".left-column").css("margin-top",dif + "px");
    }
    else {          
    $(".left-column").css("margin-top","0px");            
    }

    if (parseInt($(".left-column").css("margin-top")) > parseInt($(".main-column").css("height"))) {
    $(".left-column").css("margin-top",parseInt($(".main-column").css("height")) - parseInt($(".left-column").outerHeight())*1+114 + "px");
    }  

    });
    */}

function validateInt(el){
    el.value = el.value.replace(/\D+/,'');
}

$(function()  {
    $('.login_button').click(
        function() {
            if ($('.registration').css('display')=='none'){
                $('.registration').css('display','block'); 
            } else {
                $('.registration').css('display','none');  
            }
        }
    )

    /*        $(".rubricator li.root").live("click", function(e) {
    e.preventDefault();

    if(!$(this).hasClass("active")) {
    $(".rubricator li.root").find(">ul").slideUp("slow", function() {$(this).parent().removeClass("active");});
    $(this).addClass("active").find(">ul").slideDown("slow");
    } else {
    $(this).find(">ul").slideUp("slow", function() {$(this).parent().removeClass("active");});
    }
    });

    $(".rubricator li.root ul").live("click", function(e) {
    e.stopPropagation();
    });*/

    //при нажатии на Enter товар попадает в корзину
    $("input[type='text']").keypress(function(event) {
        if (event.which == '13' || event.which == '10') {
            $(this).parent().find('.addToCart').click(); 
        }
    }); 




    //при нажатии на "Удалить" в разделе каталога товар удаляется из корзины
    $('.product-offers .cart-shelve-item').live('click',function(e) {
        e.preventDefault(); 
        var thisDelId = parseInt($(this).parent().parent().find('.good_quant').attr('id').slice(3));
        $(this).parent().parent().find('.good_quant').html(0); 
        $('.el_id').each(function() {
            //  alert(parseInt($(this).val()));
            // alert(thisDelId);
            if (parseInt($(this).val())==thisDelId) {
                $(this).parent().parent().find('.yen-bs-t_delete .yen-ys-button6').click();

                $.post(
                    '/catalog/ajax3.php',
                    {},
                    function(data) {

                        //   alert(1);
                        $('#basket-line').html(data); 
                        // alert(data);

                });
            }    
        });


    });





    $(".addToCart").click(function() { 

        $('.yen-bs-box').removeClass('yen-bs-up');
        $('.yen-bs-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');

        if ($(this).parent().find('.quant').val()=='') {
            //alert(1);
            // alert($(this).parent().find('.quant').val());
            //alert($(this).parent().parent().find('.good_quant').html());
            // $(this).parent().parent().find('.good_quant').html($(this).parent().find('.quant').val());

            var el = $(this);
            $.ajax({
                type: 'POST',
                url: '/catalog/ajax2.php',
                data: '',
                success: function(response) {
                    var $tip = $('<div class="tipsy tipsy-w"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                    $tip.find('.tipsy-inner').html(response);
                    $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                    var pos = el.offset();
                    $tip.css({ top: pos.top - el[0].offsetWidth/2, left: pos.left + el[0].offsetWidth });
                    $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                    window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                },
            });

        } else {


            //alert(parseInt($(window).scrollTop()));

            var basket_top = window.pageYOffset; 
            var basket_right =  parseInt($(".yen-bs-count").offset().left); 
            // alert(basket_top);

            //alert(0);
            var productID = $(this).val();
            // alert(productID);
            var quantity = parseInt($("#quantity_"+productID).val());
            //alert(quantity);
            var thisId = parseInt($(this).parent().parent().find('.good_quant').attr('id').slice(3));
            var thisVal = parseInt($(this).parent().parent().find('.quant').val());
            quantity=parseInt($("#id_"+productID).html())*1+quantity;
            //alert(thisId);
            $('.el_id').each(function() {
                if (parseInt($(this).val())==thisId) {
                    // alert(thisVal);
                    // alert($(this).parent().find('.yen-bs-txt').val());
                    // alert(thisVal);

                    // alert(quantity);
                    $(this).parent().find('.yen-bs-txt').val(quantity);
                }
                //  $(this).parent().parent().find('.good_quant').html(quantity);

            });


            var el = $(this);
            // alert(sum);
            //el.css('backgroundImage', 'url(/images/ajax-loader.gif)');
            $.ajax({
                type: 'POST',
                url: '/catalog/ajax.php',
                data: 'action=ADD2BASKET&id='+productID+'&quantity='+quantity,
                success: function(response) {
                    $("#basket-line").html(response);
                    el.css('backgroundImage', 'url(/images/cart_min.png)');
                    var $tip = $('<div class="tipsy tipsy-w"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>');
                    $tip.find('.tipsy-inner').html(response);
                    $tip.remove().css({top: 0, left: 0, visibility: 'hidden', display: 'block'}).prependTo(document.body);
                    var pos = el.offset();
                    $tip.css({ top: pos.top - el[0].offsetWidth/2, left: pos.left + el[0].offsetWidth });
                    $tip.stop().css({opacity: 0, display: 'block', visibility: 'visible'}).animate({opacity: 0.8});
                    window.setTimeout(function(){ $tip.stop().fadeOut(function() { $tip.remove(); }) }, 2000);
                    //                            $("#quantity_"+productID).val('');
                    $("#id_"+productID).html(quantity);
                    //$('#basket-line_wrapper').load("document.location.href #basket-line");

                },
            });
        }
    });

    Cufon.replace('.header-wrapper .header-phones dl dd', { fontFamily: 'Europe' });

    $("a[rel^='prettyPhoto']").prettyPhoto({social_tools : ''});

});