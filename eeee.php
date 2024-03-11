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
    $sql_check_question = "SELECT * FROM `question` WHERE qid=?";
    $stmt_check_question = mysqli_prepare($conn, $sql_check_question);
    mysqli_stmt_bind_param($stmt_check_question, 's', $qid);
    mysqli_stmt_execute($stmt_check_question);
    $result_check_question = mysqli_stmt_get_result($stmt_check_question);

    if ($result_check_question) {
        $num = mysqli_num_rows($result_check_question);
        if ($num > 0) {
            echo "Question ID already exists";
        } else {
            // Insert into the question table
            $sql_insert_question = "INSERT INTO `question` (qid, qcontent, qsolutions, difficulty) VALUES (?, ?, ?, ?)";
            $stmt_insert_question = mysqli_prepare($conn, $sql_insert_question);
            mysqli_stmt_bind_param($stmt_insert_question, 'ssss', $qid, $content, $solution, $difficulty);
            $result_insert_question = mysqli_stmt_execute($stmt_insert_question);

            if ($result_insert_question) {
                echo "Question added successfully";

                // Insert into the has_question table
                $sql_insert_has_question = "INSERT INTO has_questions (eid, qid) VALUES (?, ?)";
                echo "SQL Query: " . $sql_insert_has_question; 
                $stmt_insert_has_question = mysqli_prepare($conn, $sql_insert_has_question);
                mysqli_stmt_bind_param($stmt_insert_has_question, 'ss', $exID, $qid);
                $result_insert_has_question = mysqli_stmt_execute($stmt_insert_has_question);

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