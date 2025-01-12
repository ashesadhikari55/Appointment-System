<h3>This is Update Section.</h3>

<?php

if (isset($_GET["appointment_edit"])) {
    $appointment_edit = $_GET["appointment_edit"];
    $appointment_id = $_GET["appointment_id"];

    $sql_officer = "select `officer-id`, `officer-name`,`visitor-id`,`appointment-name`,`visitor-name`,`appointment-status`,`appointment-date`,`appointment-starttime`,`appointment-endtime`,`appointment-addedon` from `table-appointment` join `table-officer` on `table-officer`.`officer-id` = `table-appointment`.`appointment-officerid` join `table-visitor` on `table-visitor`.`visitor-id` = `table-appointment`.`appointment-visitorid` where `appointment-id`= '{$appointment_id}'";
    $result_officer = mysqli_query($con, $sql_officer);


    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
    $result_dropdown = mysqli_query($con, $sql_dropdown);

    $sql_dropdownX = "SELECT `visitor-id`, `visitor-name` FROM `table-visitor`";
    $result_dropdownX = mysqli_query($con, $sql_dropdownX);


    if (mysqli_num_rows($result_officer) > 0) {
        while ($row = mysqli_fetch_array($result_officer)) {

?>

            <form method="post">

               
                <label for="officer-name" class="mb-3">Choose Officer Name:</label>
                <select name="officer_id" id="officer-id">
                    <?php
                    if (mysqli_num_rows($result_dropdown) > 0) {

                        while ($rowX = mysqli_fetch_array($result_dropdown)) { ?>
                            <option value="<?php echo $rowX["officer-id"] ?>" <?php echo ($row["officer-id"] == $rowX["officer-id"]) ? 'selected' : ''; ?>><?php echo $rowX['officer-name'] ?></option>
                        <?php
                        }
                        ?>
                </select>

                <br>
                <label for="officer-status" class="mb-3">Choose Visitor Name:</label>
                <select name="visitor_id" id="visitor-id">
                    <?php
                        if (mysqli_num_rows($result_dropdownX) > 0) {

                            while ($rowX = mysqli_fetch_array($result_dropdownX)) { ?>
                            <option value="<?php echo $rowX["visitor-id"] ?>" <?php echo ($row["visitor-id"] == $rowX["visitor-id"]) ? 'selected' : ''; ?>><?php echo $rowX['visitor-name'] ?></option>
                        <?php
                            }
                        ?>

                </select>

                <div class="form-group">
                    <label>Enter Appointment Name: </label>
                    <input type="text" class="form-control mb-2" id="appointment-name" name="appointment_name" placeholder="Enter Appointment Name" value="<?php echo $row["appointment-name"] ?>">
                </div>


                <br>

                <label for="appointment-status">Choose Officer Status:</label>
                <select name="appointment_status" id="appointment-status">
                    <option value="1" <?php echo ($row["appointment-status"] == 1) ? 'selected' : ''; ?>>Activate</option>
                    <option value="0" <?php echo ($row["appointment-status"] == 0) ? 'selected' : ''; ?>>Deactivate</option>
                </select>

                <div class="form-group">
                    <label>Appointment Date: </label>
                    <input type="datetime-local" class="form-control mb-2" id="appointment-date" name="appointment_date" placeholder="Enter Appointment Date: " value="<?php echo $row["appointment-date"] ?>" >
                </div>

                <div class="form-group">
                    <label>Appointment Start Time: </label>
                    <input type="datetime-local" class="form-control mb-2" id="appointment-starttime" name="appointment_starttime" placeholder="Enter Appointment Start Time: " value="<?php echo $row["appointment-starttime"] ?>" >
                </div>

                <div class="form-group">
                    <label>Appointment End Time: </label>
                    <input type="datetime-local" class="form-control mb-2" id="appointment-endtime" name="appointment_endtime" placeholder="Enter Appointment End Time: " value="<?php echo $row["appointment-endtime"] ?>" >
                </div>


                <br>
                <br>

                <button type="submit" name="appointment-update_btn" class="btn btn-primary">Submit</button>
            </form>

<?php
                        }
                    }
                }
            }
        }
