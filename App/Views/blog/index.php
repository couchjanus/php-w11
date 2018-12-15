<?php
require_once VIEWS.'partials/_head.php';
require_once VIEWS.'partials/_navigation.php';
?>

<!-- product Start -->

<h1>Our <b>Cat Members Blog</b></h1>        

<?php if ($data['postCount'] > 0) :?>

<?php foreach ($data['posts'] as $item) :?>
    <h2><?php echo $item['title'];?></h2>

    <div><?php echo $item['content'];?></div>
<?php endforeach;?>

<?php else : echo "<h2>Not Posts Yet...</h2>"?>
<?php endif;?>

<!-- Our product End -->
<div id="shadow-layer" class="shadow-layer"></div>

<?php
require_once VIEWS.'partials/_aside.php';
require_once VIEWS.'partials/_footer.php';
