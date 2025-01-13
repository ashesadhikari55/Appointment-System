<h3>This is Update Section.</h3>

<?php

if (isset($_GET["activity_edit"])) {
    $activity_edit = $_GET["activity_edit"];
    $activity_id = $_GET["activity_id"];

    $sql_activity = "select `activity-id`,`activity-type`,`activity-officerid`,`officer-id`,`officer-name`,`activity-startdate`,`activity-starttime`,`activity-enddate`,`activity-endtime`,`activity-status` from `table-activity` join `table-officer` on `table-officer`.`officer-id` = `table-activity`.`activity-officerid` where `activity-id` = '{$activity_id}'";
    $result_activity = mysqli_query($con, $sql_activity);


    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
    $result_dropdown = mysqli_query($con, $sql_dropdown);

    if (mysqli_num_rows($result_activity) > 0) {
        while ($row = mysqli_fetch_array($result_activity)) {

?>

            <form method="post">

                <label for="activity-type" class="mb-3">Choose Activity Type:</label>
                <select name="activity_type" id="activity-type">
                    <option value="1" <?php echo ($row["activity-type"] == 1) ? 'selected' : ''; ?>>Leave</option>
                    <option value="2" <?php echo ($row["activity-type"] == 2) ? 'selected' : ''; ?>>Break</option>
                    <option value="3" <?php echo ($row["activity-type"] == 3) ? 'selected' : ''; ?>>Appointment</option>
                </select>

                <br>

                <label for="officer-id">Choose Officer Name:</label>
                <select name="officer_id" id="officer-id" class="mb-3">
                    <?php
                    if (mysqli_num_rows($result_dropdown) > 0) {
                        while ($rowX = mysqli_fetch_array($result_dropdown)) {  ?>
                            <option value="<?php echo $rowX["officer-id"] ?>" <?php echo ($row["officer-id"] == $rowX["officer-id"]) ? 'selected' : ''; ?>><?php echo $rowX['officer-name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <br>

                <div class="form-group" class="mb-2">
                    <label>Enter Activity Start Date: </label>
                    <input type="date" class="form-control mb-2" id="activity-startdate" name="activity_startdate" placeholder="Enter Activity Start Date: " value="<?php echo $row["activity-startdate"] ?>">
                </div>

                <div class="form-group" class="mb-2">
                    <label>Enter Activity Start Time: </label>
                    <input type="time" class="form-control mb-2" id="activity-starttime" name="activity_starttime" placeholder="Enter Activity Start Time : " value="<?php echo $row["activity-starttime"] ?>">
                </div>

                <div class="form-group" class="mb-2">
                    <label>Enter Activity End Date: </label>
                    <input type="date" class="form-control mb-2" id="activity-enddate" name="activity_enddate" placeholder="Enter Activity End Date: " value="<?php echo $row["activity-enddate"] ?>">
                </div>

                <div class="form-group" class="mb-2">
                    <label>Enter Activity End Time: </label>
                    <input type="time" class="form-control mb-2" id="activity-endtime" name="activity_endtime" placeholder="Enter Activity End Time : " value="<?php echo $row["activity-endtime"] ?>">
                </div>

                <label for="activity-status">Choose Activity Status:</label>
                <select name="activity_status" id="activity-status">
                    <option value="1">Activate</option>
                    <option value="0">Cancelled</option>
                </select>

                <br>
                <br>

                <button type="submit" name="activity-update_btn" class="btn btn-primary">Submit</button>
            </form>


<?php
        }
    }
}
?>