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
        <span class='alert alert-success text-center'>Diagnosis Completed Successfully </span>

        <p style="margin: 10px; font-size: 20px"> You have been tentatively diagnosed with
            <?php echo $_GET['disease_name']; ?> </p>
    </div>

    <div class="text-center">
        <h3 class="text-center">Drugs Prescription</h3>
        <p class="text-center border-top border-bottom">You are advised to use either of the two drugs and follow the
            prescription
        </p>
    </div>

    <?php 


				$rs=mysqli_query($cn,"select * from drugs_treatment where disease_name='Typhiod' ");

				mysqli_data_seek($rs);
				$row= mysqli_fetch_row($rs);
				
				?>
</div>
<div class="row mx-auto justify-content-center">
    <div class="col-lg-4 bg-primary">
        <h3> <span class="badge badge-secondary">1</span></h3>
        <p class="text-center"><strong>DRUG NAME:</strong></p>
        <p class="text-white text-center"> <?php echo strtoupper($row[1]);  ?></p>
        <hr>
        <p class="text-center"><strong>DRUG PRESCRIPTION:</strong></p>
        <p class="text-white text-center"> <?php echo strtoupper($row[2]);  ?></p>
    </div>

    <div class="col-lg-4 bg-success">
        <h3><span class="badge badge-warning">2</span></h3>
        <p class="text-center"><strong>DRUG NAME:</strong></p>
        <p class="text-white text-center"> <?php echo strtoupper($row[3]);  ?></p>
        <hr>
        <p class="text-center"><strong>DRUG PRESCRIPTION:</strong></p>
        <p class="text-white text-center"> <?php echo strtoupper($row[4]);  ?></p>
    </div>
</div>

<?php include("footer.php"); ?>