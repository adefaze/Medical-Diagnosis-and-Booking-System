<?php if(!isset($_SESSION)){
	session_start();
	}  
?>


<?php 
    $booking_id = isset($_GET['booking_id'])?$_GET['booking_id']:"";
    
    include('../config/config.php');

    $sql = " DELETE FROM booking WHERE booking_id='$booking_id'";

		if ($conn->query($sql) === TRUE) {
               echo "<script>alert('Appointment Canceled Successfully');
               window.location.href='/online_medical/doctor/myAppointment.php';
               </script>";
               
		} else {
		    echo "<script>alert('There was an Error')</script>";
        }

        $conn->close();
        
    
	
 ?>