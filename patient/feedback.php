<?php session_start();  ?>

<?php include('uptomenu.php'); ?>


<div class="login" style="background-color:#fff;">
    <h3 class="text-center bg-success text-white p-2">My Feedback</h3>
    <div class="formstyle">
        <form action="" method="post" class=" form-group mx-auto text-center">
            <label>
                Get in touch with us<textarea name="feedback" id="" cols="40" rows="4" required
                    class="form-control"></textarea>
            </label><br><br>

            <button name="submit" type="submit" class="btn btn-primary">Send</button>
            <br>




            <!-- login validation -->
            <?php 
					
							include('config.php');
							if(isset($_POST['submit'])){
							

							$sql = "INSERT INTO feedback (email,feedback)	VALUES ('" . $_SESSION["email"] ."','" . $_POST["feedback"] ."')";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Thanks for your feedback!');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					
 			?>
            <!-- login validation End-->


        </form> <br>&nbsp;&nbsp;&nbsp;

        <br>






    </div>


</div>
<br><br><br><br><br><br>
<?php include('../footer.php'); ?>


</body>

</html>