<?php include "include/header.php"; ?>
<?php include "function/categorirs_function.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                 <!-- Page Heading -->
                    <h1 class="page-header">
                        Category Form
                        <small>Baboo</small> 
                    </h1>
                    <div class="col-xs-6">
                        <?php

                        if (isset($_POST['btnSubmit'])){
                            Insert();
                        }
                        ?>

                        <form method="post" action="">
                            <div class="form-group">
                                <label for="cat_title">Categories Name</label>
                                <input class="form-control" type="text" name="cat_title" id="cat_title" placeholder="Categories Name">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success form-control" type="submit" name="btnSubmit" value="Add Categories">
                            </div>
<!--                    update Query-->
                            <?php
                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "include/update_categories.php";
                            }

                            ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
//                                       Find all categories
                                            FindAll();
                                        ?>
<!--                                        DELETE Categories-->
                                        <?php
                                            if(isset($_GET['delete'])){
                                               DeleteById();
                                            }
                                        ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "include/footer.php";?>