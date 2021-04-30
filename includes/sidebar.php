
<div class="col-md-4">




                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
<form method="post" action="search.php">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
</form>
                    <!-- /.input-group -->
                </div>


                        <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
<form method="post" action="includes/login.php">
                    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Enter Username">
         </div>
                    <div class="input-group">

        <input type="password" name="password" class="form-control" placeholder="Enter Password">
      <span class="input-group-btn">
        <button class="btn btn-primary" name="login" type="submit">
            Login
        </button>
      </span>
                        
                    </div>
</form>
                    <!-- /.input-group -->
                </div>



                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

 <?php 
$query="select * from catagories";
$catagories_title=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($catagories_title)) {
    $cat_title=$row['cat_title'];
    $cat_id=$row['cat_id'];
echo "<li><a href='./catagory_post.php?catagory_post_id=$cat_id'>{$cat_title}</a></li>";
}

?> 
                            </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <?php include 'widget.php'; ?>

            </div>