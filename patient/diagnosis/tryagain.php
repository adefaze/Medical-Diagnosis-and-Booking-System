<?php

error_reporting(1);
session_start();
if( $_SESSION['user_id'] == "" ) {
	header("Location: ../login/");
	exit;
}

$cn = new mysqli("localhost", "root", "", "mddps");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

extract($_POST);
extract($_GET);
extract($_SESSION);



?>



<?php include("menu.php")?>

<?php  $_SESSION['user_id']=$user_id;
				//echo $user_id; 
				$disease_name=$_GET['disease_name'];
				$user_id=$_SESSION['user_id'];
				//echo $user_id;
				?>


<div class="col-lg-6 offset-lg-3">
    <div class="text-center">
        <span class='alert alert-danger text-center'>Diagnostic Test Failed! </span>

        <p style="margin: 10px; font-size: 20px"> Because your symptoms do not match any of the diseases
        </p>
    </div>

    <div class="text-center">
        <span class="text-center">Pls <a href="index.php" class="btn btn-primary">Try Again</a> </span>

    </div>


</div>
<br><br><br><br><br>

<?php include("footer.php"); ?>