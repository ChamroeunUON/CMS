<?php


function Insert(){
    $cat_title = $_POST['cat_title'];
    if($cat_title == "" || empty($cat_title)){
        echo " <p style='color: red'>Field cat not empty</p>     ";
    }else{
        global  $connection;
        $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die("Error while insert".mysqli_error($connection));
        }
        echo "Inserted.";
    }
}
function FindAll(){

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td> <a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        // edit and delete are key for working
        echo "</tr>";
    }
}
function DeleteById(){
    global  $connection;
    $the_query_id = "DELETE FROM categories WHERE cat_id = {$_GET['delete']}";
    $delete_query = mysqli_query($connection,$the_query_id);
    if(!$delete_query){
        die("Error while delete".mysqli_error($connection));
    }
// Make Refresh page not double click on link delete
    header("location:categories.php");
}