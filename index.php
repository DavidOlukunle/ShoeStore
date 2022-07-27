<?php 
$conn=mysqli_connect('localhost','root','','webstore');

?>

<?php  
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$contacts=$_POST['contacts'];
	$complaints=$_POST['complaints'];
	$image=$_POST['image'];

	$query="INSERT  INTO compalints(name,contacts,complaints,image)";
	$query.="VALUES('{$name}','{$contacts}','{$complaints}','{$image}')";
	$result=mysqli_query($conn,$query);

 	 





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


	<style type="text/css">
		.first{
			background-color:;
			color:white;
			height:450px;

		}
		.img{
			margin:5px;
		}
		.img.adjust{
			width:;
			height:120px;

		}
		.reveal{
			position:;
			transform:translateY(150px);
			opacity: 0;
			transition:all 2s ease;
		}
		.reveal.active{
			transform:translateY(0px);
			opacity:1; 
		}
		@media (max-width:900px)


	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md   bg-light navbar-light">
				<a class="navbar-header" href="#"><h3 style="color:black">LIONWEARS</h3><!--img src="..//iesa_logo.png"--></a>
			<button class="navbar-toggler" type="button"data-toggle="collapse"data-target="#drop" aria-control="drop" aria-expanded="false" aria-label="Toggle navigation">
				<span  class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="drop">
					<ul class="navbar-nav   mx-auto smooth-scroll ">
						<li class="nav-item"><a href="" class="nav-link">hello</a></li>
						<li class="nav-item"><a href="" class="nav-link">hello</a></li>
						<li class="nav-item"><a href="" class="nav-link">hello</a></li>
					</ul>
				</div>
			</nav>

			<div class="container-fluid first">
				<div class="row align-center">
					<div class="col">
						<h3 class="pt-5"style="text-align:center;color:black">Walk simple<br>Array your feet in pride</h3>
						<img src="images/banner.jpg" class="img-responsive center-block d-block mx-auto">
					</div>
				</div>
			</div>


	



<div class="container-fluid pt-5 bg-dark " style="color:white;">
	<div class="row">
		<div class="col-lg-6  pt-5"style="text-align:center;">
			<?php 
			$query="SELECT * FROM webpost";
			$result=mysqli_query($conn,$query);
			while ($row=mysqli_fetch_assoc($result)){
				$post_id=$row['post_id'];
				$post_title=$row['post_title'];
				$post_image=$row['post_image'];
				$post_content=$row['post_content'];
				$post_price=$row['post_price'];

				?>

      			<h3><p><?php echo $post_title ?></p></h3>
			<img src="images/<?php echo $post_image; ?>"class=" w3-center w3-animate-zoom reveal " alt="image title"style="width:40%;border-radius:;">
			<p><?php echo $post_content ?></p>
			<h3><?php echo $post_price ?></h3>
			<button class="btn btn-primary btn-large">Buy this product</button>
			<hr style="color:10px solid grey;border:1px solid grey">
		<?php } ?>
	</div>	


 <div class="col-lg-6 pt-5 pl-5 reveal">
	<div class="card bg-light" style="color:black;">
		<!-- <h2 class="bg-primary"><?php echo $message ?></h2> -->
	<h3> Do you want to repair your damaged shoes?</h3>
	<P>Fill out this form. State the condition of the shoe and leave us with your contacts</P>
	<form action=""method="post" >
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text"name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="name">contacts</label>
			<input type="text"name="contacts" class="form-control">
		</div>
		<div class="form-group">
			<label for="name">Complaints?</label>
			<textarea class="form-control"name="complaints"cols="10" rows="8"></textarea>
		</div>
		<div class="form-group">
			<label for="name">Any Image?<br>Upload here</label>
			<input type="file" name="image">
		</div>
		<button class="btn btn-primary form-control"style=""name="submit">Submit</button>

</form>


</div>


</div>
</div>
	</div>
	<div class="container bg-light pt-5 reveal">

		<h4>Are you interested in shoe making? search no further. Lionwears has an excellent plan for all those who are interested in making out a career in shoe making</h4>
		<div class="row">
			<div class="col-lg-4">
				invalid text
		
	</div>
	</div>
</div>





<script type="text/javascript" src="index.js"></script>
</body>
</html>