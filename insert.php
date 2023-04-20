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
    $calidate = $_POST['calidate'];
    $nextcal = $_POST['nextcal'];
    $califreq = $_POST['califreq'];
    $email = $_POST['email'];


                    $sql = $conn->prepare("INSERT INTO bbcal1(customername, testmachine, model, serialnum, brand, calidate, nextcal, califreq, email) 
                    VALUES                                  (:customername, :testmachine, :model, :serialnum, :brand, :calidate, :nextcal, :califreq, :email)");
                    $sql->bindParam(":customername", $customername);
                    $sql->bindParam(":testmachine", $testmachine);
                    $sql->bindParam(":model", $model);
                    $sql->bindParam(":serialnum", $serialnum);
                    $sql->bindParam(":brand", $brand);
                    $sql->bindParam(":calidate", $calidate);
                    $sql->bindParam(":nextcal", $nextcal);
                    $sql->bindParam(":califreq", $califreq);
                    $sql->bindParam(":email", $email);
                    $sql->execute();

                    if ($sql) {
                        $_SESSION['success'] = "Data has been inserted successfully";
                        echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title:'success',
                                text: 'เพิ่มข้อมูลเสร็จสิ้น!',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false
                });
            });
        </script>";
                        header("location: index.php");
                    } else {
                        $_SESSION['error'] = "มีปัญหาในการเพิ่มข้อมูล";
                        header("location: index.php");
                    }
                }

?>