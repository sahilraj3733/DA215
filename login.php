<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $user1=$_POST['user'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    

    $sql="select * from `users` where sid='$user1' and password_data='$password' and role='$role'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "login successfuly";
            session_start();
            $_SESSION['sid']=$user1;
            if($role=='Student'){
                header('location:home.php');
            }
            else{
                header('location:adminhome.php');
            }
            
        }
        else{
           echo "invalid data";
   
        }
    }
 }

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Login</title>
    
</head>
<body>
    <div class="container" >
        <form action='login.php' method ='post' >

             
            
            <label>User Name:</label>
            <input type="text" name='user'>
            <br><br>
            <label>Password :</label>
            <input type="text" name='password'>
            <br><br>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
            <button>login</button>

            <a href="signup.php">Create Account</a>
        </form>
    </div>
    
</body>
</html>