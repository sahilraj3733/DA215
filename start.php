<?php
include 'connect.php';

if (isset($_GET['start'])) {
    $exaid = $_GET['start'];
}

$_SESSION['exid'] = $exaid;
$examID = $_SESSION['exid'];

$sql = "SELECT question.* FROM question JOIN has_questions ON question.qid = has_questions.qid WHERE has_questions.eid = '$examID'";
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if "eid" key exists in $row array before accessing it
        $eid = isset($row['eid']) ? $row['eid'] : 'N/A';
        $qcontent = $row['qcontent'];

        echo  $eid  ,$qcontent ;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action="">
        <label></label>
    </form>
    
    
</body>
</html>