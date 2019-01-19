<?php

// regexp.preg.replace.test.php

$subject = "Email, you sent was - bla-ha__2018@muha.com! Is it correct?";
var_dump($subject);
// Замена не алфавитных символов на разделитель

var_dump(preg_replace('/[^\pL]+/u', '-', $subject));
var_dump(preg_replace('/[^\p{L}]+/u', '-', $subject));

// Замена не алфавитно-цифровых символов на разделитель

$subject = preg_replace('/[^\p{L}\p{Nd}]+/u', '-', $subject);

var_dump($subject);


// Убираем дубли разделителей

$subject = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $subject);

var_dump($subject);


