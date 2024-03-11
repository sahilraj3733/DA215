<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $name=$_POST['name'];
    $user1=$_POST['user'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $role=$_POST['role'];
    

    
    $sql="select * from `users` where sid='$user1'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            echo "user already exist";
        }
        else{
           
            if($role=='Student'){
                $sql="insert into `student`(sid,sname,phno) values('$user1','$name','$phone')";
                $result=mysqli_query($conn,$sql);
                if(!$result){
                    die(mysqli_error(conn));
                }
            }
            
            
            $sql="insert into `users`(name,sid,password_data,role) values('$name','$user1','$password','$role')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "signup sucessfuly";
                }
    else{
        die(mysqli_error(conn));
    }
        }
    }
}
?>




<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Sign up</title>
    
</head>
<body>
    <div class="container" >
        <form action='signup.php' method ='post' >

             
            <label>Name :</label>
            <input type="text" name='name'>
            <br><br>
            <label>User Name:</label>
            <input type="text" name='user'>
            <br><br>
            <label>Password :</label>
            <input type="text" name='password'>
            <br><br>
            <label>Phone No :</label>
            <input type="int" name='phone'>
            <br><br>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
                
            </select>

            <button>Sign up</button>
        </form>

        <a href="login.php">Log IN</a>
    </div>
    
</body>
</html>