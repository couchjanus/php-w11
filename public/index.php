<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
    /**
     * PHP version 7.2
     * 
     * @category Php
     * @package  Php_Project
     * @author   Janus Nic <janusnic@gmail.com>
     * @license  MIT License https://github.com/couchjanus/php7.2-fundamental/LICENSE
     * @link     https://github.com/couchjanus/php7.2-fundamental
     **/

                       
    // require_once realpath(__DIR__).'/../bootstrap/bootstrap.php';
    
    echo "<h1>Hello, PHP-7!</h1>";

    $foo = "1";  // $foo - это строка (ASCII-код 49)
    $foo *= 2;   // $foo теперь целое число (2)
    $foo = $foo * 1.3;  // $foo теперь число с плавающей точкой (2.6)
    $foo = 5 * "10 Little Piggies"; // $foo - это целое число (50)
    $foo = 5 * "10 Small Pigs";     // $foo - это целое число (50)

    $foo = "5bar"; // строка
    $bar = true;   // булевое значение

    settype($foo, "integer"); // $foo теперь 5   (целое)
    settype($bar, "string");  // $bar теперь "1" (строка)

    // Максимальное значение для "int" равно PHP_INT_MAX.

    $foo = 10;   // $foo - это целое число
    $bar = (boolean) $foo;   // $bar - это булев тип

    $foo = 10;            // $foo - это целое число
    $str = "$foo";        // $str - это строка
    $fst = (string) $foo; // $fst - это тоже строка
    // Это напечатает "они одинаковы"
    if ($fst === $str) {
        echo "они одинаковы";
    }

    
    // Работает, начиная с версии PHP 5.3.0
    const HELLO = 'Здравствуй, мир.';
    const PI = 3.14;

    define("NUMB", 3.1456);
    define("CONSTANT", "Здравствуй, мир.");

    echo CONSTANT; // выводит "Здравствуй, мир."
    echo Constant; // выводит "Constant" и предупреждение.
    
    echo HELLO;
    print NUMB;
    print PI;

    define("MAXSIZE", 100);

    echo MAXSIZE;
    echo constant("MAXSIZE"); // результат аналогичен предыдущему выводу

    print_r(get_defined_constants());


    // Strings Concatenation


    $a  = 'Multi-line example';    // concatenating assignment operator (.=)
    $a .= "\n";
    $a .= 'of what not to do';

    // vs

    $a = 'Multi-line example'      // concatenation operator (.)
        . "\n"                     // indenting new lines
        . 'of what to do';

    // String Operators
    // String types
    
    echo 'This is my string, look at how pretty it is.';    // no need to parse a simple string

    /**
     * Output:
     *
     * This is my string, look at how pretty it is.
     */

    // Single quote

    // Double quotes

    echo 'phptherightway is ' . $adjective . '.'     // a single quotes example that uses multiple concatenating for
        . "\n"                                       // variables and escaped string
        . 'I love learning' . $code . '!';

    // vs

    echo "phptherightway is $adjective.\n I love learning $code!"  // Instead of multiple concatenating, double quotes
    // enables us to use a parsable string

    // Double quotes can contain variables; this is called “interpolation”.
    
    $juice = 'plum';
    echo "I like $juice juice";    // Output: I like plum juice

    // When using interpolation, it is often the case that the variable will be touching another character. This will result in some confusion as to what is the name of the variable, and what is a literal character.

    // To fix this problem, wrap the variable within a pair of curly brackets.
   
    $juice = 'plum';
    echo "I drank some juice made of $juices";    // $juice cannot be parsed

    // vs

    $juice = 'plum';
    echo "I drank some juice made of {$juice}s";    // $juice will be parsed

    /**
     * Complex variables will also be parsed within curly brackets
     */

    $juice = array('apple', 'orange', 'plum');
    echo "I drank some juice made of {$juice[1]}s";   // $juice[1] will be parsed

    // Nowdoc syntax

    $str = <<<'EOD'             // initialized by <<<
    Example of string
    spanning multiple lines
    using nowdoc syntax.
    $a does not parse.
    EOD; // closing 'EOD' must be on it's own line, and to the left most point

    /**
     * Output:
     *
     * Example of string
     * spanning multiple lines
     * using nowdoc syntax.
     * $a does not parse.
     */


    // Heredoc syntax
 
    $a = 'Variables';

    $str = <<<EOD               // initialized by <<<
    Example of string
    spanning multiple lines
    using heredoc syntax.
    $a are parsed.
    EOD; // closing 'EOD' must be on it's own line, and to the left most point

    /**
     * Output:
     *
     * Example of string
     * spanning multiple lines
     * using heredoc syntax.
     * Variables are parsed.
     */


    // It should be noted that multiline strings can also be formed by continuing them across multilines in a statement. e.g.

    $str = "
    Example of string
    spanning multiple lines
    using statement syntax.
    $a are parsed.
    ";

    /**
     * Output:
     *
     * Example of string
     * spanning multiple lines
     * using statement syntax.
     * Variables are parsed.
     */

    // Простой массив

    $array1 = array(
        "foo" => "bar",
        "bar" => "foo",
    );
    
    $array2 = array(
        1    => "a",
        "1"  => "b",
        1.5  => "c",
        true => "d",);
    var_dump($array2);

    $array3 = array(
        "foo" => "bar",
        "bar" => "foo",
        100   => -100,
        -100  => 100,
    );
    var_dump($array3);

    $array4 = array("foo", "bar", "hallo", "world");
    var_dump($array4);

    $array5 = array(
            "a",
            "b",
    6 => "c",
            "d",
    );
    var_dump($array5);

    // Доступ к элементам массива с помощью квадратных скобок
    $array6 = array(
        "foo" => "bar",
        42    => 24,
        "multi" => array(
            "dimensional" => array(
                "array" => "foo"
            )
        )
    );

    var_dump($array6["foo"]);
    var_dump($array6[42]);
    var_dump($array6["multi"]["dimensional"]["array"]);
    

    // И квадратные и фигурные скобки можно взаимозаменяемо использовать 
    // для доступа к элементам массива 
    // (то есть и $array[42] и $array{42} равнозначны).

    $arr = array(5 => 1, 12 => 2);
    $arr[] = 56;    // В этом месте скрипта это то же самое, что и $arr[13] = 56;
    $arr["x"] = 42; // Это добавляет к массиву новый элемент с ключом "x"
    unset($arr[5]); // Это удаляет элемент из массива
    unset($arr);    // Это удаляет массив полностью

    $array = array(1, 2, 3, 4, 5);    // Создаем простой массив.
    
    print_r($array);
    // Теперь удаляем каждый элемент, но сам массив оставляем нетронутым:
    foreach ($array as $i => $value) {
        unset($array[$i]);
    }
    print_r($array);

    // Добавляем элемент (новым ключом будет 5, вместо 0).
    $array[] = 6;
    print_r($array);
    // Переиндексация:
    $array = array_values($array);
    $array[] = 7;
    print_r($array);

    $earr[] = 'value';
    print_r($earr);

    // == это оператор, который проверяет эквивалентность и возвращает boolean
    if ($action == "show_version") {
        echo "The version is 1.23";
       
    }

    // Comparison operators
    $a = 5;   // 5 as an integer

    var_dump($a == 5);       // compare value; return true
    var_dump($a == '5');     // compare value (ignore type); return true
    var_dump($a === 5);      // compare type/value (integer vs. integer); return true
    var_dump($a === '5');    // compare type/value (integer vs. string); return false

    //Equality comparisons
    if (strpos('testing', 'test')) {    // 'test' is found at position 0, which is interpreted as the boolean 'false'
        // code...
    }

    // vs. strict comparisons
    if (strpos('testing', 'test') !== false) {    // true, as strict comparison was made (0 !== false)
        // code...
    }

    // Conditional statements

    function test($a)
    {
        if ($a) {
            return true;
        } else {
            return false;
        }
    }

    // vs.

    function test($a)
    {
        if ($a) {
            return true;
        }
        return false;    // else is not necessary
    }

    // or even shorter:

    function test($a)
    {
        return (bool) $a;
    }

    // Ternary operators

    $a = 5;
    echo ($a == 5) ? 'yay' : 'nay';
    echo ($a) ? ($a == 5) ? 'yay' : 'nay' : ($b == 10) ? 'excessive' : ':(';    // excess nesting, sacrificing readability

    // To ‘return’ a value with ternary operators use the correct syntax.

    $a = 5;
    echo ($a == 5) ? return true : return false; // this example will output an error

    // vs

    $a = 5;
    return ($a == 5) ? 'yay' : 'nope';    // this example will return 'yay'

    // It should be noted that you do not need to use a ternary operator for returning a boolean value. An example of this would be.


    $a = 3;
    return ($a == 3) ? true : false; // Will return true or false if $a == 3

    // vs

    $a = 3;
    return $a == 3; // Will return true or false if $a == 3

    // Utilising brackets with ternary operators for form and function

    // When utilising a ternary operator, brackets can play their part to improve code readability and also to include unions within blocks of statements. An example of when there is no requirement to use bracketing is:

    
    $a = 3;
    return ($a == 3) ? "yay" : "nope"; // return yay or nope if $a == 3

    // vs

    $a = 3;
    return $a == 3 ? "yay" : "nope"; // return yay or nope if $a == 3

    // Bracketing also affords us the capability of creating unions within a statement block where the block will be checked as a whole. Such as this example below which will return true if both ($a == 3 and $b == 4) are true and $c == 5 is also true.

    
    return ($a == 3 && $b == 4) && $c == 5;

    // Another example is the snippet below which will return true if ($a != 3 AND $b != 4) OR $c == 5.

    
    return ($a != 3 && $b != 4) || $c == 5;

    // Since PHP 5.3, it is possible to leave out the middle part of the ternary operator. Expression “expr1 ?: expr3” returns expr1 if expr1 evaluates to TRUE, and expr3 otherwise.


    // Switch statements
    $answer = test(2);    // the code from both 'case 2' and 'case 3' will be implemented

    function test($a)
    {
        switch ($a) {
            case 1:
                // code...
                break;             // break is used to end the switch statement
            case 2:
                // code...         // with no break, comparison will continue to 'case 3'
            case 3:
                // code...
                return $result;    // within a function, 'return' will end the function
            default:
                // code...
                return $error;
        }
    }


    // phpinfo();

?>


</body>
</html>
