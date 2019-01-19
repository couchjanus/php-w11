<?php

// regexp.preg.match.all.test.php


// В PHP разница между preg_match и preg_match_all в том, 
// что функция preg_match найдет только первый match и закончит поиск, 
// в то время как функция preg_match_all вернет все вхождения.

$text = "hello world";
$regexp = "/o/";
$result = preg_match_all($regexp, $text, $match);

var_dump(
    $result,
    $match
);
