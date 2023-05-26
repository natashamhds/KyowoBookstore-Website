<?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
if (isset($_POST['create'])) {

  try {

    $stmt = $conn->prepare("INSERT INTO tbl_staffs_a180900_mypt2(FLD_STAFF_ID,FLD_STAFF_NAME, FLD_STAFF_POSITION,
      FLD_STAFF_PASS, FLD_STAFF_PHONENO, FLD_GENDER) VALUES(:sid, :name, :position, :passwordd, :phone, :gender)");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':passwordd', $passwordd, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);

    
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $passwordd =  $_POST['passwordd'];
    $phone =  $_POST['phone'];
    $gender =  $_POST['gender'];

    $stmt->execute();
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Update
if (isset($_POST['update'])) {

  try {

    $stmt = $conn->prepare("UPDATE tbl_staffs_a180900_mypt2 SET
      FLD_STAFF_ID = :sid, FLD_STAFF_NAME = :name,
      FLD_STAFF_POSITION = :position, FLD_STAFF_PASS = :passwordd,
      FLD_STAFF_PHONENO = :phone, FLD_GENDER = :gender
      WHERE FLD_STAFF_ID = :oldsid");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':position', $position, PDO::PARAM_STR);
    $stmt->bindParam(':passwordd', $passwordd, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
    
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $passwordd = $_POST['passwordd'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $oldsid = $_POST['oldsid'];
    
    $stmt->execute();
    
    header("Location: staffs.php");
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Delete
if (isset($_GET['delete'])) {

  try {

    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a180900_mypt2 where FLD_STAFF_ID = :sid");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    
    $sid = $_GET['delete'];
    
    $stmt->execute();
    
    header("Location: staffs.php");
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Edit
if (isset($_GET['edit'])) {

  try {

    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a180900_mypt2 where FLD_STAFF_ID = :sid");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    
    $sid = $_GET['edit'];
    
    $stmt->execute();
    
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

$conn = null;

?>