<?php

// regexp.routes.test.php

// $uri = "posts";
// $pattern = "/[a-z]+/";
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);


// $key = '(/)';
// $pattern = preg_replace('#\(/\)#', '/?', $key); 

// print_r("result: ".$key);
// print_r("\n\npattern: ");
// var_dump($pattern);

// =========================================

// $uri = "edit/1";
// $pattern = "/^([a-z]+)\/([0-9]+)/";
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// =========================================

// $uri = "admin/categories/edit/1";
// $pattern = "/^([a-z]+)\/([0-9]+)/";
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// =========================================
// $uri = "admin/categories/edit/1";
// $pattern = "/([a-z]+)\/([0-9]+)/";
// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);
// =========================================

// $uri = 'admin/categories/edit/11';
// $key = 'admin/categories/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z]+)}/', '(?<$1>[0-9]+)', $key). "$@";

// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);

// =========================================
// $uri = 'admin/posts/edit/bala11';
// $key = 'admin/posts/edit/{id}';

// $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";

// $result = preg_match($pattern, $uri, $matches);

// print_r("result: ".$result);
// print_r("\n\nmatches: ");
// var_dump($matches);
