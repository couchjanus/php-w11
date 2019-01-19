<?php

function test()
{
    var_dump(func_num_args());
    var_dump(func_get_args());
}

// Вы можете упаковать свои параметры в массив, например:
$params = array( 10,  'glop',  'test',);
// И затем вызовите функцию:

call_user_func_array('test', $params);
