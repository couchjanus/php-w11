<?php
function foo()
{
    $numargs = func_num_args();
    echo "Количество аргументов: $numargs\n";
}

foo(1, 2, 3);
