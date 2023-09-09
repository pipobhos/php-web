<?php
include_once('./connect.php');
$dataCon = connectDB();

$perpage = 10;

if(isset($_GET['page']) && (int) $_GET['page']>0){
    $page = $_GET['page'];
    // $AA = 1111;
}else{
    $page = 1;
}

$start = ($page-1) * $perpage;

$keywords = "";
$search = "";

if(isset($_GET['search']) && $_GET['search'] != ''){

    $search = mysqli_real_escape_string($dataCon, $_GET['search']);
    $keywords = " WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR idcard LIKE '%$search%'";

}

$sql = "SELECT * FROM contact $keywords LIMIT $start, $perpage";

$dataQuery = mysqli_query($dataCon,$sql);

// print_r($dataQuery);
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

    <h1 class="mt-5">รายการข้อมูลผู้รับบริการ</h1>

    <!-- ฟอร์มค้นหา -->
    <div class="d-flex justify-content-end">
        <form>
            <input type="text" id="search" name="search" value="<?php echo $search;  ?>">
            <button type="submit" class="btn btn-primary">ค้นหา</button>
            <a href="index.php">
                <button type="button" class="btn btn-secondary">ล้างค่าค้นหา</button>
            </a>
        </form>
    </div>

        <!-- ตารางข้อมูล -->
        <table class="table mt-4">
        <thead>
            <tr>
                <th>รหัส</th>
                <th>เลขบัตรประจำตัวประชาชน</th>
                <th>ชื่อ - สกุล</th>
                <th>วัน/เดือน/ปี เกิด</th>
                <th>โทรศัพท์</th>
            </tr>
        </thead>
        <tbody>

            <?php
                while ($dataResult= mysqli_fetch_array($dataQuery, MYSQLI_ASSOC)){
            ?>
                    <tr>
                        <td><?php echo $dataResult['id']; ?></td>
                        <td><?php echo $dataResult['idcard']; ?></td>
                        <td><?php echo $dataResult['prefix'],'. ', $dataResult['first_name'], ' ', $dataResult['last_name']; ?></td>
                        <td><?php echo $dataResult['birthdate']; ?></td>
                        <td><?php echo $dataResult['mobile']; ?></td>
                    </tr>

            <?php    } ?>
        </tbody>
        </table>

    <?php

        $pageSQL = "SELECT * FROM contact $keywords  ORDER BY id ASC";
        $pageQuery = mysqli_query($dataCon, $pageSQL);
        $totalRow = mysqli_num_rows($pageQuery);
     
        $totalPage = ceil($totalRow / $perpage);
        // echo "มีข้อมูล ".$totalRow;
        // echo "จำนวนหน้า ".$totalPage;       
    ?>

        <div>

        <ul class="pagination justify-content-end">
      
            <?php for($i = 1; $i <= $totalPage; $i++) { ?>
                <li class="page-item <?php if($page == $i){echo 'active';} ?>">
                    <a class="page-link" href="index.php?search=<?php echo $search; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>

        </ul>

        </div>

    </div>    
  </body>
</html>