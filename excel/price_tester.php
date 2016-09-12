<?set_time_limit(0)?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	if(CModule::IncludeModule('iblock') && CModule::IncludeModule("catalog")){
		if(!empty($_GET['ID'])){
			$res = CIBlockElement::GetList(array('sort' => 'asc','name' => 'asc'),array('SECTION_ID' => $_GET['ID'],'ACTIVE' => 'Y'),array('NAME','ID','PROPERTY_328','PROPERTY_329','PREVIEW_PICTURE','IBLOCK_ID'));
			$s_info = CIBlockSection::GetByID($_GET['ID'])->Fetch();
			$group = array();
			while($row = $res->GetNext()){
				$prop = CIBlockElement::GetProperty($row['IBLOCK_ID'],$row['ID'],array(),array('ID' => '330'))->Fetch();
				$ar_price = GetCatalogProductPrice($row['ID'], 2);
				if(isset($ar_price['CURRENCY']) && $ar_price['CURRENCY']!="RUB") 
					$ar_price['PRICE'] = CCurrencyRates::ConvertCurrency($ar_price['PRICE'], $ar_price["CURRENCY"], "RUB");
				$price = $ar_price['PRICE'];
				$group[$row['PROPERTY_328_VALUE']][] = array(
								'ID' => $row['ID'],
								'NAME' => str_replace('&quot;','"',$row['NAME']),
								'METRIC' => $prop['VALUE_ENUM'],
								'SIZE' => str_replace('&quot;','"',$row['PROPERTY_329_VALUE']),
								'PRICE' => number_format($price,2),
								'IMG' => CFile::GetFileArray($row['PREVIEW_PICTURE'])
							);
			}
		}
		else{
			$sections = array();
			$elements = array();
			$res = CIBlockElement::GetList(array('sort' => 'asc', 'name' => 'asc'),array('IBLOCK_ID' => 37,'ACTIVE' => 'Y'));
			while($row = $res->GetNext())
				$elements[$row['ID']] = $row;
			foreach($elements as $id => $values){
				$gr = CIBlockElement::GetElementGroups($id);
				$group_name = CIBlockElement::GetProperty($values['IBLOCK_ID'],$values['ID'],array(),array('ID' => '328'))->Fetch();
				$metric = CIBlockElement::GetProperty($values['IBLOCK_ID'],$values['ID'],array(),array('ID' => '330'))->Fetch();
				$size = CIBlockElement::GetProperty($values['IBLOCK_ID'],$values['ID'],array(),array('ID' => '329'))->Fetch();
				$ar_price = GetCatalogProductPrice($id, 2);
				if(isset($ar_price['CURRENCY']) && $ar_price['CURRENCY']!="RUB") 
					$ar_price['PRICE'] = CCurrencyRates::ConvertCurrency($ar_price['PRICE'], $ar_price["CURRENCY"], "RUB");
				$price = $ar_price['PRICE'];
				if($gr->SelectedRowsCount() > 1)
					while($row = $gr->GetNext()){
						$sections[$row['ID']]['ITEMS'][$group_name['VALUE_ENUM']][] = array(
								'ID' => $id,
								'NAME' => str_replace('&quot;','"',$values['NAME']),
								'IMG' => CFile::GetFileArray($values['PREVIEW_PICTURE']),
								'PRICE' => number_format($price,2),
								'METRIC' => $metric['VALUE_ENUM'],
								'SIZE' => str_replace('&quot;','"',$size['VALUE_ENUM']),
							);
						$related[$row['ID']][] = $id;
					}
				else
					$sections[$values['IBLOCK_SECTION_ID']]['ITEMS'][$group_name['VALUE_ENUM']][] = array(
								'ID' => $id,
								'NAME' => str_replace('&quot;','"',$values['NAME']),
								'IMG' => CFile::GetFileArray($values['PREVIEW_PICTURE']),
								'PRICE' => number_format($price,2),
								'METRIC' => $metric['VALUE_ENUM'],
								'SIZE' => str_replace('&quot;','"',$size['VALUE_ENUM']),
							);
			}
		}
	}
?>
<?if(false):?>
<pre>
	<?=($sections['4576']['ITEMS'] == $sections['4583']['ITEMS'])?>
	<?=var_dump($sections['4473']['ITEMS'] == $sections['4621']['ITEMS'])?>
	<?print_r($related['4473'])?>
	<?print_r($related['4621'])?>
	<?print_r($sections['4473'])?>
	<?print_r($sections['4621'])?>
	<?die()?>
</pre>
<?endif?>
<?require_once($_SERVER['DOCUMENT_ROOT'].'/excel/PHPExcel.php')?>
<?
	$objPHPExcel = new PHPExcel;
	$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
	if(!empty($_GET['ID'])){
		if(mb_strlen($s_info['NAME'],'UTF-8') >= 30)
			$title =  mb_substr($s_info['NAME'],0,29,'UTF-8');
		else $title = $s_info['NAME'];
		$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, $title);
		$objPHPExcel->addSheet($myWorkSheet);
		$objPHPExcel->removeSheetByIndex(0);
	}
	function generate_excel(&$objPHPExcel,$s_info,$group){
		$objPHPExcel->getActiveSheet()->getSheetView()->setZoomScale(142);
		$styleArray = array();
		for($i = 1;$i <= 6;$i++){
			$styleArray = array();
			if(!empty($_GET['ID']))
				$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
			else
				if($i != 6)
					$objPHPExcel->getActiveSheet()->mergeCells('A'.$i.':F'.$i);
				else
					$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':F'.$i);
			if($i >= 3 && $i <=6)
				$styleArray = array(
							'font' => array(
									'bold' => true,
									'size' => ($i!=6 ? 11 : 16),
								),
							'alignment' => array(
									'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
								),
						);
			if(!empty($styleArray))
				if(!empty($_GET['ID']))
					$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleArray);
				else
					if($i != 6)
						$objPHPExcel->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleArray);
					else
						$objPHPExcel->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleArray);
		}
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(19.29);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13.86);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(19.86);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12.43);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11.57);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(6);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ООО "ПОЛИМЕРСТРОЙ"');
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'г. Тула ул. Кауля, 29,  т/ф (4872) 37-74-94, 37-04-06');
		$objPHPExcel->getActiveSheet()->setCellValue('A4', 'г. Тула, Щекинское шоссе, 4, т/ф (4872) 25-45-85, 25-45-84');
		$objPHPExcel->getActiveSheet()->setCellValue('A5', 'www.postavkatrub.ru E-mail: ps-tula@mail.ru');
		if(!empty($_GET['ID']))
			$objPHPExcel->getActiveSheet()->setCellValue('A6', $s_info['NAME']);
		else{
			$objPHPExcel->getActiveSheet()->setCellValue('B6', $s_info['NAME']);
			$objPHPExcel->getActiveSheet()->setCellValue('A6', "Вернуться в \n главное меню");
			$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getCell('A6')->getHyperlink()->setUrl("sheet://'Главное меню'!A1");
			$objPHPExcel->getActiveSheet()->getStyle('A6')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
		}
		
		$styleArray = array(
			'font' => array(
						'bold' => true,
						'size' => 20
					),
			'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					),
		);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->mergeCells('A7:B7');
		$objPHPExcel->getActiveSheet()->mergeCells('C7:F7');
		$styleArray['font'] = array('bold' => true,'size' => 11);
		$styleArray['alignment'] = array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('A7', date('d.m.Y',time()));
		$styleArray['font']['bold'] = false;
		$styleArray['alignment']['horizontal'] =  PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
		$objPHPExcel->getActiveSheet()->getStyle('C7')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('C7', 'Цены указаны с НДС 18%');
		$objPHPExcel->getActiveSheet()->mergeCells('A8:C9');
		$styleArray['font']['bold'] = true;
		$styleArray['font']['size'] = 9;
		$styleArray['alignment']['horizontal'] =  PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
		$styleArray['alignment']['vertical'] =  PHPExcel_Style_Alignment::VERTICAL_CENTER;
		$styleArray['borders']['top']['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;
		$styleArray['borders']['left']['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;
		$styleArray['borders']['right']['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;
		$styleArray['borders']['bottom']['style'] = PHPExcel_Style_Border::BORDER_MEDIUM;
		$objPHPExcel->getActiveSheet()->getStyle('A8:D9')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Номенклатура');
		$objPHPExcel->getActiveSheet()->mergeCells('D8:D9');
		$objPHPExcel->getActiveSheet()->mergeCells('E8:E9');
		$objPHPExcel->getActiveSheet()->mergeCells('F8:F9');
		$styleArray['font']['size'] = 8;
		$objPHPExcel->getActiveSheet()->getStyle('E8:F9')->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Размер');
		$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Цена за ед. руб.');
		$objPHPExcel->getActiveSheet()->getStyle('F8:F9')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->setCellValue('F8', 'Ед. Измер.');
		$objPHPExcel->getActiveSheet()->getStyle('D8:D9')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
		$objPHPExcel->getActiveSheet()->getStyle('F8:F9')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
		$start = 11;
		foreach($group as $name => $values){
			$delta = 10;
			if(!empty($values[0]['IMG']['SRC'])){
				$objDrawing = new PHPExcel_Worksheet_Drawing();
				$objDrawing->setName($name);
				$objDrawing->setDescription($name);
				try{
					$objDrawing->setPath('..'.$values[0]['IMG']['SRC']);
					$objDrawing->setCoordinates('A'.$start);
					if(($values[0]['IMG']['HEIGHT'] * 3 / 4) >= 10 * count($values))
						$delta =  (3 * $values[0]['IMG']['HEIGHT']) / (4 * count($values));
					$objDrawing->setOffsetX(20);
					$objDrawing->setOffsetY(10);
					$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
				} catch(Exception $e){}
			}
			for($i = 0;$i < count($values);$i++)
				$objPHPExcel->getActiveSheet()->getRowDimension($start + $i)->setRowHeight(14.25 + $delta);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$start.':A'.($start + count($values) - 1));
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$start, $name);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$start.':A'.($start + count($values) - 1))->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			for($i = 0;$i < count($values);$i++){
				if($s_info['ID'] == 4547)
					$objPHPExcel->getActiveSheet()->getRowDimension($start + $i)->setRowHeight(45);
				$objPHPExcel->getActiveSheet()->mergeCells('B'.($start + $i).':C'.($start + $i));
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($start + $i), $values[$i]['NAME']);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($start + $i), $values[$i]['SIZE']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($start + $i), $values[$i]['PRICE']);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($start + $i), $values[$i]['METRIC']);
				$objPHPExcel->getActiveSheet()->getStyle('B'.($start + $i).':C'.($start + $i))->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('D'.($start + $i))->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('D'.($start + $i))->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('E'.($start + $i))->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('E'.($start + $i))->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('F'.($start + $i))->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$objPHPExcel->getActiveSheet()->getStyle('F'.($start + $i))->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			}
			$objPHPExcel->getActiveSheet()->getStyle('A'.$start.':F'.($start + count($values)))->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$start.':F'.($start + count($values)))->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$start.':F'.($start + count($values) - 1))->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
			$start+=count($values);
		}
		$styleArray['alignment']['horizontal'] =  PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
		$styleArray['alignment']['vertical'] =  PHPExcel_Style_Alignment::VERTICAL_CENTER;
		$styleArray['font']['bold'] = false;
		$styleArray['font']['size'] = 10;
		unset($styleArray['borders']);
		$objPHPExcel->getActiveSheet()->getStyle('A11:F'.$start)->applyFromArray($styleArray);
		$objPHPExcel->getActiveSheet()->getStyle('B11:B'.$start)->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet()->getStyle('B11:B'.$start)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getStyle('E11:E'.$start)->getFont()->setSize(9);
		$objPHPExcel->getActiveSheet()->getStyle('A'.($start - 1).':F'.($start - 1))->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
	}
?>
<?
	function generate_chapters(&$objPHPExcel,&$column,$index,$letter,$list,$related=array()){
		if($list['DEPTH_LEVEL'] == 2 && !empty($list['ITEMS'])){
			$column[$index]++;
			$objPHPExcel->getActiveSheet()->setCellValue($letter.$column[$index],$list['NAME']);
			$objPHPExcel->getActiveSheet()->getStyle($letter.$column[$index])->getFont()->setSize(11);
		}
		foreach($list['ITEMS'] as $values){
			if(!empty($values['ITEMS']))
				generate_chapters($objPHPExcel,&$column,$index,$letter,$values,$related);
			else{
				$link_name = str_replace('&quot;','"',$values['NAME']);
//				echo $link_name.' - basic<br>';
				$values['NAME'] = $link_name;
				if($related[$values['ID']]['checked'] || $related[$values['ID']]['modified']){
					$link_name = $related[$values['ID']]['name'];
//					echo $link_name.' - in-related<br>';
				}
				if(mb_strlen($link_name,'UTF-8') >= 30){
					$link_name =  mb_substr($link_name,0,29,'UTF-8');
//					echo $link_name.' - strlen<br>';
				}
//				echo $link_name.'<br>';
				$objPHPExcel->getActiveSheet()->setCellValue($letter.($column[$index] + 1),$values['NAME']);
				$objPHPExcel->getActiveSheet()->getCell($letter.($column[$index] + 1))->getHyperlink()->setUrl("sheet://'".$link_name."'!A1");
				$objPHPExcel->getActiveSheet()->getStyle($letter.($column[$index] + 1))->getFont()->setSize(11);
				$objPHPExcel->getActiveSheet()->getStyle($letter.($column[$index] + 1))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLUE);
				if($values['DEPTH_LEVEL'] > 2)
					$objPHPExcel->getActiveSheet()->getStyle($letter.($column[$index] + 1))->getAlignment()->setIndent(($values['DEPTH_LEVEL']-1));
				$column[$index]++;
			}
		}
	}
	if(!empty($_GET['ID']))
		generate_excel($objPHPExcel,$s_info,$group);
	else{
		$tree = array();
		$by_depth = array();
		$res = CIBlockSection::GetList(array('left_margin' => 'asc'),array('IBLOCK_ID' => 37,'ACTIVE' => 'Y'),false,array('NAME','ID','IBLOCK_SECTION_ID','DEPTH_LEVEL'));
		while($row = $res->GetNext())
			$by_depth[$row['DEPTH_LEVEL']][$row['ID']] = $row;
		foreach($by_depth[3] as $key => $values)
			$by_depth[2][$values['IBLOCK_SECTION_ID']]['ITEMS'][$values['ID']] = $values;
		unset($by_depth[3]);
		foreach($by_depth[2] as $key => $values)
			$by_depth[1][$values['IBLOCK_SECTION_ID']]['ITEMS'][$values['ID']] = $values;
		$tree = $by_depth[1];
/*		echo '<pre>';
			print_r($related);
		echo '</pre>';*/
		foreach($sections as $id => $values){
			$sect = CIBlockSection::GetByID($id)->Fetch();
			$sect['NAME'] = str_replace('&quot;','"',$sect['NAME']);
			if(array_key_exists($id,$related)){
				foreach($related as $rel_id => $rel_values)
					if($id == $rel_id)
						continue;
					else
						if($related[$id] == $rel_values && $sections[$id]['ITEMS'] == $sections[$rel_id]['VALUES']){
							$related[$rel_id] = array('checked' => true,'name' => $sect['NAME']);
						}
			}
			if(!$related[$id]['checked']){
				if(mb_strlen($sect['NAME'],'UTF-8') >= 30)
					$sect['page_name'] = mb_substr($sect['NAME'],0,29,'UTF-8');
				else
					$sect['page_name'] = $sect['NAME'];
				if(!is_null($objPHPExcel->getSheetByName($sect['page_name']))){
					$par_sect = CIBlockSection::GetByID($sect['IBLOCK_SECTION_ID'])->Fetch();
					$sect['page_name'] = $par_sect['NAME'].'-'.$sect['page_name'];
					if(mb_strlen($sect['page_name'],'UTF-8') >= 30)
						$sect['page_name'] = mb_substr($sect['page_name'],0,29,'UTF-8');
					$related[$id] = array(
									'modified' => true,
									'name' => $sect['page_name']
								);
				}
				$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, $sect['page_name']);
				$objPHPExcel->addSheet($myWorkSheet);
				$objPHPExcel->setActiveSheetIndexByName($sect['page_name']);				
				generate_excel($objPHPExcel,$sect,$values['ITEMS']);
			}
		}
/*		echo '<pre>';
		print_r($related);
		echo '</pre>';*/
		$objPHPExcel->setActiveSheetIndexByName('Worksheet');
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(1);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(46.25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(0);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(0);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9.63);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(4);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10.25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(6.38);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(6.38);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(11.75);
		$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(48);
//		$objPHPExcel->getActiveSheet()->mergeCells('B1:D1');
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('logo');
		$objDrawing->setDescription('logo');
		$objDrawing->setPath('../images/ex-logo.jpg');
		$objDrawing->setCoordinates('B1');
		$objDrawing->setOffsetX(10);
		$objDrawing->setOffsetY(10);
		$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
		$objPHPExcel->getActiveSheet()->mergeCells('E1:G1');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ПРАЙС-ЛИСТ');
		$objPHPExcel->getActiveSheet()->getStyle('E1:G1')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->getStyle('E1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->getStyle('E1:G1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('E1:G1')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('E1:G1')->getFont()->setUnderline(true);
		$objPHPExcel->getActiveSheet()->mergeCells('E1:G1');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ПРАЙС-ЛИСТ');
		$objPHPExcel->getActiveSheet()->mergeCells('H1:J1');
		$objPHPExcel->getActiveSheet()->getStyle('H1:J1')->getFont()->setSize(15);
		$objPHPExcel->getActiveSheet()->getStyle('H1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->getStyle('H1:J1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('H1:J1')->getFont()->setUnderline(true);
		$objPHPExcel->getActiveSheet()->setCellValue('H1', date('d.m.Y',time()));
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'www.postavkatrub.ru   e-mail: ps-tula@mail.ru');
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setItalic(true);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(14);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->mergeCells('G2:J2');
		$objPHPExcel->getActiveSheet()->setCellValue('G2', '(4872) 37-04-06, 25-45-85');
		$objPHPExcel->getActiveSheet()->getStyle('G2:J2')->getFont()->setSize(16);
		$objPHPExcel->getActiveSheet()->getStyle('G2:J2')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(10);
		$objPHPExcel->getActiveSheet()->getRowDimension('4')->setRowHeight(22.5);
		$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(12);
		$objPHPExcel->getActiveSheet()->mergeCells('A3:J5');
		$objPHPExcel->getActiveSheet()->setCellValue('A3', 'СОДЕРЖАНИЕ');
		$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getFont()->setSize(14);
		$k = 2;
		$column = array();
		$column[1] = 6;
		$column[2] = 6;
		foreach($tree as $id => $level1){
			$k = $k%2 == 0 ? 1 : 2;
			$letter = $k == 1 ? 'B' : 'G';
			if($column[$k] != 6)
				$column[$k]++;
			$objPHPExcel->getActiveSheet()->setCellValue($letter.$column[$k],$level1['NAME']);
			$objPHPExcel->getActiveSheet()->getStyle($letter.$column[$k])->getFont()->setSize(14);
			$objPHPExcel->getActiveSheet()->getStyle($letter.$column[$k])->getFont()->setBold(true);
			if(!empty($level1['ITEMS'])){
				generate_chapters($objPHPExcel,$column,$k,$letter,$level1,$related);
			}
			$column[$k]++;
		}
		$row = max($column[1],$column[2]) + 1;
		$objPHPExcel->getActiveSheet()->mergeCells('B'.$row.':E'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, '(4872) 37-04-06, 37-74-94');
		$objPHPExcel->getActiveSheet()->mergeCells('G'.$row.':J'.$row);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$row, '(4872) 25-45-85, 25-45-84');
		$objPHPExcel->getActiveSheet()->mergeCells('B'.($row+1).':E'.($row+1));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.($row+1), 'г. Тула ул. Кауля, 29');
		$objPHPExcel->getActiveSheet()->mergeCells('G'.($row+1).':J'.($row+1));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.($row+1), 'г. Тула, Щекинское шоссе, 4');
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row.':J'.($row + 1))->getFont()->setSize(14);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row.':J'.($row + 1))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row.':J'.($row + 1))->getFont()->setItalic(true);
		$objPHPExcel->getActiveSheet()->getStyle('B'.$row.':E'.($row + 1))->getFont()->setSize(14);
		$objPHPExcel->getActiveSheet()->getStyle('B'.$row.':E'.($row + 1))->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('B'.$row.':E'.($row + 1))->getFont()->setItalic(true);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$row.':J'.($row + 1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$objPHPExcel->getActiveSheet()->getStyle('B'.$row.':E'.($row + 1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->getActiveSheet()->setTitle('Главное меню');
	}
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Прайс-лист.xls"');
	header('Cache-Control: max-age=0');
	header('Cache-Control: max-age=1');
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
	header ('Cache-Control: cache, must-revalidate');
	header ('Pragma: public');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	if(!empty($_GET['ID']))
		$objWriter->save('php://output');
	else
		$objWriter->save($_SERVER['DOCUMENT_ROOT'].'/price___.xls');
?>