<?php
function delete_comment(){
global $connection;
$query = "DELETE FROM comments WHERE comment_id = {$_GET['delete']}";
$delete_comment = mysqli_query($connection,$query);
comfirmedError($delete_comment);
header("location: comments.php");
}
function approved_comment_status(){
    global $connection;
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$_GET['approved']}";
    $approved_comment_status = mysqli_query($connection,$query);
    comfirmedError($approved_comment_status);
    header("location: comments.php");
}

function unapproved_comment_status(){
    global $connection;
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$_GET['unapproved']}";
    $unapproved_comment_status = mysqli_query($connection,$query);
    comfirmedError($unapproved_comment_status);
    header("location: comments.php");
}
