<?php

//connecting to the DB
require_once('DBconnect.php');

//checking if the input text fields are not empty
if(isset($_POST['reg_id']) && isset($_POST['std_id']) && isset($_POST['current_date'])){ 
	
	$sql0 = "SELECT submission_deadline FROM scholarship_category LIMIT = 1";
	
	
    //checking if the username and the password exist in the DB
    $registration_id = $_POST['reg_id'];
	$student_id = $_POST['std_id'];
	$current_date = $_POST['current_date'];
	
	if($current_date > $sql0){
		?>
	<!DOCTYPE html>
	<html lang="en">
	<head>  
		<link rel="stylesheet" href="navbar.css">
	</head>
    <body>
		<div class= "headline"><h2> Failed to delete! Please try again! </h2></div>
        <hr>
    
        <div class= "button"> 
            <a href= "panel_student.php">Back to Home</a>
        </div>

        </body>
	</html>
	<?php
		
	} //new if close brac
	else{
		
	
    $sql = "DELETE FROM scholarship_form WHERE registration_id = '$registration_id' AND student_id='$student_id';";
    //executing the query
    $result = mysqli_query($conn, $sql);
    
    //checking if the query happening correctly
    if(mysqli_affected_rows($conn)){
	
        //echo "Deleted successfully!";
        //header("Location: panel_student.php");
		?>
	<!DOCTYPE html>
	<html lang="en">
	<head>  
		<link rel="stylesheet" href="navbar.css">
	</head>
    <body>
		<div class= "headline"><h2> Deleted successfully! </h2></div>
        <hr>
    
        <div class= "button"> 
            <a href= "panel_student.php">Back to Home</a>
        </div>

        </body>
	</html>	
		
		<?php
    }
    else{
        //echo "Failed to delete!";
        //header("Location: panel_student.php");
		?>
	<!DOCTYPE html>
	<html lang="en">
	<head>  
		<link rel="stylesheet" href="navbar.css">
	</head>
    <body>
		<div class= "headline"><h2> Failed to delete! Please try again!</h2></div>
        <hr>
    
        <div class= "button"> 
            <a href= "panel_student.php">Back to Home</a>
        </div>

        </body>
</html>
		
		<?php
		
    }
	
	} //new else
}
else{
	//echo"Failed to submit! Check if any Input box is empty!";
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>  
		<link rel="stylesheet" href="navbar.css">
	</head>
    <body>
		<div class= "headline"><h2> Failed to delete! Please try again! </h2></div>
        <hr>
    
        <div class= "button"> 
            <a href= "panel_student.php">Back to Home</a>
        </div>

        </body>
	</html>
	<?php
}


?>