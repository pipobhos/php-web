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


$sql = "SELECT * FROM contact WHERE id = $id";

$updateQuery = mysqli_query($dataCon, $sql);

$dataResult = mysqli_fetch_array($updateQuery, MYSQLI_ASSOC);

// print_r($dataResult);
if($dataResult == null){
    echo "ไม่พบข้อมูล!!!";
}


?>
<!doctype html>
<html lang="th" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ระบบฐานข้อมูล โรงพยาบาลแห่งหนึ่ง</title>
</head>
<body class="d-flex flex-column h-100">
    <div class="container">
        <h1 class="mt-5">แก้ไขข้อมูล ของ <?php echo $dataResult['first_name']; ?></h1>
        <div class="mt-4 mb-4">
            <a class="btn btn-warning" href="index.php" role="button">กลับไปหน้าแสดงข้อมูล</a>
        </div>


        <!-- ฟอร์มเพิ่มข้อมูล -->
        <form action="action_update.php" method="post" class="row g-3 needs-validation" novalidate>
        <input type="text" name="id" value="<?php echo $dataResult['id']; ?>">
        <div class="col-md-3">
                <label for="prefix" class="form-label">คำนำหน้าชื่อ *</label>
                <input type="text" class="form-control" name="prefix" id="prefix" value="<?php echo $dataResult['prefix']; ?>">
                <div class="invalid-feedback">
                    กรุณากรอกคำนำหน้าชื่อ.
                </div>
            </div>
            <div class="col-md-3">
                <label for="firstname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $dataResult['first_name']; ?>">
            </div>
            <div class="col-md-3">
                <label for="lastname" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $dataResult['last_name']; ?>">
            </div>
            <div class="col-md-3">
                <label for="gender" class="form-label">เพศ</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="<?php echo $dataResult['gender']; ?>"><?php echo $dataResult['gender']; ?></option>
                    <option>ชาย</option>
                    <option>หญิง</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="idcard" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" name="idcard" id="idcard" value="<?php echo $dataResult['idcard']; ?>">
            </div>
            <div class="col-md-3">
                <label for="birthdate" class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?php echo $dataResult['birthdate']; ?>">
            </div>
            <div class="col-md-3">
                <label for="mobile" class="form-label">หมายเลขโทรศัพท์</label>
                <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $dataResult['mobile']; ?>">
                <div class="valid-feedback">
                    เยี่ยมไปเลย !หมายเลขถูกต้อง
                </div>
            </div>

            <!-- ปุ่มบันทึกข้อมูล -->
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary btn-lg">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-light btn-lg">รีเซ็ท</button>
            </div>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./script.js"></script>

</body>
</html>