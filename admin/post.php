<?php include "include/header.php"; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "include/navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post Administrator <small>Baboo</small> </h1>
                </div>
          <?php
                if(isset($_GET['source'])){
                    $source =   $_GET['source'];
                }else
                    $source = '';
                switch ($source){
                    case 'add_post';
                        include "include/add_post.php";
                        break;
                    case 'edit_post';
                        include "include/edit_post.php";
                        break;
                    case '200';
                        echo "Nice 200";
                        break;
                    default;
                        include "include/view_all_post.php";

                }


           ?>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "include/footer.php";?>

