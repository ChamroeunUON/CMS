<?php
function insert_post(){
    global $connection;
$post_title = $_POST['title'];
$post_author = $_POST['author'];
$post_category_id = $_POST['post_category_id'];
$post_status = $_POST['post_status'];

$post_image = $_FILES['image']['name'];
$post_image_tmp = $_FILES['image']['tmp_name'];

$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('d-m-y');
$post_comment_count = 4;
move_uploaded_file($post_image_tmp, "../image/$post_image");
$query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,
                                    post_content,post_tag,post_comment_count,post_status) 
                  VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),
                                    '{$post_image}','{$post_content}',
                                    '{$post_tags}','{$post_comment_count}','{$post_status}') ";
$insert_post = mysqli_query($connection, $query);
comfirmedError($insert_post);
}
function delete_post(){
    global $connection;
    $query = "DELETE FROM posts WHERE post_id = {$_GET['delete']}";
    $delete_post = mysqli_query($connection,$query);
    comfirmedError($delete_post);
    header("location: post.php");
}

