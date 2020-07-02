<?php session_start();  ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>medical management system</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="../js/jquery-1.11.3.min.js"></script>





    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</head>

<body>





    <div class="container-fluid">
        <!-- 	this is for menu -->
        <img src="../img/mds logo.svg" alt="" style="margin: 20px;">



        <ul class="nav">
            <li class="nav-item bg-success m-1 ">
                <a class="nav-link text-white" href="./index.php">Home</a>
            </li>
        </ul>

        <div class="bg-success text-center">
            <h3 class="p-2 text-white">Admin Login</h3>
        </div>

        <!-- this is for donor registraton -->
        <div class="login">
            <!-- <h1 class="text-center" style="background-color:;color: #fff;">Admin Panel</h1> -->
            <div class="formstyle">
                <form action="" method="post" class="text-center">
                    <label>
                        <input type="text" name="username" placeholder="Enter Username" required class="form-control">
                    </label><br><br>
                    <label>
                        <input type="password" name="password" placeholder="Enter Password" required
                            class="form-control">
                    </label><br><br>
                    <button name="submit" type="submit" class="btn btn-primary btn-lg">Login</button>
                    <br>



                    <!-- login validation -->
                    <?php 
							$_SESSION['adminstatus']="";
							include('config.php');
							if(isset($_POST["submit"])){

							$sql= "SELECT * FROM admin WHERE username= '" . $_POST["username"]."' AND password= '" . $_POST["password"]."'";

							$result = $conn->query($sql);

									if ($result->num_rows > 0) {
											$_SESSION["username"]= $_POST["username"];
											
											$_SESSION['adminstatus']= "yes";
										    echo "<script>location.replace('dashboard.php');</script>";
												// echo "u are supposed to redirect to ur profile";
										} else {
										    echo "<span style='color:red;'>Invalid username or password</span>";
										}
						$conn->close();		
					}
					
 			?>
                    <!-- login validation End-->


                </form> <br>&nbsp;&nbsp;&nbsp;

                <br>






            </div>


        </div>



    </div>












    <?php include('../footer.php'); ?>






    <script src=" js/bootstrap.min.js"></script>








</body>

</html>