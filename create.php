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
    <?php
      $titleErr ='';
      $descriptionErr='';
      require 'connect.php';
      if(isset($_POST["button"])){
       $title = $_POST['title'];
       $desctitption=  $_POST['description'];
       if(empty($title)){
        $titleErr = 'The title field is required';
       }
       if(empty($desctitption)){
        $descriptionErr='The description filed is required';
       }
       if(!empty($title) && !empty($desctitption)){
        $query = "INSERT INTO posts(title,description) VALUES('$title','$desctitption')";
        mysqli_query($db,$query);
        header('location:index.php');
       }
      }
    ?>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         <div class="col-md-6 mb-5">
         <a href="index.php" class="btn btn-secondary"> BACK  </a>
         </div>  
        </div>
        <form action="create.php" method="POST">
            <div class="form-group">
            <label for="">Post Title</label>
            <input type="text" class="form-control" placeholder="Enter post title" name="title">
            <span class='text-danger'>
                <?echo
                 $titleErr;
                ?>
            </span>
            </div>
           <div class="form-group mt-3">
           <label for="">Post Description</label>
            <input type="textarea" class="form-control " placeholder="Enter post description" name="description">
            <span class='text-danger'>
                <?echo
                 $descriptionErr;
                ?>
            </span>
           </div>
          <button class="btn btn-primary mt-3" type="submit" name="button">Create Post</button>
        </form>
    </div>
   </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>