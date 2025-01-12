<?php
@include "_header.php";
@include 'process.php';
?>

<div class="container">

    <h3 class="text-center mt-5">Welcome to the Workdays Section</h3>

    <div class="row">
        <div class="col-5 mr-auto">
            <?php
            if (isset($_SESSION['status']) && $_SESSION['status'] != "") {
                echo $_SESSION['status'];
                unset($_SESSION['status']);
            }

            ?>
        </div>
    </div>

</div>



<!----------------------------------->
<!-- INSERT AND UPDATE WORKDAYS SECTION -->
<!----------------------------------->

<div class="container">
    <div class="row">
        <div class="col">

            <?php
            if (isset($_GET["workdays_edit"])) {

                include_once 'edit/edit-workdays.php';
            } else {
                $sql_dropdown = "SELECT `officer-id`, `officer-name` FROM `table-officer`";
                $result_dropdown = mysqli_query($con, $sql_dropdown);
            ?>

                <form method="post">

                    <label for="officer-id">Choose Officer Name:</label>
                    <select name="officer_id" id="officer-id">
                        <?php
                        if (mysqli_num_rows($result_dropdown) > 0) {
                            while ($row = mysqli_fetch_array($result_dropdown)) {
                                echo "<option value='{$row['officer-id']}'> '{$row['officer-name']}'</option>";
                            }
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label>Enter Work Days: </label>
                        <input type="number" class="form-control mb-2" id="workdays-dayofweek" name="workdays_dayofweek" placeholder="Enter Work Days: ">
                    </div>

                    <br>
                    <br>

                    <button type="submit" name="workdays-insert_btn" class="btn btn-primary">Submit</button>
                </form>

            <?php
            }
            ?>
        </div>
    </div>
</div>

<!----------------------------------->
<!--########### FETCH WORKDAYS SECTION -->
<!----------------------------------------->
 
<div class="container">
    <h3 class="text-center mt-3 mb-4">List of all Work Days.</h3>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">OFFICER NAME</th>
                        <th scope="col">DAY OF WEEK</th>
                        <th scope="col">EDIT</th>
                    </tr>
                </thead>

                <!-- For fetching all the data to website -->
                <?php
                include_once 'fetch/fetch-workdays.php';
                ?>
            </table>
            <?php

            ?>
        </div>
    </div>
</div>

<?php  
@include "_footer.php"

?>