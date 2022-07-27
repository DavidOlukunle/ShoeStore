<?php
$connection=mysqli_connect('localhost','root','','webstore');
if($connection){
	echo "well connected";
}

?>

<!DOCTYPE HTML>

<html lang="en">
	<head>
	<title></title><link rel="stylesheet" type="text/css" href="../vendor/bootstrap.min.css">
	<script type="text/javascript" src="../vendor/jquery.min.js"></script>
	<script type="text/javascript" src="../vendor/popper.min.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


	<body style="background-color:grey;color:white;">
		<div class="container">
		<h1 style="color:white"> Welcome Back!</h1>
		<p> create, edit and delete your contents here</p>
	</div>

	<div class="container" style="color:white">
		<table class="table table-bordered table-hover" style="color:white;">
			<thead>
				<tr>
					<th>Post Title</th>
					<th>Post Image</th>
					<th>Post content</th>
					<th>Post Price</th>

			</thead>
			<?php
			$query="SELECT * FROM webpost";
			$result=mysqli_query($connection,$query);
			while($row=mysqli_fetch_assoc($result)){
				$Post_id=$row['post_id'];
				$post_title=$row['post_title'];
				$post_images=$row['post_image'];
				$post_contents=$row['post_content'];
				$post_price=$row['post_price'];



				echo "<tr>";
				echo "<td>$post_title</td>";
				echo "<td><img width='100' src='images/$post_images'></td>";
				echo "<td>$post_contents</td>";
				echo "<td>$post_price</td>";
				echo "<td><a href='edit.php?edit={$Post_id}'><h4><b>Edit</b></h4></td>";
				echo "<td><a href='admin.php?delete={$Post_id}'><h4><b>Delete</b></h4></td>";;
			}



			?>
			<div class="container">
				<h3><a href="newpost.php"><button class="btn btn-primary">Create new Post</button></a></h3>

<!--deleting posts -->
<?php
if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
	$query="DELETE from webpost where post_id={$delete}";
	$result=mysqli_query($connection,$query);
	header("Location:admin.php");
	
}




?>












	</body>
 