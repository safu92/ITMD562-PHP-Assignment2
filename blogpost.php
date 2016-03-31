<?php
//This is the page where the single blog entry and title is shown when the user clicked it from the index page
define('true-access',true);
include("lib/layout.php");
startOfPage();
echo '     <div class="container">    ';
h1("Safdar's Blog");
//if the user is coming from the index page then he passes GET request, so if it comes by get request then print the title and blogpost as follows
if(isset($_GET['post'])){
echo '         <div id="blogentrybox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                                       ';
$i = $_GET['post']; //get the number of post passed by the indexpage
$title = file_get_contents("content/title/".$i); //get the title of the blog using the number
$blogpost = file_get_contents("content/blogpost/".$i); //get the blogpost of the blog using the number
$imagefile = 'content/blogpost/'.$i.'.jpg'; //get the image path of the blog using the number
echo '<h2>'.$title.'</h2>'; //print the title
//show the image file if it exist
if (file_exists($imagefile)) {
		echo '<img src="'.$imagefile.'"><br><br>';
		echo $blogpost."<br/><br/>";
		} else {
		echo $blogpost."<br/><br/>";
		}

include("lib/counter.php");
echo '</div>';
}

//if the user access this page directly and its not coming from the index page, so it will just redirect him to the index page
else{
echo '<script>window.location = "index.php";</script>';
}
echo '</div>';
endOfPage();
?>