<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
function rus2translit($string) {
	$converter = array(
		'�' => 'a',	'�' => 'b',	'�' => 'v',
		'�' => 'g',	'�' => 'd',	'�' => 'e',
		'�' => 'e',	'�' => 'zh', '�' => 'z',
		'�' => 'i',	'�' => 'y',	'�' => 'k',
		'�' => 'l',	'�' => 'm',	'�' => 'n',
		'�' => 'o',	'�' => 'p',	'�' => 'r',
		'�' => 's',	'�' => 't',	'�' => 'u',
		'�' => 'f',	'�' => 'h',	'�' => 'c',
		'�' => 'ch', '�' => 'sh', '�' => 'sch',
		'�' => "_",	'�' => 'y',	'�' => "_",
		'�' => 'e',	'�' => 'yu', '�' => 'ya',
 
		'�' => 'A',	'�' => 'B',	'�' => 'V',
		'�' => 'G',	'�' => 'D',	'�' => 'E',
		'�' => 'E',	'�' => 'Zh', '�' => 'Z',
		'�' => 'I',	'�' => 'Y',	'�' => 'K',
		'�' => 'L',	'�' => 'M',	'�' => 'N',
		'�' => 'O',	'�' => 'P',	'�' => 'R',
		'�' => 'S',	'�' => 'T',	'�' => 'U',
		'�' => 'F',	'�' => 'H',	'�' => 'C',
		'�' => 'Ch', '�' => 'Sh', '�' => 'Sch',
		'�' => "_",	'�' => 'Y',	'�' => "_",
		'�' => 'E',	'�' => 'Yu', '�' => 'Ya',
	);
	return strtr($string, $converter);
}
?>
<?
	if( isset($_GET['file']) && isset($_GET['file_name']) ){
		$fId = trim($_GET['file']);
		$fName = trim($_GET['file_name']);
		$fName = rus2translit($fName);
		$fType = getFileExtension($fId);
		
		$file = $_SERVER['DOCUMENT_ROOT'].$file;
    
		if ( !file_exists($file) )
		 	echo "������: ���� �� ������.";
		else {
			// Set headers
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=".$fName);
			header("Content-Type: $fType");
			header("Content-Transfer-Encoding: binary");
			// Read the file from disk
			ob_clean();
			flush();
			echo file_get_contents($file);
		}
	}
	else echo "������: �� ������ ID �����";
?>