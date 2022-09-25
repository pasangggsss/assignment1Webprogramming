<?php 


require('conectiondatabaseassignment.php');

// don't let the logged in user to come in the login portal
if(loggedIn()) {
    header('Location:index.php');
    exit;
}


// helps the user to login after submission  
if(isSubmitted()) {
    // search for username and data in the database 
    loginUserInWebsite();
}

// heaidng part of the portal
require 'pds.php';

?>

<main>
    <nav>
        <ul>
            <!-- show the login adn register in the side menu -->
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register an account</a></li>
        </ul>
    </nav>
    <article>
        <!-- heading of the page  -->
        <h2> Sign-In Portal</h2>
        <form action="#" method="post">
            <p>Please enter your correct creddentials:</p>
            <!-- enter the correct user email & password  adn also a submit button -->
            <label>User E-mail :</label> 
            <input type="email" name = "email" />
            <label>Password :</label>
             <input type="password" name = "password" />
            <input type="submit" name="submit" value="Submit" />
        </form>



    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>