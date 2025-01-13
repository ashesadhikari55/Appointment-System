<?php
$sql_post = "select `activity-id`,`activity-type`,`activity-officerid`,`officer-name`,`activity-startdate`,`activity-starttime`,`activity-enddate`,`activity-endtime`,`activity-status` from `table-activity` join `table-officer` on `table-officer`.`officer-id` = `table-activity`.`activity-officerid` order by `activity-id` desc;";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

        $status = (($row["activity-status"]) == 1) ? ('Activate') : ('Cancelled');

        if ($row["activity-type"] == 1) {
            $type = "Leave";
        } else if ($row["activity-type"] == 2) {
            $type = "Break";
        } else {
            $type = "Appointment";
        }

?>
        <tbody>
            <tr>
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $type ?></td>
                <td><?php echo $row["officer-name"]; ?></td>
                <td><?php echo $row["activity-startdate"]; ?></td>
                <td><?php echo $row["activity-starttime"]; ?></td>
                <td><?php echo $row["activity-enddate"]; ?></td>
                <td><?php echo $row["activity-endtime"]; ?></td>
                <td><?php echo $status ?></td>
                <td><a href="activity.php?activity_edit=1&activity_id=<?php echo $row["activity-id"]; ?>" class="btn btn-success" name="activity_edit_button">EDIT</td>
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>