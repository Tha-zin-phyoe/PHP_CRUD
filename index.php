<?php
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <style>
    body{
        padding:100px;
    }
   </style>
</head>
<body>
   
  <div class="container">
  <div class="row">
    <div class="col-md-6">
        <a href="create.php" class="btn btn-primary mb-5">+Create Post</a>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $query = "SELECT * FROM posts";
                 $posts = mysqli_query($db,$query);
                 foreach($posts as $post){
                    ?>
                     <tr>
                    <td><?php echo $post['id'] ?></td>
                    <td><?php echo $post['title'] ?></td>
                    <td><?php echo $post['description'] ?></td>
                    <td>
                        <a href="edit.php?postId=<?php echo $post['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="index.php?postId=<?php echo $post['id'] ?>" class="btn btn-danger" name="deleteBtn" onclick="return confirm('R u surre)">Delete</a>
                    </td>
                </tr>
                <?php
                 }

                ?>
               
            </tbody>
        </table>
    </div>
   </div>
  </div>

<?php
if(isset($_GET['postId'])){
   $postId =$_GET['postId'];
  mysqli_query($db,"DELETE FROM posts WHERE id=$postId");
  header('location:index.php');}
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>