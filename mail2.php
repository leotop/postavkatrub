<?php

$recepient = "ps-tula@mail.ru";
$sitename = "�������� ����";

$name = trim($_POST["name2"]);
$phone = trim($_POST["phone2"]);
$from = trim($_POST["from"]);
$p1 = iconv('windows-1251', 'UTF-8',"���������� ������");
$p2 = iconv('windows-1251', 'UTF-8',"���");
$p3 = iconv('windows-1251', 'UTF-8',"�������");
$p4 = iconv('windows-1251', 'UTF-8',"�������� ����� ������");
$message = "$p1:\n$p2: $name \n$p3: $phone \n$p4: $from";

$pagetitle = "����� ��������� ������ � ����� \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient"); ?>