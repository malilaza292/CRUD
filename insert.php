<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 

session_start();
require_once "config/db.php";

if (isset($_POST['submit'])) {
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

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
        $filePath = 'uploads/'.$fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $filePath)) {
                    $sql = $conn->prepare("INSERT INTO bbcal(customername, testmachine, model, serialnum, brand, setupdate, calidate, nextcal, califreq, email, img) 
                    VALUES                                  (:customername, :testmachine, :model, :serialnum, :brand, :setupdate, :calidate, :nextcal, :califreq, :email, :img)");
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
                        $_SESSION['success'] = "Data has been inserted successfully";
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
                        header("location: index.php");
                    } else {
                        $_SESSION['error'] = "Data has not been inserted successfully";
                        header("location: index.php");
                    }
                }
            }
        }
}


?>