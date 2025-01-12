<h3>This is Update Section.</h3>

<?php

if (isset($_GET["workdays_edit"])) {
    $workdays_edit = $_GET["workdays_edit"];
    $workdays_id = $_GET["workdays_id"];


    $sql_post = "select * from `table-workdays` where `workdays-id` = {$workdays_id}";
    $result_post = mysqli_query($con, $sql_post);

    $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
    $result_dropdown = mysqli_query($con, $sql_dropdown);

    if (mysqli_num_rows($result_post) > 0) {
        while ($row = mysqli_fetch_array($result_post)) {
?>
            <form method="post">

                <label for="officer-id">Choose Post Name:</label>
                <select name="officer_id" id="officer-id">
                    <?php
                    if (mysqli_num_rows($result_dropdown) > 0) {

                        while ($rowX = mysqli_fetch_array($result_dropdown)) { ?>
                            <option value="<?php echo $rowX["officer-id"] ?>" <?php echo ($row["workdays-officerid"] == $rowX["officer-id"]) ? 'selected' : ''; ?>><?php echo $rowX['officer-name'] ?></option>
                        <?php
                        }
                        ?>

                </select>

                <div class="form-group">
                    <label>Enter Workdays Number: </label>
                    <input type="number" class="form-control mb-2" id="workdays-dayofweek" name="workdays_dayofweek" placeholder="Enter Workdays:" value ="<?php echo $row['workdays-dayofweek'] ?>" >
                </div>
                <br>
                <br>

                <button type="submit" name="workdays-update_btn" class="btn btn-primary">Submit</button>
            </form>


<?php
                    }
                }
            }
        }
