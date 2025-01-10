<?php
    @include "_header.php";
    @include 'process.php';

?>

<div class="container">
    <h3 class="text-center mt-5">Welcome to the Officer Section</h3>

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
<!-- INSERT AND UPDATE OFFICER SECTION -->
 <!----------------------------------->


<div class="container">
    <div class="row">
        <div class="col">

            <?php
            if (isset($_GET["officer_edit"])) {
                include_once 'edit/edit-officer.php';
            } else {

                $sql_dropdown = "SELECT `post-id`, `post-name` FROM `table-post`";
                $result_dropdown = mysqli_query($con, $sql_dropdown);

            ?>

                <form method="post">
                    <div class="form-group">
                        <label>Enter Officer Name: </label>
                        <input type="text" class="form-control mb-2" id="visitor-name" name="officer_name" placeholder="Enter Officer Name">
                    </div>
                    
                    <label for="post-name">Choose Post Name:</label>
                    <select name="post_name" id="post-name">
                        <?php
                             if (mysqli_num_rows($result_dropdown) > 0) {
                                while ($row = mysqli_fetch_array($result_dropdown)) {
                                    echo "<option value='{$row['post-id']}'> '{$row['post-name']}'</option>";
                                }
                            }
                        ?>
                        
                    </select>
                
                    <label for="officer-status">Choose Officer Status:</label>
                    <select name="officer_status" id="officer-status">
                        <option value="1">Activate</option>
                        <option value="0">Deactivate</option>
                    </select>

                    <div class="form-group">
                        <label>Enter Work Start Time: </label>
                        <input type="datetime-local" class="form-control mb-2" id="officer-workstarttime" name="officer_workstarttime" placeholder="Enter Visitor Work Start Time">
                    </div>

                    
                    <div class="form-group">
                        <label>Enter Work End Time: </label>
                        <input type="datetime-local" class="form-control mb-2" id="officer-workendtime" name="officer_workendtime" placeholder="Enter Visitor Work End Time">
                    </div>

                    <br>
                    <br>

                    <button type="submit" name="officer-insert_btn" class="btn btn-primary">Submit</button>
                </form>

            <?php
            }
            ?>
        </div>
    </div>
</div>

 <!----------------------------------->
<!-- FETCH OFFICER SECTION -->
 <!----------------------------------->
 
<div class="container">
    <h3 class="text-center mt-3 mb-4">List of all Officer.</h3>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">OFFICER NAME</th>
                        <th scope="col">POST NAME</th>
                        <th scope="col">OFFICER STATUS</th>
                        <th scope="col">OFFICER WORK START TIME</th>
                        <th scope="col">OFFICER WORK END TIME</th>
                        <th scope="col">EDIT</th>
                    </tr>
                </thead>

                <!-- For fetching all the data to website -->
                <?php
                include_once 'fetch/fetch-officer.php';
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