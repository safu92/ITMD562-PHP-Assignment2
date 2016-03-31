<?php
//This is index page which allows administrator to login and make blog posts to his blog
define('true-access',true);
include("lib/layout.php");

startOfPage();
echo '     <div class="container">    																																				';
h1("Admin Panel");
//Admin login form
echo '         <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                                       ';
echo '             <div class="panel panel-info" >                                                                                                                                  ';
echo '                     <div class="panel-heading">                                                                                                                              ';
echo '                         <div class="panel-title">Sign In</div>                                                                                                               ';
echo '                     </div>                                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                     <div style="padding-top:30px" class="panel-body" >                                                                                                       ';
echo '                                                                                                                                                                              ';
echo '                         <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>                                                               ';
echo '                                                                                                                                                                              ';
echo '                         <form id="loginform" class="form-horizontal" role="form" method="POST" action="#">                                                                                            ';
echo '                                                                                                                                                                              ';
echo '                             <div style="margin-bottom: 25px" class="input-group">                                                                                            ';
echo '                                         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                                      ';
echo '                                         <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                ';                        
echo '                                     </div>                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                             <div style="margin-bottom: 25px" class="input-group">                                                                                            ';
echo '                                         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>                                                      ';
echo '                                         <input id="login-password" type="password" class="form-control" name="password" placeholder="password">                              ';
echo '                                     </div>                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                                 <div style="margin-top:10px; margin-left:0px;" class="form-group">                                                                                             ';
echo '									<input type="submit" value="Login"/>';
echo '                                 </div>                                                                                                                                       ';
echo '                                                                                                                                                                              ';
echo '                                                                                                                                                                              ';
echo '                             </form>                                                                                                                                        ';
echo '                         </div>                                                                                                                                               ';
echo '                     </div>                                                                                                                                                   ';
include("../lib/counter.php"); //including the counter
echo '         </div>                                                                                                                                                               ';

//checking if the username and password matches, if they matches then it redirect to blog page by making session true otherwise it just refresh the page with an alert box
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
      $_SESSION['logged_in'] = true;
      echo '<script>window.location = "blog.php";</script>';
      exit;
    }
	else{
	echo '<script>alert("Wrong Username or Password! Try again.");';
	echo 'window.location = "index.php"</script>';
	}
  }
    
endOfPage();

?>