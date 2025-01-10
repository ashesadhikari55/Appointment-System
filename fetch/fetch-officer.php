<?php
$sql_post = "select `officer-id`, `officer-name`,`post-name`,`officer-status`,`officer-workstarttime`,`officer-workendtime` from `table-officer`join `table-post` on `table-post`.`post-id` = `table-officer`.`officer-postid` order by `officer-id` desc;";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

        $status = (($row["officer-status"]) == 1) ? ('Activate') : ('Deactivate');

?>
        <tbody>
            <tr>
                
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $row["officer-name"]; ?></td>
                <td><?php echo $row["post-name"]; ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $row["officer-workstarttime"]; ?></td>
                <td><?php echo $row["officer-workendtime"]; ?></td>
                <td><a href="officer.php?officer_edit=1&officer_id=<?php echo $row["officer-id"]; ?>" class="btn btn-success" name="officer_edit_button">EDIT</td>
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>