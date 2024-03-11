<?php
session_start();
if(!isset($_SESSION['sid'])){
    header('location:login.php');
}
include "connect.php";
echo $_SESSION['sid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        /* .table{
            margin-top:130px;
            display:flex;
            justify-content: space-around;
            
        } */

    </style>
    
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Exam ID    </th>
      <th scope="col">Exam Name   </th>
      <th scope="col">Fees   </th>
      <th scope="col">Register</th>
    </tr>
  </thead>
  <tbody>
   <?php

   $sql="select * from `exam`";
   $result=mysqli_query($conn,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result)){
        $eid=$row['eid'];
        $ename=$row['ename'];
        $fees=$row['fees'];
        echo  '<tr>
            <th scope="row">'.$eid.'</th>
            <td>'.$ename.'</td>
            <td>'.$fees.'</td>
            <td><button > <a href="pay.php?e_id='.$eid.' ">Pay</a></button></td>
          </tr>';
      
    }
   }
   ?>
    



  </tbody>
  
</table>
</body>
</html>