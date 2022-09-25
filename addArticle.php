<?php 

// This file contains the pdo connectiosn.
require('conectiondatabaseassignment.php');


// checking wheather the user is admin or not if not then don't let them to get in the system.

adminPage();

// isSubmitted means something has been submited from the form.After submission you need to add the article 
if(isSubmitted()) {
    articleAddIntoDatabase();
}

// taking all the category that's available in database.   
$pdo_radio = $conectiondatabaseassignment->prepare('SELECT * FROM category');
$pdo_radio->execute();
//this contains heading part of the page.
require 'pds.php';

?>

<main>
    <nav>
        <ul>


            <?php 

            // if logged in then one kind of sidebar appears if not then other kind of sidebar appears. 
        if(isset($_SESSION['using'])==false) {
            require('sidemenu.php');
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
    ?>
        </ul>
    </nav>
    <article>
        <h2>Add Article Admin</h2>
        <!-- form helps to set the form-->
        <form action="#" method="post">
            <!--  p helps to make paragraph   -->
            <p>What's the article about?</p>

            <label>Subject:</label>
            <input type="text" name="title" />

            <label>Article Main Point:</label>
            <textarea name="content"> </textarea>

            <label>Category:</label>

            
            <select name="category">
                <!-- the code below helps to fetch id & name of category-->
                <?php 
                // While setting the category of the article, it takes the article & category from the database. 
                while($pass = $pdo_radio->fetch()){
                    $od = $pass['id'];
                    $bo = $pass['name'];
                    // value sets id for the category as the id already set in the database. 
                    echo('<option value="'.$od.'">'.$bo.'</option>');
                }
                ?>
            </select>
            <!-- shows the button submit on the screen-->
            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<!-- you can see the footer in the footer at the bottom of the page-->
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>