<?php
include 'connect.php';
session_start();
 // Replace 123 with the actual user ID or any value you want to store

// Retrieve and use the session variable


// Output the session variable

if((isset($_GET['examid']))){
    $Eid = $_GET['examid'];
    
}
$_SESSION['eid'] = $Eid;
$exID = $_SESSION['eid'];


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
//     $qid = $_POST['id'];
//     $Ename = $_POST['name'];
//     $fee = $_POST['fee'];

//     $sql = "select * from `exam` where eid='$eid'";
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         $num = mysqli_num_rows($result);
//         if ($num > 0) {
//             echo "Exam already exists";
//         } else {
//             $sql = "insert into `question` (qid,qcontent,qsolution,diffculty,qexp) values ('$eid', '$Ename', '$fee')";
//             $result = mysqli_query($conn, $sql);
//             header('location:adminhome.php');
//            // echo "Added Successfully";
//             if (!$result) {
//                 die(mysqli_error($conn));
//             }
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<div class="container">
        
        <header>
            <div class="navContainer">
                <nav>
                    <ul id="navList">
                        <li>
                            <p id="navLogo">Exam system</p>
                        </li>
                        <li>
                            <div id="navItems">
                                
                                <p>Hello 
                                <?php echo $_SESSION['sid']; ?> </p>
                                <!-- <a href="examreg.php">Exam Registration</a> -->
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
   
   
    
   
   
    </div>
    <div class="mid">
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Question ID    </th>
      <th scope="col">Content   </th>
      <!-- <th scope="col">Solution   </th>
      <th scope="col">Diffculty</th>
      <th scope="col">Qexp</th>
      <th scope="col">operation</th> -->
    </tr>
  </thead>
  <tbody>
   <?php

   $sql="select * from `has_questions` where eid='$exID'";
   $result=mysqli_query($conn,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result)){
        $eid=$row['eid'];
        $qid=$row['qid'];
        // $content=$row['qcontent'];
        // $solution=$row['qsolutions'];
        // $diffculty=$row['difficulty'];
        // $exp=$row['qexp'];
         // <td>'.$content.'</td>
            // <td>'.$solution.'</td>
            // <td>'.$diffculty.'</td>
            // <td>'.$exp.'</td>
        echo  '<tr>
            <th scope="row">'.$eid.'</th>
           
            <td>'.$qid.'</td>

            <td>
            <button > <a href="questiondelete.php?deletqid='.$qid.' ">Delete</a></button>
            
            </td>
          </tr>';
      
    }
   }
//    <button><a href="addquestion.php?exid='.$Eid.'">Add Question</a></button>
echo $Eid;
   ?>
   <a href="adminhome.php">Home page</a>

   <a href="addquestion.php">Add Question</a>

    



  </tbody>
  
</table>
    </div>

</body>
</html>

    
</body>
</html>