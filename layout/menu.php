 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary sidebar-no-expand elevation-4">
     <!-- Brand Logo -->
     <a href="javascript:void(0)" class="brand-link">
         <!-- <img src="assets/dist/img/Plogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
         <!-- <span class="brand-text font-weight-light">Poseintelligence</span> -->
         <!-- <img src="/assets/dist/img/posehealthcare_logo.png" alt=""> -->
         <img src="assets/dist/img/logo/logo200.png" alt="AdminLTE Logo" class="brand-image col-center " style="margin-left: 40px; width:150px;">
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- super -->

                 <li class="nav-item has-treeview " id="li_notification">
                     <a href="#" class="nav-link " id="a_notification">
                     <i class="fas fa-exclamation-circle"></i>
                         <p>
                             การแจ้งเตือน
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview ul_notification" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=notification_doc" class="nav-link" id="notification_doc">
                             <i class="fas fa-exclamation-circle"></i>
                                 <p>การแจ้งเตือน</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview " id="li_general">
                     <a href="#" class="nav-link" id="a_general">
                         <i class="fas fa-cloud-upload-alt"></i></i>
                         <p>
                         อัพโหลดเอกสาร
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <!-- <ul class="nav nav-treeview ul_general" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=general" class="nav-link" id="general">
                                 <i class="fas fa-home"></i>
                                 <p>ทั่วไป</p>
                             </a>
                         </li>
                     </ul> -->


                     <ul class="nav nav-treeview ul_general" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=upload_doc" class="nav-link " id="upload_doc">
                             <i class="fas fa-cloud-upload-alt"></i>
                                 <p>อัพโหลดเอกสาร</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item has-treeview " id="li_send">
                     <a href="#" class="nav-link " id="a_send">
                     <i class="fas fa-envelope"></i>
                         <p>
                             ส่งเอกสาร
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview ul_send" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=send_doc" class="nav-link" id="send_doc">
                             <i class="fas fa-envelope"></i>
                                 <p>ส่งเอกสาร</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview ul_send" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=history_doc" class="nav-link" id="history_doc">
                             <i class="fas fa-file-alt"></i>
                                 <p>ประวัติเอกสาร</p>
                             </a>
                         </li>
                     </ul>
                 </li>



                 <li class="nav-item has-treeview " id="li_system">
                     <a href="#" class="nav-link " id="a_system">
                         <i class="nav-icon fas fa-cogs"></i>
                         <p>
                             ระบบ
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=manage_customers" class="nav-link" id="manage_customers">
                                 <i class="fas fa-cogs"></i>
                                 <p>จัดการข้อมูลลูกค้า</p>
                             </a>
                         </li>
                     </ul>


                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=contact_customers" class="nav-link " id="contact_customers">
                                 <i class="fas fa-cogs"></i>
                                 <p>จัดการข้อมูลติดต่อลูกค้า</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=manage_item" class="nav-link " id="manage_item">
                                 <i class="fas fa-cogs"></i>
                                 <p>จัดการข้อมูลสินค้า</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=register_doc" class="nav-link " id="register_doc">
                                 <i class="fas fa-cogs"></i>
                                 <p>ลงทะเบียนเอกสาร</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=purpose" class="nav-link " id="purpose">
                                 <i class="fas fa-cogs"></i>
                                 <p>วัตถุประสงค์</p>
                             </a>
                         </li>
                     </ul>
                     <ul class="nav nav-treeview ul_system" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=doctype_detail" class="nav-link " id="doctype_detail">
                                 <i class="fas fa-cogs"></i>
                                 <p>ประเภทเอกสาร</p>
                             </a>
                         </li>
                     </ul>

                 </li>

                 <li class="nav-item has-treeview " id="li_permission">
                     <a href="#" class="nav-link " id="a_permission">
                     <i class="fas fa-users-cog"></i>
                         <p>
                             กำหนดสิทธ์การเข้าถึง
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview ul_permission" style="display: none;">
                         <li class="nav-item">
                             <a href="index.php?page=permission_doc" class="nav-link" id="permission_doc">
                             <i class="fas fa-users-cog"></i>
                                 <p>กำหนดสิทธ์เอกสาร</p>
                             </a>
                         </li>
                     </ul>
                 </li>





                 <div class="divider"></div>
                 <li class="nav-item">
                     <a href="javascript:void(0)" class="nav-link" id="btnLogout">
                         <i class="nav-icon fas fa-sign-out-alt"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>