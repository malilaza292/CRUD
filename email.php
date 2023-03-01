<?php
    session_start();

    require_once "config/db.php";
    
    if ($conn->prepare) {
        die("Connection failed: " . $conn->prepare);
      }
      echo "Connected unsuccessfully";


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
    ?>
    <?php 
    $stmt = $conn->query("SELECT * FROM bbcal1");
    $stmt->execute();
    $bbcal1 = $stmt->fetchAll();

    if (!$bbcal1) {
        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
    } else {
    foreach($bbcal1 as $user)  {  
$to = $user['email'];
$subject = 'Test HTML email';
$message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<link rel="stylesheet" href="css/email.css">

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f8f9fd"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="esd-header-popover es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="610">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p15b es-p30r es-p30l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a class="esd-anchor" name="https://bb-cal.com"></a><a target="_blank"><img src="http://bb-cal.com/wp-content/uploads/2022/02/cropped-125833576_100845955197117_7125048327001744835_n-1.png" alt style="display: block;" width="130"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                                        <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="610" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="570" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10b">
                                                                                        <h1>บริษัท (CODE)</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                        <p style="line-height: 120%;">เครื่องของคุณจะมีการสอบเทียบ เร็วนี้ๆ</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#071f4f" style="background-color: #071f4f; background-image: url(https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png); background-repeat: no-repeat; background-position: center top;" background="https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="610">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-p30r es-p30l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-spacer" height="20"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text h-auto" height="36">
                                                                                        <h1 style="text-align: center; color: #ffffff;">ชื่อ บริษัท : Test </h1>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                        <!--[if mso]><table width="570" cellpadding="0" cellspacing="0"><tr><td width="197" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="177" class="es-m-p0r es-m-p20b esd-container-frame" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #f6e7e6;">ชื่อเครื่อง</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="es-hidden" width="20"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="177" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="177" class="es-m-p20b esd-container-frame" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #f6e7e6;">โมเดล</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="176" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="176" align="center" class="esd-container-frame">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #f6e7e6; line-height: 150%;">รหัสเครื่อง</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p20r es-p20l" align="left">
                                                        <!--[if mso]><table width="570" cellpadding="0" cellspacing="0"><tr><td width="197" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="177" class="es-m-p0r es-m-p20b esd-container-frame" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #fefcfc;">CODE HERE</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="es-hidden" width="20"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="177" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="177" class="es-m-p20b esd-container-frame" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #f4f2f2;">CODE HERE</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="176" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="176" align="center" class="esd-container-frame">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text">
                                                                                        <p style="color: #fbfafa;">CODE HERE</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="610" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-width: 10px; border-style: solid; border-color: transparent;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-spacer" height="20"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text">
                                                                                        <h1 style="text-align: center; color: #ffffff;">จะมีการสอบเทียบภายในอีก Test จึงเเจ้งมาให้ทราบ</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                        <p style="color: #ffffff;">โดยวันที่ Test จะมีการสอบเทียบเครื่องมือ&nbsp;</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="background-position: center center;">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-footer-body" align="center" cellpadding="0" cellspacing="0" width="610" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-m-p40t es-m-p40b es-m-p20r es-m-p20l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="610" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f0f3fe" style="background-color: #f0f3fe; border-radius: 8px; border-collapse: separate;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-p15">
                                                                                        <h1 style="text-align: center; line-height: 150%; font-size: 20px;">ติดต่อได้ที่ 188/26 หมู่ที่ 3 ต.บางศรีเมือง อ.เมืองนนทบุรี จ.นนทบุรี ประเทศไทย เทศบาลนครนนทบุรี 11000</h1>
                                                                                        <h1 style="text-align: center; line-height: 150%; font-size: 20px;">เบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587</h1>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#071f4f" style="background-color: #071f4f; background-image: url(https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png); background-repeat: no-repeat; background-position: center top;" background="https://hpy.stripocdn.email/content/guids/CABINET_1ce849b9d6fc2f13978e163ad3c663df/images/10801592857268437.png">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="610">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-p30r es-p30l" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="550" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                <p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1822.463913587275!2d100.48624856080886!3d13.843100217014344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29b1dbd036851%3A0x85ed91422d089a54!2z4Lir4LiI4LiBLiDguJrguLXguJrguLUg4LmA4LiX4LiEIOC5geC4reC4meC4lOC5jCDguYDguIvguK3guKPguYzguKfguLTguKo!5e0!3m2!1sth!2sth!4v1677503805826!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#2e43bc" style="background-color: #2e43bc;">
                                        <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="610" style="border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid transparent;border-bottom:5px solid transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="es-p20t es-p20r es-p20l esd-structure" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-width: 8px; border-style: solid; border-color: transparent;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p15">
                                                                                        <p style="line-height: 120%; color: #f9eded;"><strong>Copyright © 2021 BB Cal & Service | Powered by BB Cal & Service</strong></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
';

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Your Name <your_email@example.com>\r\n";

mail($to, $subject, $message, $headers);
                                                                                }}
?>
