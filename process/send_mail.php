<?php require("../phpmailer/PHPMailerAutoload.php");?>
<?php
header('Content-Type: text/html; charset=utf-8');
require '../connect/connect.php';

$sendDocNo = $_POST['sendDocNo'];
$email = $_POST['email'];

$Sql_item = "SELECT
				send_doc_detail.ProductID,
				product.ProductName,
				purpose.Purpose 
				FROM
				send_doc
				INNER JOIN send_doc_detail ON send_doc.SendDocNo = send_doc_detail.SendDocNo
				INNER JOIN product ON send_doc_detail.ProductID = product.ID
				INNER JOIN purpose ON send_doc.`Subject` = purpose.ID 
				WHERE
				send_doc.SendDocNo = '$sendDocNo' 
				GROUP BY
				product.ID 
				ORDER BY
				product.ProductName ASC ";

$meQuery_item = mysqli_query($conn, $Sql_item);
$count=0;
while ($Result = mysqli_fetch_assoc($meQuery_item)) {
	$Purpose = 	$Result['Purpose'];
	$ProductID[$count] = 	$Result['ProductID'];
	$ProductName[$count] = 	$Result['ProductName'];

	$count++;
}

$Sql_item = "SELECT
				productdoc.ID_FileDoc,
				docrevision.fileName,
				docrevision.version,
				product.ProductName 
				FROM
				send_doc
				INNER JOIN send_doc_detail ON send_doc.SendDocNo = send_doc_detail.SendDocNo
				INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
				INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
				INNER JOIN product ON docrevision.productID = product.ID 
				WHERE
				send_doc.SendDocNo = '$sendDocNo'
				ORDER BY  product.ProductName ASC ";

$meQuery_item = mysqli_query($conn, $Sql_item);
$count_file=0;
while ($Result = mysqli_fetch_assoc($meQuery_item)) {
	$ProductNameFile[$count_file] = $Result['ProductName'];
	$ID_FileDoc[$count_file] = 	$Result['ID_FileDoc'];
	$fileName[$count_file] = 	$Result['fileName'];
	$count_file++;
}


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
$email_receiver = $email; // เมล์ผู้รับ ***

$subject = $Purpose."7"; // หัวข้อเมล์



$mail->Username = $gmail_username;
$mail->Password = $gmail_password;
$mail->setFrom($email_sender, $sender);
$mail->addAddress($email_receiver);
$c=1;
for($j=0;$j<$count_file;$j++){
	$file_name= $fileName[$j];
	$producname = $ProductNameFile[$j];
	$filename_TH = iconv("UTF-8", "TIS-620", $file_name);
	$mail->addAttachment('file/'.$filename_TH, $c.".".$producname."_".$file_name);// แทรกไฟล์ *****
	$c++;
}

$mail->Subject = $subject;

$email_content = "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8'/>
			<title></title>
		</head>
		<body><h1>รายการสินค้า</h1>";
$NO=1;
for($i=0;$i<$count;$i++){
	$email_content .="<h4>".$NO.". ".$ProductName[$i]."</h4>";
	$NO++;
}
	

$email_content .="	</body>
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
		echo "ระบบได้ E-Mail ไปเรียบร้อยลแล้ว";
	}	
}



?>