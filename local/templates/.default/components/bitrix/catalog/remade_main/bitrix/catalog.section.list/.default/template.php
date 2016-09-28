<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1 style="color: #fff; font-size: 15px;font-weight: normal; padding-top: 3px;">Трубы и комплектующие для водоснабжения, отопления и канализации</h1>
<div class="main_catalog-section-list">
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;

foreach($arResult["SECTIONS"] as $arSection):
if ($arSection["DEPTH_LEVEL"]>1)
continue;
  $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
  $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
/*$res = CIBlockElement::GetList(array("name"=>"ASC"), array("SECTION_ID" => $arSection['ID'], "INCLUDE_SUBSECTIONS" => "Y" ), false, array('nTopCount' => 1))->Fetch();
$img = CFile::GetPath($res['PREVIEW_PICTURE']);*/
  if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
    echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
  elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
    echo "</li>";
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
  ?><li style="<!--text-align: center; height: 200px; width: 215px; float:left;-->" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
    <a style="<!--text-decoration: none; color: #fff; text-transform: uppercase;-->" href="/catalog/<?=$arSection["CODE"]?>/">

    <img src="<?= $arSection["PICTURE"]["SRC"] ?>"><br>
    <?=$arSection["NAME"]?><?if($arParams["COUNT_ELEMENTS"]):?><?endif;?></a><?

  $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];

endforeach;

while($CURRENT_DEPTH > $TOP_DEPTH)
{
  echo "</li>";
  echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
  $CURRENT_DEPTH--;
}

?>
</div>
<br clear="all">
<p>Компания «Полимерстрой» специализируется на поставках <a href="/catalog/naruzhnoe_vodosnabzhenie/">пластиковых труб</a>, трубопроводной арматуры и инженерного оборудования. Если вам требуется устройство водопровода, отопительных или канализационных систем и вообще любых систем, где присутствует вода, трубы от компании «Полимерстрой» станут оптимальным решением.</p>
<br/>
<p>Мы предлагаем все необходимое оборудование для систем водоснабжения, канализации и отопления. Продукция, реализуемая нашей компанией на протяжении полутора десятков лет, и ее отличное качество известны во многих регионах России. В нашем постоянном ассортименте: все необходимое для наружного/внутреннего водоснабжения и канализации (<a style="color: #fff;" href="/catalog/vnutrennee_vodosnabzhenie_i_otoplenie/polipropilen/">трубы для воды полипропиленовые</a> и металлопластиковые), котлы, водонагреватели, очистные установки и пр.</p>
<br/>
<p><b>Пластиковые трубы для воды</b> – оптимальное решение не только с точки зрения экономичности. Металлические трубы заменяются на полипропиленовые повсеместно благодаря их отличным эксплуатационным качествам. Немаловажно, что вода в полипропиленовых трубах сохраняет свой химический состав без изменений, то есть для сооружения водопроводных систем это лучший вариант.</p>
<br/>
<p class="preim">Наши преимущества</p>
<ul class="advantages">
<li><img src="/images/img_p_1.png"/><span>Официальный дилер крупных европейских производителей</span></li>
<li><img src="/images/img_p_2.png"/><span>Гибкая система скидок</span></li>
<li><img src="/images/img_p_3.png"/><span>Привлекательные условия для оптовиков</span></li>
<li><img src="/images/img_p_4.png"/><span>Отсрочка платежа</span></li>
<div style="clear:both;"></div>
</ul>
<br/>
<div class="brands1">
<h2>Наши бренды</h2>
	<div id="slider1">
		<a class="buttons prev" href="#"></a>
		<a class="buttons next" href="#"></a>
		<div class="viewport">
			<ul class="overview">
				<li><img src="/upload/images/brands/7.jpg" style="margin-top: 35px;"></li>
				<li><img src="/upload/images/brands/1.jpg" style="margin-top: 40px;"></li>
				<li><img src="/upload/images/brands/2.jpg" style="margin-top: 35px;"></li>
				<li><img style="height: 65px; width: 55px !important;" src="/upload/images/brands/3.jpg"></li>
				<li><img src="/upload/images/brands/4.jpg" style="margin-top: 40px;"></li>
				<li><img src="/upload/images/brands/5.jpg" style="margin-top: 35px;"></li>
				<li><img src="/upload/images/brands/6.jpg" style="margin-top: 45px;"></li>
				<li><img src="/upload/images/brands/8.jpg" style="margin-top: 40px;"></li>
        <li><img src="/upload/images/brands/9.jpg" style="margin-top: 33px;"></li>
        <li><img src="/upload/images/brands/10.jpg" style="margin-top: 17px;"></li>
        <li><img src="/upload/images/brands/11.jpg" style="margin-top: 33px;"></li>
        <li><img src="/upload/images/brands/12.jpg" style="margin-top: 33px;"></li>
        <li><img src="/upload/images/brands/13.jpg" style="margin-top: 17px;"></li>
        <li><img src="/upload/images/brands/14.jpg" style="margin-top: 33px;"></li>
      
			</ul>
		</div>
	</div>
</div>


<?
//echo "<pre>"; print_r($arParams); echo "</pre>";
//echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<div style="clear:both;"></div>