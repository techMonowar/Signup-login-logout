<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">

	<title>Login Form - Pure Coding</title>
</head>
<body>
<?php

$id=$_GET['id'];
$sql = "SELECT * FROM alluser WHERE id='$id'";
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array ($result);
$redirect=$row['id'];

?>
<nav class="navbar navbar-expand bg-light navbar-light navbar-fixed-top ">
  <a class="navbar-brand" href="profile.php?id=<?php echo $row['id'];?>">Monowar</a>
  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
  <li class="nav-item active "><a class="nav-link mx-9" href="profile.php?id=<?php echo $_SESSION['id'];?>">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="profile.php?id=<?php echo $_SESSION['id'];?>"><?php echo " Welcome " . $row['fname'] ?></a></li>
      <button type="button" class="btn btn-primary mx-2"><a href='update.php?id=<?php echo $_SESSION['id'];?>' class="text-white"> Update</a></button>
      <button type="button" class="btn btn-warning mx-2"><a href='profile.php?id=<?php echo $_SESSION['id'];?>'class="text-white"> Profile</a></button>
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Logout</button>
      
 </ul>

</nav>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Do You Want to Logout?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       If You Really want to logout Please Click on Logout Button.
       Click Close Button if You Don't want.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='logout.php';">Logout</a></button>
      </div>
    </div>
  </div>
</div>


     


    <div class="text-center mt-4" ><?php echo "<h1>Welcome " . $row['fname'] ." ".$row['lname']."</h1>"; ?></div>
    <div class="text-center mt-4" >
    <p>Below is Your Details You Can Upadate this Details By Clickin Above Button on Navigation Bar</p>

    <table class="table">
  <tbody>
    <tr>
      <td>Name</td>
      <td>Mobile Number</td>
      <td>Email ID</td>
    </tr>
    <tr>

      <td><?php echo "<h3>-" . $row['fname'] ." ".$row['lname']."</h3>"; ?></td>
      <td><?php echo "<h3>- " . $row['mobile'] ."</h3>"; ?></td>
      <td><?php echo "<h3>- " . $row['email'] ."</h3>"; ?></td>
    </tr>

  </tbody>
</table>
</div>
    


<script>src="script.js"</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>