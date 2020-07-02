<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>mms-patient</title>
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

    <?php

//if($_SESSION['donorstatus']!==""){
	//header("location:../patient_login.php");
//}

?>

    <div class="container-fluid">
        <div class="header_top">

            <img src="../img/mds logo.svg" alt="">
        </div>




        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="/online_medical/patient/index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/online_medical/patient/diagnosis">Self Diagnosis</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
            </li>
        </ul>


        <div class="bg-success bg-lg">
            <h2 class="text-center p-2 text-white">Diagnosis Page</h2>
        </div>

        <br>