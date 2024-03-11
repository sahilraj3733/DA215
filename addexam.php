<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $eid = $_POST['eid'];
    $Ename = $_POST['name'];
    $fee = $_POST['fee'];

    $sql = "select * from `exam` where eid='$eid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Exam already exists";
        } else {
            $sql = "insert into `exam` (eid, ename, fees) values ('$eid', '$Ename', '$fee')";
            $result = mysqli_query($conn, $sql);
            header('location:adminhome.php');
           // echo "Added Successfully";
            if (!$result) {
                die(mysqli_error($conn));
            }
        }
    }
}
?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    
    <title>Exam</title>
    
</head>
<body>
    <div class="container" >
        <form action='addexam.php' method ='post' >

             
            
            <label>Exam ID:</label>
            <input type="text" name='eid'>
            <br><br>
            <label>Exam Name :</label>
            <input type="text" name='name'>
            <br><br>
            <label >Fee</label>
            <input type="int" name='fee'>

            <button>Add </button>
        </form>
    </div>
    
</body>
</html>