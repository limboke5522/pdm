<?php
session_start();
require '../connect/connect.php';

if (!empty($_POST['FUNC_NAME'])) {
  if ($_POST['FUNC_NAME'] == 'selection_Product') {
    selection_Product($conn);
  }else   if ($_POST['FUNC_NAME'] == 'upload_Doc') {
    upload_Doc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'show_DataRight') {
    show_DataRight($conn);
  }else   if ($_POST['FUNC_NAME'] == 'show_DataLeft') {
    show_DataLeft($conn);
  }else if ($_POST['FUNC_NAME'] == 'selection_DocDetail') {
    selection_DocDetail($conn);
  }else if ($_POST['FUNC_NAME'] == 'selection_DocDetaill') {
    selection_DocDetaill($conn);
  }else   if ($_POST['FUNC_NAME'] == 'selection_Doc') {
    selection_Doc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'selection_Docc') {
    selection_Docc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'Save_FileDoc') {
    Save_FileDoc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'Delete_FileDoc') {
    Delete_FileDoc($conn);
  } else   if ($_POST['FUNC_NAME'] == 'selection_PRODUCTT') {
    selection_PRODUCTT($conn);
  }else   if ($_POST['FUNC_NAME'] == 'Save_product') {
    Save_product($conn);
  }else   if ($_POST['FUNC_NAME'] == 'Save_Doc') {
    Save_Doc($conn);
  }else   if ($_POST['FUNC_NAME'] == 'get_refNum') {
    get_refNum($conn);
  }

  
}



function selection_DocDetail($conn){
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

function selection_DocDetaill($conn){
  $Sql = "SELECT
            doctype_detail.ID,
            doctype_detail.TypeDetail_Name,
            doctype_detail.SortNo
          FROM
            doctype_detail
            WHERE doctype_detail.IsCancel = 0
            ORDER BY  doctype_detail.SortNo ASC
       ";

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
  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];

  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName,
            documentlist.DocType_Detail,
            documentlist.productID
          FROM
            product
          INNER JOIN documentlist ON product.ID = documentlist.productID
            WHERE product.IsCancel = 0
            AND documentlist.DocType_Detail = '$select_doctype'
            GROUP BY product.ProductName
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

function selection_PRODUCTT($conn)
{
  $select_DocDetail = $_POST["select_DocDetail"];
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];

  $Sql = "SELECT
            product.ID, 
            product.ProductCode, 
            product.ProductName
            -- ,
            -- documentlist.DocType_Detail,
            -- documentlist.productID
          FROM
            product
          -- INNER JOIN documentlist ON product.ID = documentlist.productID
            WHERE product.IsCancel = 0
            -- AND documentlist.DocType_Detail = '$select_DocDetail'
            GROUP BY product.ProductName
            ORDER BY  product.ProductCode ASC
       ";

  $meQuery = mysqli_query($conn, $Sql);
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

  if($select_doctype == 2){
    $ANDdoc_pro = "AND documentlist.productID = 0 ";
  }else{
    $ANDdoc_pro = "AND documentlist.productID = '$select_product' ";
  
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

function selection_Docc($conn)
{
  $select_DocDetail = $_POST["select_DocDetail"];
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];

  if($select_DocDetail == 2){
    $ANDdoc_pro = "AND documentlist.productID = 0 ";
  }else{
    $ANDdoc_pro = "AND documentlist.productID = '$select_Product' ";
  
  }

  $Sql = "SELECT
            documentlist.ID,
            documentlist.DocNumber,
            documentlist.DocName
          FROM
            documentlist
            -- INNER JOIN docproductlist ON documentlist.ID = docproductlist.DocumentID
          WHERE documentlist.IsCancel = 0
          AND documentlist.DocType_Detail = '$select_DocDetail'
					
            ORDER BY  documentlist.DocNumber ASC
       ";
// echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function get_refNum($conn)
{
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];
  
  

  $Sql = "SELECT
            docproductlist.ID,
            docproductlist.DocumentID,
            docproductlist.ProductID,
            docproductlist.refNumber
          FROM
            docproductlist
          WHERE docproductlist.DocumentID = '$select_Doc'
          AND docproductlist.ProductID = '$select_Product'
					
       ";
// echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}


function show_DataLeft($conn)
{
  $Search_txt = $_POST["txtSearch"];

  $select_doctype = $_POST["select_doctype"];
  $select_product = $_POST["select_product"];
  $select_dochead = $_POST["select_dochead"];
  

  if($select_doctype == 0 ){
    $ANDdoc_type = "";
  }else{
    $ANDdoc_type = "AND (documentlist.DocType_Detail = '$select_doctype') ";
  }

  if($select_product == 0 ){
    $ANDdoc = "";
  }else{
    $ANDdoc = "AND (productdoc.ProductID = '$select_product') ";
  }

  if($select_dochead == 0 ){
    $ANDdoc_head = "";
  }else{
    $ANDdoc_head = "AND (documentlist.ID = '$select_dochead') ";
  }

  $Sql_product = "SELECT
                          documentlist.DocName,
                          CASE WHEN product.ProductName IS NULL THEN 'ทุกProduct' ELSE
	                        product.ProductName END AS ProductName,
                          doctype_detail.TypeDetail_Name,
                          docrevision.version AS lasrVersion,
                          documentlist.DocNumber,
                          productdoc.MFGDate,
                          productdoc.ExpireDate,
                          docrevision.fileName,
                          docrevision.DocumentID AS DocID,
                          docrevision.productID AS ProducID,
                          (SELECT docrevision.version FROM docrevision
                            WHERE docrevision.DocumentID = DocID
                            AND docrevision.productID = ProducID
                            ORDER BY docrevision.version DESC
                            LIMIT 1 ) AS newVersion,
                          DATE_FORMAT(productdoc.MFGDate ,'%d-%m-%Y') AS MFGDate,
                          DATE_FORMAT(productdoc.EXpireDate ,'%d-%m-%Y') AS ExpireDatee,
                          DATE_FORMAT(productdoc.UploadDate ,'%d-%m-%Y') AS UploadDate
                        FROM
                          documentlist
                        LEFT JOIN docrevision ON documentlist.ID = docrevision.DocumentID
                        LEFT JOIN product ON docrevision.productID = product.ID
                        INNER JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc
                        INNER JOIN doctype_detail ON productdoc.DocTypeID = doctype_detail.ID
                  WHERE
                  (documentlist.DocName LIKE '%$Search_txt%'
                  OR  documentlist.DocNumber LIKE '%$Search_txt%' )
                  $ANDdoc
                  $ANDdoc_type
                  $ANDdoc_head
                  HAVING lasrVersion >= newVersion
                  ORDER BY docrevision.ID DESC
                  LIMIT 10
          ";

// echo $Sql_product;
  $meQuery1 = mysqli_query($conn, $Sql_product);
  while ($row = mysqli_fetch_assoc($meQuery1)) {
        $return[] = $row;
  }
 


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function upload_Doc($conn)
{
  $return =  [];
  // $select_Product = $_POST["select_Product"];
  // $id_docLeft = $_POST["id_docLeft"];
  $filename = $_FILES['upload_fileRight']['name'];

  $filename_TH = iconv("UTF-8", "TIS-620", $filename);

  // copy($_FILES['upload_fileRight']['tmp_name'], 'file/' . $filename_TH); // อัพไฟล์ LOCAL *****
  copy($_FILES['upload_fileRight']['tmp_name'], 'file/' . $filename); // อัพไฟล์ SERVER *****

  $Sql = "INSERT INTO docrevision SET docrevision.fileName = '$filename' , 
                                      docrevision.version = 1, 
                                      -- docrevision.productID = '$select_Product', 
                                      docrevision.UploadDate = NOW()  ;";
  mysqli_query($conn, $Sql);




  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function Save_FileDoc($conn)
{
  $select_DocDetail = $_POST["select_DocDetail"];
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];

  $bt_MFGDate = $_POST["bt_MFGDate"];
  $bt_ExpireDate = $_POST["bt_ExpireDate"];
  $txt_Refcode = $_POST["txt_Refcode"];

  $select_product = $_POST["select_product"];
  $ID = $_POST["ID"];

  $Sql_docrevision = "SELECT
                        docrevision.ID,
                        docrevision.version 
                      FROM
                        docrevision
                      WHERE docrevision.productID = '$select_Product'  
                      AND docrevision.DocumentID = '$select_Doc'
                      ORDER BY docrevision.version DESC LIMIT 1";

  $meQuery_docrevision = mysqli_query($conn, $Sql_docrevision);
  $row_docrevision = mysqli_fetch_assoc($meQuery_docrevision);
  $ID_docrevision = $row_docrevision['ID'];
  $version = $row_docrevision['version'];

  
    if(empty($ID_docrevision)){
      $query = "UPDATE docrevision SET docrevision.productID = '$select_Product' ,docrevision.DocumentID = '$select_Doc', 
                docrevision.IsActive = '1' ,  docrevision.RegistrationDate = '$bt_MFGDate', docrevision.ExpireDate = '$bt_ExpireDate' WHERE ID = '$ID' ";
      mysqli_query($conn, $query);
       
      
    }else{
      $version=($version+1);
     
      $query = "UPDATE docrevision SET docrevision.productID = '$select_Product' ,docrevision.DocumentID = '$select_Doc',version = '$version' ,
                docrevision.IsActive = '0', docrevision.RegistrationDate = '$bt_MFGDate', docrevision.ExpireDate = '$bt_ExpireDate' WHERE ID = '$ID' ";
      mysqli_query($conn, $query);
    }
  


    $Sql = "INSERT INTO productdoc SET productdoc.ProductID = '$select_Product' , 
                                       productdoc.DocumentID = '$select_Doc',
                                       productdoc.ID_FileDoc = '$ID' , 
                                       productdoc.DocTypeID = '$select_DocDetail' ,
                                       productdoc.MFGDate = '$bt_MFGDate' ,
                                       productdoc.ExpireDate = '$bt_ExpireDate' ,
                                       productdoc.UploadDate = NOW() ";
            mysqli_query($conn, $Sql);

            $Sql_refNumber = "SELECT
                            docproductlist.ID,
                            docproductlist.DocumentID,
                            docproductlist.ProductID,
                            docproductlist.refNumber
                          FROM
                            docproductlist
                            WHERE docproductlist.ProductID = '$select_Product'  
                            AND docproductlist.DocumentID = '$select_Doc'";

                          $meQuery_refNumber = mysqli_query($conn, $Sql_refNumber);
                          $row_refNumber = mysqli_fetch_assoc($meQuery_refNumber);
                          
                          $ID_refNumber = $row_refNumber['ID'];


                          if(empty($ID_refNumber)){
                            $Sql = "INSERT INTO docproductlist SET docproductlist.ProductID = '$select_Product' , 
                                       docproductlist.DocumentID = '$select_Doc',
                                       docproductlist.refNumber = '$txt_Refcode' ";
                           mysqli_query($conn, $Sql);
                          }else{
                           $query = "UPDATE docproductlist SET docproductlist.DocumentID = '$select_Doc' ,docproductlist.ProductID = '$select_Product', 
                                      docproductlist.refNumber = '$txt_Refcode'  
                                      WHERE ID = '$ID_refNumber' 
                                      AND docproductlist.ProductID = '$select_Product'  
                                      AND docproductlist.DocumentID = '$select_Doc' ";
                            mysqli_query($conn, $query);
                          }

                          



// echo  $Sql;
            // $return =$version;

  $return = "บันทึกข้อมูลสำเร็จ";
  echo $return;
  unset($conn);
  die;
}

function Save_product($conn)
{
  $txt_item_code = $_POST["txt_item_code"];
  $txt_item_name = $_POST["txt_item_name"];

  $select_DocDetail = $_POST["select_DocDetail"];
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];

  $bt_MFGDate = $_POST["bt_MFGDate"];
  $bt_ExpireDate = $_POST["bt_ExpireDate"];

  $select_product = $_POST["select_product"];
  $ID = $_POST["ID"];

  $Sql_docrevision = "SELECT
                        docrevision.ID,
                        docrevision.version 
                      FROM
                        docrevision
                      LEFT JOIN productdoc ON docrevision.ID = productdoc.ID_FileDoc

                      WHERE docrevision.productID = '$select_Product'  
                      AND docrevision.DocumentID = '$select_Doc'
                      ORDER BY docrevision.version DESC LIMIT 1";

  $meQuery_docrevision = mysqli_query($conn, $Sql_docrevision);
  $row_docrevision = mysqli_fetch_assoc($meQuery_docrevision);
  $ID_docrevision = $row_docrevision['ID'];
  $version = $row_docrevision['version'];


    $Sql = "INSERT INTO product SET product.ProductCode = '$txt_item_code' , 
                                    product.ProductName = '$txt_item_name' ";
            mysqli_query($conn, $Sql);


  $return = "บันทึกข้อมูลสำเร็จ";
  echo $return;
  unset($conn);
  die;
}

function Save_Doc($conn)
{
  
  $select_DocDetail    = $_POST['select_DocDetail'];

  $txt_DocNo    = $_POST['txt_DocNo'];
  $txt_Doc_name    = $_POST['txt_Doc_name'];
  $txt_Doc_numbar     = $_POST['txt_Doc_numbar'];
  // $txt_date_doc     = $_POST['txt_date_doc'];
  $txt_expira_date     = $_POST['txt_expira_date'];
  $txt_detail     = $_POST['txt_detail'];
  $StatusRadio     = $_POST['StatusRadio'];
  $select_doctype2     = $_POST['select_doctype2'];
  $select_Product    = $_POST['select_Product'];
  
            $Sql2 = " SELECT
                       documentlist.DocNumber
                      FROM
                      documentlist
                      WHERE  documentlist.DocNumber = '$txt_DocNo'
                    ";

      $meQuery = mysqli_query($conn, $Sql2);
      while ($row = mysqli_fetch_assoc($meQuery)) {
        $return[] = $row;

        
      }
      $query = "INSERT INTO documentlist 
      SET documentlist.DocNumber = '$txt_DocNo',
      documentlist.DocName = '$txt_Doc_name',
      documentlist.SignificantFigure = '$txt_Doc_numbar',

      documentlist.Description = '$txt_detail',
      documentlist.DocType = '$StatusRadio',
      documentlist.DocType_Detail = '$select_DocDetail',
      -- documentlist.productID = '$select_Product',
      
      documentlist.ModifyDate = NOW()
      ";

$return = "เพิ่มข้อมูล สำเร็จ";
mysqli_query($conn, $query);

            
          
            
    
 
  echo $return;
  unset($conn);
  die;
}

function show_DataRight($conn)
{

  $select_Product = $_POST["select_Product"];
  $Search_txt = $_POST["txtSearch2"];
  // $id_docLeft = $_POST["id_docLeft"];
  
  // if($select_dochead == 0 ){
  //   $ANDdoc_head = "";
  // }else{
  //   $ANDdoc_head = "AND documentlist.DocNumber = '$ANDdoc_head' ";
  // }

  $Sql = "SELECT
            docrevision.ID,
            docrevision.fileName, 
            docrevision.version, 
            DATE_FORMAT(docrevision.UploadDate ,'%d-%m-%Y') AS UploadDate_R,
            docrevision.DocumentID,
            productdoc.DocTypeID
          FROM
            docrevision

            INNER JOIN productdoc ON docrevision.productID = productdoc.ProductID
            -- LEFT JOIN docproductlist ON docproductlist.DocumentID = docrevision.DocumentID
          WHERE docrevision.DocumentID = 0
          -- OR docrevision.IsActive = 1
          AND docrevision.fileName LIKE '%$Search_txt%' 
          GROUP BY docrevision.ID
          ORDER BY  docrevision.ID DESC
          ";

        // echo $Sql;
  $meQuery = mysqli_query($conn, $Sql);
  while ($row = mysqli_fetch_assoc($meQuery)) {
    $return[] = $row;
  }


  echo json_encode($return);
  mysqli_close($conn);
  die;
}

function Delete_FileDoc($conn)
{

  $select_DocDetail = $_POST["select_DocDetail"];
  $select_Product = $_POST["select_Product"];
  $select_Doc = $_POST["select_Doc"];
  $select_product = $_POST["select_product"];
  $ID = $_POST["ID"];

  $Sql_docrevision = "SELECT
                        docrevision.ID,
                        docrevision.version 
                      FROM
                        docrevision
                      WHERE docrevision.productID = '$select_Product'  
                      AND docrevision.DocumentID = '$select_Doc'
                      ORDER BY docrevision.version DESC LIMIT 1";

  $meQuery_docrevision = mysqli_query($conn, $Sql_docrevision);
  $row_docrevision = mysqli_fetch_assoc($meQuery_docrevision);
  $ID_docrevision = $row_docrevision['ID'];
  $version = $row_docrevision['version'];
  
    // if(empty($ID_docrevision)){
    //   $query = "DELETE FROM docrevision  WHERE ID = '$ID' ";
    //   mysqli_query($conn, $query);
    // }else{
    //   $version=($version+1);
     
    //   $query = "UPDATE docrevision SET DocumentID = '$select_Doc',version = '$version' WHERE ID = '$ID' ";
    //   mysqli_query($conn, $query);
    // }
  


    $Sql = "DELETE FROM docrevision  WHERE ID = '$ID' ";
            mysqli_query($conn, $Sql);




            // $return =$version;

  // $return = "บันทึกข้อมูลสำเร็จ";
  // echo $return;
  unset($conn);
  die;
}

