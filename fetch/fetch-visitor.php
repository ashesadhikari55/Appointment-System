<?php
$sql_post = "select * from `table-visitor` order by `visitor-id` desc";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

$status = (($row["visitor-status"]) == 1) ? ('Activate') : ('Deactivate');

 ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $row["visitor-name"]; ?></td>
                <td><?php echo $row["visitor-mobile"]; ?></td>
                <td><?php echo $row["visitor-email"]; ?></td>
                <td><?php echo $status ?></td>
                <td><a href="visitor.php?visitor_edit=1&visitor_id=<?php echo $row["visitor-id"];?>" class="btn btn-success" name = "visitor_edit_button">EDIT</td>   
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>