<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//arshow($arResult);
//delayed function must return a string

__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/'.basename(__FILE__));

$curPage = $GLOBALS['APPLICATION']->GetCurPage($get_index_page=false);

if ($curPage != SITE_DIR)
{
    if (empty($arResult) || (!empty($arResult[count($arResult)-1]['LINK']) && $curPage != urldecode($arResult[count($arResult)-1]['LINK'])))
        $arResult[] = array('TITLE' =>  htmlspecialcharsback($GLOBALS['APPLICATION']->GetTitle(false, true)), 'LINK' => $curPage);
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
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
    
    $title = htmlspecialchars($arResult[$index]["TITLE"]);
	if($title != "Трубы из поливинилхлорида"){
		if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
			$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>
			<li><span>&nbsp;&gt;&nbsp;</span></li>';
		
		else if ($arResult[$index]["LINK"] == "" && $index != $itemSize-1) {}
		else {		
				if($title == "Канализация" || $title == "Водоснабжение" || $title == "Отопление"){
					$strReturn .= '<li><a href="/information/" title="Полезная информация">Полезная информация</a></li>
					<li><span>&nbsp;&gt;&nbsp;</span></li>';    		
				}
				$strReturn .= '<li>'.$title.'</li>';
		}	
	}
}

if($arResult[2]["LINK"] == "/information/14/"){
	$strReturn .= '<li>Трубы из поливинилхлорида</li>';
}

$strReturn .= '</ul>';

return $strReturn;
?>
 