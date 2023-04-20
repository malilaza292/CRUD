<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM bbcal1 WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=index.php");
        }
        if (isset($_GET['upload'])) {
            $id = $_GET['upload'];
            $upload =  $conn->query("UPDATE bbcal1 SET status = 'ยังไม่ได้ส่ง' WHERE id = " . $id . "");
            $upload->execute();
            header("Location: index.php");
        } 
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBCALDATA</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
</div>
<body>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">    
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Company name:</label>
                    <input type="text" required class="form-control" name="customername">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Machine Name:</label>
                    <input type="text" required class="form-control" name="testmachine">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Model:</label>
                    <input type="text" required class="form-control" name="model">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Serial Number:</label>
                    <input type="text" required class="form-control" name="serialnum">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Brand:</label>
                    <input type="text" required class="form-control" name="brand">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Calibration Date:</label>
                    <input type="date" required class="form-control" name="calidate">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Next Calibration:</label>
                    <input type="date" required class="form-control" name="nextcal">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Calibration Frequency:</label>
                    <input type="text" required class="form-control" name="califreq">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Email:</label>
                    <input type="text" required class="form-control" name="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>

  <!-- Header -->
<div class="navbar">

    <div class="navbar-left">
        <div class="content">
        <h1>BBCALDATA</h1>
        <h1>BBCALDATA</h1>
        </div>
    </div>

    <div class="navbar-right">
        <div class="button-right">
            <div class="justify-content-end add-data">               
            <a href="nextcal.php" type="button"  class="btn btn-warning">เช็คสถานะ</a>     
            </div>        
        </div>
    </div>

</div>
<!-- End Header -->
    <div class="container-fluid md-5">
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>

        <main class="table" id="customers_table">
        <section class="table_header">
            <h1>&nbsp;&nbsp;&nbsp;Customer's Data</h1>
            <div class="input-group">
                <input id="search " type="search" title="ค้นหาข้อมูล : Search Data" placeholder="Search Data..." required autocomplete="off" no-close-icon>
                <img src="photo/search.svg">
            </div>
            <div class="send-button">
            <div class="justify-content-end add-data"> 
            <button  class="send-button-btn" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo" title="เพิ่มข้อมูล : Add data"></button>
            </div>
            <!-- <div class="export_file">
                <label for="export_file" class="export_file-btn" title="นำข้อมูลออก : Export Data"></label>
                <input type="checkbox" id="export_file">
                <div class="export_file-options">
                    <label>นำข้อมูลออก &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF<img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/CsvDelimited001.svg" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg" alt=""></label>
                </div>
            </div> -->
        </section>
        <section class="table_body">
            <table>
            <thead class="thead">
                <tr>
                    <th>Company name</th>
                    <th>Machine name</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Brand</th>
                    <th>Calibration Date</th>
                    <th>Calibration Frequency</th>
                    <th>Next Calibration</th>
                    <th>Status</th>
                    <th>Action</th>
                
                </tr>
                    </thead>
                        <tbody>
                            <?php 
                            $stmt = $conn->query("SELECT * FROM bbcal1");
                            $stmt->execute();
                            $bbcal1 = $stmt->fetchAll();
                            
                            if (!$bbcal1) {
                                echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                            } else {
                            foreach($bbcal1 as $user)  {  
                            ?>
                            <tr>
                                <td style="font-weight:bold"><?php echo $user['customername']; ?></td>
                                <td><?php echo $user['testmachine'];?></td>
                                <td><?php echo $user['model']; ?></td>
                                <td><?php echo $user['serialnum']; ?></td>
                                <td><?php echo $user['brand']; ?></td>
                                <td><?php 
                                  if ($user['calidate'] == ''){
                                    echo '';
                                  }else{
                                    echo date('d-m-Y', strtotime($user['calidate']));
                                  }
                                ?></td>
                                <td><?php echo $user['califreq']; ?></td>
                                <td style="color:red;font-weight:bold"><?php 
                                  if ($user['nextcal'] == ''){
                                    echo '';
                                  }else{
                                    echo date('d-m-Y', strtotime($user['nextcal']));
                                  }
                                ?></td>
                                <td><?php if($user['status']==1){
                               echo '<a style="text-decoration: none" class=button-success>ส่งอีเมล์เเล้ว</a>';
                            }else{
                               echo '<a style="text-decoration: none"class=button-danger>ยังไม่ได้ส่ง</a>';
                            }?></td>
                                <td>
                                <a class="material-symbols-outlined text-decoration-none" href="mailto:<?php echo $user['email']; ?>?Subject=(เรียนเพื่อทราบ)&body=ชื่อบริษัท <?php echo $user['customername']; ?> %20%0Aเครื่อง <?php echo $user['testmachine']; ?> %20%0Aจะมีการสอบเทียบภายใน 1 เดือนจึงเเจ้งมาให้ทราบ %20%0Aซึ่งโดยวันที่ <?php echo $user['nextcal']; ?> จะมีการสอบเทียบ %20%0A%20%0Aสามารถติดต่อได้ที่ 188/26 หมู่ที่ 3 ต.บางศรีเมือง อ.เมืองนนทบุรี จ.นนทบุรี ประเทศไทย เทศบาลนครนนทบุรี 11000 %20%0Aเบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587 %20%0A%20%0Aขอบคุณที่ไว้ใจเรา%20%0Aทีมงาน BBCAL" <?php echo $user['id']; ?>>email</a>
                                    <a class="material-symbols-outlined text-decoration-none" href="edit.php?id=<?php echo $user['id']; ?>">edit_square</a>
                                    <a class="delete-btn material-symbols-outlined text-decoration-none" data-id="<?php echo $user['id']; ?>" href="?delete=<?php echo $user['id']; ?>">delete</a>
                                </td>
                            </tr>
                <?php }  } ?>
        </section>
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>