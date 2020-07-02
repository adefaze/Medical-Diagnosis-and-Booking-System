<?php

error_reporting(1);
session_start();
if( $_SESSION['user_id'] == "" ) {
	header("Location: ../");
	exit;
}


// Create connection
$cn = mysqli_connect('localhost', 'root', '', 'mddps');
// Check connection
if (!$cn) {
  die("Connection failed: " . mysqli_connect_error());
}


// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }




extract($_POST);
extract($_GET);
extract($_SESSION);



?>

<?php include("menu.php")?>













<div class="col-lg-12 offset-lg-4">


    <!-- <h2 align="text-right" style="padding-left: 172pt;">Diagnostic Test</h2><br>-->
    <div class='table-responsive'>
        <?php
//include("header.php");



// $query="select * from malaria where symptom_type='peculiar'";
$rs = mysqli_query($cn, "select * from malaria where symptom_type='peculiar' limit 3 ");

// $query = $handler->query("SELECT * FROM malaria limit 3");


echo mysqli_num_rows($row);


	if(!isset($_SESSION[qn]))
		{
			// echo "working";
			$_SESSION[qn]=0;

			mysqli_query("delete from answer where user_id='" . $user_id ."'");
			$_SESSION[trueans]=0;

			
			
		}

		else
		{	
				if($submit=='Next Question' && isset($ans))
				{
						// mysql_data_seek($rs,$_SESSION[qn]);
						mysqli_data_seek($rs, $_SESSION[qn]);
						$row= mysqli_fetch_row($rs);	
						// $row = $result->fetch_row();
						mysqli_query("insert into answer(user_id,symptom_type,symptom,true_ans,your_ans) values ($user_id,'$row[1]','$row[2]','$row[5]','$ans')");
						
						if($ans==$row[5])
						{
									
									$_SESSION[trueans]=$_SESSION[trueans]+1;
									
						}
						$_SESSION[qn]=$_SESSION[qn]+1;
						
				}
				else if($submit=='Continue' && isset($ans))
				{
						mysqli_data_seek($rs,$_SESSION[qn]);
						// $result->data_seek($_SESSION[qn]);
						$row= mysqli_fetch_row($rs);	
						// $row = $result->fetch_row();
						mysqli_query("insert into answer(user_id,symptom_type,symptom,true_ans,your_ans) values ($user_id,'$row[1]','$row[2]','$row[5]','$ans')");
						if($ans==$row[5])
						{
									$_SESSION[trueans]=$_SESSION[trueans]+1;
						}
						//echo "<h1 class=head1> Result</h1>";
						$qn=$_SESSION[qn]=$_SESSION[qn]+1;
						//echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
						//echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
						$tr=$_SESSION[trueans];
						$w=$_SESSION[qn]-$_SESSION[trueans];
						//echo "<tr class=fans><td>Wrong Answer<td> ". $w;
						//echo "</table>";
						if($tr >= 2){
		
		
							header("Location:continue_m.php");
		
						}
						else
						{
							unset($_SESSION[qn]);
							unset($_SESSION[tr]);
							unset($_SESSION[w]);
							
							header("location:continue_ty.php");
						}
					}
						
				
		}
		mysqli_data_seek($rs,$_SESSION[qn]);
		// $result->data_seek($_SESSION[qn]);
		$row= mysqli_fetch_row($rs);
		// $row = $result->fetch_row();
		echo "<form role=form  class=form-inline method=post enctype=multipart/form-data>";
		echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
		$n=$_SESSION[qn]+1;
		echo "<tr><td><strong><p class='text-danger'>Question ".  $n .":</p> $row[2]</strong>";
		
		echo "<br><br><tr><td class=style8><input type=radio required name=ans value=yes>$row[3]";
		echo "<tr><td class=style8> <input type=radio name=ans value=no>$row[4]";
		
		
		if($_SESSION[qn]<mysqli_num_rows($row)-1)
		echo "<br/><br><tr><td><input type=submit name=submit value='Next Question' class='btn btn-success'></form>";
		else
		echo "<br><br><tr><td><input type=submit name=submit value='Continue' class='btn btn-success'></form>";
		echo "</table></table>";





?>
    </div>
</div>
<br><br><br><br><br>
<?php include("footer.php"); ?>