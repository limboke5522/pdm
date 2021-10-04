<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'show_data') {
    show_data($conn);
  } else if ($_POST['FUNC_NAME'] == 'show_Detail') {
    show_Detail($conn);
  } else if ($_POST['FUNC_NAME'] == 'editData') {
    editData($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData') {
    saveData($conn);
  } else if ($_POST['FUNC_NAME'] == 'deleteData') {
    deleteData($conn);
  } else if ($_POST['FUNC_NAME'] == 'Get_TypeDetail_Name') {
    Get_TypeDetail_Name($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData2') {
    saveData2($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Productt') {
    selection_Productt($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_head') {
    selection_head($conn);
  } else if ($_POST['FUNC_NAME'] == 'checkisExpire') {
    checkisExpire($conn);
  }
}

function checkisExpire($conn)
{
  $select_headdoc    = $_POST['select_headdoc'];

  $Sql = "SELECT
            documentlist.isExpire 
          FROM
            documentlist
          WHERE documentlist.ID = '$select_headdoc' ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function Get_TypeDetail_Name($conn)
{
  $Sql = "SELECT
            doctype_detail.ID,
            doctype_detail.TypeDetail_Name 
          FROM
            doctype_detail
            WHERE doctype_detail.IsCancel = 0
            ORDER BY  doctype_detail.TypeDetail_Name ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function Get_customers($conn)
{
  $Sql = "SELECT
                customer.ID,
                customer.CustomerName 
              FROM
                customer
                WHERE customer.IsCancel = 0
                ORDER BY  customer.CustomerName ASC
           ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Productt($conn)
{
  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName
          FROM
            product
          WHERE product.IsCancel = 0
            ORDER BY  product.ProductName ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}
function selection_head($conn)
{
  $doctype    = $_POST['doctype'];


  $Sql2 = "SELECT
          documentlist.ID,
          documentlist.DocNumber,
          documentlist.DocName 
        FROM
          documentlist
        WHERE documentlist.DocType_Detail = $doctype ";

  $meQuery2 = mysqli_query($conn, $Sql2);
  while ($row2 = mysqli_fetch_assoc($meQuery2)) {
    $return['documentlist'][] = $row2;
  }

  $meQuery = mysqli_query($conn, $Sql2);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}
function selection_Product($conn)
{
  $doctype    = $_POST['doctype'];


  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName
          FROM
            product
          WHERE product.IsCancel = 0
            ORDER BY  product.ProductName ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return['product'][] = $row;
  }




  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function editData($conn)
{
  $ID_txt     = $_POST['ID_txt'];
  $txt_DocNo    = $_POST['txt_DocNo'];
  $txt_refDoc     = $_POST['txt_refDoc'];
  $inoff     = $_POST['inoff'];
  $select_doctype2     = $_POST['select_doctype2'];
  $select_headdoc     = $_POST['select_headdoc'];
  $select_Product     = $_POST['select_Product'];
  $MFGDate    = $_POST['MFGDate'];
  $ExpireDate    = $_POST['ExpireDate'];
  $txt_detail    = $_POST['txt_detail'];
  $checkupload    = $_POST['checkupload'];

  $MFGDate    = explode('-', $MFGDate);
  $MFGDate = $MFGDate[2] . '-' . $MFGDate[1] . '-' . $MFGDate[0];
  $ExpireDate    = explode('-', $ExpireDate);
  $ExpireDate = $ExpireDate[2] . '-' . $ExpireDate[1] . '-' . $ExpireDate[0];
  $filename = $_FILES['file_upload']['name'];

  if ($checkupload == 1) {
    $filename = '000';
  }

  if ($filename != "") {

    if ($filename != '000') {
      // $target_dir = "file/";
      // $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
      // move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file);

      // $data = base64_encode($_FILES['file_upload']['tmp_name']);
      // file_put_contents('output.pdf', base64_decode($data));


      $filename_TH = iconv("UTF-8", "TIS-620", $filename);
      copy($_FILES['file_upload']['tmp_name'],'file/'.$filename); // อัพไฟล์ SERVER *****
      // move_uploaded_file($_FILES["file_upload"]["name"], "file/" . $_FILES["file_upload"]["name"]);


    }



    if ($filename != '000') {
      $select = "SELECT
                    docrevision.version,
	                  LPAD( ( COALESCE ( MAX( CONVERT ( SUBSTRING( version, 1, 2 ), UNSIGNED INTEGER )), 0 ) + 1 ), 2, 0 ) AS versionUpdate
                  FROM
                    docrevision
                  WHERE
                      docrevision.productID = '$select_Product'
                  AND  docrevision.DocumentID = '$select_headdoc'
                  ORDER BY docrevision.ID DESC LIMIT 1";
      $meQuery = mysqli_query($conn, $select);
      while ($row = mysqli_fetch_assoc($meQuery)) {
        $version = $row['version'];
        $versionUpdate = $row['versionUpdate'];
      }

      if($ExpireDate =='--'){
        $insertEx = "";
      }else{
        $insertEx = "docrevision.ExpireDate = '$ExpireDate',";
      }

      $Sql = "INSERT INTO docrevision SET docrevision.fileName = '$filename' , 
                                          docrevision.version = '$versionUpdate', 
                                          docrevision.UploadDate = NOW(),
                                          docrevision.RegistrationDate = NOW(), 
                                          $insertEx
                                          docrevision.RevNo = '$txt_refDoc', 
                                          docrevision.productID = '$select_Product', 
                                          docrevision.DocumentID = '$select_headdoc'  ;";

      if (mysqli_query($conn, $Sql)) {
        $select = "SELECT
                      docrevision.ID
                    FROM
                      docrevision
                    WHERE
                        docrevision.productID = '$select_Product'
                    AND  docrevision.DocumentID = '$select_headdoc'
                    ORDER BY docrevision.ID DESC LIMIT 1";
        $meQuery = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_assoc($meQuery)) {
          $ID = $row['ID'];
        }
      }

      if($ExpireDate =='--'){
        $insertEx = "";
      }else{
        $insertEx = "productdoc.ExpireDate = '$ExpireDate',";
      }


      $Sql2 = "UPDATE productdoc SET productdoc.ProductID = '$select_Product' , 
                                      productdoc.DocumentID = '$select_headdoc',
                                      productdoc.UploadDate = NOW(),
                                      productdoc.DocType = '$inoff', 
                                      productdoc.ID_FileDoc = '$ID', 
                                      productdoc.DocTypeID = '$select_doctype2', 
                                      productdoc.MFGDate = '$MFGDate', 
                                      $insertEx 
                                      productdoc.DocNumber = '$txt_DocNo'  WHERE productdoc.ID = '$ID_txt' ;";

      mysqli_query($conn, $Sql2);
    } else {

      $select = "SELECT
                    docrevision.ID
                  FROM
                    docrevision
                  WHERE
                      docrevision.productID = '$select_Product'
                  AND  docrevision.DocumentID = '$select_headdoc'
                  ORDER BY docrevision.version DESC LIMIT 1";
      $meQuery = mysqli_query($conn, $select);
      while ($row = mysqli_fetch_assoc($meQuery)) {
        $ID = $row['ID'];
      }

      if($ExpireDate =='--'){
        $insertEx = "";
      }else{
        $insertEx = "docrevision.ExpireDate = '$ExpireDate',";
      }

      $Sql = "UPDATE docrevision SET      $insertEx 
                                          docrevision.RevNo = '$txt_refDoc', 
                                          docrevision.productID = '$select_Product', 
                                          docrevision.DocumentID = '$select_headdoc'  
              WHERE
              docrevision.ID = '$ID' ;";

      mysqli_query($conn, $Sql);

      if($ExpireDate =='--'){
        $insertEx = "";
      }else{
        $insertEx = "productdoc.ExpireDate = '$ExpireDate',";
      }

      $Sql2 = "UPDATE productdoc SET productdoc.ProductID = '$select_Product' , 
                                      productdoc.DocumentID = '$select_headdoc',
                                      productdoc.UploadDate = NOW(),
                                      productdoc.DocType = '$inoff', 
                                      productdoc.DocTypeID = '$select_doctype2', 
                                      productdoc.MFGDate = '$MFGDate', 
                                      $insertEx 
                                      productdoc.DocNumber = '$txt_DocNo'  WHERE productdoc.ID = '$ID_txt' ;";
      mysqli_query($conn, $Sql2);


    }
  } else {
  }





  // $txt_date_doc = explode("-", $txt_date_doc);
  // $txt_date_doc = $txt_date_doc[2].'-'.$txt_date_doc[1].'-'.$txt_date_doc[0];

  // $txt_expira_date = explode("-", $txt_expira_date);
  // $txt_expira_date = $txt_expira_date[2].'-'.$txt_expira_date[1].'-'.$txt_expira_date[0];


  // if ($select_doctype2 == 2) {
  //   $ANDdoc_pro = "documentlist.productID = '0' ";
  // } else {
  //   $ANDdoc_pro = "documentlist.productID = '$select_Product' ";
  // }



  // $query = "UPDATE documentlist 
  //                   SET documentlist.DocNumber = '$txt_DocNo',
  //                   documentlist.DocName = '$txt_Doc_name',
  //                   documentlist.DocType = '$StatusRadio',
  //                   documentlist.DocType_Detail = '$select_doctype2',
  //                   $ANDdoc_pro,
  //                   documentlist.Description = '$txt_detail',
  //                   documentlist.SignificantFigure = '$txt_Doc_numbar',
  //                   -- documentlist.ValidDate = '$txt_expira_date',
  //                   documentlist.ModifyDate = NOW()
  //               WHERE ID = '$ID_txt'";

  $return = "แก้ไขข้อมูล สำเร็จ";


  // mysqli_query($conn, $query);
  echo $return;
  unset($conn);
  die;
}

function saveData($conn)
{

  $txt_DocNo    = $_POST['txt_DocNo'];
  $txt_refDoc     = $_POST['txt_refDoc'];
  $inoff     = $_POST['inoff'];
  $select_doctype2     = $_POST['select_doctype2'];
  $select_headdoc     = $_POST['select_headdoc'];
  $select_Product     = $_POST['select_Product'];
  $MFGDate    = $_POST['MFGDate'];
  $ExpireDate    = $_POST['ExpireDate'];
  $txt_detail    = $_POST['txt_detail'];

  $MFGDate    = explode('-', $MFGDate);
  $MFGDate = $MFGDate[2] . '-' . $MFGDate[1] . '-' . $MFGDate[0];
  $ExpireDate    = explode('-', $ExpireDate);
  $ExpireDate = $ExpireDate[2] . '-' . $ExpireDate[1] . '-' . $ExpireDate[0];

  $filename = $_FILES['file_upload']['name'];
  $filename_TH = iconv("UTF-8", "TIS-620", $filename);
  copy($_FILES['file_upload']['tmp_name'], 'file/' . $filename); // อัพไฟล์ SERVER *****


  $select = "SELECT
                docrevision.version,
	              LPAD( ( COALESCE ( MAX( CONVERT ( SUBSTRING( version, 1, 2 ), UNSIGNED INTEGER )), 0 ) + 1 ), 2, 0 ) AS versionUpdate
              FROM
                docrevision
              WHERE
                  docrevision.productID = '$select_Product'
              AND  docrevision.DocumentID = '$select_headdoc'
              ORDER BY docrevision.ID DESC LIMIT 1";
  $meQuery = mysqli_query($conn, $select);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $version = $row['version'] == null ? '' : $row['version'];
    $versionUpdate = $row['versionUpdate'] == null ? '' : $row['versionUpdate'];
  }


  if ($version == "") {
    if($ExpireDate =='--'){
      $insertEx = "";
    }else{
      $insertEx = "docrevision.ExpireDate = '$ExpireDate',";
    }
    $Sql = "INSERT INTO docrevision SET docrevision.fileName = '$filename' , 
            docrevision.version = '00', 
            docrevision.UploadDate = NOW(),
            docrevision.RegistrationDate = NOW(), 
            $insertEx
            docrevision.RevNo = '$txt_refDoc', 
            docrevision.productID = '$select_Product', 
            docrevision.DocumentID = '$select_headdoc'  ;";

    if (mysqli_query($conn, $Sql)) {
      $select = "SELECT
                        docrevision.ID
                      FROM
                        docrevision
                      WHERE
                          docrevision.productID = '$select_Product'
                      AND  docrevision.DocumentID = '$select_headdoc'
                      ORDER BY docrevision.version DESC LIMIT 1";
      $meQuery = mysqli_query($conn, $select);
      while ($row = mysqli_fetch_assoc($meQuery)) {
        $ID = $row['ID'];
      }
    }


    if($ExpireDate =='--'){
      $insertEx = "";
    }else{
      $insertEx = "productdoc.ExpireDate = '$ExpireDate',";
    }

    $Sql2 = "INSERT INTO productdoc SET productdoc.ProductID = '$select_Product' , 
            productdoc.DocumentID = '$select_headdoc',
            productdoc.UploadDate = NOW(),
            productdoc.DocType = '$inoff', 
            productdoc.ID_FileDoc = '$ID', 
            productdoc.DocTypeID = '$select_doctype2', 
            productdoc.MFGDate = '$MFGDate', 
            $insertEx 
            productdoc.DocNumber = '$txt_DocNo'  ;";
    mysqli_query($conn, $Sql2);
  } else {

    $Sql = "INSERT INTO docrevision SET docrevision.fileName = '$filename' , 
            docrevision.version = '$versionUpdate', 
            docrevision.UploadDate = NOW(), 
            docrevision.RevNo = '$txt_refDoc', 
            docrevision.productID = '$select_Product', 
            docrevision.DocumentID = '$select_headdoc'  ;";

    if (mysqli_query($conn, $Sql)) {
      $select = "SELECT
            docrevision.ID
          FROM
            docrevision
          WHERE
               docrevision.productID = '$select_Product'
          AND  docrevision.DocumentID = '$select_headdoc'
          ORDER BY docrevision.version DESC LIMIT 1";
      $meQuery = mysqli_query($conn, $select);
      while ($row = mysqli_fetch_assoc($meQuery)) {
        $ID = $row['ID'];
      }
    }


    $select = "SELECT
                          productdoc.ID
                        FROM
                          productdoc
                        WHERE
                          productdoc.productID = '$select_Product'
                        AND  productdoc.DocumentID = '$select_headdoc'
                        LIMIT 1";
    $meQuery = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($meQuery)) {
      $ID_PRO = $row['ID'];
    }

    if($ExpireDate =='--'){
      $insertEx = "";
    }else{
      $insertEx = "productdoc.ExpireDate = '$ExpireDate',";
    }

    $Sql2 = "UPDATE productdoc SET productdoc.ProductID = '$select_Product' , 
                    productdoc.DocumentID = '$select_headdoc',
                    productdoc.UploadDate = NOW(),
                    productdoc.DocType = '$inoff', 
                    productdoc.ID_FileDoc = '$ID', 
                    productdoc.DocTypeID = '$select_doctype2', 
                    productdoc.MFGDate = '$MFGDate', 
                    $insertEx 
                    productdoc.DocNumber = '$txt_DocNo'  WHERE productdoc.ID = '$ID_PRO' ;";
    mysqli_query($conn, $Sql2);
  }












  $return = "เพิ่มข้อมูล สำเร็จ";
  // $Sql2 = " SELECT
  //                      documentlist.DocNumber
  //                     FROM
  //                     documentlist
  //                     WHERE  documentlist.DocNumber = '$txt_DocNo' ";

  // $result = mysqli_query($conn, $Sql2);
  // $num_rows = mysqli_num_rows($result);
  // if ($num_rows > 0) {
  //   $return = "0";
  // } else {


  //   $query = "INSERT INTO documentlist 
  //                     SET documentlist.DocNumber = '$txt_DocNo',
  //                     documentlist.DocName = '$txt_Doc_name',
  //                     documentlist.DocType = '$StatusRadio',
  //                     documentlist.DocType_Detail = '$select_doctype2',
  //                     documentlist.productID = '$select_Product',
  //                     documentlist.Description = '$txt_detail',
  //                     documentlist.SignificantFigure = '$txt_Doc_numbar',
  //                     documentlist.ModifyDate = NOW()
  //                     ";

  //   $return = "เพิ่มข้อมูล สำเร็จ";
  //   mysqli_query($conn, $query);
  // }



  echo $return;
  unset($conn);
  die;
}

function show_data($conn)
{
  $Search_txt = $_POST["Search_txt"];
  $select_doc = $_POST["select_doc"];
  $select_doctype = $_POST["select_doctype"];
  $select_productt = $_POST["select_productt"];


  if ($select_doc == 0) {
    $ANDdoc = "";
  } else {
    $ANDdoc = "AND productdoc.DocType = '$select_doc' ";
  }

  if ($select_doctype == 0) {
    $ANDdoc_type = "";
  } else {
    $ANDdoc_type = "AND productdoc.DocTypeID = '$select_doctype' ";
  }

  if ($select_productt == 0) {
    $ANDdoc_pro = "";
  } else {
    $ANDdoc_pro = "AND productdoc.productID = '$select_productt' ";
  }

  $Sql = "SELECT
          productdoc.ID,
          productdoc.DocNumber,
          doctype_detail.TypeDetail_Name,
          documentlist.DocName,
          IF( product.ProductName=0,product.ProductName,'ทุก Product'  ) AS ProductName,
          docrevision.RevNo,
          docrevision.version,
          product.ProductCode,
          DATE_FORMAT( productdoc.MFGDate, '%d-%m-%Y' ) AS MFGDate,
          DATE_FORMAT( productdoc.ExpireDate, '%d-%m-%Y' ) AS ExpireDate 
        FROM
          productdoc
          INNER JOIN doctype_detail ON productdoc.DocTypeID = doctype_detail.ID
          INNER JOIN documentlist ON productdoc.DocumentID = documentlist.ID
          LEFT JOIN product ON productdoc.ProductID = product.ID
          LEFT JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID 
          WHERE (productdoc.DocNumber LIKE '%$Search_txt%' OR productdoc.DocNumber LIKE '%$Search_txt%'	) 
          $ANDdoc
          $ANDdoc_type
          $ANDdoc_pro ";



  // echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    if ($row['RevNo'] == null) {
      $row['RevNo'] = "";
    }
    if ($row['ExpireDate'] == null) {
      $row['ExpireDate'] = "";
    }
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function show_Detail($conn)
{
  $ID = $_POST["ID"];

  $Sql = "SELECT
          productdoc.ID,
          productdoc.DocNumber,
          productdoc.DocTypeID,
          productdoc.DocumentID,
          productdoc.ProductID,
          docrevision.RevNo,
          docrevision.fileName,
          DATE_FORMAT( productdoc.MFGDate, '%d-%m-%Y' ) AS MFGDate,
          DATE_FORMAT( productdoc.ExpireDate, '%d-%m-%Y' ) AS ExpireDate , 
	        productdoc.DocType,
          IF( product.ProductName=0,product.ProductName,'ทุก Product'  ) AS ProductName
        FROM
          productdoc
          LEFT JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
          LEFT JOIN product ON productdoc.ProductID = product.ID
          WHERE productdoc.ID = '$ID' ";



  // echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    if ($row['RevNo'] == null) {
      $row['RevNo'] = "";
    }
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
  // $docdetail_id = $_POST["docdetail_id"];
  // $productID = $_POST["productID"];
  // $Sql = "SELECT
  //             documentlist.ID,
  //             documentlist.DocNumber,
  //             documentlist.DocName,
  //             documentlist.DocType,
  //             documentlist.DocType_Detail,
  //             documentlist.Description,
  //             documentlist.SignificantFigure,
  //             DATE_FORMAT(documentlist.RegistrationDate ,'%d-%m-%Y') AS RegistrationDate,
  //             DATE_FORMAT(documentlist.ValidDate ,'%d-%m-%Y') AS ValidDate,
  //             documentlist.ModifyDate,
  //             documentlist.productID,

  //             product.ProductName,   
  //             doctype_detail.ID AS docdetail_id,
  //             doctype_detail.TypeDetail_Name
  //         FROM
  //         documentlist
  //         INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
  //         LEFT JOIN product ON documentlist.productID = product.ID

  //           WHERE documentlist.ID = '$ID'
  //           AND doctype_detail.ID = '$docdetail_id'
  //           AND documentlist.productID = '$productID'
  //         ";
  // //  echo  $Sql;
  // $meQuery = mysqli_query($conn, $Sql);
  // while ($row = mysqli_fetch_assoc($meQuery)) {
  //   $return[] = $row;
  // }


  // echo json_encode($return);
  // mysqli_close($conn);
  // die;
}


function deleteData($conn)
{
  $ID_txt = $_POST['ID_txt'];
  $select_headdoc = $_POST['select_headdoc'];
  $select_Product = $_POST['select_Product'];


  $query = "DELETE FROM productdoc WHERE ID = '$ID_txt'";
  mysqli_query($conn, $query);

  $query2 = "DELETE FROM docrevision WHERE docrevision.productID = '$select_Product' AND  docrevision.DocumentID = '$select_headdoc'";
  mysqli_query($conn, $query2);



  echo "ลบข้อมูลสำเร็จ";
  unset($conn);
  die;
}

function saveData2($conn)
{

  $txt_detail_name    = $_POST['txt_detail_name'];

  $query = "INSERT INTO doctype_detail 
          SET TypeDetail_Name = '$txt_detail_name'
          ";

  $return = "เพิ่มข้อมูล สำเร็จ";
  mysqli_query($conn, $query);



  echo $return;
  unset($conn);
  die;
}
