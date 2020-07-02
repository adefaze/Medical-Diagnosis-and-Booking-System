<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php include('header.php'); ?>
<!-- this is for donor registraton -->
<div class="dashboard" style="background-color:#fff;">
    <h3 class="text-center btn-success">Admin Panel</h3>
    <span class="adminDashboard"
        style="font-size: 85px;font-weight: bold;color: white;font-family: serif;background-color: black;">Welcome
        To Admin Panel</span>
</div>

<br><br><br><br><br><br>
<?php include('../footer.php'); ?>

</div><!--  containerFluid Ends -->

<script src="js/bootstrap.min.js"></script>

</body>

</html>