<?php

$recepient = "izomorry4@yandex.ru";
$sitename = "Поставка труб";

$name = trim($_POST["name1"]);
$email = trim($_POST["email1"]);
$phone = trim($_POST["phone1"]);
$text = trim($_POST["text1"]);
$message = "Имя: $name \nEmail: $email \nТелефон: $phone \nСообщение: $text";

$pagetitle = "Сообщение с формы обратной связи сайта \"$sitename\"";
$res = mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: ps-tula@mail.ru"); ?>