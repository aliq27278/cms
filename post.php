<?php include "includes/header.php" ?>

    <!-- Navigation -->
   
<?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


<?php 
if (isset($_GET['p_id'])) {
        $post_id=$_GET['p_id'];

$query="select * from posts where post_id=$post_id";
$select_posts=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($select_posts)) {
 $post_title=$row['post_title'];
 $post_author=$row['post_author'];
 $post_date=$row['post_date'];
 $post_image=$row['post_image'];
 $post_content=substr($row['post_content'],0,100);
 
}
?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                 <!--    <a href="admin">Admin</a> -->

                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="error">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

               
<?php } ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
<?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>        

                <hr>

                <!-- Blog Comments -->

<?php 
if (isset($_POST['create_comment'])) {
    $post_id=$_GET['p_id'];

    $comment_author=$_POST['comment_author'];
    $comment_email=$_POST['comment_email'];
    $comment=$_POST['comment'];
    
    $query="INSERT INTO comments(comment_post_id,comment_author,
    comment_email,comment_content,comment_status,comment_date)
     VALUES ($post_id,'{$comment_author}','{$comment_email}','{$comment}',
     'unapproved',now())";
     $run_query=mysqli_query($con,$query);
     if(!$run_query){
        die("Query Failed!".mysqli_error($con));
     }
     else{
        echo "<h3>comment added successfully</h3>";
     }
     $update_comment_count="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id= $post_id";
     $run_update_comment_count=mysqli_query($con,$update_comment_count);

}

 ?>



                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                      <label for="author">Author</label>
            <input type="text" name="comment_author" class="form-control">
                        </div>

                        <div class="form-group">
                      <label for="email">Email</label>
            <input type="email" name="comment_email" class="form-control">                    
                        </div>
                        <div class="form-group">
                      <label for="comment">Your Comment</label>
                            <textarea class="form-control" rows="3"
                             name="comment"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

<?php 

$comment_query="SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='approve' ORDER BY comment_id DESC";
$run_comment_query=mysqli_query($con,$comment_query);

while ($row=mysqli_fetch_assoc($run_comment_query)) {
    $comment_author=$row['comment_author'];
    $comment_content=$row['comment_content'];
    $comment_date=$row['comment_date'];

?>

    



                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                      <p><?php echo $comment_content; ?></p>
                    </div>
                </div>
<?php } ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
