<?php

//----------------------------------------------------------------------------//
//----------------- POST--------------------------//
//------------------------------------------------------------------------//

// for post insert button
if (isset($_POST['post-insert_btn'])) {
  $name = $_POST['post_name'];
  $status = $_POST['post_status'];
 
  $sql = "insert into `table-post` (`post-name`,`post-status`) values('$name', '$status')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:post.php?inserted=1");
  } else {
    header("location:post.php?inserted=0");
  }
}


// for post update button
if (isset($_POST['post-update_btn'])) {
  $id = $_GET["post_id"];
  $name = $_POST['post_name'];
  $status = $_POST["post_status"];

  $sql = "UPDATE `table-post`
SET `post-name` = '$name', `post-status` = '$status'
WHERE `post-id` = '$id';";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:post.php?updated=1");
  } else {
    header("location:post.php?updated=0");
  }
}


//----------------------------------------------------------------------------//
//----------------- VISITOR --------------------------//
//------------------------------------------------------------------------//

// for visitor insert button
if (isset($_POST['visitor-insert_btn'])) {
  $name = $_POST['visitor_name'];
  $mobile = $_POST['visitor_mobileNo'];
  $email = $_POST['visitor_email'];
  $status = $_POST["visitor_status"];

  $status = $_POST['visitor_status'];

  $sql = "insert into `table-visitor` (`visitor-name`,`visitor-mobile`,`visitor-email`, `visitor-status`) values('$name', '$mobile','$email','$status')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:visitor.php?inserted=1");
  } else {
    header("location:visitor.php?inserted=0");
  }
}


// for visitor update button
if (isset($_POST['visitor-update_btn'])) {
  $id = $_GET["visitor_id"];
  $name = $_POST['visitor_name'];
  $mobile = $_POST['visitor_mobileNo'];
  $email = $_POST['visitor_email'];
  $status = $_POST["visitor_status"];

  $status = $_POST['visitor_status'];
  $sql = "UPDATE `table-visitor`
SET `visitor-name` = '$name', `visitor-mobile` = '$mobile', `visitor-email` = '$email', `visitor-status` = '$status'
WHERE `visitor-id` = '$id';";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:visitor.php?updated=1");
  } else {
    header("location:visitor.php?updated=0");
  }
}



//----------------------------------------------------------------------------//
//----------------- Officer --------------------------//
//------------------------------------------------------------------------//

// for officer insert button
if (isset($_POST['officer-insert_btn'])) {
  $name = $_POST['officer_name'];
  $post = $_POST['post_name'];
  $status = $_POST['officer_status'];
  $workstarttime = $_POST['officer_workstarttime'];
  $workendtime = $_POST["officer_workendtime"];

  $sql = "insert into `table-officer` (`officer-name`,`officer-postid`,`officer-status`, `officer-workstarttime`, `officer-workendtime`) values('$name', '$post','$status','$workstarttime', '$workendtime')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:officer.php?inserted=1");
  } else {
    header("location:officer.php?inserted=0");
  }
}


// for officer update button
 if (isset($_POST['officer-update_btn']))
 {
  $id = $_GET["officer_id"];
  $name = $_POST['officer_name'];
  $post = $_POST['post_id'];
  $status = $_POST['officer_status'];
  $starttime =  $_POST['officer_workstarttime'];
  $endtime = $_POST['officer_workendtime'];

  $sql = "UPDATE `table-officer`
  SET `officer-name` = '$name', `officer-postid` = '$post', `officer-status` = '$status', `officer-workstarttime` = '$starttime', `officer-workendtime` = '$endtime' WHERE `officer-id` = '$id';";

$result = mysqli_query($con, $sql);

if ($result) {
  header("location:officer.php?updated=1");
} else {
  header("location:officer.php?updated=0");
}

}
 

//----------------------------------------------------------------------------//
//----------------- Workdays  --------------------------//
//------------------------------------------------------------------------//

// for workdays insert button
if (isset($_POST['workdays-insert_btn'])) {
  $id = $_POST['officer_id'];
  $dayofweek = $_POST['workdays_dayofweek'];
  $sql = "insert into `table-workdays` (`workdays-officerid`,`workdays-dayofweek`) values('$id', '$dayofweek')";
  $result = mysqli_query($con, $sql);


  if ($result) {
    header("location:workdays.php?inserted=1");
  } else {
    header("location:workdays.php?inserted=0");
  }
}

// for workdays update button
if (isset($_POST['workdays-update_btn']))
{
 $id = $_GET["workdays_id"];
 $officerid = $_POST['officer_id'];
 $day = $_POST['workdays_dayofweek'];
 
 $sql = "UPDATE `table-workdays` SET `workdays-officerid` = '$officerid', `workdays-dayofweek` = '$day' WHERE `workdays-id` = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
 header("location:workdays.php?updated=1");
} else {
 header("location:workdays.php?updated=0");
}

}

//----------------------------------------------------------------------------//
//----------------- Appointment  --------------------------//
//------------------------------------------------------------------------//


// for workdays insert button
if (isset($_POST['appointment-insert_btn'])) {
  $officerid = $_POST['officer_id'];
  $visitorid = $_POST['visitor_id'];
  $name = $_POST['appointment_name'];
   $status = $_POST['appointment_status'];
  $appointmentdate = $_POST['appointment_date'];
  $starttime = $_POST['appointment_starttime'];
  $endtime = $_POST['appointment_endtime'];
  $addedon = date('Y-m-d\TH:i:s');  
  
  $dayofweek = $_POST['workdays_dayofweek'];

  $sql = "INSERT INTO `table-appointment` (`appointment-officerid`, `appointment-visitorid`, `appointment-name`, `appointment-status`, `appointment-date`, `appointment-starttime`, `appointment-endtime`, `appointment-addedon`) 
VALUES ('$officerid', '$visitorid', '$name', '$status', '$appointmentdate', '$starttime', '$endtime', '$addedon');";
  $result = mysqli_query($con, $sql);

  if ($result) {
    header("location:appointment.php?inserted=1");
  } else {
    header("location:appointment.php?inserted=0");
  }
}

// for workdays update button
if (isset($_POST['appointment-update_btn'])) {
  $id = $_GET["appointment_id"];
  $officerid = $_POST['officer_id'];
  $visitorid = $_POST['visitor_id'];
  $name = $_POST['appointment_name'];
  $status = $_POST['appointment_status'];
  $appointmentdate = $_POST['appointment_date'];
  $starttime = $_POST['appointment_starttime'];
  $endtime = $_POST['appointment_endtime'];
  $addedon = date('Y-m-d\TH:i:s');  
  
 $sql = "UPDATE `table-appointment`
  SET `appointment-officerid` = '$officerid', `appointment-visitorid` = '$visitorid',`appointment-name` = '$name', `appointment-status`= '$status', `appointment-date` = '$appointmentdate', `appointment-starttime` = '$starttime', `appointment-endtime` = '$endtime', `appointment-addedon`= '$addedon'  WHERE `appointment-id` = '$id';";

  $result = mysqli_query($con, $sql);

  if ($result) {
    header("location:appointment.php?updated=1");
  } else {
    header("location:appointment.php?updated=0");
  }
}
