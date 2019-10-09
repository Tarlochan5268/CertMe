<?php
    session_start();
    include("../model/database.php");
    $id = $_SESSION["id"];

    $reg_date = date("Y-m-d H:i:s");
    $rd = $reg_date = date("Y-m-d");
    $score = 0;
    $status = 1; // means active

    $test_id = $_GET["test-id"];
    $completion_date =date("Y-m-d H:i:s");

    $query = "INSERT INTO REGISTER_TEST (TEST_ID, CUSTOMER_ID, REGISTRATION_DATE, STATUS, COMPLETION_DATE, SCORE, REG_DATE) VALUES ($test_id, $id, '$reg_date', $status, '$completion_date', $score,'$rd')";
    $stmt = $conn->prepare($query);
    $result = $stmt->execute();
    echo($result);


?>