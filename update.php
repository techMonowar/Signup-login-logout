<?php
include 'profile.php';
include 'config.php';

if (isset($_POST['update'])) {
	$id=$_GET['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		
		$sql = "UPDATE alluser SET fname='$fname', lname='$lname', mobile='$mobile', email='$email', password='$password' WHERE id='$id'";
			$result = mysqli_query($conn, $sql);
			echo "<script>alert('Wow! User RUPDATE Completed.')</script>";

			if ($result) {
				header ("Location:profile.php?id=$redirect");
				$fname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		}
		else {
			echo "<script>alert('Password Not Matched.')</script>";
		} 
		}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  

	<title>Update</title>
</head>
<body>

	
	<div class="container">

    <?php

        $id=$_GET['id'];
        $sql = "SELECT * FROM alluser WHERE id='$id'";
        $result = mysqli_query($conn,$sql); 
        $row = mysqli_fetch_array ($result);
		$redirect=$row['id'];

        ?>
    
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Data</p>
			<div class="input-group">
				<input type="text" placeholder="Enter First Name" name="fname" value="<?php echo $row['fname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $row['lname']; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Enter Mobile Number" name="mobile" value="<?php echo $row['mobile']; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $row['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="update" class="btn">Update</button>
			</div>
		
		</form>
        
        
	</div>
	
</body>
</html>