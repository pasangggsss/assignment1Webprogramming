<?php 

// this contains the funcitons & connections with database 
require('conectiondatabaseassignment.php');

// move to index page after logging in 
if(loggedIn()) {
    header('Location:index.php');
    exit;
}
// trying to register in the pgae 
if(isSubmitted()) {
    registerUserInWebsite();
}

// contiasn the heading part of the pge 
require 'pds.php';


?>

<main>
    <nav>
        <ul> 
            <!-- log in and register in the side menu -->
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register an account</a></li>
        </ul>
    </nav>
    <article>
        <h2>Register into Northampton news</h2>
        <form action="#" method="post">
            <p>Enter your login cred:</p>
            <!-- side label where you can see intructions what to do  -->
            <label>Enter your email</label>
             <input type="email" name = "email" />
            <label>Set a password</label>
             <input type="password" name = "password" />
            <label>Enter your name</label> 
            <input type="email" name = "name" />
                <!-- submit button  -->
            <input type="submit" name="submit" value="Submit" />
        </form>



    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>