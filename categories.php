<?php 

//this contains all the fcuntions & connection with the database
require('conectiondatabaseassignment.php');

//this contains heading part of the page.
require 'pds.php';

// if id's not available then remove the user from the page 
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}



// takes id only one that contains in the URL
$pdo_radio = $conectiondatabaseassignment->prepare('SELECT * FROM category where id=?');
$pdo_radio->execute([$_GET['id']]);
$name = '';
if($cook = $pdo_radio->fetch()) {
    $new = $cook['name'];
}
else {
    exit;
}
?>

<main>
    <nav>
        <ul>


            <?php 
            //after logging in you can see the change in the sidemenu 
        if(!loggedIn()) {
            require('sidemenu.php');
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
        ?>
        </ul>
    </nav>
    <article>

        <h2>All the articles belonging to <?php echo $new.' ' ?> Category</h2>
        <ul>
            <?php 
            //selects all the category id from the databse.
            $news =  $conectiondatabaseassignment->prepare('select * from article where categoryId=?');
            //get and execute the id s
            $where_clause = [$_GET['id']];
            $news->execute($where_clause);
            
            //fetchs id and title
            while($shoo = $news->fetch()) {
                $lide = $shoo['id'];
                $pagee = $shoo['title'];
                echo '<li><a href="fullarticles.php?id='.$lide.'"> '.$pagee.' </a></li>';
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