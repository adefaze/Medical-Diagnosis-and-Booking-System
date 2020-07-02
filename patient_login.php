<?php session_start();  ?>
<?php include('header.php'); ?>





<!-- this is for donor registraton -->
<div>
    <h3 class="text-center bg-success text-white p-2">Patient Login</h3> <br>

    <div class="d-flex justify-content-center">
        <div class="col-lg-3">

            <form action="" method="post" class="text-center">
                <div class="form-group row">
                    <label for="email">Email: </label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>

                <div class="form-group row">
                    <label for="pass">Password: </label>
                    <input class="form-control" type="password" name="password" id="pass" required>
                </div>
                <label>

                </label><br><br>
                <button class="btn btn-primary" name="submit" type="submit"
                    style="margin-left: -26px;width: 85px;border-radius: 3px;">Login</button> <br>

                <span style="color:red">Not a member yet?</span> <a href="patient_regi.php" title="create a account"
                    target="" style="color:#000;">Register Now!</a> <br>


                <!-- login validation -->
                <?php 
					$_SESSION['patient']="";
							
							include('config/config.php');
							if(isset($_POST["submit"])){


							$sql= "SELECT * FROM patient WHERE email= '" . $_POST["email"]."' AND password= '" . $_POST["password"]."'";

							$result = $conn->query($sql);

									if ($result->num_rows > 0) {
											$row = mysqli_fetch_array($result);
											$_SESSION['name'] = $row['name'];
											$_SESSION['user_id'] = $row['id'];
											$_SESSION["email"]= $_POST["email"];
											
											$_SESSION['patient']= "yes";
										    echo "<script>location.replace('patient/index.php');</script>";
												// echo "u are supposed to redirect to ur profile";
										} else {
										    echo "<span class='alert alert-danger' role='alert'>Invalid username or password</span>";
										}
						$conn->close();		
					}
					
 			?>
                <!-- login validation End-->


            </form> <br>&nbsp;&nbsp;&nbsp;

            <br>


        </div>












    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('footer.php'); ?>



</div><!--  containerFluid Ends -->




<script src="js/bootstrap.min.js"></script>








</body>

</html>