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
		$sql = "SELECT * FROM category WHERE category_id='$id'";
		$result = mysqli_query($conn, $sql);
		//Check if category exits
		if(mysqli_num_rows($result)<=0){
			//no category
			header("Location: index.php?noresult");
		}else{
		?>
		
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>My Dynamic Site</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles/bootstrap.min.css">
		<link rel="stylesheet" href="styles/cssfile.css">
	</head>
	<body>
	
		<!--NAVIGATION BAR HERE-->
		<?php include_once "includes/nav.php"; ?>
		<!--NAVIGATION BAR ENDS HERE-->
		
		
		
		<div class="container">
		<h1 style="width:100%;padding-top:25px;padding-bottom:25px;background-color:grey;color:white;text-align:center;">Showing All Posts For Category: <?php getCategoryName($id); ?></h1>
		<div class="card-columns">
		<?php 
			$sql = "SELECT * FROM `post` WHERE post_category='$id' ORDER BY post_id DESC";
			$result = mysqli_query($conn, $sql);
			while($row=mysqli_fetch_assoc($result)){
				$post_title = $row['post_title']; 
				$post_image = $row['post_image']; 
				$post_author = $row['post_author']; 
				$post_content = $row['post_content'];
				$post_id = $row['post_id'];
				
			$sqlauth = "SELECT * FROM authorr WHERE author_id='$post_author'";
			$resultauth = mysqli_query($conn, $sqlauth);
			while($authrow=mysqli_fetch_assoc($resultauth)){
				$post_author_name = $authrow['author_name'];
			
			
		?>
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?php echo $post_image ?>" alt="Card image cap">
				<div class="card-body">
				<h5 class="card-title"><?php echo $post_title ?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?php echo $post_author_name ?></h6>
				<p class="card-text"><?php echo substr(strip_tags($post_content),0,90)."..."; ?></p>
				<a href="post.php?id=<?php echo $post_id; ?>" class="btn btn-primary">Read More</a>
				</div>
			</div>
			
			<?php }}?>
		</div>
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
?>