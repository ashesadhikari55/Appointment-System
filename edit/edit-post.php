<h3>This is Update Section.</h3>

<?php

if (isset($_GET["post_edit"])) {
    $post_edit = $_GET["post_edit"];
    $post_id = $_GET["post_id"];
    

    $sql_post = "select * from `table-post` where `post-id` = {$post_id}";
    $result_post = mysqli_query($con, $sql_post);

    if (mysqli_num_rows($result_post) > 0) {
        while ($row = mysqli_fetch_array($result_post)) {
?>
            <form method="post">
                <div class="form-group">
                    <label>Enter Post Name: </label>
                    <input type="text" class="form-control mb-2" id="post-name" name="post_name" placeholder="Enter Post Name" value="<?php echo $row["post-name"] ?>">
                </div>
            

                <label for="post-status">Choose Post Status:</label>
                <select name="post_status" id="post-status">
                    <option value = "1" <?php echo ($row["post-status"] == 1) ? 'selected' : ''; ?>>Activate</option>
                    <option value="0" <?php echo ($row["post-status"] == 0) ? 'selected' : ''; ?>>Deactivate</option>
                </select>

                <br>
                <br>

                <button type="submit" name="post-update_btn" class="btn btn-primary">Submit</button>
            </form>



<?php
        }
    }
}

?>