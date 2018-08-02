<?php
function comfirmedError($result){
    global $connection;
    if(!$result){
        die("Error on $result : ".mysqli_error($connection));
    }else
        echo "<p style='color: green'>Successfully...</p>";
}