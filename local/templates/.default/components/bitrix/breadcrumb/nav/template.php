<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//arshow($arResult);
//delayed function must return a string

__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/'.basename(__FILE__));

$curPage = $GLOBALS['APPLICATION']->GetCurPage($get_index_page=false);
if($arResult[1]['LINK'] == '/catalog/'){
	$a_title = $arResult[count($arResult) - 1]['TITLE'];
	$exploded = explode('/',$curPage);
	$norm = array();
	for($i = 0; $i < count($exploded);$i++){
		if($i == 0)
			$arResult[$i]['LINK'] = '/';
		elseif($i == 1)
			//$arResult[$i]['LINK'] = '/catalog/';
			$arResult[$i]['LINK'] = '';
		else
			$arResult[$i]['LINK'] = '/catalog/'.$arResult[$i - 1]['LINK'].$exploded[$i].'/';
	}
	for($i = 0;$i < count($arResult);$i++){
		if($i >= (count($exploded) - 1))
			unset($arResult[$i]);
	}

	//$arResult[count($arResult) - 1] = array('TITLE' =>  htmlspecialcharsback($GLOBALS['APPLICATION']->GetTitle(false, true)), 'LINK' => '');
	$arResult[count($arResult) - 1] = array('TITLE' =>  $a_title, 'LINK' => '');
	//$arResult[count($arResult) - 1] = array('TITLE' =>  ShowCrTitle(), 'LINK' => '');
}

if($arResult[1]['LINK'] == '/catalog/'){
	if ($curPage != SITE_DIR)
	{
    	if (empty($arResult) || (!empty($arResult[count($arResult)-1]['LINK']) && $curPage != urldecode($arResult[count($arResult)-1]['LINK'])))
        	$arResult[] = array('TITLE' =>  htmlspecialcharsback($GLOBALS['APPLICATION']->GetTitle(false, true)), 'LINK' => $curPage);
	}
}
if(empty($arResult))
    return "";

    //arshow($arResult);

    
$strReturn = '<ul class="breadcrumb-navigation">';
$wizTemplateId = COption::GetOptionString("main", "wizard_template_id", "eshop_vertical", SITE_ID);
if ($wizTemplateId == "eshop_vertical" || $wizTemplateId == "eshop_vertical_popup")
    $strReturn .= ' pleft';
//$strReturn .= '"><li><a href="'.SITE_DIR.'">'.GetMessage('BREADCRUMB_MAIN').'</a></li>
                               //<li class="sep_arr"><img src="/i/nav_chain_arr.gif"></li> ';

$num_items = count($arResult);
//echo $num_items; 

/*$page=$APPLICATION->GetCurPage();
$exp=explode('/', $page); */
/*if (//$exp[0]=='catalog' && 
$num_items==6) {*/
?>
<?
  for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
    
 /*   if ($index<>2 && $index<>3) {*/                   //если мы в карточке товара - скрываем пункты, которые не являются ссылками
    
    $title = htmlspecialchars($arResult[$index]["TITLE"]);
    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1 && $arResult[$index]["TITLE"] != $arResult[$index + 1]["TITLE"])
        $strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>
        <li><span>&nbsp;&gt;&nbsp;</span></li>';
    
    else if ($arResult[$index]["LINK"] == "" && $index != $itemSize-1) {}
    else if ($arResult[$index]["TITLE"] != $arResult[$index - 1]["TITLE"]){
        $strReturn .= '<li>'.$title.'</li>';
	}	
  /*}*/
}      ?>
<?
/*} else {

  
//$nav = CIBlockSection::GetNavChain($IBLOCK['ID'], $Section['ID']);
?>

<?
//$nav = CIBlockSection::GetNavChain(false,$Section['ID']);
/*while($arSectionPath = $nav->GetNext()){
   if ($GLOBALS['USER']->IsAdmin()){ echo '<pre>'; print_r($arSectionPath); echo '</pre>';} 
} 
*/  
/*
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
    
    $title = htmlspecialchars($arResult[$index]["TITLE"]);
    if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
        $strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>
        <li><span>&nbsp;&gt;&nbsp;</span></li>';
    
    else if ($arResult[$index]["LINK"] == "" && $index != $itemSize-1) {}
    else
        $strReturn .= '<li>'.$title.'</li>';
}
}
*/
$strReturn .= '</ul>';

return $strReturn;
?>
