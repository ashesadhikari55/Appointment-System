<h3>This is Update Section.</h3>

<?php

if (isset($_GET["officer_edit"])) {
    $officer_edit = $_GET["officer_edit"];
    $officer_id = $_GET["officer_id"];


    $sql_officer = "select `officer-id`, `officer-name`,`post-id`,`post-name`,`officer-status`,`officer-workstarttime`,`officer-workendtime` from `table-officer` join `table-post` on `table-post`.`post-id` = `table-officer`.`officer-postid` where `officer-id`= '{$officer_id}'";
    $result_officer = mysqli_query($con, $sql_officer);


    $sql_dropdown = "SELECT `post-id`, `post-name` FROM `table-post`";
    $result_dropdown = mysqli_query($con, $sql_dropdown);

    if (mysqli_num_rows($result_officer) > 0) {
        while ($row = mysqli_fetch_array($result_officer)) {

?>

            <form method="post">

            <input type="hidden" value="<?php         ?>">
                <div class="form-group">
                    <label>Enter Officer Name: </label>
                    <input type="text" class="form-control mb-2" id="officer-name" name="officer_name" placeholder="Enter Officer Name" value="<?php echo $row["officer-name"] ?>">
                </div>

                <label for="post-name">Choose Post Name:</label>
                <select name="post_id" id="post-id">
                    <?php
                    if (mysqli_num_rows($result_dropdown) > 0) {

                        while ($rowX = mysqli_fetch_array($result_dropdown)) { ?>
                            <option value="<?php echo $rowX["post-id"] ?>" <?php echo ($row["post-id"] == $rowX["post-id"]) ? 'selected' : ''; ?>><?php echo $rowX['post-name'] ?></option>  
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