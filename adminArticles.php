<?php 

// this contains all functions and database connection
require('conectiondatabaseassignment.php');
// adminPage is  the function you can see in the connection database
adminPage();

// take articles from the database.
$news = $conectiondatabaseassignment->prepare('select * from article');
$news->execute();


require 'pds.php';


?>

<main>
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </nav>
    <article>
        <!-- The heading of the page -->
        <h2>Manage your article </h2>
          <!-- Add articles button where you can click go the portal through which you guys can add the article.-->
        <a href = 'addArticle.php'><button>Add Article</button></a>

        <p>
            Listing Article:
        </p>
        <!-- fetching the list of the articles in the database-->
       <ul>
        <?php 
            while($datafromdatabase = $news->fetch()) {
                //Edit & Delete button can be seen through you can change or delete the article.
                echo '<li>'.$datafromdatabase['content'].'<a href="editArticle.php?id='.$datafromdatabase['id'].'"><button>Edit</button></a>
                <a href="deleteArticle.php?id='.$datafromdatabase['id'].'"><button>Delete</button></a></li>';
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