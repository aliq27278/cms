<?php 
				 // <.. insert..>   
function insert_catagories()
{
	if (isset($_POST['submit'])) {
    $catagory_title=$_POST['cat_title'];
if($catagory_title =="" || empty($catagory_title)){
    echo "<h1 style='color:red;'>The Field can't be Empty</h1>";
}
else{
	global $con;
$insert_query="INSERT INTO catagories(cat_title) VALUES ('{$catagory_title}')";
$run_insert_query=mysqli_query($con,$insert_query);
if($run_insert_query){
    echo "<h1>Catagory Added successfully</h1>";
}  
else{
    die('Query Failed' . mysqli_error($con));
    echo "<h1 style='color:red;'>Catagory not Added</h1>";
}
}
}
}
 ?>
 					 // <.. Select..> 

 <?php 
function find_all_catagories(){
	global $con;
	$query="select * from catagories";
$run_query=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($run_query)) {
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];

echo "<tr>";
echo "<td> {$cat_id}</td>";  
echo "<td>{$cat_title}</td>"; 
echo "<td><a href='admin_catagories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='admin_catagories.php?edit={$cat_id}'>Update</a></td>";
echo "</tr>"; 

}
}
  ?>
  						 // <.. Delete..> 
  <?php 

function delete_catagories(){
	global $con;
	if(isset($_GET['delete'])){
    $the_cat_id=$_GET['delete'];
$query="DELETE FROM catagories WHERE cat_id={$the_cat_id}";
$delete_query=mysqli_query($con,$query);
           // For Refresh page     
header("Location:admin_catagories.php");
}
}

   ?>