//выпадение "летающей" корзины при наведении на надписи
function basket_hover() {
    var scroll_top = parseInt($(window).scrollTop());
if (scroll_top<300) {$('#basket-line').removeClass('fix').css('left', 'auto');
}

   $('.basket-title').live('mouseover', function() {
       $(this).parent().find('.#yen-bs-bag-popup').css({'display':'block', 'height':400+'px', 'overflow-x':'hidden', 'overflow-y':'hidden'});
       //положение кнопки "Оформить заказ" в "летающей" корзине
 // $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-
 //parseInt($('#basketOrderButton3').css('width'))-20+'px');
   });

   $('.basket-title').live('mouseout', function() {
     $(this).parent().find('.#yen-bs-bag-popup').css('display', 'none');
   });


  $('.basket-price').live('mouseover', function() {
       //положение кнопки "Оформить заказ" в "летающей" корзине
   $(this).parent().find('.#yen-bs-bag-popup').css({'display':'block', 'height':400+'px', 'overflow-x':'hidden', 'overflow-y':'hidden'});
 //  $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-parseInt($('#basketOrderButton3').css('width'))-20+'px');//
   });

   $('.basket-price').live('mouseout', function() {
      $(this).parent().find('.#yen-bs-bag-popup').css('display', 'none');
   });


     $('#yen-bs-bag-popup').live('mouseover', function() {
       $(this).css({'display':'block', 'height':400+'px', 'overflow-x':'hidden', 'overflow-y':'hidden'});
         //положение кнопки "Оформить заказ" в "летающей" корзине
  // $(this).parent().find('.#yen-bs-bag-popup').css('display', 'block');
  // $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-
  //parseInt($('#basketOrderButton3').css('width'))-20+'px');
   });

   $('#yen-bs-bag-popup').live('mouseout', function() {
      $(this).css('display', 'none');
     //  $(this).parent().find('.#yen-bs-bag-popup').css('display', 'none');
   });


  /*  $('.basket-title').hover(function() {

     $(this).parent().find('.#yen-bs-bag-popup').css('display', 'block');

  //положение кнопки "Оформить заказ" в "летающей" корзине
   $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-parseInt($('#basketOrderButton3').css('width'))-20+'px');
 },
       function() {
       $(this).parent().find('.#yen-bs-bag-popup').css('display', 'none');
     });



     $('.basket-price').hover(function() {
     $(this).parent().find('.#yen-bs-bag-popup').css('display', 'block');
     },
       function() {
       $(this).parent().find('.#yen-bs-bag-popup').css('display', 'none');
     });


     $('#yen-bs-bag-popup').hover(function() {
         $(this).css('display', 'block');
         },
       function() {
          $(this).css('display', 'none');
       });
       */
}

function F1() {/*
$(".yen-bs-count a.basket-title").unbind('hover');
   $(".yen-bs-count .basket-price").unbind('hover');
   $("#yen-bs-bag-popup").unbind('hover');

    if($('#yen-bs-bag-popup').hasClass('yen-bs-closed')) {
            $('.yen-bs-basket-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
            $('#yen-bs-bag-popup').removeClass('yen-bs-closed').addClass('yen-bs-opened');
            $('#yen-bs-bag-popup').parent().parent().addClass('yen-bs-up');
            var hw = $(window).height();
            var ht = $('#yen-bs-bag-popup .yen-bs-bask_wr table').height();
            if(ht > (hw-200)) {
                $('.yen-bs-count .yen-bs-bask_wr').css('height', hw-300).addClass('yen-bs-hh');
            };
        }
        else {
            $('#yen-bs-bag-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
        }*/
}

function yenisite_bs_close(){
    if($('#yen-bs-bag-popup').hasClass('yen-bs-opened')) {
        $('#yen-bs-bag-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
    }
}

$(document).ready(function(){
    //$(".yen-bs-count a.basket-title").unbind('hover');
   // $(".yen-bs-count .basket-price").unbind('hover');
   // $("#yen-bs-bag-popup").unbind('hover');


   $('.yen-bs-close').live('click',function() {
     //  alert(1);
       //$('.yen-bs-count').mouseout();
    //  $('.yen-bs-count').mouseout();
      $('#yen-bs-bag-popup').css('display', 'none');

   });

/*   $('.yen-bs-count').mouseout(function() {
       $('#yen-bs-bag-popup').removeAttr('style');

   }); */




 /*  $('.yen-bs-count').hover(function(e) {
      if (e.target.hasClass('yen-bs-close')) {return;} else {
       $('#yen-bs-bag-popup').css('display', 'block');
      }
    //  alert(1);
   },
     function(e) {
          if (e.target.hasClass('yen-bs-close')) {return;} else {
       $('#yen-bs-bag-popup').css('display', 'none');
          }
      // alert(2);
   });*/



    $(window).resize(function(){
                var hw = $(window).height();
                var ht = $('#yen-bs-bag-popup .yen-bs-bask_wr table').height();
                if(ht > (hw-200)) {
                    $('.yen-bs-count .yen-bs-bask_wr').css('height', hw-300).addClass('yen-bs-hh');
                };
            });

   /* $('#basket-line .yen-bs-count').live('hover',function() {
        F1();
    });

     $('#basket-line .basket-price').live('hover',function() {
        F1();
    });

    $('#basket-line #yen-bs-bag-popup').live('hover',function() {
        F1();
    });*/

    $("#yen-bs-bag-popup").on("hover", ".yen-bs-count a.basket-title", function(){
    //$(".yen-bs-box .yen-bs-count a.yen-bs-count_link").on("click", function(){



    });



 /*   $(".yen-bs-box").on("hover", ".yen-bs-count .basket-price", function(){
    //$(".yen-bs-box .yen-bs-count a.yen-bs-count_link").on("click", function(){

        if($('#yen-bs-bag-popup').hasClass('yen-bs-closed')) {
            $('.yen-bs-basket-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
            $('#yen-bs-bag-popup').removeClass('yen-bs-closed').addClass('yen-bs-opened');
            // $('#yen-bs-bag-popup').parent().parent().addClass('yen-bs-up');
            var hw = $(window).height();
            var ht = $('#yen-bs-bag-popup .yen-bs-bask_wr table').height();
            if(ht > (hw-200)) {
                $('.yen-bs-count .yen-bs-bask_wr').css('height', hw-300).addClass('yen-bs-hh');
            };
        }
        else {
            $('#yen-bs-bag-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
        }
    });*/




    $(".yen-bs-box").on("hover", "#yen-bs-bag-popup", function(){
    //$(".yen-bs-box .yen-bs-count a.yen-bs-count_link").on("click", function(){

        if($('#yen-bs-bag-popup').hasClass('yen-bs-closed')) {
            $('.yen-bs-basket-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
            $('#yen-bs-bag-popup').removeClass('yen-bs-closed').addClass('yen-bs-opened');
            // $('#yen-bs-bag-popup').parent().parent().addClass('yen-bs-up');
            var hw = $(window).height();
            var ht = $('#yen-bs-bag-popup .yen-bs-bask_wr table').height();
            if(ht > (hw-200)) {
                $('.yen-bs-count .yen-bs-bask_wr').css('height', hw-300).addClass('yen-bs-hh');
            };
        }
        else {
            $('#yen-bs-bag-popup').removeClass('yen-bs-opened').addClass('yen-bs-closed');
        }
    });





    $(".yen-bs-q").focus(function(){
        $('#'+$(this).attr('id').replace('YS_BS_QUANTITY_', 'YS_BS_OLD_Q_')).val($(this).val());
        $(this).select() ;
    });
    $(document).keydown(function(eventObject){
        if(eventObject.which==27)
            yenisite_bs_close();
    });

    var onBasket;
    $('.yen-bs-box').mouseover(function(){onBasket=true;});
    $('.yen-bs-box').mouseout(function(){onBasket=false;});

        $('#fixbody a:not(.yen-bs-box a)').on('click',function(){
            if(onBasket==false)
                yenisite_bs_close();
        });

    $(document).on('click',function(){
        if(onBasket==false)
            yenisite_bs_close();
    });

});

function yenisite_number_format (number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function yenisite_declOfNum(number, titles)
{
    var index = 0;
    var cases = [ 2, 0, 1, 1, 1, 2 ];
    if(number % 100 > 4 && number % 100 < 20)
        index = 2;
    else
        index = cases[Math.min(number%10, 5)];
    return titles[index];
}

