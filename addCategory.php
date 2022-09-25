<?php 
require('conectiondatabaseassignment.php');

adminPage();
//Helps to submit some form:
if(isSubmitted()) {
    addCategoryIntoDatabase();
}

//accessing admin page ..
require 'pds.php';


?>

<main>
    <!-- nav bar can be seen in the sidemenu which consist log out-->
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a></li>

        </ul>
    </nav>
    <article>
        <!-- the addCategory page heading -->
        <h2>Let's, Insert the category </h2>
       <!-- The form below can be seen in the addCategory page where you need to enter the name for the categort and submit it.-->
        <form action="#" method="post">
            <p>Insert a news article for Northampton:</p>

            <label>Please add the name of the category:</label>
            <input type="text" name="name" />
            
            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>