<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'selection_Customer') {
    selection_Customer($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Purpose') {
    selection_Purpose($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Contact') {
    selection_Contact($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  } else if ($_POST['FUNC_NAME'] == 'showDetail_contact') {
    showDetail_contact($conn);
  } else if ($_POST['FUNC_NAME'] == 'product_file') {
    product_file($conn);
  } else if ($_POST['FUNC_NAME'] == 'save_sendDoc') {
    save_sendDoc($conn);
  } else if ($_POST['FUNC_NAME'] == 'edit_sendDoc') {
    edit_sendDoc($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData') {
    saveData($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData2') {
    saveData2($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_DocDetail') {
    selection_DocDetail($conn);
  } else if ($_POST['FUNC_NAME'] == 'selection_DocDetail_L') {
    selection_DocDetail_L($conn);
  } else if ($_POST['FUNC_NAME'] == 'showDocTypeID') {
    showDocTypeID($conn);
  } else if ($_POST['FUNC_NAME'] == 'show_Preview') {
    show_Preview($conn);
  } else if ($_POST['FUNC_NAME'] == 'saveData_Preview') {
    saveData_Preview($conn);
  } else if ($_POST['FUNC_NAME'] == 'showFooter') {
    showFooter($conn);
  } else   if ($_POST['FUNC_NAME'] == 'selection_Doc') {
    selection_Doc($conn);
  } else   if ($_POST['FUNC_NAME'] == 'selection_Doclist') {
    selection_Doclist($conn);
  } else   if ($_POST['FUNC_NAME'] == 'CHECK_sendDoc') {
    CHECK_sendDoc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'deleteDoc_rowDoc') {
    deleteDoc_rowDoc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'check_show_all') {
    check_show_all($conn);
  }else   if ($_POST['FUNC_NAME'] == 'show_DetailPreview') {
    show_DetailPreview($conn);
  }

  
}

function check_show_all($conn)
{
  $select_Doclist = $_POST["select_Doclist"];

  $sql = "SELECT
            doctype_detail.ID,
            doctype_detail.TypeDetail_Name 
          FROM
            documentlist
            INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID 
          WHERE
            documentlist.ID = '$select_Doclist' ";
  $meQuery = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showDocTypeID($conn)
{
  $productID = $_POST["productID2"];

  $Sql = "SELECT
                          productdoc.productID,
                          documentlist.DocType_Detail
                        FROM
                          documentlist
                        LEFT JOIN docrevision ON documentlist.ID = docrevision.DocumentID
                                            LEFT JOIN product ON docrevision.productID = product.ID
                                            INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
                                            INNER JOIN doctype_detail ON productdoc.DocTypeID = doctype_detail.ID
                        WHERE
                          productdoc.productID = $productID 
                        GROUP BY
                          DocType_Detail ";
  // echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function selection_Customer($conn)
{
  $select_hospital = $_POST["select_hospital"];

  $Sql = "SELECT
            customer.ID,
            customer.CustomerCode,
            customer.CustomerName 
          FROM
            customer 
          WHERE
            customer.IsCancel = 0 
            
          AND ( customer.CustomerCode LIKE '%$select_hospital%'
           OR customer.CustomerName LIKE '%$select_hospital%' )
          ORDER BY
            customer.CustomerName ASC ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Purpose($conn)
{
  $Sql = "SELECT
            purpose.ID,
            purpose.Purpose 
          FROM
            purpose";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Contact($conn)
{
  $select_hospital = $_POST["select_hospital"];

  $Sql = "SELECT
            cuscontact.ID,
            cuscontact.ContactName 
          FROM
            cuscontact 
          WHERE
            cuscontact.CustomerID = '$select_hospital' 
            AND cuscontact.IsCancel = 0
          ORDER BY
            cuscontact.ContactName ASC";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Product($conn)
{

  $select_DocTypeID_L = $_POST["select_DocTypeID_L"];

  $Sql = "SELECT
                      product.ID,
                      product.ProductCode,
                      product.ProductName,
                                documentlist.DocType_Detail,
                                documentlist.productID
                    FROM
                    documentlist
                    LEFT JOIN docrevision ON documentlist.ID = docrevision.DocumentID
                    LEFT JOIN product ON docrevision.productID = product.ID
                    INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
                    INNER JOIN doctype_detail ON productdoc.DocTypeID = doctype_detail.ID
          
                    WHERE
                      product.IsCancel = 0
                    AND documentlist.DocType_Detail = '$select_DocTypeID_L'
                    GROUP BY
                      product.ProductName
                    ORDER BY
                      product.ProductName ASC
                      LIMIT 15 ";

  //  echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_DocDetail($conn)
{
  $select_DocTypeID = $_POST["select_DocTypeID"];
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

function selection_DocDetail_L($conn)
{
  $select_DocTypeID_L = $_POST["select_DocTypeID_L"];
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

function selection_Doclist($conn)
{
  // $select_Doclist = $_POST["select_Doclist"];
  $select_DocTypeID_L = $_POST["select_DocTypeID_L"];
  $checkall = $_POST["checkall"];



    $showall = "AND documentlist.DocType_Detail LIKE '%$select_DocTypeID_L%'";
    if($checkall == 1){
      $showall = "";
    }

    $Sql2 = "SELECT
                      documentlist.ID,
                      documentlist.DocNumber,
                      documentlist.DocName,
                      documentlist.DocType_Detail,
                      documentlist.productID
                      FROM
                      documentlist

                      WHERE documentlist.IsCancel = 0
                      $showall
                      ORDER BY  documentlist.DocNumber ASC
                  ";
    // echo ($Sql2);
    $meQuery = mysqli_query($conn, $Sql2);
    while ($row = mysqli_fetch_assoc($meQuery)) {
      $return[] = $row;
    }
  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function selection_Doc($conn)
{
  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];

  if ($select_doctype == 2) {
    $ANDdoc_pro = "AND productdoc.productID = 0 ";
  } else {
    $ANDdoc_pro = "AND productdoc.productID = '$select_product' ";
  }
  $Sql2 = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName,
            documentlist.DocType_Detail,
            documentlist.productID
          FROM
          documentlist
          LEFT JOIN docrevision ON documentlist.ID = docrevision.DocumentID
          LEFT JOIN product ON docrevision.productID = product.ID
          INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
          INNER JOIN doctype_detail ON productdoc.DocTypeID = doctype_detail.ID

          WHERE documentlist.IsCancel = 0
          AND documentlist.DocType_Detail = '$select_doctype'
					$ANDdoc_pro
          GROUP BY documentlist.DocName
            ORDER BY  documentlist.DocNumber ASC
       ";


  // echo $Sql2;

  $meQuery = mysqli_query($conn, $Sql2);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

// detailcontact

function showDetail_contact($conn)
{
  $select_contact = $_POST["select_contact"];

  $Sql = "SELECT
            cuscontact.email,
            cuscontact.Tel 
          FROM
            cuscontact 
          WHERE
            cuscontact.ID = '$select_contact'  
             ";

  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function product_file($conn)
{
  $id_product = $_POST["id_product"];
  $DocType_Detail = $_POST["DocType_Detail"];
  $txt_product_center = $_POST["txt_product_center"];


  $UserTypeID = $_SESSION["userData"]["UserTypeID"];
  $select_DocTypeID = $_POST["select_DocTypeID"];

  $select_DocTypeID_L = $_POST["select_DocTypeID_L"];
  $select_Doclist = $_POST["select_Doclist"];



  $Sql = "SELECT
            docrevision.DocumentID ,
            productdoc.DocTypeID,
            documentlist.DocType_Detail,
            productdoc.ProductID
          FROM
            productdoc
            INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
            INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 
          WHERE productdoc.ProductID = '$id_product'
          -- AND productdoc.DocumentID = '$select_Doclist'
          GROUP BY
            docrevision.DocumentID 
          ORDER BY
            documentlist.DocName ASC,
            docrevision.version DESC 
            ";
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $DocumentID = $row['DocumentID'];
    $UserID = $row['UserID'];
    $DocTypeID = $row['DocTypeID'];
    $documentlist_DocType_Detail = $row['DocType_Detail'];
    $pro_id = $row['ProductID'];




    if ($select_DocTypeID_L == 2) {
      $ANDdoc_type = " (    productdoc.DocTypeID = 2
                        AND productdoc.DocumentID = '$DocumentID') ";
    } else {
      $ANDdoc_type = " (    productdoc.DocTypeID = '$select_DocTypeID_L'
                        AND productdoc.ProductID = '$pro_id'
                        AND productdoc.DocumentID = '$DocumentID') ";
    }

    if ($select_Doclist ==  0) {
      $ANDdoc_type2 = "";
    } else {
      $ANDdoc_type2 = " AND (productdoc.DocumentID = '$select_Doclist' )";
    }

    $Sql_2 = "SELECT
                docrevision.fileName,
                docrevision.DocumentID,
                productdoc.ID,
                productdoc.DocTypeID,
                docrevision.version AS lasrVersion,
                docrevision.version,
                productdoc.DocumentID AS DType,
              (SELECT GROUP_CONCAT(CONCAT(usertype.UserType2)  ORDER BY usertype.SortUserTypeNo ASC )FROM userdoc 
              INNER JOIN usertype ON userdoc.UserTypeID = usertype.ID
              where userdoc.DocumentID = DType) AS permis ,
              docrevision.DocumentID AS DocID,
              docrevision.productID AS ProducID,
                    (SELECT docrevision.version FROM docrevision
                              WHERE docrevision.DocumentID = DocID
                              AND docrevision.productID = ProducID
                              ORDER BY docrevision.version DESC  LIMIT 1) AS newVersion,
                documentlist.DocNumber,
                documentlist.DocName,
                (
                SELECT
                  DocumentID
                FROM
                  userdoc
                WHERE
                  UserTypeID = '$UserTypeID'
                AND DocumentID = '$DocumentID'
                ) AS sub,
                doctype_detail.ID AS doctype_detailID,
                doctype_detail.TypeDetail_Name
              FROM
                productdoc
              INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
              INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID
              INNER JOIN doctype_detail ON documentlist.DocType_Detail = doctype_detail.ID
              WHERE
              $ANDdoc_type 
              $ANDdoc_type2
              HAVING lasrVersion>=newVersion
              
              ORDER BY
                docrevision.version,
                docrevision.DocumentID DESC 
                
            ";
    $meQuery2 = mysqli_query($conn, $Sql_2);
    while ($row2 = mysqli_fetch_assoc($meQuery2)) {
      $return[] = $row2;
    }
  }

  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function CHECK_sendDoc($conn)
{
  $Sqll = "SELECT send_doc.SendDocNo FROM send_doc ORDER BY SendDocNo DESC LIMIT 1";

  // echo $Sqll;
  $meQuery = mysqli_query($conn, $Sqll);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function save_sendDoc($conn)
{
  $select_hospital   = $_POST['select_hospital'];
  $select_subject    = $_POST['select_subject'];
  $select_contact    = $_POST['select_contact'];
  $email             = $_POST['email'];
  $txt_remark        = $_POST['txt_remark'];
  $txt_headdoc        = $_POST['txt_headdoc'];
  $productID         = $_POST['productID'];
  $DocID             = $_POST['DocID'];
  $Copy_doc             = $_POST['Copy_doc'];


  $Sql = "SELECT	LPAD( ( COALESCE ( MAX( CONVERT ( SUBSTRING( SendDocNo, 2, 6 ), UNSIGNED INTEGER )), 0 )+ 1 ), 7, 0 ) AS SendDocNo 
          FROM
            send_doc 
          ORDER BY
            SendDocNo DESC 
            LIMIT 1";
  $meQuery = mysqli_query($conn, $Sql);
  $row = mysqli_fetch_assoc($meQuery);
  $SendDocNo = $row['SendDocNo'];

  $query = "  INSERT INTO send_doc 
              SET CustomerCode = '$select_hospital',
                  SendDocNo = '$SendDocNo',
                  Contact_ID = '$select_contact',
                  Subject = '$select_subject',
                  Copy_doc = '$Copy_doc',
                  Memo = '$txt_remark',
                  Memo_Headdoc = '$txt_headdoc',
                  DocDate = NOW(),
                  email = '$email'
          ";
          // echo $query;
  mysqli_query($conn, $query);

  foreach ($DocID as $key => $value) {
    $query1 = "  INSERT INTO send_doc_detail 
              SET SendDocNo = '$SendDocNo',
              ProductID = '$productID[$key]',
              Product_DocID = '$value'
          ";
    mysqli_query($conn, $query1);
  }


  $return = $SendDocNo;

  // $return = $DocID;

  echo ($return);
  unset($conn);
  die;
}


function edit_sendDoc($conn)
{
  $select_hospital   = $_POST['select_hospital'];
  $select_subject    = $_POST['select_subject'];
  $select_contact    = $_POST['select_contact'];
  $email             = $_POST['email'];
  $txt_remark        = $_POST['txt_remark'];
  $txt_headdoc       = $_POST['txt_headdoc'];
  $productID         = $_POST['productID'];
  $DocID             = $_POST['DocID'];
  $Copy_doc          = $_POST['Copy_doc'];


  $Sql = "SELECT	SendDocNo FROM send_doc ORDER BY SendDocNo DESC LIMIT 1";
  $meQuery = mysqli_query($conn, $Sql);
  $row = mysqli_fetch_assoc($meQuery);
  $SendDocNo = $row['SendDocNo'];

  $query = "   UPDATE send_doc 
              SET CustomerCode = '$select_hospital',
                  SendDocNo = '$SendDocNo',
                  Contact_ID = '$select_contact',
                  Subject = '$select_subject',
                  Copy_doc = '$Copy_doc',
                  Memo = '$txt_remark',
                  Memo_Headdoc = '$txt_headdoc',
                  DocDate = NOW(),
                  email = '$email'
                WHERE SendDocNo = '$SendDocNo' ";
          // echo $query;
  mysqli_query($conn, $query);
            
             
                  foreach ($DocID as $key => $value) {
                
                      $Sql2 = "SELECT	COUNT(Product_DocID) AS Cnt_Product_DocID 
                                FROM send_doc_detail 
                                WHERE Product_DocID = '$value'
                                AND  SendDocNo = '$SendDocNo' ";
  
                      $meQuery = mysqli_query($conn, $Sql2);
                      $row2 = mysqli_fetch_assoc($meQuery);
                      $Cnt_Product_DocID = $row2['Cnt_Product_DocID'];
                      

                    if($Cnt_Product_DocID == 1){

                    }else{
                    $query1 = "  INSERT INTO send_doc_detail 
                                  SET SendDocNo = '$SendDocNo',
                                  ProductID = '$productID[$key]',
                                  Product_DocID = '$value' ";
                              // echo $query1;
                        
                    
                    mysqli_query($conn, $query1);
                  }
                  
                }
 




  $return = $SendDocNo;

  // $return = $DocID;

  echo ($return);
  unset($conn);
  die;
}

function deleteDoc_rowDoc($conn)
{
  $DocID     = $_POST['DocID'];
  $SendDocNo     = $_POST['chk_sender'];

  $query = "DELETE FROM send_doc_detail 
            WHERE  SendDocNo = '$SendDocNo' 
            AND Product_DocID = '$DocID' ";
  mysqli_query($conn, $query);
  $return = $query;
  echo $return;
  unset($conn);
  die;
}
 
function saveData($conn)
{

  $select_hospital    = $_POST['select_hospital'];
  $txt_contact_name    = $_POST['txt_contact_name'];
  $txt_deb_name     = $_POST['txt_deb_name'];
  $txt_email2     = $_POST['txt_email2'];
  $txt_phonenumber     = $_POST['txt_phonenumber'];

  $query = "  INSERT INTO cuscontact 
                      SET ContactName = '$txt_contact_name',
                          Department = '$txt_deb_name',
                          email = '$txt_email2',
                          Tel = '$txt_phonenumber',
                          CustomerID = '$select_hospital'
          ";

  $return = "????????????????????????????????? ??????????????????";
  mysqli_query($conn, $query);



  echo $return;
  unset($conn);
  die;
}

function saveData2($conn)
{

  $txt_purpose_name    = $_POST['txt_purpose_name'];

  $query = "INSERT INTO purpose 
          SET Purpose = '$txt_purpose_name'
          ";

  $return = "????????????????????????????????? ??????????????????";
  mysqli_query($conn, $query);



  echo $return;
  unset($conn);
  die;
}

function show_Preview($conn)
{
  $chk_sender = $_POST["chk_sender"];

  $Sqll = "SELECT
              productdoc.ID_FileDoc,
              docrevision.fileName,
              SUBSTRING(docrevision.fileName, 1, 13) AS fileNameee,
              docrevision.version,
              documentlist.DocName,
              product.ProductName,
              send_doc.`Subject`,
	            purpose.Purpose,
              send_doc.SendDocNo,
              send_doc.DocDate,
              send_doc.email,
              send_doc.Memo,
              send_doc.Memo_Headdoc
              FROM
              send_doc
              INNER JOIN send_doc_detail ON send_doc.SendDocNo = send_doc_detail.SendDocNo
              INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
              INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
              INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 
              LEFT JOIN product ON send_doc_detail.ProductID = product.ID 
              INNER JOIN purpose ON send_doc.`Subject` = purpose.ID
              WHERE
              send_doc.SendDocNo = '$chk_sender'
              ORDER BY  product.ProductName ASC   ";

  $meQuery = mysqli_query($conn, $Sqll);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }
  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function show_DetailPreview($conn)
{
  $chk_sender = $_POST["chk_sender"];

  $Sql_product = "SELECT
            send_doc_detail.ProductID,
            product.ProductName,
            send_doc.Memo,
            send_doc.Memo_Headdoc,
            send_doc_detail.ID	
          FROM
            send_doc_detail
            INNER JOIN send_doc ON send_doc_detail.SendDocNo = send_doc.SendDocNo
            LEFT JOIN product ON send_doc_detail.ProductID = product.ID
            WHERE send_doc_detail.SendDocNo = '$chk_sender'
            GROUP BY send_doc_detail.ProductID
            ORDER BY send_doc_detail.ProductID ASC";

  $meQuery_product = mysqli_query($conn, $Sql_product);
  while ($row_product = mysqli_fetch_assoc($meQuery_product)) {

    $return['Product'][] = $row_product;
    $ID =  $row_product['ID'];

    if($row_product['ProductID']=='undefined'){
      $Sql_Doc_list = "SELECT
                          send_doc_detail.Product_DocID,
                          documentlist.DocName	
                      FROM
                          send_doc_detail
                          INNER JOIN send_doc ON send_doc_detail.SendDocNo = send_doc.SendDocNo
                          INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
                          INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
                          INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 	
                        WHERE send_doc_detail.SendDocNo = '$chk_sender'
                        AND 	send_doc_detail.ProductID ='undefined'
                        ";
    }else{
      $ProductID =  $row_product['ProductID'];

      $Sql_Doc_list = "SELECT
                          send_doc_detail.Product_DocID,
                          documentlist.DocName	
                        FROM
                          send_doc_detail
                          INNER JOIN send_doc ON send_doc_detail.SendDocNo = send_doc.SendDocNo
                          INNER JOIN productdoc ON send_doc_detail.Product_DocID = productdoc.ID
                          INNER JOIN docrevision ON productdoc.ID_FileDoc = docrevision.ID
                          INNER JOIN documentlist ON docrevision.DocumentID = documentlist.ID 	
                        WHERE send_doc_detail.SendDocNo = '$chk_sender'
                        AND 	send_doc_detail.ProductID ='$ProductID ' ";

    }
   

    $meQuery_Doc_list = mysqli_query($conn, $Sql_Doc_list);
    while ($row_Doc_list = mysqli_fetch_assoc($meQuery_Doc_list)) {
      $return['Doc_list'][$ID][] = $row_Doc_list;
    }




     
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function showFooter($conn)
{

  $footer_title = $_POST["footer_title"];
  $f_l_name = $_POST["f_l_name"];
  $Tel = $_POST["Tel"];

  $Sqlluser = "SELECT
                        employee.fname,
                        employee.lname,
                        footer_sendemail.footer_title,
                        footer_sendemail.telephone_organization
                        FROM
                        user
                        INNER JOIN employee ON `user`.ID = employee.emp_code
                        INNER JOIN footer_sendemail ON employee.footer_code = footer_sendemail.footer_code
                        WHERE `user`.ID = '1'   ";

  // echo $Sqlluser;
  $meQuery = mysqli_query($conn, $Sqlluser);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }
  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function saveData_Preview($conn)
{
  $memo_headdoc = $_POST["memo_headdoc"];
  $memo = $_POST["memo"];

  $Sql = "SELECT	LPAD( ( COALESCE ( MAX( CONVERT ( SUBSTRING( SendDocNo, 2, 6 ), UNSIGNED INTEGER )), 0 )+ 0 ), 7, 0 ) AS SendDocNo 
FROM
  send_doc 
ORDER BY
  SendDocNo DESC 
  LIMIT 1";
  $meQuery = mysqli_query($conn, $Sql);
  $row = mysqli_fetch_assoc($meQuery);
  $sendDocNo = $row['SendDocNo'];

  $query = "UPDATE send_doc SET send_doc.Send_Status = '1' WHERE send_doc.SendDocNo = '$sendDocNo' ";
  mysqli_query($conn, $query);

  $return = $sendDocNo;
  echo json_encode($return);
  mysqli_close($conn);
  die;
}
