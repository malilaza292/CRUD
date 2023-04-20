<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    require_once "config/db.php";
    session_start();

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM bbcal1 WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=index.php");
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBCAL DATA</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

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
            <a href="index.php" type="button"  class="btn btn-primary">หน้าหลัก</a>     
            </div>        
        </div>
    </div>
</div>

<div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
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
            <h1>&nbsp;&nbsp;&nbsp;Status</h1>
            <div class="input-group">
                <input id="search " type="search" placeholder="Search Data..." required autocomplete="off" no-close-icon>
                <img src="photo/search.svg">
            </div>
            <!-- <div class="send-button">
            <div class="justify-content-end add-data"> 
            <button  class="send-button-btn" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo" title="เพิ่มข้อมูล"></button>
            </div>
            <div class="export_file">
                <label for="export_file" class="export_file-btn" title="นำข้อมูลออก"></label>
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
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $stmt = $conn->query("SELECT * FROM bbcal1 WHERE CURRENT_TIMESTAMP BETWEEN datealert AND nextcal");
                    $stmt->execute();
                    $bbcal1 = $stmt->fetchAll();

                    if (!$bbcal1) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($bbcal1 as $user)  {  
                ?>
                    <tr>
                        <td style="font-weight:bold"><?php echo $user['customername']; ?></td>
                        <td><?php echo $user['testmachine']; ?></td>
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
                        <td><?php echo $user['email']; ?></td>
                        <td><?php 
                            if($user['status']==1){
                               echo '<a style="text-decoration: none" href="status.php?id='.$user['id'].'&status=0" class="button-success">ส่งอีเมล์เเล้ว</a>';
                            }else{
                               echo '<a style="text-decoration: none" href="status.php?id='.$user['id'].'&status=1" class="button-danger">ยังไม่ได้ส่ง</a>';
                            }
                                ?></td>

                        <td>
                        <a class="material-symbols-outlined text-decoration-none" 
                        href="mailto:<?php echo $user['email']; ?>?Subject=(เรียนเพื่อทราบ)&body=ชื่อบริษัท <?php echo $user['customername']; ?> %20%0Aเครื่อง <?php echo $user['testmachine']; ?> 
                        %20%0Aโมเดล <?php echo $user['model']; ?>
                        %20%0Aหมายเลขเครื่อง <?php echo $user['serialnum']; ?>
                        %20%0Aแบรนด์ <?php echo $user['brand']; ?>
                        %20%0Aจะมีการสอบเทียบภายใน 1 เดือนจึงเเจ้งมาให้ทราบ %20%0Aซึ่งโดยวันที่ <?php echo $user['nextcal']; ?> 
                        จะมีการสอบเทียบ %20%0A%20%0Aสามารถติดต่อได้ที่ 188/26 หมู่ที่ 3 ต.บางศรีเมือง อ.เมืองนนทบุรี จ.นนทบุรี ประเทศไทย เทศบาลนครนนทบุรี 11000 
                        %20%0Aเบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587 %20%0A%20%0Aขอบคุณที่ไว้ใจเรา%20%0Aทีมงาน BBCAL" <?php echo $user['id']; ?>>email</a>
                        <a class="delete-btn material-symbols-outlined text-decoration-none" data-id="<?php echo $user['id']; ?>" href="?delete=<?php echo $user['id']; ?>">delete</a>
                        </td>
                    </tr>
                <?php }  } ?>
        </section>
        <h2>ข้อมูลนี้จะเเสดงข้อมูลก่อนที่จะมีการสอบเทียบเป็นเวลา 1 เดือน</h2>
        </h2>
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
function changeStatus(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'update_status.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText;
      if (response == 'success') {
        // Update the status in the HTML table
        var statusCell = document.getElementById('status-' + id);
        statusCell.innerHTML = 'Already sent';
      } else {
        alert('Error updating status');
      }
    }
  };
  xhr.send('id=' + id);
}
</script>   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
$(".delete-btn").click(function(e) {
    var userId = $(this).data('id');
    e.preventDefault();
    deleteConfirm(userId);
})
function deleteConfirm(userId) {
    Swal.fire({
        title: 'โปรดยืนยัน?',
        text: "ข้อมูลในตารางนี้จะหายไป!",
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'ไม่ข้าทำไม่ได้',
        confirmButtonText: 'ใช่, ลบเลย ลบเลย!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                        url: 'index.php',
                        type: 'GET',
                        data: 'delete=' + userId,
                    })
                    .done(function() {
                        Swal.fire({
                            title: 'success',
                            text: 'ลบเสร็จสิ้น!',
                            icon: 'success',
                        }).then(() => {
                            document.location.href = 'index.php';
                        })
                    })
                    .fail(function() {
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                        window.location.reload();
                    });
            });
        },
    });
}

/*Dropdown Menu*/
$('.dropdown').click(function () {
$(this).attr('tabindex', 1).focus();
$(this).toggleClass('active');
$(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
$(this).removeClass('active');
$(this).find('.dropdown-menu').slideUp(300);
});
/*End Dropdown Menu*/
// Search sort table
const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })
}
        </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>