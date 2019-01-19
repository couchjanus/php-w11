<?php

// regexp.preg.match.test.php

$text = "hello world";
$regexp = "/o/";
$result = preg_match($regexp, $text, $match);

var_dump(
    $result,
    $match
);
