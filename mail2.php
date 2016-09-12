<?php

$recepient = "ps-tula@mail.ru";
$sitename = "Поставка труб";

$name = trim($_POST["name2"]);
$phone = trim($_POST["phone2"]);
$from = trim($_POST["from"]);
$p1 = iconv('windows-1251', 'UTF-8',"Контактные данные");
$p2 = iconv('windows-1251', 'UTF-8',"Имя");
$p3 = iconv('windows-1251', 'UTF-8',"Телефон");
$p4 = iconv('windows-1251', 'UTF-8',"Желаемое время звонка");
$message = "$p1:\n$p2: $name \n$p3: $phone \n$p4: $from";

$pagetitle = "Заказ обратного звонка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient"); ?>