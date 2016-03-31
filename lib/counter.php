<?php
// This is counter page which counts visits from the user and we can also reset it by the reset button
//if the reset button is pressed then make a new session, otherwise just increment 1 to the old session
if (isset($_POST['resetButton'])) 
	{
		$_SESSION ['hitsFromUser'] = 1;
	}
	else{
		if (isset($_SESSION ['hitsFromUser'])){
		$_SESSION ['hitsFromUser'] = $_SESSION ['hitsFromUser'] + 1;
		}
		else{
		$_SESSION ['hitsFromUser'] = 1;
		}
	}
$hits = $_SESSION['hitsFromUser'];
echo '<div>';
echo '<h3><center>User Visits : '.$hits.'</center></h3>';
echo '<form name="reset" action="#" method="POST">';
echo '<center><input type="submit" value="Reset Counter" name="resetButton"></center>';
echo '</form>';
echo '</div>';
?>