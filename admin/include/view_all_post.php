<table class="table table-bordered table-hover">
    <thead class="text-center">
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Categories</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tboby>

        <?php
        global $connection;
        $query_all_post = "SELECT * FROM posts";
        $all_post_result = mysqli_query($connection,$query_all_post);
        if(!$all_post_result){
            die("Query Failed ".mysqli_error($connection));
        }else{
            while ($row = mysqli_fetch_assoc($all_post_result)){
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tag = $row['post_tag'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];

                echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";


                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $get_post_title = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($get_post_title)){
                    $cat_title = $row['cat_title'];
                }
                echo "<td>$cat_title</td>";




                echo "<td>{$post_status}</td>";
                echo "<td><img class='img-responsive' width='100' src='../image/{$post_image}' alt='image'/></td>";
                echo "<td> {$post_tag}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td> <a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>";
                echo "<td> <a href='post.php?delete={$post_id}'>Delete</a> </td>";
                echo "</tr>";

            }
        }
        ?>
    </tboby>
</table>
<?php
    if (isset($_GET['delete'])){
            delete_post();
    }
?>