<?php
//This file allows the administrator to add the blog entry
define("true-access",true);
include("lib/layout.php");

startOfPage();

//getting the last title number from the default file
$lastTitleNumber = file_get_contents("../content/title/default");
$i = $lastTitleNumber;

function append_data()
{
	$inputTitle = $_POST["title"]; //getting input title from the form
	$inputPost = $_POST["blogpost"]; //getting input post from the form
	
	//if title or post is empty it creates alert box
	if($inputTitle == '' || $inputPost == ''){
	echo '<script>alert("Title or Blogpost cannot be empty!");';
	echo 'window.location="blog.php";</script>';
	}
	else{
	//put the content of the title in new file saved as the post number in title folder
	file_put_contents("../content/title/".$GLOBALS['i'], 
	
	htmlspecialchars($inputTitle).PHP_EOL,
	
	FILE_APPEND | LOCK_EX);
	
	//put the content of the blogpost in new file saved as the post number in blogpost folder
	file_put_contents("../content/blogpost/".$GLOBALS['i'], 
	
	htmlspecialchars($inputPost).PHP_EOL,
	
	FILE_APPEND | LOCK_EX);
	
	//if image file exist then it moves the image file to respected blogpost folder with name of the file as post number
	if($_FILES["file1"]==true){
	move_uploaded_file($_FILES['file1']['tmp_name'], '../content/blogpost/'.$GLOBALS['i'].'.jpg');
	}
	
	//increasing the number of i
	$GLOBALS['i'] = $GLOBALS['i'] + 1;
	
	//putting the new value of i in default file in both title and blogpost folder
	file_put_contents("../content/title/default", 
	
	$GLOBALS['i'],
	
	LOCK_EX);
	
	file_put_contents("../content/blogpost/default", 
	
	$GLOBALS['i'],
	
	LOCK_EX);
	
	echo '<h1 style="position:absolute; align:center;">File Uploaded</h1></div>';
}
}


//if the user is logged in then it views this form
if(isset($_SESSION['logged_in'])){


echo '     <div class="container">    																																				';
h1("Add a Blogpost");
echo '         <div id="blogentrybox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                                       ';
echo '<a href="logout.php" style="font-size:20px">Log Out</a>';
echo '             <div class="panel panel-info" >                                                                                                                                  ';
echo '                     <div class="panel-heading">                                                                                                                              ';
echo '                         <div class="panel-title">Add Blog Entry</div>                                                                                                               ';
echo '                     </div>                                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                     <div style="padding-top:30px" class="panel-body" >                                                                                                       ';
echo '                                                                                                                                                                              ';
echo '                         <form id="blogpostform" class="form-horizontal" role="form" method="POST" action="#" enctype="multipart/form-data">                                                                                            ';
echo '                                                                                                                                                                              ';
echo '                             <div style="margin-bottom: 25px" class="input-group">                                                                                            ';
echo '                                         <span class="input-group-addon">Title</span>                                                      ';
echo '                                         <input id="title" type="text" class="form-control" name="title" value="" placeholder="title">                ';                        
echo '                                     </div>                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                             <div style="margin-bottom: 25px" class="input-group">                                                                                            ';
echo '                                         <span class="input-group-addon">Post</span>                                                      ';
echo '                                        <textarea name="blogpost" rows="7" cols="68"></textarea>';
echo '                                     </div>                                                                                                                                   ';
echo '                             <div style="margin-bottom: 25px" class="input-group">                                                                                            ';
echo '                                        <input type="file" name="file1">';
echo '                                     </div>                                                                                                                                   ';
echo '                                                                                                                                                                              ';
echo '                                 <div style="margin-top:10px; margin-left:0px;" class="form-group">                                                                                             ';
echo '									<input type="submit" value="Post"/>';
echo '                                 </div>                                                                                                                                       ';
echo '                                                                                                                                                                              ';
echo '                                                                                                                                                                              ';
echo '                             </form>                                                                                                                                        ';
echo '                         </div>                                                                                                                                               ';
echo '                     </div>                                                                                                                                                   ';
include("../lib/counter.php"); //including counter file
echo '         </div>                                                                                                                                                               ';

// if the post is not empty then call function append data
if (!empty($_POST)) {
	append_data();
	}
else //regular viewing of the page
{
	
}


}
//if user not logged in then die
else
{
Die('You are not logged in');
}


endOfPage();


?>