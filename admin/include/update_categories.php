</form>
<!--                             Block Update Categories-->
<form method="post" action="">
    <div class="form-group">
        <label for="cat_title"> Update Categories </label>
        <?php
        if(isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection,$query);
            if(!$select_categories_id){
                die("Error get categories id Message :".mysqli_error($connection));
            }else{
                while ($row = mysqli_fetch_assoc($select_categories_id)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    ?>
                    <input value="<?php if(isset($cat_title)){ echo $cat_title;}  ?>" class="form-control" type="text" name="cat_title" id="cat_title">
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-success form-control" type="submit" name="btn_update" value="Update">
    </div>
</form>
<?php
if(isset($_POST['btn_update'])){
    $the_cat_title = $_POST['cat_title'];
    $the_query_id = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
    $update_query = mysqli_query($connection,$the_query_id);
    if(!$update_query){
        die("Query Failed Message : ".mysqli_error($connection));
    }

}
?>