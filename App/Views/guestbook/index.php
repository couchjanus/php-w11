<?php
require_once VIEWS.'partials/_head.php';
require_once VIEWS.'partials/_navigation.php';

printf("<h1 style='color: #%x%x%x'>Cat's GuestBook</h1>", 165, 27, 45);
?>

<!--Section: Form -->
<form class="cf" method="POST">
  <div class="half left cf">
    <input type="text" id="user-name" name="username" placeholder="Name">
    <input type="email" id="user-email" name="email" placeholder="Email address">
    <input type="text" id="input-subject" name="subject" placeholder="Subject">
  </div>
  <div class="half right cf">
    <textarea name="message" type="text" id="input-message" placeholder="Message"></textarea>
  </div>  
  <input type="submit" value="Submit" id="input-submit">
</form>

<!--Section: Form -->

<?php
// !empty($_POST)
if ($_POST) {
    echo '<hr>';
    echo '<pre>';
 
    echo 'Привет ' . htmlspecialchars($_POST["username"]) . '!';
    // echo $_REQUEST['username'];
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
}

// if (!empty($_POST)) {
//     if ( !$_POST['username'] or !$_POST['email'] or !$_POST['comment']){
//      echo "<b>please complete all the fields</b><br>";
//     } else{
//        echo htmlspecialchars(print_r($_POST,  true));
//    }
// }


// Пример использования filter_input()

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// FILTER_VALIDATE_EMAIL

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo $email.'<br>';
    var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
}else{
    var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));   
} 

echo '<pre>';

// if ($result) {
    echo $username;
    echo $email;
//     echo $message;

// } else {
//     echo $error;
// }
echo '</pre>';

// echo '<pre>';
// echo htmlspecialchars(print_r($comments, true));
// echo '</pre>';

// foreach ($comments as $key => $value) {
//   printf("<div class='top'><b>User [%s] </b> <a href='mailto:[%s]'>[%s]</a>  Added this: </div>", $value[0], $value[1], $value[1]);
//   printf("<div class='comment'>%s</div>", strip_tags($value[2]));

//   $posted = sprintf("<p>This post was made on %s</p>", strip_tags($value[3]));
//   echo $posted;
//   // printf("<div class='added_at'> At: %s</div>", strip_tags($value[3]));
// }


// if ($resCount>0) {
//     echo "<h3>$resCount comments:</h3> ";
    
//     foreach ($comments as $row) {
//       echo "<div class='top'><b>User ".$row["username"]."</b> <a href='mailto:".$row["email"]."'>".$row["email"]."</a> Added this </div>"; 
//       echo "<div class='comment'>".strip_tags($row["comment"])."</div>"; 
//       echo "<div class='added_at'> At: ".strip_tags($row["appended_at"])."</div>"; 
//     }
// }
// else {
//   echo "No comments.... ";
// }


echo "<pre>"; 
// print_r($comments);
echo "</pre>"; 

?>

<?php if ($count>0) : ?> 
    <h2>
        <?php //printf("В Guest Book находится %d Comments", $count); ?> 
    </h2>
   
    <?php //foreach ($comments as $row) :?>
        <div class='top'>
            <b>
                User <?=//$row["username"];?>
            </b> 
            <a href="mailto:<?=//$row['email'];?>"><?=//$row["email"];?></a> Added this 
        </div> 
        <div class='comment'>
            <?=//strip_tags($row["comment"]);?>
        </div> 
        <div class='added_at'> At: 
            <?=//strip_tags($row["created_at"]);?>
        </div> 
    <?php //endforeach;?>
    <?php else : echo "No comments.... "; ?>
        
<?php endif;?>

<!-- Our product End -->
<div id="shadow-layer" class="shadow-layer"></div>

<?php
require_once VIEWS.'partials/_aside.php';
require_once VIEWS.'partials/_footer.php';
