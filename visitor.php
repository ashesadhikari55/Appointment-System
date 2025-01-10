<?php
@include "_header.php";
@include 'process.php';
?>

<div class="container">

    <h3 class="text-center mt-5">Welcome to the Visitor Section</h3>

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

 <!----------------------------------->
<!-- INSERT AND UPDATE VISITOR SECTION -->
 <!----------------------------------->

<div class="container">
    <div class="row">
        <div class="col">

            <?php
            if (isset($_GET["visitor_edit"])) {

                include_once 'edit/edit-visitor.php';
            } else {
            ?>

                <form method="post">
                    <div class="form-group">
                        <label>Enter Visitor Name: </label>
                        <input type="text" class="form-control mb-2" id="visitor-name" name="visitor_name" placeholder="Enter Visitor Name">
                    </div>
                    <div class="form-group">
                        <label>Enter Visitor Mobile No: </label>
                        <input type="tel" class="form-control mb-2" id="visitor-mobileNo" name="visitor_mobileNo" placeholder="Enter Visitor Mobile No">
                    </div>
                    <div class="form-group">
                        <label>Enter Email Address: </label>
                        <input type="email" class="form-control mb-2" id="visitor-email" name="visitor_email" placeholder="Enter Visitor Email">
                    </div>
                    <label for="post-status">Choose Post Status:</label>
                    <select name="visitor_status" id="visitor-status">
                        <option value="1">Activate</option>
                        <option value="0">Deactivate</option>
                    </select>

                    <br>
                    <br>

                    <button type="submit" name="visitor-insert_btn" class="btn btn-primary">Submit</button>
                </form>

            <?php
            }
            ?>
        </div>
    </div>
</div>

 <!----------------------------------->
<!--########### FETCH VISITOR SECTION -->
 <!----------------------------------->

<div class="container">
    <h3 class="text-center mt-3 mb-4">List of all post.</h3>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">VISITOR NAME</th>
                        <th scope="col">VISITOR MOBILE</th>
                        <th scope="col">VISITOR EMAIL</a></th>
                        <th scope="col">VISITOR STATUS</a></th>
                        <th scope="col">EDIT</a></th>
                    </tr>
                </thead>

                <!-- For fetching all the data to website -->
                <?php
                include_once 'fetch/fetch-visitor.php';
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