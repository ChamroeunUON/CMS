
<?php
if (isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
    }
    $query_all_post = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $all_post_result = mysqli_query($connection,$query_all_post);
    if(!$all_post_result){
        die("Query Failed ".mysqli_error($connection));
    }else {
        while ($row = mysqli_fetch_assoc($all_post_result)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tag'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
        }
    }
    if(isset($_POST['btn_update'])){

        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        move_uploaded_file($post_image_tmp, "../image/$post_image");
        if (empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $get_image = mysqli_query($connection,$query);
            while ($row = mysqli_fetch_array($get_image)){
                $post_image = $row['post_image'];
            }
        }
        $query  = "UPDATE posts SET ";
        $query .= "post_category_id='{$post_category_id}', ";
        $query .= "post_title='{$post_title}', ";
        $query .= "post_author='{$post_author}', ";
        $query .= "post_date= now(), ";
        $query .= "post_image= '{$post_image}', ";
        $query .= "post_content= '{$post_content}', ";
        $query .= "post_tag= '{$post_tags}', ";
        $query .= "post_status= '{$post_status}' ";
        $query .= "WHERE post_id= {$the_post_id} ";
        $update_post = mysqli_query($connection,$query);
        comfirmedError($update_post);


    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" placeholder="title" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="" class="label label-warning ">Please select categories title here</label>
        <select name="post_category" id="post_category" style="width: 200px; height: auto;">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories_by_id = mysqli_query($connection,$query);
                comfirmedError($select_categories_by_id);
                while ($row = mysqli_fetch_assoc($select_categories_by_id)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo " <option value='$cat_id'>{$cat_title}</option> ";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" placeholder="Post Author" name="author" id="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" placeholder="Post Author" name="post_status" id="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <img  src="../image/<?php echo $post_image;?>" width="100" alt="image" class="img-responsive">
        <input type="file" placeholder="choose a file" name="image" id="image">
    </div>
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" placeholder="Post Tag" name="post_tags" id="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea placeholder="Post Content" name="post_content" cols="30" rows="10" id="content" class="form-control"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success" id="btn_update" name="btn_update">Update Post</button>
    </div>
</form>