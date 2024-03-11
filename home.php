<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['sid'])){
    header('location:login.php');
}


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
                                <a href="examreg.php">Exam Registration</a>
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
      <th scope="col"> Registered Exam    </th>
      
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>
   <?php
     $t=$_SESSION['sid'];
   $sql="select * from `register` where sid= '$t'";
   $result=mysqli_query($conn,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result)){
        $eid=$row['eid'];
        
        
        echo  '<tr>
            <th scope="row">'.$eid.'</th>
           


             <td>
             <button > <a href="Start.php?start='.$eid.' ">Start</a></button>
            
            </td>
          </tr>';
      
    }
   }
   ?>
   <a href="adminhome.php">Home page</a>
    



  </tbody>
  
</table>
    </div>

</body>
</html>

    
</body>
</html>