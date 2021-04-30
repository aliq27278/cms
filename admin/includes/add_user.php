<?php 
if (isset($_POST['add_user'])) {

    $username=$_POST['username'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $user_image=$_FILES['image']['name'];
    $user_image_tmp=$_FILES['image']['tmp_name'];

    $user_role=$_POST['user_role'];
    $randSalt=$_POST['randSalt'];

	move_uploaded_file($user_image_tmp, "../images/$user_image");

$query="INSERT INTO users(username,first_name,last_name,user_email,user_password,user_image,user_role,randSalt) VALUES
 ('{$username}','{$first_name}','{$last_name}','{$user_email}',
 '{$user_password}','{$user_image}','{$user_role}','{$randSalt}');";
$run_query=mysqli_query($con,$query);
if ($run_query) {
	echo "<h1>User Added successfully</h1>";
}
else{
	die("Query Failed".mysqli_error($con));
}
}




 ?>
   


    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="username">User name</label>
          <input type="text" class="form-control" name="username">
      </div>

         <div class="form-group">
       <label for="first_name">First Name</label>
          <input type="text" class="form-control" name="first_name">
        </div>

        <div class="form-group">
       <label for="last_name">Last Name</label>
          <input type="text" class="form-control" name="last_name">
        </div>

       <div class="form-group">
       <label for="user_email">Email</label>
       <input type="email" name="user_email" class="form-control">
      </div>

      <div class="form-group">
       <label for="user_password">Password</label>
       <input type="password" name="user_password" class="form-control">
      </div>

      <div class="form-group">
         <label for="user_image">User Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
       <label for="user_role">Role</label>
       <select name="user_role" class="form-control">
         <option value="subscriber">Select option</option>
         <option value="admin">Admin</option>
         <option value="subscriber">Subscriber</option>
       </select>
      
      </div>

      <div class="form-group">
       <label for="randSalt">RandSalt</label>
       <input type="text" name="randSalt" class="form-control">
      </div>
    <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
      </div>

</form>
