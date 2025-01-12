<?php
$sql_post = "select `workdays-id`,`workdays-officerid`,`workdays-dayofweek`,`officer-name` from `table-workdays` JOIN `table-officer` ON `table-officer`.`officer-id`=`table-workdays`.`workdays-officerid` order by `workdays-id` desc;";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

 ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $row["officer-name"]; ?></td>
                <td><?php echo $row["workdays-dayofweek"]; ?></td>
                <td><a href="workdays.php?workdays_edit=1&workdays_id=<?php echo $row["workdays-id"];?>" class="btn btn-success" name = "workdays_edit_button">EDIT</td>   
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>