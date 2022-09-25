<?php 

// this contains the fucnitons & database connection 
require('conectiondatabaseassignment.php');

adminPage();
// this consissts the funciton where we can submit the data 
if(isSubmitted()) {
    //this fucnitons runs to edit category from the database 
    editCategoryIntoDatabase();

}
// slects all the category dta from the database 
$classification= $conectiondatabaseassignment->prepare("select * from category where id=?");
$classification->execute([$_GET['id']]);

$nose = "";
//fetchign the category name while wditing category s
if($vega = $classification->fetch()) {
    $nose = $vega['name'];
}
else {
    exit;
}
// this contains the heading part of the page 
require 'pds.php';


?>

<main>
    <nav>
        <ul>
            <li><a href="logout.php">Log out</a></li>

        </ul>
    </nav>
    <article>
        <!-- heading of the page  -->
        <h2>Edit/Change the category name:</h2>
       <!-- consists the form where you can edit the category. -->
        <form action="#" method="post">
            <p>Wish to change the catgeory name in the way you want from <?php echo $nose; ?> </p>

            <label> Enter & change the category name:</label>
            <input type="text" name="name" value=  "<?php echo $nose; ?>" />
             <!--  contains the button where you can submit  -->
            <input type="submit" name="submit" value="Submit" />
        </form>
    </article>
</main>
<footer>
    &copy; Northampton News 2017
</footer>

</body>

</html>