<!DOCTYPE html>
<html lang="th" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>เพิ่มข้อมูล ลงในฐานข้อมูล</title>

</head>

<body class="d-flex flex-column h-100">
    <div class="container">
        <h1 class="mt-5">เพิ่มข้อมูล</h1>
        <div class="mt-4 mb-4">
            <a class="btn btn-warning" href="index.php" role="button">กลับไปหน้าแสดงข้อมูล</a>
        </div>
    

        <!-- ฟอร์มเพิ่มข้อมูล -->
        <form class="row g-3">
            <div class="col-md-3">
                <label for="prefix" class="form-label">คำนำหน้าชื่อ</label>
                <input type="text" class="form-control" name="prefix" id="prefix" require>
                <!-- <input type="text" list="list_prefix" class="form-control" name="prefix" id="prefix" require> -->
                <!-- <datalist id="list_prefix">
                    <option value="นาย">
                    <option value="นาง">
                    <option value="นางสาว">
                </datalist> -->
            </div>
            <div class="col-md-3">
                <label for="firstname" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="firstname" id="firstname">
            </div>
            <div class="col-md-3">
                <label for="lastname" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lastname" id="lastname">
            </div>
            <div class="col-md-3">
                <label for="gender" class="form-label">เพศ</label>
                <select name="gender" id="gender" class="form-select">
                <!-- <option selected>กรุณาเลือกเพศ...</option> -->
                <option>ชาย</option>
                <option>หญิง</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="idcard" class="form-label">เลขบัตรประจำตัวประชาชน</label>
                <input type="text" class="form-control" name="idcard" id="idcard">
            </div>
            <div class="col-md-3">
                <label for="birthdate" class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="birthdate" id="birthdate">
            </div>
            <div class="col-md-3">
                <label for="mobile" class="form-label">หมายเลขโทรศัพท์</label>
                <input type="text" class="form-control" name="mobile" id="mobile">
            </div>

            <!-- ปุ่มบันทึกข้อมูล -->
            <div  class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
                <button type="reset" class="btn btn-light btn-lg">รีเซ็ท</button>
            </div>
        </form>

    </div>
</body>
</html>