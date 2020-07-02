<?php if(!isset($_SESSION)){
	session_start();
	}   
?>

<?php include('header.php'); ?>




<!-- this is for donor registraton -->
<div class="recipient_reg">
    <h3 class="text-center bg-success text-white p-2">Add Doctor</h3>

    <div class="formstyle">
        <form enctype="multipart/form-data" method="post" class="text-center">
            <div class="col-md-12">

                <label>
                    <input type="text" name="doctor_id" value="" placeholder="Doctor Id" required class="form-control">
                </label><br><br>
                <label>
                    <input type="text" name="name" value="" placeholder="Full name" required class="form-control">
                </label><br><br>

                <label>
                    <input type="text" name="contact" value="" placeholder="Phone Number" required class="form-control">
                </label><br><br>

                <label>
                    <input type="email" name="email" value="" placeholder="Email Address" required class="form-control">
                </label><br><br>

                <label>
                    <select name="expertise" required class="form-control">
                        <option values="medicine">-Expert in-</option>
                        <option values="medicine">Medicine</option>
                        <option values="medicine">Heart</option>
                        <option values="medicine">Bone</option>
                        <option values="medicine">kedney</option>
                        <option values="medicine">Cardiologist</option>
                        <option values="medicine">Plastic Surgeon</option>
                        <option values="medicine">General Physician</option>
                        <option values="medicine">Neurologist</option>
                    </select>
                </label><br><br>
                <label>
                    <input type="text" name="id" value="" placeholder="Id" required class="form-control">
                </label><br><br>
                <label>
                    <input type="text" name="fee" value="" placeholder="Fee" required class="form-control">
                </label><br><br>
                <label>
                    <input type="text" name="password" value="" placeholder="Password" required class="form-control">
                </label><br><br>
                <label>
                    <input type="file" name="pic" value="" id="pic" required class="form-control">
                </label><br><br>


                <button name="submit" type="submit" class="btn btn-success btn-lg">Add</button>
                <br>

            </div> <!-- col-md-12 -->


        </form>
    </div>




</div>



<!-- validation and insertion -->


<?php
			if(isset($_POST['submit'])){
							$target_dir = "images/";
							$target_file = $target_dir . basename($_FILES["pic"]["name"]);
							$uploadOk = 1;
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							// Check if image file is a actual image or fake image

						    $check = getimagesize($_FILES["pic"]["tmp_name"]);
						    if($check !== false) {
						        // echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }

							// Check if file already exists
							if (file_exists($target_file)) {
							    echo "<script>alert('Sorry, file already exists.');</script>";
							    $uploadOk = 0;
							}
							//aloow certain file formats
							if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
								echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
								$uploadok=0;
							}	
						else{
							if(move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {

									include('config.php');
									$sql1 = "SELECT * FROM doctor WHERE login_id='".$_POST["doctor_id"]."' OR email= '" . $_POST["email"] . "' ";
	              					$result = $conn->query($sql1);
	              					if($result->num_rows > 0){
	              						 echo "<script>alert('Sorry, Doctor Id or E-mail already exist!');</script>";
	              					}
	              					else{
									$sql = "INSERT INTO doctor (doctor_id,name,phone_number,email,expertise,login_id,fee,password,pic)
							VALUES ('" . $_POST["doctor_id"] ."',
							'" . $_POST["name"]."','" .$_POST["contact"] . "','" . $_POST["email"] . "', '" . $_POST["expertise"] . "','" . $_POST["id"] . "','" . $_POST["fee"] . "','" . $_POST["password"] . "','" . basename($_FILES["pic"]["name"]) ."' )";

							if ($conn->query($sql) === TRUE) {
								echo "<script>alert('New Doctor Has been Added Successfully!')
								window.location.href='/online_medical/admin/viewDoctor.php';
								</script>";
							} else {
								echo $conn->error;
								echo "<script>alert('There was an Error')</script>";
								
								
							}
									}

									$conn->close();
							} else {
								echo "<script>alert('sorry there was an error!');</script>";
							}
							
							
						}
				}
			
						

						
					?>



<!-- validation and insertion End-->



<?php include('../footer.php'); ?>



</div><!--  containerFluid Ends -->




<script src="js/bootstrap.min.js"></script>






</body>

</html>