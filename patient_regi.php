<?php include('header.php'); ?>





<!-- this is for donor registraton -->

<h3 class="text-center bg-success text-white p-2">Patient Registration</h3>



<form enctype="multipart/form-data" method="post" class="d-flex justify-content-center">
    <div class="col-lg-3">
        <div class="form-group-lg">
            <label for="fname">
                Your Name: </label>
            <input class="form-control" id="fname" type="text" name="name" value="" required>

        </div>

        <div class="form-group-lg">
            <label for="age">Age:</label>
            <input type="number" name="age" pattern="[0-9]{2,2}"
                title="please enter only  numbers between 2 to 2 for age" class="form-control" />
        </div>

        <div class="form-group-lg">
            <label for="mobile">Phone No:</label>
            <input type=" number" name="contact" required="required" pattern="[0-9]{10,11}"
                title="please enter only numbers between 10 to 11 for mobile no." id="mobile" class="form-control" />
        </div>

        <div class="form-group">
            <label for="addr"> Address:</label>
            <input type="text" name="address" value="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">
                Blood Group: </label>
        </div>

        <select name="bgroup" required class="form-control">
            <option value="">-select-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
        </select>

        <div class="form-group">
            <label for="">Email:</label>
            <input type="email" name="email" value="" required class="form-control">
        </div>

        <div class="form-group">
            <label for="">Password:</label>
            <input type="password" name="password" value="" required class="form-control">
        </div>



        <button name="submit" type="submit" class="btn btn-primary">Register</button>
        <br>
        <span style="color:red">Already a member?</span> <a href="patient_login.php" title="Visit Login Page" target=""
            style="color:#000;">Login Here!</a> <br>
        <hr>
    </div> <!-- col-md-12 -->


</form>













<?php include('footer.php'); ?>



</div><!--  containerFluid Ends -->




<script src="js/bootstrap.min.js"></script>


<!-- validation and insertion -->


<?php
						include('config/config.php');
						if(isset($_POST['submit'])){

						$sql1 = "SELECT * FROM patient WHERE email='".$_POST["email"]."' ";
             		    $result = $conn->query($sql1);	
             		    if ($result->num_rows > 0) {
			                  echo "<script>alert('Sorry, user already exist!');</script>";
			             }
						else{
							$sql = "INSERT INTO patient (name,age,contact,address,bgroup,email, password)
							VALUES ('" . $_POST["name"] ."','" . $_POST["age"] . "','" . $_POST["contact"] . "','" . $_POST["address"] . "','" . $_POST["bgroup"] . "', '" . $_POST["email"] . "','" . $_POST["password"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>location.replace('patient_success_msg.php');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						}
					}
				?>



<!-- validation and insertion End-->



</body>

</html>