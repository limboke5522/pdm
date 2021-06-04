<?php require("../phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '/root/PHPMailer/src/Exception.php';
// require '/root/PHPMailer/src/PHPMailer.php';
// require '/root/PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
// $mail->Host = 'smtp.live.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;


$gmail_username = "janekootest@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "a0831529878"; // รหัสผ่าน gmail
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


$sender = "POSEINT"; // ชื่อผู้ส่ง
$email_sender = "janekootest@gmail.com"; // เมล์ผู้ส่ง 
$email_receiver = "janegooa@gmail.com"; // เมล์ผู้รับ ***

$subject = "ทดสอบการส่ง E-Mail Test22"; // หัวข้อเมล์
$file_name="รายงาน.pdf";

$filename_TH = iconv("UTF-8", "TIS-620", $file_name);


$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$mail->addAttachment('file/'.$filename_TH, $file_name."1");// แทรกไฟล์ *****
$mail->addAttachment('file/'.$filename_TH, $file_name."2");// แทรกไฟล์ *****
$mail->addAttachment('file/'.$filename_TH, $file_name."3");// แทรกไฟล์ *****
$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title></title>
		</head>
		<body>
		<h1>test E-Mail Poseint</h1>
		</body>
	</html>
";

//  ถ้ามี email ผู้รับ
if($email_receiver){
	$mail->msgHTML($email_content);


	if (!$mail->send()) {  // สั่งให้ส่ง email

		// กรณีส่ง email ไม่สำเร็จ
		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
	}else{
		// กรณีส่ง email สำเร็จ
		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
	}	
}



?>