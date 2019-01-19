<?php
// Если вам нужно передать переменные аргументы другой функции, ... может по-прежнему вам помочь.

function do_something($first, ...$all_the_others)
{
    do_something_else($first, ...$all_the_others);
    // Which is translated to:
    // do_something_else('this goes in first', 2, 3, 4, 5);
}

