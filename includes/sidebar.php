<div class="col-md-4">
<!--    --><?php
//        if(isset($_POST['btnSubmit'])){
//            global $connection;
//            $search = $_POST['txtSearch'];
//            $query = "SELECT * FROM posts WHERE post_tage LIKE '%$search%' ";
//            $result  = mysqli_query($connection,$query);
//            if((!$result)){
//                die("Query failed :".mysqli_error($connection));
//            }else
//                $count = mysqli_num_rows($result);
//                if($count==0){
//                    echo "No Resource<br>";
//                }
//                else{
//                    echo "Have Some Resource <br>";
//                    echo "And to total resource is : ".$count;
//                }
//
//        }
//    ?>
    <!-- Blog Search Well -->
    <div class="well">
        <form action="search.php" method="post">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input name="txtSearch" type="text" class="form-control">
            <span class="input-group-btn">
                            <button name="btnSubmit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        </form>

        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    global $connection;
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($connection,$query);
                    if(!$result){
                        die("Error Message on Sidebar : ".mysqli_error($connection));
                    }else{
                        while ($row = mysqli_fetch_assoc($result)){
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo " <li><a href='category.php?category=$cat_id'>$cat_title</a>";
                        }
                    }

                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>