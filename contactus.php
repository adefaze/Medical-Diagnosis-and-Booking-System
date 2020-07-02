<?php include('header.php'); ?>




	<!-- this is for donor registraton -->
	<div class="contactus"  style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Contact Us</h3>

		
		
		<div class="main_content">
		
			<div class="col-lg-12 d-flex justify-content-center align-items-center">

			

				
				<form action="" method="post">
					<div class="form-group">
						<label for="fname">First Name: </label>
							<input type="text" name="firstname" value="" placeholder="Enter First Name" id="fname" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="lname"> Last Name:  </label>
								<input type="text" name="lastname" value="" id="lname" placeholder="Enter Last Name" class="form-control" required>
					</div>		

					<div class="form-group">
						<label for="email"> Email: </label>
								<input type="email" name="email" id="email"  value="" placeholder="Your email" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="comment"> Your Comment: </label>
								<textarea name="comment" id="comment" cols="30" rows="4" class="form-control"  required></textarea> 
						
					</div>
								
						<button type="submit" value="Send Us" name="submit" style="margin-bottom: 50px; border-radius: 20px;"
						class="btn btn-primary btn-lg">
						submit</button>
						<!-- <button name="submit" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;Sign Up</button>
 -->
					</form>
			</div>

          
 		</div>

	</div>
	
	

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
<!-- contact information inserting -->
					<?php

						include('config/config.php');
						if(isset($_POST['submit'])){
							

							$sql = "INSERT INTO contact (firstname, lastname,email,comment)
							VALUES ('" . $_POST["firstname"] ."','" . $_POST["lastname"] . "','" . $_POST["email"] . "','" . $_POST["comment"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>location.replace('success.php');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
							}

							$conn->close();
						}
					?> 



	
</body>
</html>

