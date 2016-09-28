<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

     
<?//arshow($arResult);?>
<?if (!empty($arResult)):?>


<?
$arImpNews=array();
$arImpAckc=array();
$res = CIBlockElement::GetList(Array(), array('IBLOCK_ID'=>6, 'ACTIVE'=>'Y'), false, Array(), array('PROPERTY_267','ID'));
        while($ob = $res->Fetch())
{
    //arshow($ob['NAME']);
    if($ob['PROPERTY_267_VALUE']) {
    $arImpNews[]=$ob['ID'];    
    }
}

$res1 = CIBlockElement::GetList(Array(), array('IBLOCK_ID'=>10, 'ACTIVE'=>'Y'), false, Array(), array('PROPERTY_268','ID'));
        while($ob1 = $res1->Fetch())
{
    //arshow($ob1);
    if($ob1['PROPERTY_268_VALUE']) {
    $arImpAckc[]=$ob1['ID'];    
    }
}

//arshow($arImpNews);
//arshow($arImpAckc);
?>
<table class="main-menu" cellpadding="0" cellspacing="0">
	<tr>
<?
//arshow($arResult);
foreach($arResult as $key => $arItem) {
	$number = $key + 1;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
		<?
        if ($arItem['SELECTED']) {
        if ($arItem["LINK"]=='/actions/' && sizeof($arImpAckc)) {$text='<a href="'.$arItem["LINK"].'" class="active"><span>'.$arItem["TEXT"].'</span><div class="notice"></div></a>';}
        else if ($arItem["LINK"]=='/news/' && sizeof($arImpNews)) {$text='<a href="'.$arItem["LINK"].'" class="active"><span>'.$arItem["TEXT"].'</span><div class="notice"></div></a>';}
        else {$text='<a href="'.$arItem["LINK"].'" class="active"><span>'.$arItem["TEXT"].'</span></a>';}
        }
        
        
        else {
        if ($arItem["LINK"]=='/actions/' && sizeof($arImpAckc)) {$text='<a href="'.$arItem["LINK"].'"><span>'.$arItem["TEXT"].'</span><div class="notice"></div></a>';}
        else if ($arItem["LINK"]=='/news/' && sizeof($arImpNews)) {$text='<a href="'.$arItem["LINK"].'"><span>'.$arItem["TEXT"].'</span><div class="notice"></div></a>';}
        else {$text='<a href="'.$arItem["LINK"].'"><span>'.$arItem["TEXT"].'</span></a>';}    
        }
        ?>
        <td><?if(false):?><sup>0<?=$number; ?></sup><?endif?><?=$text?></td>
<?
}
?>
	</tr>
</table>
<?endif?>