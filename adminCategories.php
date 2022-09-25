<?php 


require('conectiondatabaseassignment.php');



// fucntion you can see in the conectiondatabaseassignment.php page
adminPage();
// takes categories from the database 
$news = $conectiondatabaseassignment->prepare('select * from category');
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
        <!-- the main title of the portal -->
        <h2>Manage your category</h2>
        <!-- add category button click it and go to add category portal -->
        <a href = 'addCategory.php'><button>Add Category</button></a>
        
        <p>
            Listing category:
        </p>
       <ul>
       
          <!-- lisitng the categories you addede in the database  -->
        <?php 
            while($poo = $news->fetch()) {
                echo '<li>'.$poo['name'].'<a href="editCategory.php?id='.$poo['id'].'"><button>Edit</button></a>
               <a href="deleteCategory.php?id='.$poo['id'].'"> <button>Delete </button></a></li>';
            }
        ?>

       </ul>
    </article>
</main>
<footer>
    &copy; Northampton News 20s17
</footer>

</body>

</html>