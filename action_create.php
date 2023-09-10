<?php
include_once('./connect.php');
$dataCon = connectDB();


$prefix     = $_POST['prefix'];
$firstname  = $_POST['firstname'];
$lastname   = $_POST['lastname'];
$gender     = $_POST['gender'];
$idcard     = $_POST['idcard'];
$birthdate  = $_POST['birthdate'];
$mobile     = $_POST['mobile'];


// print_r($_POST);
$sql = "INSERT INTO contact(`prefix`, `first_name`, `last_name`, `gender`, `idcard`, `birthdate`, `mobile`) VALUES ('$prefix', '$firstname', '$lastname', '$gender', '$idcard', '$birthdate', '$mobile')";

$insertQuery = mysqli_query($dataCon, $sql) or die(mysqli_error($dataCon));


if($insertQuery){
    echo '<script>alert("เพิ่มข้อมูล สำเร็จ");window.location="index.php";</script>';
} else {
    echo '<script>alert("มีข้อผิดพลาด เกิดขึ้น");window.location="create.php";</script>';
}


?>