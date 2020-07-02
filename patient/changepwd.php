<?php if(!isset($_SESSION)){
	session_start();
	}  
?>


<?php include('uptomenu.php'); ?>



<!-- this is for donor registraton -->
<div class="dashboard" style="background-color:#fff;">
    <h3 class="text-center bg-success text-white p-2">Change Password</h3>
    <div class="formstyle">
        <form action="" method="post" class="text-center mx-auto">
            <label>
                <span style="color: #000">Old Password:</span><input type="password" name="password"
                    placeholder="Current password" required class="form-control">
            </label><br><br>
            <label>
                <span style="color: #000">New Password:</span><input type="password" name="newpassword"
                    placeholder="New password" required class="form-control">
            </label><br><br>
            <label>
                <span style="color: #000">Confirm Password:</span><input type="password" name="confpassword"
                    placeholder=" confirm password" required class="form-control">
            </label><br><br>
            <button name="submit" type="submit" class="btn btn-primary">Update
                Password</button> <br>




            <!-- login validation -->
            <?php 
					
							
							include('config.php');
							if(isset($_POST["submit"])){
							
								$newpassword = $_POST['newpassword'];
								$confpassword = $_POST['confpassword'];

							$sql= "SELECT * FROM patient WHERE email= '" . $_SESSION["email"]."' AND password= '" . $_POST["password"]."'";

							$query=mysqli_query($conn,$sql);
							$row=mysqli_num_rows($query);

							if($row>0){
								//check the new password
								if($newpassword==$confpassword){
								
								$sql1="UPDATE patient SET password='" . $_POST["newpassword"]  ."' WHERE email='" .$_SESSION["email"] ."'";
								mysqli_query($conn,$sql1);
								mysqli_close($conn);
								echo "<script>alert('Password Has been Updated');</script>";
								
								}else{
									echo "<script>alert('Password did not match');</script>";

								}


							}else{
								echo "<script>alert('Input Correct Password');</script>";
							}
									
										
								
					}
					
 			?>
            <!-- login validation End-->


        </form> <br>&nbsp;&nbsp;&nbsp;

        <br>






    </div>




</div>





<?php include('../footer.php'); ?>


</div><!--  containerFluid Ends -->




<script src="js/bootstrap.min.js"></script>








</body>

</html>