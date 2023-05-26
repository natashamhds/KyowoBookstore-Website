<?php
include_once 'database.php';

session_start(); 

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sid = $_SESSION['staffid'];
    
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a180900_mypt2 WHERE FLD_STAFF_ID = '$sid'");

    $stmt->execute();
    
    $readrow = $stmt->fetch(PDO::FETCH_ASSOC);

    $sid = $readrow['FLD_STAFF_ID'];
    $name = $readrow['FLD_STAFF_NAME'];
    $pos = $readrow['FLD_STAFF_POSITION'];
    $pass = $readrow['FLD_STAFF_PASS'];
    $phone = $readrow['FLD_STAFF_PHONENO'];
    $gender = $readrow['FLD_GENDER'];
        
if($sid==''){
    header("location:login.php");
    }
    else {
    header("");
    }
?>