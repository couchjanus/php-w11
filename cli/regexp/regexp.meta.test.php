<?php

// regexp.meta.test.php

$text = "Blaha muha 8282, 2828 muha Blaha";
$regexp = "/\d\d\d\d/";
$result = preg_match_all($regexp, $text, $match);

var_dump(
    $result,
    $match
);

$sresult = preg_match_all("/\D/", $text, $match);

var_dump(
    $sresult,
    $match
);

$presult = preg_match_all("/\s/", $text, $match);

var_dump(
    $presult,
    $match
);


$eresult = preg_match_all("/\d\d\d[0,2,4,6,8]/", $text, $match);

var_dump(
    $eresult,
    $match
);
