<?php
include_once "includes/connection.php";
include_once "includes/functions.php";
if(!isset($_GET['id'])){
	header("Location: index.php?geterr");
}else{
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if(!is_numeric($id)){
		header("Location: index.php?numerror");
		exit();
	}else if(is_numeric($id)){
		$sql = "SELECT * FROM page WHERE page_id='$id'";
		$result = mysqli_query($conn, $sql);
		//Check if posts exits
		if(mysqli_num_rows($result)<=0){
			//no posts
			header("Location: index.php?nopagefound");
		}else if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$page_title = $row['page_title'];
				$page_content = $row['page_content'];
				$page_title2 = $row['page_title'];
				
				?>
				
				
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $page_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel="stylesheet" href="styles/cssfile.css">
	</head>
	<body>
	
		<!--NAVIGATION BAR HERE-->
		<?php include_once "includes/nav.php"; ?>
		<!--NAVIGATION BAR ENDS HERE-->
		
		
		
		<div class="container">
			<h1 style="width:100%;background-color:grey;padding-top:25px;padding-bottom:25px;text-align:center;color:white"><?php echo $page_title2; ?></h1>
			<hr>
			
			<p><?php echo $page_content; ?></p>
			
		</div>
		
	
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scroll.js"></script>
	</body>
</html>
				
				
				<?php
			}
		}
	}
}
?>