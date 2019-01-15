<?php include "includes/header.php"; ?>

    <div id="wrapper">

<?php include "includes/nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php 

                        if(isset($_POST['submit'])){

                            $categoryName = $_POST['cat_title'];

                            if($categoryName == ""){
                                echo "This field Should not be empty";
                            } else {

                                $query = "INSERT INTO categories(cat_title) VALUE ('{$categoryName}') ";

                                $create_category_query = mysqli_query($connection, $query);

                                if(!$create_category_query){
                                    die('Query Failed' . mysqli_error($connection));
                                }

                            }

                            
                        }

                        ?>

                            <form action="" method="post">
                                <div class="form-group">

                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                        </div>

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                $query = "SELECT * FROM categories";
                                    $select_all_cata = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_all_cata)){
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];

                                        echo "<tr><td>$cat_id</td><td>$cat_title</td></tr>";

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

<?php include "includes/footer.php"; ?>
