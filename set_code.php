<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	if(CModule::IncludeModule('iblock')){
		$s = new CIBlockSection();
		$res = CIBlockSection::GetList(array(),array('IBLOCK_ID' => 37),false,array('ID','NAME','IBLOCK_ID'));
		while($row = $res->GetNext()){
			$code = CUtil::translit($row['NAME'],'ru');
//			$s->Update($row['ID'],array('CODE' => $code));
		}
	}
?>
