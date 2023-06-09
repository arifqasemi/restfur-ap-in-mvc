<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title> Students</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">


         <!-- navbar starts -->

         
         <?php include("../app/views/nav.view.php")?>
    <!-- navbar finished -->



         <!-- sidebar starts -->

         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fa fa-desktop"></i></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="<?=ROOT?>/">Admin Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="<?=ROOT?>/student/" class="active">Student List</a></li>
                           <li><a href="<?=ROOT?>/student/add_student">Add Student </a></li>
                        </ul>
                     </li>
                    
               </div>
            </div>
         </div>

        <!-- sidebar finished -->

        <!-- main section starts -->

         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?=ROOT?>/">Dashboard</a></li>
                           <li class="breadcrumb-item active">Students</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="<?=ROOT?>/student/add_student" class="btn btn-primary"><i class="fas fa-plus"> Add Student</i></a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-hover table-center mb-0 datatable">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Full Name</th>
                                       <th>Gender</th>
                                       <th>Email</th>
                                       <th class="text-right">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody id="studentTable">

                              <!-- single student starts -->
                             

                              <?php foreach($rows as $row):?>
                              <tr >
                                <td><?=$row->id?></td>
                                    <td>
                                    <h2 class='table-avatar'>
                                        <a href='student-details.html'><?=$row->fname?></a>
                                    </h2>
                                </td>
                                <td><?=$row->gender?></td>
                                <td><?=$row->email?></td>
                                <td class='text-right'>
                                    <div class='actions'>
                                        <a href='<?=ROOT?>/student/edit_student/<?=$row->id?>' class='btn btn-sm bg-success-light mr-2'>
                                        <i class='fas fa-pen' onClick='edit_student($row->id)'></i>
                                        </a>
                                        <a href='' class='btn btn-sm bg-danger-light' onClick='delete_student(<?=$row->id?>)'>
                                        <i class='fas fa-trash'></i>
                                        </a>
                                    </div>
                                </td>
                                </tr>
                                <?php endforeach;?>
                                    <!-- single student finished-->
                                 </tbody>
                                 <div class="alert alert-success" role="alert" id="message" style="display:none;">
                                    <h4 class="alert-heading">No Students Were Found</h4>
                                    <hr>
                                  </div>

                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer>
               <p>Copyright © 2023.</p>
            </footer>
         </div>

      <!-- main section finished -->


      </div>
      <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?=ROOT?>/assets/js/popper.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/datatables/datatables.min.js"></script>
      <script src="<?=ROOT?>/assets/js/script.js"></script>
   </body>
</html>



<script type="text/javascript">
   function _(element){
       return document.getElementById(element);
   }
  




function delete_student(student_id){
        var answer = confirm('Are you sure to remove this student?');
        if(answer == true){
         send_data(student_id);

        }      
  }
  const send_data = async (data) =>{
   const response = await fetch('http://localhost/rest-api-with-mvc/public/student/delete_student/', {
    method: 'DELETE',
    headers: {
                //   'Content-Type': 'application/json',
                  "Authorization": "Bearer " + localStorage.getItem("access_token")
               },
    body: JSON.stringify({
        id: data
       
    })
});

         const json = await response.text();
         const obj = JSON.parse(json);

         if (response.status == 200) {
            console.log(obj);
            alert(obj.message);

         } else {
            alert(obj.message);
         }
         }



      /***********logout ************* */
      const logoutButton = document.getElementById("logout");

      logoutButton.addEventListener('click', async (e) => {

         e.preventDefault();

         localStorage.removeItem("access_token");
         localStorage.removeItem("refresh_token");
         window.location.assign('http://localhost/rest-api-with-mvc/public/login1/');

         });

</script>