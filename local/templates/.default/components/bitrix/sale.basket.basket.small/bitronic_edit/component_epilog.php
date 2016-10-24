<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    if(!$_SESSION['YENISITE_BSF']['arParams'])
    {
        $_SESSION['YENISITE_BSF']['arParams'] = $arParams; 
        $_SESSION['YENISITE_BSF']['arParams']['IT_IS_AJAX_CALL'] = 'Y'; 
    }
    if(!$_SESSION['YENISITE_BSF']['TemplateName']) 
        $_SESSION['YENISITE_BSF']['TemplateName'] = $this->GetTemplateName();
?>
<?    
    $url = "{$arResult['TEMPLATE_PATH']}/ys_basket_tools.php";
?>
<script>
    function yen_setQuantity(id, sign, pr_id, measure) { 
        console.log("yen_setQuantity");
        if (!isNaN(id) && sign) {
            var url = '<?=$url;?>';
            var titles = ['<?=GetMessage('YS_BS_PRODUCT1');?>', '<?=GetMessage('YS_BS_PRODUCT2');?>', '<?=GetMessage('YS_BS_PRODUCT0');?>'];
            var control_quantity = '<?=$arParams['CONTROL_QUANTITY'];?>';
            var quantity_logic = '<?=$arParams['QUANTITY_LOGIC'];?>'; 
            console.log("yen_setQuantity");           
            console.log("yen_setQuantity id:" + id + " sign:" + sign + " url:" + url + " titles:" + titles + " control_quantity:" + control_quantity + " pr_id:" + pr_id + " quantity_logic:" + quantity_logic + " measure:" + measure)
            yenisite_set_quantity(id, sign, url, titles, control_quantity, pr_id, quantity_logic, '<?=GetMessage('YS_BS_NO_QUANTITY');?>', measure);
        }
    }
    function yenisite_set_quantity(id, sign, url, titles, control_quantity, product_id, quantity_logic, err3, measure)
    {
        var current_quantity = 0;
        var price = 0;
        var old_total_sum =0;
        var total_sum = 0;
        var new_quantity = 0;
        var id_basket_element = '';
        var delta_quantity = 0;
        var str_total_sum = '';
        if(sign != 'c')
            current_quantity = $('#YS_BS_QUANTITY_'+id).val();
        else
            current_quantity = $('#YS_BS_OLD_Q_'+id).val();
        price = $('#YS_BS_PRICE_'+id).val();
        total_sum = $('#yen-bs-all-sum').val();
        old_totla_sum = total_sum;
        total_sum = total_sum - price * current_quantity ;
        old_quantity = current_quantity ;
        if(Number(current_quantity) >= 0){
            switch(sign){
                case 'p':
                    delta_quantity = measure;
                    break;
                case 'm':
                    delta_quantity = -measure;
                    break;
                case 'd':
                    delta_quantity = 0;
                    current_quantity = 0;
                    break;
                case 'c':
                    // delta_quantity = 0 ;
                    current_quantity = $('#YS_BS_QUANTITY_'+id).val();
                    //delta_quantity = Number($('#YS_BS_QUANTITY_'+id).val()) - Number(current_quantity);
                    //var measure = $(this).data('measure');                
                    if (current_quantity % measure != 0) {
                        delta_quantity = Math.ceil(current_quantity / measure) * measure;
                        current_quantity = 0;                         
                    };
                    break;
                default:
                    delta_quantity = 0;
                    break;
            }

            new_quantity = Number(current_quantity) + Number(delta_quantity);

            id_basket_element = $('#YS_BS_QUANTITY_'+id).attr('name');
            id_basket_element = id_basket_element.replace('YS_BS_QUANTITY_', '');

            $.post(url, {id_basket_element: id_basket_element, new_quantity: new_quantity, action: 'setQuantity', control_quantity: control_quantity, product_id:product_id},
                function(data) {
                    data = $.trim(data) ;
                    new_quantity = Number(data);
                    if(!isNaN(new_quantity))
                    {
                        if(quantity_logic == 'q_products')
                        {
                            var product_count = Number($('#YS_BS_COUNT_PRODUCT').html()) + Number(delta_quantity) ;
                            $('#YS_BS_COUNT_PRODUCT').html(product_count);
                            $('#YS_BS_COUNT_STRING').html(yenisite_declOfNum(product_count, titles));
                        }
                        $('#YS_BS_QUANTITY_'+id).val(new_quantity);
                        total_sum += price * new_quantity ;
                        if(total_sum < 0 || isNaN(total_sum))
                            total_sum = 0;
                        $('#yen-bs-all-sum').val(total_sum);
                        str_total_sum = yenisite_number_format(total_sum, 2, ',', ' ') ;
                        $('#YS_BS_TOTALSUM_TOP').html(str_total_sum);
                        $('#YS_BS_TOTALSUM').html(str_total_sum);

                        $('.basket-price').html(str_total_sum +' руб.');
                        $('.total-price b').html(str_total_sum +' руб.');

                        $('#e_basket_totalsum').html(str_total_sum);
                        $('#e_basket_total, #e_basket_count').html($('input[name=el_id]').length);
                    }
                    else
                    {
                        // if(data == 'del')
                        if(data.indexOf('del') + 1)
                        {
                            if(total_sum < 0 || isNaN(total_sum))
                                total_sum = 0;
                            $('#yen-bs-all-sum').val(total_sum);
                            str_total_sum = yenisite_number_format(total_sum, 2, ',', ' ') ;
                            $('#YS_BS_TOTALSUM_TOP').html(str_total_sum);
                            $('#YS_BS_TOTALSUM').html(str_total_sum);

                            $('.basket-price').html(str_total_sum +' руб.');
                            $('.total-price b').html(str_total_sum+' руб.');

                            $('#YS_BS_ROW_'+id).remove();
                            var product_count ;
                            if(quantity_logic == 'q_products') {
                                product_count = Number($('#YS_BS_COUNT_PRODUCT').html()) - Number(old_quantity) ;
                            }
                            else {
                                product_count = Number($('#YS_BS_COUNT_PRODUCT').html())-1;
                            }
                            $('#YS_BS_COUNT_PRODUCT').html(product_count);
                            $('#YS_BS_COUNT_STRING').html(yenisite_declOfNum(product_count, titles));

                            if($('#b-'+product_id+' span').length)
                            {
                                $('#b-'+product_id+' span').removeClass('ajax_h') ;
                                var prop_flag = true;
                                if($('#b-'+product_id).parent().find('.ye-props select').size() > 0)
                                {
                                    $('#b-'+product_id).parent().find('.ye-props select').each(function(){
                                        if($(this).val() == 0)
                                            prop_flag = false;
                                    });
                                }
                                if(prop_flag)
                                    $('#b-'+product_id).removeClass('button_in_basket') ;
                                if(!$('#b-'+product_id).hasClass('ajax_add2basket_q'))
                                {
                                    $('#b-'+product_id+' span').html(yen_bs_to_basket) ;
                                }
                            }
                            else
                            {
                                if($('.ajax_a2b_'+product_id+' span').length)
                                {
                                    $('.ajax_a2b_'+product_id+' span').removeClass('ajax_h') ;
                                    $('.ajax_a2b_'+product_id).removeClass('button_in_basket') ;
                                    if(!$('.ajax_a2b_'+product_id).hasClass('ajax_add2basket_q'))
                                    {
                                        $('.ajax_a2b_'+product_id+' span').html(yen_bs_to_basket) ;
                                    }
                                }
                            }

                            $('#e_basket_totalsum').html(str_total_sum);
                            $('#e_basket_total, #e_basket_count').html($('input[name=el_id]').length);
                        }
                        else if(data == 'err3')
                        {
                            var err_txt = err3.replace('#NUM#', old_quantity);
                            jGrowl(err_txt);
                        }
                    }
            });
        }

        //положение кнопки "ќформить заказ" в "летающей" корзине
        /*  $('#basketOrderButton3').css('left', parseInt($('.yen-bs-make_order').css('width'))-parseInt($('.yen-bs-sum').css('width'))-parseInt($('#basketOrderButton3').css('width'))-20+'px');*/
    }
</script>