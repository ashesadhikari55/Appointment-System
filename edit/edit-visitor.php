<h3>This is Update Section of Visitors.</h3>

<?php

if (isset($_GET["visitor_edit"])) {
    $visitor_edit = $_GET["visitor_edit"];
    $visitor_id = $_GET["visitor_id"];


    $sql_visitor = "select * from `table-visitor` where `visitor-id` = {$visitor_id}";
    $result_visitor = mysqli_query($con, $sql_visitor);

    if (mysqli_num_rows($result_visitor) > 0) {
        while ($row = mysqli_fetch_array($result_visitor)) {
?>
            <form method="post">
                <div class="form-group">
                    <label>Enter Visitor Name: </label>
                    <input type="text" class="form-control mb-2" id="visitor-name" name="visitor_name" placeholder="Enter Visitor Name" value="<?php echo $row["visitor-name"] ?>">
                </div>
                <div class="form-group">
                    <label>Enter Visitor Mobile No: </label>
                    <input type="tel" class="form-control mb-2" id="visitor-mobileNo" name="visitor_mobileNo" placeholder="Enter Visitor Mobile No" value="<?php echo $row["visitor-mobile"] ?>">
                </div>
                <div class="form-group">
                    <label>Enter Visitor Email Address: </label>
                    <input type="email" class="form-control mb-2" id="visitor-email" name="visitor_email" placeholder="Enter Visitor Email" value="<?php echo $row["visitor-email"] ?>">
                </div>
                <label for="visitor-status">Choose Post Status:</label>
                <select name="visitor_status" id="visitor-status">
                <option value = "1" <?php echo ($row["visitor-status"] == 1) ? 'selected' : ''; ?>>Activate</option>
                <option value="0" <?php echo ($row["visitor-status"] == 0) ? 'selected' : ''; ?>>Deactivate</option>
                </select>

                <br>
                <br>

                <button type="submit" name="visitor-update_btn" class="btn btn-primary">Submit</button>
            </form>



<?php
        }
    }
}

?>