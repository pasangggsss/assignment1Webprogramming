<?php 

// consists the fucnitons & connection with the database 
require('conectiondatabaseassignment.php');
 
// it contains the heading part of the page 
require 'pds.php';

$sign_in = false;
// after the login email & pass is correct
if(isset($_SESSION['login'])) {
    $login = true;
}
 // if the login email & pass is incorrect 
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}



// article leko jasto id chi url ma hunchha id= vanera rakheko kura ko
$pdo_radio = $conectiondatabaseassignment->prepare('SELECT * FROM article where id=?');
$pdo_radio->execute([$_GET['id']]);
//
$heading; $cot; $addDate;
//fetchign the title.content & published date
if($vega = $pdo_radio->fetch()) {
    $heading = $vega['title'];
    $cot = $vega['content'];
    $addDate = $vega['publishDate'];
}
else {
    exit;
}

// post garnu vaneko yesma comment garnu ho so comment database ma set garne
if(isSubmitted()) {
    addCommentInArticle();
}
?>

<main>
    <nav>
        <ul>


            <?php 
            // if the login is false side menu option 
        if(isset($_SESSION['login'])==false) {
            require('sidemenu.php');
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
    ?>
        </ul>
    </nav>
    <article>
 
        <h1><?php echo $heading ?></h1>
        <em><?php echo $addDate ?></em>
        <p> <?php
        echo $cot ?></p>
        <?php 
        // if the user has logged in then the comment box is shown or else not.  
        if(loggedIn()) {
           echo '<form action="#" method="post">
           <label>Please enter the feedback: ';
            echo $heading;
            echo '</label> <textarea name="commentText"></textarea>';
            echo '
           <input type="submit" name="submit" value="Submit" />';
        }
        

        ?>
        <ul style= 'clear:left'>
            <?php 
            //functions that contains comment along with the username
                listCommentWithUsername();
            
            ?>
        </ul>
    </article>
</main>
<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
