<?php
@include "_header.php";
@include 'process.php';
?>


<div class="container">

    <h3 class="text-center mt-5">Welcome to the Post Section</h3>

        <div class="row">
            <div class="col-5 mr-auto">
                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
                    echo $_SESSION['status'];
                    unset($_SESSION['status']);
                }

                ?>
            </div>
        </div>

</div>

<div>



    <div class="container">
        <div class="row">
            <div class="col">

                <?php
                if (isset($_GET["post_edit"])) {

                    include_once 'edit/edit-post.php';
                } else {
                ?>

                    <form method="post">
                        <div class="form-group">
                            <label>Enter Post Name: </label>
                            <input type="text" class="form-control mb-2" id="post-name" name="post_name" placeholder="Enter Post Name">
                        </div>
                        <label for="post-status">Choose Post Status:</label>
                        <select name="post_status" id="post-status">
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>

                        <br>
                        <br>

                        <button type="submit" name="post-insert_btn" class="btn btn-primary">Submit</button>
                    </form>

                <?php
                }
                ?>


            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center mt-3 mb-4">List of all post.</h3>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S.N.</th>
                            <th scope="col">POST NAME</th>
                            <th scope="col">POST STATUS</th>
                            <th scope="col">EDIT</a></th>
                        </tr>
                    </thead>

                    <!-- For fetching all the data to website -->
                    <?php
                    include_once 'fetch/fetch-post.php';
                    ?>
                </table>
                <?php

                ?>
            </div>
        </div>
    </div>

    <?php
    @include "_footer.php"

    ?>