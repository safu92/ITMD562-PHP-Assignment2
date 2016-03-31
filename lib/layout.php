<?php
//This is the layout file which has function layout functions used in every page.
 if(!defined('true-access')) {
    die('Direct access not permitted');
}
session_start();
//starting function
function startOfPage()
{
echo '<!doctype html> '.PHP_EOL;
echo '<html>          '.PHP_EOL;
echo '<head>          '.PHP_EOL;
echo '<title>Safdar\'s Blogging Platform</title>';
echo '<link rel="stylesheet" type="text/css" href="content/css/bootstrap.css">';

 
echo ' <style type="text/css">';
echo ' body {                 ';
echo '   padding-top: 20px;   ';
echo '   padding-bottom: 40px;';
echo ' }                      ';

 echo '.container-narrow {				';
 echo '       margin: 0 auto;           ';
 echo '       max-width: 700px;         ';
 echo '     }                           ';
 echo '     .container-narrow > hr {    ';
 echo '       margin: 30px 0;           ';
 echo '     }                           ';
echo '</style>                        ';



echo '</head>         '.PHP_EOL;
echo '<body>          '.PHP_EOL;

echo  '<div class="container-narrow">';
echo '       <div class="masthead"> ' ;
echo '  <ul class="nav nav-pills pull-right">						';
echo '  <li class="active"><a href="index.php">Home</a></li>    ';
echo '  <li><a href="admin/index.php">Admin</a></li>                ';
echo '  </ul>                                           ';
echo ' </div></div> ' ;

}

//ending function
function endOfPage()
{

echo '</body> '.PHP_EOL;
echo '</html> '.PHP_EOL;

}

//header function
function h1($content, $class="")
{
echo "<h1 class='$class'>$content</h1>";
}



?>