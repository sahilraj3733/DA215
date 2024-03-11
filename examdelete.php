<?php
session_start();
if (!isset($_SESSION['sid'])) {
    header('location:login.php');
}

include 'connect.php';



if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `exam` where eid='$id'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
       
        echo "deleted Successfully";
        header('location:adminhome.php');
    }
    else {
        echo "Error in registration: " . mysqli_error($conn);
    }
}
?>
