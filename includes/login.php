<?php include 'db.php'; ?>
<?php session_start(); ?>
<?php 	
if (isset($_POST['login'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$username=mysqli_real_escape_string($con,$username);
	$password=mysqli_real_escape_string($con,$password);

  $query ="select * from users where username='{$username}'";
  $run_query=mysqli_query($con,$query);
while ($row = mysqli_fetch_array($run_query)) {
   $db_user_id=$row['user_id'];
   $db_username=$row['username'];
   $db_user_firstname=$row['first_name'];
   $db_user_lastname=$row['last_name'];
   $db_user_password=$row['user_password'];
   $db_user_role=$row['user_role'];
   
}
if ($username === $db_username && $password === $db_user_password) {
	$_SESSION['user_name']= $db_username;
	$_SESSION['firstname']= $db_user_firstname;
	$_SESSION['lastname']= $db_user_lastname;
	$_SESSION['role']= $db_user_role;

	header("location:../admin/index.php");
}
else{
	header("location:../index.php");

}

}		
 ?>