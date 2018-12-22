<?php
// ===================================================    
    // спецификатор преобразования %d, чтобы значение 33 отображалось в виде десятичного числа:
    // printf("<h2>В Guest Book находится %d Comments</h2>", 33);

    // Если заменить %d на %b, значение 3 будет отображено в виде двоичного числа (11).
    // printf("<h2>В Guest Book находится %b Comments</h2>", 33);
    
    // В функции printf можно использовать любое количество спецификаторов, если им передается соответствующее количество аргументов и если каждый спецификатор предваряется символом %. 
    // printf("<h2>В Guest Book находится %d Comments, то есть %X в шестнадцатеричном представлении</h2>", 33, 33);

    // printf("<h1 style='color: #%x%x%x'>Cat's GuestBook</h1>", 165, 27, 45);
// ===================================================
// $message = <<<EOT
//     <p>В Guest Book находится %d Comments, </p>
//     <div>то есть %X в шестнадцатеричном представлении</div>
// EOT;

    // printf($message, 33, 33);



// ===================================================
    // Представление данных
    // printf("Результат: $%.2f", 123.42 / 12);

    // Тег, позволяющий отображать все пустые пространства
    // echo "<pre>"; 
    
    // Дополнение пробелами до 15 знако-мест
    // printf("Результат равен $%15f\n", 123.42 / 12);
    
    // Дополнение нулями до 15 знако-мест
    // printf("Результат равен $%015f\n", 123.42 / 12);
    
    // Дополнение пробелами до 15 знако-мест и вывод 
    // с точностью до двух десятичных знаков
    // printf("Результат равен $%15.2f\n", 123.42 / 12);
    
    // Дополнение нулями до 15 знако-мест и вывод
    // с точностью до двух десятичных знаков
    // printf("Результат равен $%015.2f\n", 123.42 / 12);
    
    // Дополнение символами # до 15 знако-мест и вывод 
    // с точностью до двух десятичных знаков
    // printf("Результат равен $%'#15.2f\n", 123.42 / 12);
    
    // echo "</pre>"; 

// ===================================================

/** 
 * fopen
 * fclose
*/

/*
// Преднамеренная ошибка при работе с файлами

$my_file = @file('non_existent_file') 
    or
    die("Ошибка при открытии файла: сообщение об ошибке");
*/

// ===================================================

// Для построчного чтения используется функция fgets(), которая получает дескриптор файла и возвращает одну считанную строку.

/*
$fd = @fopen(DB."comments", 'r') or die("не удалось открыть файл");
$comments = '';
while (!feof($fd)) {
    $comments .= fgets($fd);
}
fclose($fd);
*/
// ======================file_get_contents========================
// Если нам надо прочитать файл полностью:
// При этом нам не надо открывать явно файл, получать дескриптор, а затем закрывать файл.

// $comments = file_get_contents(DB."comments");

// =====================fread==============================
/*
// Также можно провести поблочное считывание, то есть считывать определенное количество байт из файла с помощью функции fread():

if (file_exists(DB."comments")) {
    $fhandle =@fopen(DB."comments", "rt");
    $comments = '';
    while (!feof($fhandle)) {
        $comments .= fread($fhandle, 4096);
    }
    fclose($fhandle);
} else {
    echo "Файл не существует";
}
*/

// =====================file==============================
// Чтение файла полностью
// count, implode, str_replace, htmlspecialchars

// $file = file(DB."comments");
// $count = count($file);
// $comments = str_replace("\n", "<br />\n", htmlspecialchars(implode("\n", $file)));

// file, str_replace, htmlspecialchars, implode 
// $comments = str_replace("\n", "<br />\n", htmlspecialchars(implode("\n", file(DB."comments"))));


// ===================================================
$username = null;  
$email = null;
$subject = null;
$message =  null;  
$result = false;

// if (!empty($_POST)) {
//     $username = $_POST['username'];  
//     $email = $_POST['email'];  
//     $subject = $_POST['subject']; 
//     $message =  $_POST['message'];  
//     if (!$username or !$email or !$message or !$subject) {
//         $error = "<h2>please complete all the fields</h2>";
//     } else {
//         $result = true;
//     }
// }
// =====================fwrite==============================
// add comment to comments.txt



// if (!empty($_POST)) {
    
//     if (!$_POST['username'] or !$_POST['email'] or !$_POST['message'] or !$_POST['subject']) {
//         $error = "<h2>please complete all the fields</h2>";
//     } else {
//         $result = true;
//         $fields = [];

//         $username = $_POST['username'];
//         array_push($fields, $username); 
//         $email = $_POST['email'];
//         array_push($fields, $email); 
//         $subject = $_POST['subject'];
//         array_push($fields, $subject); 
//         $message = $_POST['message'];
//         array_push($fields, $message); 
//         $appended_at = date("Y-m-d");
//         array_push($fields, $appended_at); 

//         // $appended_at =  date("Y/m/d");
//         // $appended_at =  date("Y.m.d");
//         // $appended_at =  date("Y-m-d");
//         // $appended_at =  date("l");

//         $handle = fopen(DB."comments.csv", "a+");
//         $string = $username.":".$email.":".$message.":".$appended_at."\r\n";

//         // fwrite($handle, $string);

//         // file_put_contents(DB."comments.csv", $string, FILE_APPEND);

//         fputcsv($handle, $fields, ':');
//         fclose($handle);
//     }
// }
// =====================fgetcsv==============================
// $comments = [];

// $handle = fopen(DB."comments.csv", "rt");

// while (($row = fgetcsv($handle, 10000, ":")) !== false) { 
//     array_push($comments, $row); 
// } 
// fclose($handle); 

// if (!empty($_POST)) {
    
//     if ( !$_POST['username'] or !$_POST['email'] or !$_POST['message'] or !$_POST['subject']){
//         echo "<h2>please complete all the fields</h2>";
//     }
//     else{
//         // подключаемся к серверу
//         $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
//         or die("Ошибка " . mysqli_error($conn));

//         $username = mysqli_real_escape_string($conn, $_POST['username']);
//         $email = mysqli_real_escape_string($conn, $_POST['email']);
//         $subject = mysqli_real_escape_string($conn, $_POST['subject']);
//         $comment = mysqli_real_escape_string($conn, $_POST['comment']);

//         // выполняем операции с базой данных

//         $sql = "INSERT INTO guestbook (username, email, subject, comment) VALUES ('$username', '$email', $subject, '$comment')";

//         mysqli_query($conn, $sql) or die("Ошибка: " . mysqli_error($conn));
//         mysqli_close($conn);
//     }
// }

// $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
//         or die("Ошибка " . mysqli_error($conn));

// $comments = [];
// $sql = "SELECT * FROM guestbook";
// $result = mysqli_query($conn, $sql);
// $resCount = mysqli_num_rows($result);
// while($row = mysqli_fetch_assoc($result)){
//         array_push($comments, $row);
//     }

// // закрываем подключение
// mysqli_close($conn);

// ===================================================
// require_once VIEWS.'guestbook/index.php';


// require_once CONFIG.'db.php';

// if (!empty($_POST)) {
    
//     if (!$_POST['username'] or !$_POST['email'] or !$_POST['comment']) {
//         echo "<b>please complete all the fields</b><br><br>";
//     } else {
//         // подключаемся к серверу
//         $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
//         or die("Ошибка " . mysqli_error($conn));


//         $username = mysqli_real_escape_string($conn, $_POST['username']);
//         $email = mysqli_real_escape_string($conn, $_POST['email']);
//         $comment = mysqli_real_escape_string($conn, $_POST['comment']);

//         // выполняем операции с базой данных

//         $sql = "INSERT INTO guestbook (username, email, comment) VALUES ('$username', '$email', '$comment')";

//         mysqli_query($conn, $sql) or die("Ошибка: " . mysqli_error($conn));
//         mysqli_close($conn);
//     }
    
// }

// $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
//         or die("Ошибка " . mysqli_error($conn));

// $comments = [];

// $sql = "SELECT * FROM guestbook";

// $result = mysqli_query($conn, $sql);

// $resCount = mysqli_num_rows($result);

// while ($row = mysqli_fetch_assoc($result)) {
//     array_push($comments, $row);
// }

// // закрываем подключение
// mysqli_close($conn);

// render('guestbook/index', ['title'=>"Cat's GuestBook", 'comments'=>$comments, 'count'=>$resCount ]);
