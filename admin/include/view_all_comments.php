<table class="table table-bordered table-hover">
    <thead class="text-center">
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
<!--        <th>Contents</th>-->
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tboby>

        <?php
        global $connection;
        $query_all_comments = "SELECT * FROM comments";
        $all_comment_result = mysqli_query($connection,$query_all_comments);
        if(!$all_comment_result){
            die("Query Failed ".mysqli_error($connection));
        }else{
            while ($row = mysqli_fetch_assoc($all_comment_result)){
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                echo "<tr>";
                echo "<td>{$comment_id}</td>";
//                echo "<td>{$comment_post_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_status}</td>";

                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                $select_post_id = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($select_post_id)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a> </td>";
                }

                echo "<td>{$comment_date}</td>";

                echo "<td> <a href='comments.php?approved=$comment_id'>Approved</a> </td>";
                echo "<td> <a href='comments.php?unapproved=$comment_id'>Unapproved</a> </td>";
                echo "<td> <a href='comments.php?delete={$comment_id}'>Delete</a> </td>";
                echo "</tr>";

            }
        }
        ?>
    </tboby>
</table>
<?php

    // For all function write in comment_function.php in folder function
    if (isset($_GET['delete'])){
        delete_comment();
    }
    if (isset($_GET['approved'])){
        approved_comment_status();
    } if (isset($_GET['unapproved'])){
        unapproved_comment_status();
    }
?>