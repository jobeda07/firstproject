<?php
 include('function.php');
 $curdadmin= new curdapp();
 if(isset($_POST['btn'])){
   $return_msg=$curdadmin->add_data($_POST);
 }
   $students=$curdadmin->display_data();
if(isset($_GET['status'])){
  if($_GET['status']='delete'){
    $delete_id=$_GET['id'];
    $del_msg=$curdadmin->delete_data($delete_id);
  }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>crud learn</title>
  </head>
  <body>
     <div class="container my-4 p-4 shadow">
        <h2><a href="index.php" style="text-decoration:none;">iT students database</a></h2>
        <?php if(isset($del_msg)){echo $del_msg;}?>
        <form class="form" action="" method="POST" enctype="multipart/form-data">
          <?php if(isset($return_msg)){echo $return_msg;}?>
         <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter your name">
         <input class="form-control mb-2" type="number" name="std_roll" placeholder="Roll">
         <level for="image" >upload image</level>
         <input class="form-control mb-2" type="file" name="stg_img" >
         <input type="submit" value="add Information" name="btn" class="form-control bg-warning">
        </form>
     </div>
     <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
          <thead>
            <tr>
              <td>id</td>
              <td>Name</td>
              <td>Roll</td>
              <td>image</td>
              <td>action</td>
            </tr>
          </thead>
          <tbody>
            <?php while($stu=mysqli_fetch_assoc($students)){?>
            <tr>
              <td><?php echo $stu['id'];?></td>
              <td><?php echo $stu['std_name'];?></td>
              <td><?php echo $stu['std_roll'];?></td>
              <td><img style="width:100px; height:100px ;" src="upload/<?php echo $stu['stg_img'];?>"></td>
              <td>
                <a href="edit.php?status=edit&&id=<?php echo $stu['id'];?>" class="btn btn-success">Edit</a>
                <a href="?status=delete&&id=<?php echo $stu['id'];?>" class="btn btn-warning">Delete</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
     </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>