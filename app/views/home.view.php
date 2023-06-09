<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title> Dashboard</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">


         <!-- navbar starts -->

         <?php include("../app/views/nav.view.php")?>

         <!-- navbar ends -->



         <!-- sidebar starts -->

         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fa fa-desktop"></i><span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="<?=ROOT?>/" class="active">Admin Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="<?=ROOT?>/student/">Students List</a></li>
                           <li><a href="<?=ROOT?>/student/add_student">Add Student </a></li>
                        </ul>
                     </li>
               </div>
            </div>
         </div>

       <!-- sidebar ends -->

     <!-- main section starts -->

         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
                <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                                 <h3 id="total"></h3>
                                 <h6>Students</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> 
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-crown"></i>
                              </div>
                              <div class="db-info">
                                 <h3></h3>
                                 <h6>Awards</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                   
            </div>
            <footer>
               <p>Copyright © 2023 .</p>
            </footer>
         </div>

   <!-- main section ends -->


      </div>
      <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?=ROOT?>/assets/js/popper.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/apexchart/apexcharts.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/apexchart/chart-data.js"></script>
      <script src="<?=ROOT?>/assets/js/script.js"></script>



      <script>
           /***********logout ************* */
      const logoutButton = document.getElementById("logout");

      logoutButton.addEventListener('click', async (e) => {

         e.preventDefault();

         localStorage.removeItem("access_token");
         localStorage.removeItem("refresh_token");
         window.location.assign('http://localhost/rest-api-with-mvc/public/login1/');

         });
      </script>
   </body>
   
</html>


