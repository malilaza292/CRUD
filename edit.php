<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $customername = $_POST['customername'];
        $testmachine = $_POST['testmachine'];
        $model = $_POST['model'];
        $serialnum = $_POST['serialnum'];
        $brand = $_POST['brand'];
        $setupdate = $_POST['setupdate'];
        $calidate = $_POST['calidate'];
        $nextcal = $_POST['nextcal'];
        $califreq = $_POST['califreq'];
        $email = $_POST['email'];
        $img = $_FILES['img'];

        $img2 = $_POST['img2'];
        $upload = $_FILES['img']['name'];

        if ($upload != '') {
            $allow = array('jpg', 'jpeg', 'png');
            $extension = explode('.', $img['name']);
            $fileActExt = strtolower(end($extension));
            $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
            $filePath = 'uploads/'.$fileNew;

            if (in_array($fileActExt, $allow)) {
                if ($img['size'] > 0 && $img['error'] == 0) {
                   move_uploaded_file($img['tmp_name'], $filePath);
                }
            }

        } else {
            $fileNew = $img2;
        }

        $sql = $conn->prepare("UPDATE bbcal1 SET customername = :customername, testmachine = :testmachine, model = :model, serialnum = :serialnum, brand = :brand, setupdate = :setupdate, calidate = :calidate, nextcal = :nextcal, califreq = :califreq, email = :email WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":customername", $customername);
        $sql->bindParam(":testmachine", $testmachine);
        $sql->bindParam(":model", $model);
        $sql->bindParam(":serialnum", $serialnum);
        $sql->bindParam(":brand", $brand);
        $sql->bindParam(":setupdate", $setupdate);
        $sql->bindParam(":calidate", $calidate);
        $sql->bindParam(":nextcal", $nextcal);
        $sql->bindParam(":califreq", $califreq);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":img", $fileNew);
        $sql->execute();

        if ($sql) {
            $_SESSION['success'] = "Data has been updated successfully";
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title:'success',
                    text: 'Data inserted successfully!',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
    });
});
</script>";
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    title:'success',
                    text: 'Data inserted successfully!',
                    icon: 'success',
                    timer: 5000,
                    showConfirmButton: false
    });
});
</script>";
            header("refresh:2;url: index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .container {
            max-width: 550px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>แก้ไขข้อมูล</h1>
        <hr>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $stmt = $conn->query("SELECT * FROM bbcal1 WHERE id = $id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['id']; ?>" required class="form-control" name="id" >
                    <label for="customername" class="col-form-label">Customer Name:</label>
                    <input type="text" value="<?php echo $data['customername']; ?>" required class="form-control" name="customername" >
                    <input type="hidden" value="<?php echo $data['img']; ?>" required class="form-control" name="img2" >
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Test Machine:</label>
                    <input type="text" value="<?php echo $data['testmachine']; ?>" required class="form-control" name="testmachine">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Model:</label>
                    <input type="text" value="<?php echo $data['model']; ?>" required class="form-control" name="model">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Serial number:</label>
                    <input type="text" value="<?php echo $data['serialnum']; ?>" required class="form-control" name="serialnum">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Brand:</label>
                    <input type="text" value="<?php echo $data['brand']; ?>" required class="form-control" name="brand">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Setup date:</label>
                    <input type="date" value="<?php echo date('d-m-Y', strtotime( $data['setupdate'])); ?>" required class="form-control" name="setupdate">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Calibration Date:</label>
                    <input type="date" value="<?php echo date('d-m-Y', strtotime( $data['calidate'])); ?>" required class="form-control" name="calidate">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Next Calibration:</label>
                    <input type="date" value="<?php echo date('d-m-Y', strtotime( $data['nextcal'])); ?>" required class="form-control" name="nextcal">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Calibration Frequency:</label>
                    <input type="text" value="<?php echo $data['califreq']; ?>" required class="form-control" name="califreq">
                </div>
                <div class="mb-3">
                    <label for="customername" class="col-form-label">Email:</label>
                    <input type="text" value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="img" class="col-form-label">Image:</label>
                    <input type="file" class="form-control" id="imgInput" name="img">
                    <img width="100%" src="uploads/<?php echo $data['img']; ?>" id="previewImg" alt="">
                </div>
                <hr>
                <a href="index.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>

    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
                if (file) {
                    previewImg.src = URL.createObjectURL(file)
            }
        }

    </script>
</body>
</html>