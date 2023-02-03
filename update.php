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

}
        $sql = $conn->prepare("UPDATE bbcal SET customername = :customername, testmachine = :testmachine, model = :model, serialnum = :serialnum, brand = :brand, setupdate = :setupdate, calidate = :calidate, nextcal = :nextcal, califreq = :califreq, email = :email, img = :img WHERE id = :id");
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
            $_SESSION['success'] = "Data has been updated succesfully";
            echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'success',
                        text: 'ข้อมูลอัพเดตเสร็จสิ้น!',
                        icon: 'success',
                        timer: 5000,
                        showConfirmButton: false
                    });
                })
            </script>";
            header("refresh:2; url=index.php");
        } else {
            $_SESSION['error'] = "Data has not been updated succesfully";
            header("location: index.php");
        }

    ?>