<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Add Students</title>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">

         <!-- header starts -->
         <?php include("../app/views/nav.view.php")?>
      <!-- header finished -->

       <!-- sidebar starts -->

         <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
               <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                     <li class="menu-title">
                        <span>Main Menu</span>
                     </li>
                     <li class="submenu">
                        <a href="#"><i class="fa fa-desktop"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="<?=ROOT?>/">Admin Dashboard</a></li>
                        </ul>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                        <li><a href="<?=ROOT?>/student/">Students List</a></li>
                           <li><a href="<?=ROOT?>/student/add_student" class="active">Add Student </a></li>
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
                        <h3 class="page-title">Add Students</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="students.html">Students</a></li>
                           <li class="breadcrumb-item active">Add Students</li>
                        </ul>

                        <!-- error and message -->
                        <div class="alert alert-warning alert-dismissible fade show" id="alert" style="display:none;" role="alert">
                        <strong>Erros:</strong>
                         <div id="error"></div>

                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- error and messages -->

                 <!-- alert success -->
                 <div class="alert alert-success" role="alert" id="alert_success" style="display:none;">
                  <h4 class="alert-heading">Well done!</h4>
                  <p>Aww yeah, you successfully added a student.</p>
                  <hr>
                </div>

                 <!-- alert success end -->
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
                           <form  id="form">
                              <div class="row">
                                 <div class="col-12">
                                    <h5 class="form-title"><span>Student Information</span></h5>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>First Name</label>
                                       <input type="text" class="form-control" name="firstname">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" class="form-control" name="lastname">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Student Id</label>
                                       <input type="text" class="form-control" disabled placeholder="It automatically generat student Id">
                                    </div>
                                 </div>
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <br> Gender:<br/>
                                       <input type="radio" id="gender" name="gender" value="male">
                                       <label for="male">Male</label>
                                       <input type="radio" id="gender" name="gender" value="female">
                                       <label for="female">Female</label>
                                    </div>
                                 </div>
                               
                                 <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="text" class="form-control" name="email">
                                    </div>
                                 </div>
                              
                             
                              
                                 <div class="col-12">
                                    <button type="submit" class="btn btn-primary" id="btn">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

       <!-- main section finished -->

      </div>
      <script src="<?=ROOT?>/assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?=ROOT?>/assets/js/popper.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?=ROOT?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?=ROOT?>/assets/js/script.js"></script>




      <script type="text/javascript">
   function _(element){
       return document.getElementById(element);
   }
   var btn = _("btn");
   btn.addEventListener("click",collect_data);
   var form = _("form");
   function collect_data(evt){
 

       evt.preventDefault();
       const formdata= form.getElementsByTagName('INPUT');
        var data= {};

       
       for (var i = 0; i < formdata.length; i++) {
          var key  = formdata[i].name;
          switch(key){
               
               case"firstname":
               data.fname =formdata[i].value;
               break;
               case"lastname":
               data.lname =formdata[i].value;
               break;
               case"email":
               data.email =formdata[i].value;
               break;
               case"gender":
               if(formdata[i].checked){
                   data.gender =formdata[i].value;

               }
               break;
           }
       }
       send_data(data);
              
   }


   const send_data = async (data) =>{
   const response = await fetch('http://localhost/rest-api-with-mvc/public/student/add_student', {
    method: 'POST',
    headers: {
                  // 'Content-Type': 'application/json',
                  "Authorization": "Bearer " + localStorage.getItem("access_token")
               },
    body: JSON.stringify({
        email: data.email,
        fname:data.fname,
        gender:data.gender,
        lname:data.lname
       
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
   </body>
</html>


