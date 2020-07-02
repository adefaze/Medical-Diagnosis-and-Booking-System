<?php
error_reporting(1);
	

	require_once("session.php");
	
	require_once("../classes/user.php");

	
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


	if(isset($_GET['submit'])){

		header("Location:odas..php");
	}

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>MDDPS | Patient's Dashboard</title>
		
	  <link rel="icon" type="image/x-icon" href="../images/ste.png" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" href="../css/demo.css">
		<link rel="stylesheet" href="../dist/ladda.min.css">

		<script src="js/modernizr.custom.js"></script>
		<style type="text/css">

		.imgs{
        margin-bottom:-32pt; 
       
      
       width: 80px;
       border-radius: 38px;
        background: #fff;

}
    .imgs a:hover{
    	 background: none;
    }
</style>
	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a class="gn-icon gn-icon-search"><span>My History</span></a>
								</li>
																<!--
								<li>
									<a class="gn-icon gn-icon-download">Downloads</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-illustrator">Vector Illustrations</a></li>
										<li><a class="gn-icon gn-icon-photoshop">Photoshop files</a></li>
									</ul>
								</li>
-->							
								<li><a class="gn-icon gn-icon-help">Search</a></li>
								<li><a class="gn-icon gn-icon-help">Health Tips</a></li>
									<li><a class="gn-icon gn-icon-article">Feedback</a></li>
										<li><a class="gn-icon gn-icon-cog">Change Password</a></li>
								<!--
								<li>
									<a class="gn-icon gn-icon-archive">Archives</a>
									<ul class="gn-submenu">
										<li><a class="gn-icon gn-icon-article">Articles</a></li>
										<li><a class="gn-icon gn-icon-pictures">Images</a></li>
										<li><a class="gn-icon gn-icon-videos">Videos</a></li>
									</ul>
								</li>-->
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><a href="../"><img src="../images/ste.png" class="img-responsive rounded" width="61" height="57"></a></li>
				<li><a class="codrops-icon codrops-icon" href="#"><span>DASHBOARD</span></a>
				</li>
				<li><a class="codrops-icon codrops-icon-drop" href="logout.php?logout=true"><span>Logout</span></a></li>
			</ul>
			
			<header>
				<h1>Hi, <?php print ucfirst(($userRow['surname'])); ?> <?php print ucfirst(($userRow['othernames'])); ?></h1>	
					
				<div class="container-fluid" >
			
				<div>
					<form role="form " class="form-inline" method="post" enctype="multipart/form-data">
					<div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: -10pt; margin-left: -112pt;"><br>
					<div class="text-center" style="font-size: 23pt;"><strong>
				
					</strong></div><br>
						
				 <h2 align="text-right" style="padding-left: 172pt;">Diagnostic Test</h2><br>



						<div class=table-responsive>
						<?php 

						include_once '../classes/db_config.php'; 
						try{
						$stmt = $auth_user->runQuery("SELECT * FROM malaria WHERE symptom_type='peculiar' LIMIT 3");
						$stmt->execute();
						if($stmt->rowCount() > 0){
							 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
              				  {
                 		  ?>
                  		 <div class="col-md-12">

                  		 <div class="">
                   		<form role="form " class="form-inline" method="get" enctype="multipart/form-data">
                     	 <div class="col-md-6">
                       			<strong>
                       			<br>
                       				
                       			
                       			<?php echo $row['symptom']; ?>
                       			</strong>
                       			</div>
                       			<div class="col-md-4">
                       				<br>

                       	  <input type="radio" value="yes" class="form-control" name="answer"> Yes                 
                           <input type="radio" value="no" name="answer" class="form-control" > No
                             </div>

                     

                  
                

                   <?php
                }
                		echo' <div>
                             <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                             </div>
                             </form>

                     </div>';
         }
						   }
						   catch(PDOException $e)
		{
			echo $e->getMessage();
		}
						


						?>
                   		</div>
                   	
					</div>
					</form>
				</div>
			</div>
			</header> 
			
			
		</div>
		<!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
		<script src="../dist/spin.min.js"></script>
		<script src="../dist/ladda.min.js"></script>

		<script>
			Ladda.bind( 'button[type=submit]' );
		</script>

		<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
	</body>
</html>