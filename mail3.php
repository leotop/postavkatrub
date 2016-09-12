<?if( false !== strpos($_SERVER['CONTENT_TYPE'], 'multipart/form-data') && $_SERVER['REQUEST_METHOD'] == 'POST' ):?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/init.php");?>

<?
sleep(1);

global $APPLICATION;

$dataInput = $_POST;
$dataOutput = array();
$dataFiles = array();

if ($_FILES['file']["error"] == UPLOAD_ERR_OK) {
	if($_FILES['file']['size'] > 0) {
		$dataFiles['path'][] = $_FILES['file']['tmp_name'];
		$dataFiles['name'][] = $_FILES['file']['name'];
	}
}

$arFiles = array();
$sitename = "Поставка труб";
$charset = 'utf-8';
$from = 'ps-tula@mail.ru';
$to = 'ps-tula@mail.ru';
$subj = "Сообщение с формы Оставить заявку с сайта \"$sitename\"";

$name = clearVar($_POST["name3"]);
$email = clearVar($_POST["email3"]);
$phone = clearVar($_POST["phone3"]);
$text = clearVar($_POST["text3"]);
$message = "Имя: $name \nEmail: $email \nТелефон: $phone \nСообщение: $text";

if (!is_array($dataFiles['path']))
	$dataFiles['path'] = array($dataFiles['path']);
if (!is_array($dataFiles['name']))
	$dataFiles['name'] = array($dataFiles['name']);

foreach ($dataFiles['path'] as $n => $fPath) {
	$arFiles[] = array(
		"F_PATH" => $fPath,
		"F_LINK" => ($f = fopen($fPath, "rb"))
	);
}

$un = strtoupper(uniqid(time()));
$eol = CAllEvent::GetMailEOL();
$head = $body = "";

// header
$head .= "Mime-Version: 1.0".$eol;
$head .= "From: $from".$eol;
if(COption::GetOptionString("main", "fill_to_mail", "N")=="Y")
	$header = "To: $to".$eol;
$head .= "Reply-To: $from".$eol;
$head .= "X-Priority: 3 (Normal)".$eol;
$head .= "X-EVENT_NAME: ISALE_KEY_F_SEND".$eol;
$head .= "Content-Type: multipart/mixed; ";
$head .= "boundary=\"----".$un."\"".$eol.$eol;

// body
$body = "------".$un.$eol;
$body .= "Content-Type:text/plain; charset=".$charset.$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol.$eol;

foreach ($arFiles as $n => $arF)
{
	$body .= "------".$un.$eol;
	$body .= "Content-Type: application/octet-stream; name=\"".basename($arF["F_PATH"])."\"".$eol;
	$body .= "Content-Disposition:attachment; filename=\"".basename($dataFiles['name'][$n])."\"".$eol;
	$body .= "Content-Transfer-Encoding: base64".$eol.$eol;
	$body .= chunk_split(base64_encode(fread($arF["F_LINK"], filesize($arF["F_PATH"])))).$eol.$eol;
}
$body .= "------".$un."--";

// send
return mail($to, $subj, $body, $head, COption::GetOptionString("main", "mail_additional_parameters", ""));
?>

<?endif;?>