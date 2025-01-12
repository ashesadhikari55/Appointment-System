<?php
$sql_post = "select `appointment-id`, `officer-id`,`officer-name`,`visitor-id`,`visitor-name`,`appointment-name`,`appointment-status`,`appointment-date`,`appointment-starttime`,`appointment-endtime`,`appointment-addedon` from `table-appointment`join `table-officer` on `table-officer`.`officer-id` = `table-appointment`.`appointment-officerid` JOIN `table-visitor` on `table-visitor`.`visitor-id` = `table-appointment`.`appointment-visitorid` order by `appointment-id` desc;";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

        $status = (($row["appointment-status"]) == 1) ? ('Activate') : ('Deactivate');

?>
        <tbody>
            <tr>
                
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $row["officer-name"]; ?></td>
                <td><?php echo $row["visitor-name"]; ?></td>
                <td><?php echo $row["appointment-name"]; ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $row["appointment-date"]; ?></td>
                <td><?php echo $row["appointment-starttime"]; ?></td>
                <td><?php echo $row["appointment-endtime"]; ?></td>
                <td><?php echo $row["appointment-addedon"]; ?></td>
                <td><a href="appointment.php?appointment_edit=1&appointment_id=<?php echo $row["appointment-id"]; ?>" class="btn btn-success" name="appointment_edit_button">EDIT</td>
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>