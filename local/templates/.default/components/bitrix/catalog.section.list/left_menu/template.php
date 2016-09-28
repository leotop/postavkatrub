<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script>
    $(document).ready(function (){
            $('.catalog-section-list > ul').addClass('rubricator');
/*            $('.rubricator > li').addClass('root');
            $('.rubricator > li > a').addClass('root');*/
//            $('.rubricator > li > ul').addClass('second_level');
/*             $('.second_level > li > ul').each(function(){
               $(this).siblings('a').attr('href','javascript:void(0)');  
             })*/
            
/*            $('.second_level > li > a').click(function(){
               
                if ($(this).next('ul').css('display')=='block'){
                        $(this).next('ul').slideUp("slow");   
                    } else {
                        $('.second_level > li > ul').slideUp("slow");
                        $(this).next('ul').slideDown("slow");
                    }
            })*/
            
            //------auto opening
            
//            var cur_path=window.location.pathname;
//            var spl_path=cur_path.split('/');
            //alert(spl_path[2]);
//            $('.'+spl_path[2]).parent('ul').css('display','block').parent().parent().parent('li').click();
            

    })
</script>
<?
	$arr = explode('/',$_SERVER['REQUEST_URI']);
?>

<div class="catalog-section-list">
    <?
        $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
        $CURRENT_DEPTH = $TOP_DEPTH;

        $exp_page=explode('/',$APPLICATION->GetCurPage());
        
        foreach($arResult["SECTIONS"] as $arSection)
        {    
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
			$add = '';
			if(in_array($arSection['CODE'],$arr)){
				$add="active";
				$parents[] = $arSection['ID'];
			}
			if(in_array($arSection['IBLOCK_SECTION_ID'],$parents)){
				$add="style='display:block'";
			}

            if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
            {
//				$add = '';
//				$parents = array();

                echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul ".$add.">";
            }
            elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
            {
                echo "</li>";
            }
            else
            {
                while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
                {
                    echo "</li>";
                    echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
                    $CURRENT_DEPTH--;
                }
                echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
            }

            echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
          //  echo $APPLICATION->GetCurPage();
            
            if ($exp_page[1]=='catalog' && $exp_page[2]==$arSection["ID"]) {
				$class='active_menu_section'; $li_class='rubricator_active';
			} 
			else {
				$class='';
				$li_class='';
			}
        ?>
			<li class="<?=$arSection['ID']?> <?=$li_class?> <?=$add?> <?if($arSection['DEPTH_LEVEL'] == 1):?>root<?endif?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
				<a class="<?=$class?> <?if($arSection['DEPTH_LEVEL'] == 1):?>root<?endif?>" href="<?=get_link($arSection)?>/">
					<?=$arSection["NAME"]?>
					<?if($arParams["COUNT_ELEMENTS"]):?>
						&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)
					<?endif;?>
				</a><?
				$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
        }
        while($CURRENT_DEPTH > $TOP_DEPTH)
        {
            echo "</li>";
            echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
            $CURRENT_DEPTH--;
        }
    ?>
</div>
<div style="margin: 22px 0px 11px 15px; color: #ffffff; font-family: Arial; font-size: 12px; font-weight: bold; text-transform: uppercase;">применение продукции</div>
<div class="dop_menu">
<ul>
  <li>
    <a href="/otoplenie/">Отопление</a>
  </li>
  <li >
    <a href="/vodosnabzhenie/">Водоснабжение</a>
  </li>
  <li >
    <a  href="/kanalizatsiya-dlya-doma/">Канализация</a>
  </li>
</ul>
</div>