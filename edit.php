<?php $connection=mysqli_connect('localhost','root','','webstore'); 
if($connection){
	echo "hello";
}
?>
<?php 
if(isset($_GET['edit'])){
	$edit=$_GET['edit'];
	
}
$query="SELECT * FROM webpost where post_id=$edit ";
$the_result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($the_result)){
	$Post_id=$row['post_id'];
	$post_title=$row['post_title'];
	$post_image=$row['post_image'];
	$post_content=$row['post_content'];
	$post_price=$row['post_price'];
}
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

	if(empty($post_image)){
		$query="SELECT * FROM webpost where post_id= $post_id";
		$result=mysqli_query($connection,$result);
		while($row=mysqli_fetch_array($result)){
			$post_image=$row['post_image'];
		}
	}
	$query="UPDATE webpost set ";
	$query .="post_title = '{$post_title}'," ;
	$query.="post_image = '{$post_image}', " ;
	$query.= "post_content = '{$post_content}', ";
	$query.="post_price = '{$post_price}' ";
	$query.="WHERE post_id= {$Post_id} ";

	$result=mysqli_query($connection, $query);
	if(!$result){
  die("QUERY FAILED" .  mysqli_error($connection));
 }
if($result){
	header('Location:admin.php');
}

	
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
	
		<hr>
		<hr>
		<div class="container pt-5">
		<form action="" method ="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for= "Author">Title</label>
				<input type ="text" class="form-control" name="title" value="<?php if(isset($post_title)){echo $post_title;} ?>">
			</div>
				<div class="form-group">
	<img width='100' src="/images/<?php echo $post_image; ?>" >
	<input type="file" name="image">
</div>
		
<div class="form-group">
	<label for="content">Content</label>
	<textarea  class="form-control" name="content"id="" cols="10" rows="10">
		<?php  if(isset($post_content)){echo $post_content;}?>
	</textarea> 
</div>
			<div class="form-group">
				<label for="title">Price</label>
				<input type="text" class="form-control" name="price"value="<?php if(isset($post_price)){echo $post_price;} ?>">
			</div>

<div class="form-group">
	<input class="btn btn-warning btn-round" type="submit" name="submit">
</div>
</form>
</div>
</body>
</html>