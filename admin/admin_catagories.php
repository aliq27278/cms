
<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/admin_navigation.php'; ?>
    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELcome to Admin
                            <small>Author</small>
                        </h1>
                        
                      <!--   Half col -->
<div class="col-xs-6">
    <?php 
if (isset($_POST['submit'])) {
    $catagory_title=$_POST['cat_title'];
if($catagory_title =="" || empty($catagory_title)){
    echo "<h1 style='color:red;'>The Field can't be Empty</h1>";
}
else{
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
 ?>

            <!-- Form Code -->

    <form class="form-group" method="post" action="admin_catagories.php"> 
        <div class="form-group">
        <label for="cat_title">Add catagories</label>
        </div>
        <div class="form-group">
        <input type="text" name="cat_title" class="form-control">
        </div>
        <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary" value="Add catagory">
        </div>
    </form>


  <?php 
if (isset($_GET['edit'])) {
    $cat_id=$_GET['edit'];
    include 'update_catagories.php';
}
  ?>

</div>



                         <!--Other Half col -->

<div class="col-xs-6">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Catagory Title</th>
            </tr>
        </thead>
        <tbody>

           
         
 <?php  // Select Query

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
?>
                        <!-- Delete Data -->
<?php 
if(isset($_GET['delete'])){
    $the_cat_id=$_GET['delete'];
$query="DELETE FROM catagories WHERE cat_id={$the_cat_id}";
$delete_query=mysqli_query($con,$query);
           // For Refresh page     
header("Location:admin_catagories.php");
}

 ?>


                 
        </tbody>
    </table>
</div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include 'includes/admin_footer.php'; ?>




   
