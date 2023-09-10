<?php
include_once('./connect.php');
$dataCon = connectDB();

if(isset($_GET['id']) && (int) $_GET['id']>0)
{
    $id = (int) $_GET['id'];
}else{
    echo "เรียกใช้งานไม่ถูกต้อง";
    die();
}

// soft Delete
$sql = "UPDATE contact SET status=0 WHERE id=$id";

// hard Delete
// $sql = "DELETE FROM contact WHERE id= $id";

$deleteQuery = mysqli_query($dataCon, $sql);
if($deleteQuery){
    echo '<script>alert("ลบข้อมูล สำเร็จ");window.location="index.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด เกิดขึ้น");window.location="index.php";</script>';
}

?>