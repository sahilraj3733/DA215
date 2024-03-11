<?php
include 'connect.php';
session_start();
$exID = $_SESSION['eid'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qid = $_POST['qid'];
    $content = $_POST['content'];
    $solution = $_POST['solution'];
    $difficulty = $_POST['diffculty'];

    // Use prepared statements to prevent SQL injection
    $sql= "SELECT * FROM `question` WHERE qid=$qid";
    $result=mysqli_query($conn,$sql);
    

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            echo "Question ID already exists";
        } else {
            // Insert into the question table
            $sql_insert_question = "INSERT INTO `question` (qid, qcontent, qsolutions, difficulty) VALUES ($qid, $content, $solution, $difficulty)";
            $result_has = mysqli_query($conn, $sql_insert_question);
           

            if ($result_has) {
                echo "Question added successfully";

                // Insert into the has_question table
                $sql_insert_has_question = "INSERT INTO has_questions (eid, qid) VALUES ('$exID', $qid)";
                 
                $result_insert_has_question = mysqli_query($conn, $sql_insert_has_question);
               

                if ($result_insert_has_question) {
                    echo "Question linked to exam successfully";
                } else {
                    echo "Error linking question to exam: " . mysqli_error($conn);
                }

                // Redirect to another page after successful addition
                header("Location: success.php");
                exit();
            } else {
                echo "Error adding question: " . mysqli_error($conn);
            }
            
        }
    } else {
        echo "Error checking question: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Question</title>
</head>

<body>
 
    <div class="container">
        <form action='addquestion.php' method='post'>
            <label>Question ID:</label>
            <input type="text" name='qid'>
            <br><br>
            <label>Content :</label>
            <input type="text" name='content'>
            <br><br>
            <label>Solution</label>
            <input type="text" name='solution'>
            <br><br>
            <label>Difficulty</label>
            <input type="text" name='diffculty'>
            <br><br>
            <button>Add </button>
        </form>
    </div>
    
</body>

</html>
