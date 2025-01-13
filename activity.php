<?php
@include "_header.php";
@include 'process.php';
?>


<div class="container">

    <h3 class="text-center mt-5">Welcome to the Activity Section</h3>

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
                if (isset($_GET["activity_edit"])) {

                    include_once 'edit/edit-activity.php';
                } else {

                    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
                    $result_dropdown = mysqli_query($con, $sql_dropdown);
                ?>

                    <form method="post">

                        <label for="activity-type" class="mb-3">Choose Activity Type:</label>
                        <select name="activity_type" id="activity-type">
                            <option value="1">Leave</option>
                            <option value="2">Break</option>
                            <option value="3">Appointment</option>
                        </select>

                        <br>

                        <label for="officer-id">Choose Officer Name:</label>
                        <select name="officer_id" id="officer-id" class="mb-3">
                            <?php
                            if (mysqli_num_rows($result_dropdown) > 0) {
                                while ($row = mysqli_fetch_array($result_dropdown)) {
                                    echo "<option value='{$row['officer-id']}'> '{$row['officer-name']}'</option>";
                                }
                            }
                            ?>
                        </select>
                        <br>

                        <div class="form-group" class="mb-2">
                            <label>Enter Activity Start Date: </label>
                            <input type="date" class="form-control mb-2" id="activity-startdate" name="activity_startdate" placeholder="Enter Activity Start Date: ">
                        </div>

                        <div class="form-group" class="mb-2">
                            <label>Enter Activity Start Time: </label>
                            <input type="time" class="form-control mb-2" id="activity-starttime" name="activity_starttime" placeholder="Enter Activity Start Time : ">
                        </div>

                        <div class="form-group" class="mb-2">
                            <label>Enter Activity End Date: </label>
                            <input type="date" class="form-control mb-2" id="activity-enddate" name="activity_enddate" placeholder="Enter Activity End Date: ">
                        </div>

                        <div class="form-group" class="mb-2">
                            <label>Enter Activity End Time: </label>
                            <input type="time" class="form-control mb-2" id="activity-endtime" name="activity_endtime" placeholder="Enter Activity End Time : ">
                        </div>

                        <label for="activity-status">Choose Activity Status:</label>
                        <select name="activity_status" id="activity-status">
                            <option value="1" >Activate</option>
                            <option value="0">Cancelled</option>
                        </select>

                        <br>
                        <br>

                        <button type="submit" name="activity-insert_btn" class="btn btn-primary">Submit</button>
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
                            <th scope="col">ACTIVITY TYPE</th>
                            <th scope="col">OFFICER NAME</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">START TIME</th>
                            <th scope="col">END DATE</th>
                            <th scope="col">END TIME</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">EDIT</a></th>
                        </tr>
                    </thead>

                    <!-- For fetching all the data to website -->
                    <?php
                    include_once 'fetch/fetch-activity.php';
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