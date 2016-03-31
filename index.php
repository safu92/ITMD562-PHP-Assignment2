
<?php
// This is the index page which views the last 5 blog entries.
define('true-access',true);
include("lib/layout.php");
startOfPage(); //startOfPage function call return in layout.php page which is included above
echo '     <div class="container">    ';
h1("Safdar's Blog"); 
echo '         <div id="blogentrybox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                                                       ';

// getting the content of default file which is a number which increases as the post count increases so we can get the number of the last post
$lastTitleNumber = file_get_contents("content/title/default");
$i = $lastTitleNumber;
$count = 0;

// for loop continuing from the last post until the post become zero
	for($j = $i - 1; $j>0; $j--)
	{
	//but only last 5 post are visible because the count keeps on increasing and it stops when count reaches 5.
		if($count!=5)
		{
		$title = file_get_contents("content/title/".$j); //getting the title of last post
		$blogpost = file_get_contents("content/blogpost/".$j); //getting the blogpost of the last post
		$imagefile = 'content/blogpost/'.$j.'.jpg'; //getting the path of the image file
		echo '<h3><a href="blogpost.php?post='.$j.'">'.$title.'</a></h3><br/>'; //printing the title with the link to a blogpost.php page with a GET request which contain number of the post
		//checking if the image file exist or not and if it exist then print it with blogpost otherwise only print the blogpost
		if (file_exists($imagefile)) {
		echo '<img src="'.$imagefile.'"><br><br>';
		echo $blogpost."<br/><br/>";
		} else {
		echo $blogpost."<br/><br/>";
		}
		$count++;
		}
	}
include("lib/counter.php");
echo ' </div> ';
echo ' </div> ';

endOfPage();

?>