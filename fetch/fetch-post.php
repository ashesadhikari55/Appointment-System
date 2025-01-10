<?php
$sql_post = "select * from `table-post` order by `post-id` desc";
$result_post = mysqli_query($con, $sql_post);
$post_counter = 0;
if (mysqli_num_rows($result_post) > 0) {
    while ($row = mysqli_fetch_array($result_post)) {

$status = (($row["post-status"]) == 1) ? ('Activate') : ('Deactivate');

 ?>
        <tbody>
            <tr>
                <th scope="row"><?php echo ++$post_counter ?></th>
                <td><?php echo $row["post-name"]; ?></td>
                <td><?php echo $status ?></td>
                <td><a href="post.php?post_edit=1&post_id=<?php echo $row["post-id"];?>" class="btn btn-success" name = "post_edit_button">EDIT</td>   
            </tr>
        </tbody>
<?php

    }
    mysqli_next_result($con);
} else {
    echo "This list is empty";
}

?>