<?php
@include "_header.php";
@include 'process.php';
?>


<div class="container">

    <h3 class="text-center mt-5">Welcome to the Appointment Section</h3>

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
                if (isset($_GET["appointment_edit"])) {

                    include_once 'edit/edit-appointment.php';
                } else {

                    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
                    $result_dropdown = mysqli_query($con, $sql_dropdown);

                    $sql_dropdownX = "SELECT `visitor-id`, `visitor-name` FROM `table-visitor`";
                    $result_dropdownX = mysqli_query($con, $sql_dropdownX);


                ?>

                    <form method="post">

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
                        <label for="visitor-id">Choose Visitor Name:</label>
                        <select name="visitor_id" id="visitor-id" class="mb-3">
                            <?php
                            if (mysqli_num_rows($result_dropdownX) > 0) {
                                while ($rowX = mysqli_fetch_array($result_dropdownX)) {
                                    echo "<option value='{$rowX['visitor-id']}'> '{$rowX['visitor-name']}'</option>";
                                }
                            }
                            ?>
                        </select>

                        <div class="form-group">
                            <label>Enter Appointment Name: </label>
                            <input type="text" class="form-control mb-2" id="appointment-name" name="appointment_name" placeholder="Enter Appointment Name">
                        </div>


                        <label for="appointment-status">Choose Officer Status:</label>
                        <select name="appointment_status" id="appointment-status" class="mb-2">
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select>

                        <div class="form-group" class="mb-2">
                            <label>Enter Appointment Date: </label>
                            <input type="date" class="form-control mb-2" id="appointment-date" name="appointment_date" placeholder="Enter Appointment Date">
                        </div>

                        <div class="form-group" class="mb-2">
                            <label>Enter Start Time: </label>
                            <input type="time" class="form-control mb-2" id="appointment-starttime" name="appointment_starttime" placeholder="Enter Appointment Start Time">
                        </div>

                        <div class="form-group" class="mb-2">
                            <label>Enter End Time: </label>
                            <input type="time" class="form-control mb-2" id="appointment-endtime" name="appointment_endtime" placeholder="Enter Appointment End Time">
                        </div>

                        <br>
                        <br>

                        <button type="submit" name="appointment-insert_btn" class="btn btn-primary">Submit</button>
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
                            <th scope="col">OFFICER NAME</th>
                            <th scope="col">VISITOR NAME</th>
                            <th scope="col">APPOINTMENT NAME</a></th>
                            <th scope="col">STATUS</a></th>
                            <th scope="col">APPOINTMENT DATE</a></th>
                            <th scope="col">APPOINTMENT START TIME</a></th>
                            <th scope="col">APPOINTMENT END TIME</a></th>
                            <th scope="col">APPOINTMENT ADDEDON</a></th>
                            <th scope="col">EDIT</a></th>
                        </tr>
                    </thead>

                    <!-- For fetching all the data to website -->
                    <?php
                    include_once 'fetch/fetch-appointment.php';
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