<?php $connection=mysqli_connect('localhost','root','','webstore');
if ($connection)

 {
 echo "connected";
 } ?>
<?php
if(isset($_POST['submit'])){
	$post_title=$_POST['title'];
	$post_image=$_FILES['image']['name'];
	$post_image_temp=$_FILES['image']['tmp_name'];
	$file_upload=move_uploaded_file($post_image_temp, "images/$post_image");
	if(!$file_upload){
		echo "not uploaded";
	}
	else{
		echo "sucessfull";
		header('location:admin.php');
	}
	$post_content=$_POST['content'];
	$post_price=$_POST['price'];



	
	$query="INSERT INTO webpost(post_title,post_image,post_content,post_price) ";
	$query.="VALUES( '{$post_title}','{$post_image}','{$post_content}','{$post_price}' ) ";
	$result= mysqli_query($connection,$query);
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
</head>
		<body style="background-image:url('');">
			<!---the navbar--->
	
		
			<div class="container pt-5">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="author">Post Title</label>
						<input type="text" class="form-control" name="title">
					</div>
					
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image">
					</div>
					
					<div clas="form-group">
						<label for="content">Content</label>
						<textarea type="text" class="form-control" name="content" cols="10" rows="10">
						</textarea>
					</div>
					<div class="form-group">
						<label for="tags">Price</label>
						<input type="text" class="form-control" name="price">
					</div>
					<div class="form-group">
					
					<input class="btn btn-warning" type="submit" name="submit">
					</div></form>
				</div>
			</body>
			</html>
