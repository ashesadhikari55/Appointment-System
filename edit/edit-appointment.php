<h3>This is Update Section.</h3>

<?php

if (isset($_GET["appointment_edit"])) {
    $appointment_edit = $_GET["appointment_edit"];
    $appointment_id = $_GET["appointment_id"];

    $sql_officer = "select `officer-id`, `officer-name`,`visitor-id`,`visitor-name`,`appointment-status`,`appointment-date`,`appointment-starttime`,`appointment-endtime`,`appointment-addedon` from `table-appointment` join `table-officer` on `table-officer`.`officer-id` = `table-appointment`.`appointment-officerid` join `table-visitor` on `table-visitor`.`visitor-id` = `table-appointment`.`appointment-visitorid` where `appointment-id`= '{$appointment_id}'";
    $result_officer = mysqli_query($con, $sql_officer);


    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
    $result_dropdown = mysqli_query($con, $sql_dropdown);

    $sql_dropdownX = "SELECT `visitor-id`, `visitor-name` FROM `table-visitor`";
    $result_dropdownX = mysqli_query($con, $sql_dropdownX);


    if (mysqli_num_rows($result_officer) > 0) {
        while ($row = mysqli_fetch_array($result_officer)) {

?>

            <form method="post">

            <input type="hidden" value="<?php         ?>">
                <div class="form-group">
                    <label>Enter Officer Name: </label>
                    <input type="text" class="form-control mb-2" id="officer-name" name="officer_name" placeholder="Enter Officer Name" value="<?php echo $row["officer-name"] ?>">
                </div>

                <label for="officer-name">Choose Post Name:</label>
                <select name="officer_id" id="officer-id">
                    <?php
                    if (mysqli_num_rows($result_dropdown) > 0) {

                        while ($rowX = mysqli_fetch_array($result_dropdown)) { ?>
                            <option value="<?php echo $rowX["officer-id"] ?>" <?php echo ($row["officer-id"] == $rowX["officer-id"]) ? 'selected' : ''; ?>><?php echo $rowX['officer-name'] ?></option>  
                       <?php 
                        }
                        ?>
                </select>

                <select name="visitor_id" id="visitor-id">
                    <?php
                    if (mysqli_num_rows($result_dropdownX) > 0) {

                        while ($rowX = mysqli_fetch_array($result_dropdownX)) { ?>
                            <option value="<?php echo $rowX["visitor-id"] ?>" <?php echo ($row["visitor-id"] == $rowX["visitor-id"]) ? 'selected' : ''; ?>><?php echo $rowX['visitor-name'] ?></option>  
                       <?php 
                        }
                        ?>

                </select>

                <label for="officer-status">Choose Officer Status:</label>
                <select name="officer_status" id="officer-status">
                    <option value = "1" <?php echo ($row["officer-status"] == 1) ? 'selected' : ''; ?>>Activate</option>
                    <option value = "0" <?php echo ($row["officer-status"] == 0) ? 'selected' : ''; ?>>Deactivate</option>
                </select>

                <div class="form-group">
                    <label>Enter Work Start Time: </label>
                    <input type="datetime-local" class="form-control mb-2" id="officer-workstarttime" name="officer_workstarttime" placeholder="Enter Visitor Work Start Time" value="<?php echo $row["officer-workstarttime"] ?>">
                </div>


                <div class="form-group">
                    <label>Enter Work End Time: </label>
                    <input type="datetime-local" class="form-control mb-2" id="officer-workendtime" name="officer_workendtime" placeholder="Enter Visitor Work End Time" value="<?php echo $row["officer-workendtime"] ?>">
                </div>

                <br>
                <br>

                <button type="submit" name="officer-update_btn" class="btn btn-primary">Submit</button>
            </form>
<?php
                    }
                }
            }
        }
?>