

<?php if(!isset($_SESSION)){
	session_start();
	}  
?>


<?php 
    $id = isset($_GET['id'])?$_GET['id']:"";
    
    include('../config/config.php');

    $sql = " DELETE FROM patient WHERE id='$id'";

		if ($conn->query($sql) === TRUE) {
               echo "<script>alert('Patient Record Deleted Successfully');
               window.location.href='/online_medical/admin/viewCustomer.php';
               </script>";
               
		} else {
		    echo "<script>alert('There was an Error')</script>";
        }

        $conn->close();
        
    
	
 ?>

  

    

