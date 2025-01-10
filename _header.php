<?php
    session_start();
  
    include 'connection.php';


    
// Flash Cards


if (isset($_GET["updated"])) {
    $myvalue = $_GET["updated"];
  
    if ($_GET["updated"] == 1) {
        $_SESSION['status'] = '<div class="alert alert-success" role="alert">
        Post Updated Successfully!
        </div>';
    } else if ($_GET["updated"] == 0) {
        $_SESSION['status'] = '<div class="alert alert-warning" role="alert">
        Post Not Updated Successfully
      </div>';
    }
  }
  
  
  if (isset($_GET["inserted"])) {
    $myvalue = $_GET["inserted"];
  
    if ($_GET["inserted"] == 1) {
        $_SESSION['status'] = '<div class="alert alert-success" role="alert">
        Post Inserted Successfully!
        </div>';
    } else if ($_GET["inserted"] == 0) {
        $_SESSION['status'] = '<div class="alert alert-warning" role="alert">
        Post Not Inserted Successfully
      </div>';
    }
  }
  
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor\twbs\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="nav-link h4 px-3 text-white" href="index.php">HOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="activity.php">ACTIVITY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="appointment.php">APPOINTMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="officer.php">OFFICER</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="post.php">POST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="visitor.php">VISITOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h4 px-3" href="workdays.php">WORKDAYS</a>
                    </li>
                </ul>
               
            </div>
        </div>
    </nav>