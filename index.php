<?php 
// consiists  of the fucnuton and connection with database
require 'conectiondatabaseassignment.php';
?>
<?php
//consists the heading part of the page 
require 'pds.php';

//selects all the from the articles as per publish date limiting only 10 latest articles
$pdo_radio = $conectiondatabaseassignment->prepare('SELECT * FROM article ORDER BY publishDate desc LIMIT 10');
$pdo_radio->execute();

?>

<main>
    <nav>
        <ul>


            <?php 
            //shows the sidemenu containing logout 
        if(!loggedIn()) {
            require('sidemenu.php');
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
    ?>
        </ul>
    </nav>
    <article>
        <h2>Articles</h2>

        <ul>
            <?php 
          // fetch the title and the publish date 
            while($vegas = $pdo_radio->fetch()) {
            echo '<li><p>'.$vegas['title'].'<em>'.$vegas['publishDate'].'</em></p></li>';
            }
        
            ?>
        </ul>
    </article>
</main>
<footer>
			&copy; Northampton News 2017
		</footer>

	</body>
</html>
