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
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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
                    <label for="customername" class="col-form-label">Setup   Date:</label>
                    <input type="date" required class="form-control" name="setupdate">
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
                <button type="button"  class="btn btn-success"data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">เพิ่มข้อมูล</button>
                <button type="button1" class="btn btn-warning" data-bs-target="#">ปฏิทิน *ComingSoon*</button>
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
    <div class="container mt-5">
            <div class="container-fluid">
             <form>
		<input type="text" name="name" class="question" id="search" class="form-control" required autocomplete="off" />
		<label for="search"><span>ค้นหาข้อมูล</span></label>
	  </form>
</div>
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

        <main class="table">
        <section class="table_header">
            <h1>Customer's Data</h1>
        </section>
        <section class="table_body">
            <table>
            <thead>
                <tr>
                    <th>Company name</th>
                    <th>Machine name</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Brand</th>  
                    <th>Calibration Date</th>
                    <th style="color:red">Next Calibration</th>
                    <th>Calibration Frequency</th>
                    <th>Email</th>
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
                        <td><?php echo $user['customername']; ?></td>
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
                        <td style="color:red"><?php 
                          if ($user['nextcal'] == ''){
                            echo '';
                          }else{
                            echo date('d-m-Y', strtotime($user['nextcal']));
                          }
                        ?></td>
                        <td><?php echo $user['califreq']; ?></td>
                        <td><?php echo $user['email']; ?></td>  
                        <td>
                            <div class="dropdown">
                                <div class="select">
                                    <span>Menu</span>
                                    <i class="fa fa-chevron-left"></i>
                                </div>
                                <input type="hidden" name="option">
                                <ul class="dropdown-menu">
                            <li class="dropdown-items" type="submit" href="mailto:<?php echo $user['email']?>?Subject=(เรียนเพื่อทราบ)&body=ชื่อบริษัท <?php echo $user['customername']?> เครื่อง <?php echo $user['testmachine']?> %20%0Aจะมีการสอบเทียบภายในอีก 1 เดือนจึงเเจ้งมาให้ทราบขอบคุณ %20%0Aโดยวันที่ <?php echo $user['nextcal']?> จะมีการสอบเทียบ %20%0Aติดต่อได้ที่ 188/26 หมู่ที่ 3 ต.บางศรีเมือง อ.เมืองนนทบุรี จ.นนทบุรี ประเทศไทย เทศบาลนครนนทบุรี 11000 %20%0Aเบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587" value="'.$id.'">ส่งข้อมูล</li>
                            <li class="dropdown-items" href="edit.php?id=<?php echo $user['id']; ?>">Edit</li>
                            <li class="delete-btn dropdown-items" data-id="<?php echo $user['id']; ?>" href="?delete=<?php echo $user['id']; ?>">Delete</li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php }  } ?>
        </section>
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
    
$("#search").on("keyup", function() {
  value = $(this).val().toLowerCase();
  var value = $(this).val().toLowerCase();
  $(".table tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
  });
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
    </script>
</body>
</html>