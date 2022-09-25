<?php 

//
require('conectiondatabaseassignment.php');

adminPage();

if(isSubmitted()) {
    editArticleOfDatabase();
}

// if id's not givne i nthe url the works for nothign and takes to another page .
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}

// Selects all the it from the databsae
$where_clause = $conectiondatabaseassignment->prepare("select * from article where id=?");
$where_clause->execute([$_GET['id']]);

$ledd; $cot;
// fetching hte title and content from editArticle
if($push = $where_clause->fetch()) {
    $ledd = $push['title'];
    $cot = $push['content'];
}
else {
    exit;
}
// this contains heading part of the page 
require 'pds.php';

?>

<main>
    <nav>
        <ul>


            <?php 
        if(!loggedIn()) {
            echo '<li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>';
        } else {
            echo '<li><a href="logout.php">Log out</a></li>';
        }
    ?>
        </ul>
    </nav>
    <article>
        <h2>Edit Article Admin</h2>

        <form action="#" method="post">
            <p>Kindly,Edit your article: <?php echo $ledd; ?></p>

            <label> Please kindly enter new subject:</label>
            <input type="text" name="title" value = "<?php echo $ledd; ?>"/>

        <label> Edit and change your article the way you wish to do :</label>
            <textarea name="content" ><?php echo $cot; ?></textarea>

            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>