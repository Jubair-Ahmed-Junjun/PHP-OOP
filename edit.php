<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>

  </head>
  <body>


   <div class="container"> 
   	<div class="row">
   	<div class="col-md-12 mt-5">
  			<h1 style="text-align: center;">PHP OOP CRUD</h1>
  			<hr style="text-align: center;" />
   		</div>
   	</div> 	

   
            	<div class="row">
   				<div class="col-sm-5 mx-auto">
   				 <h5><a href="index.php">Add Data</a>   ||   <a href="view.php">View Data</a></h5>
             <?php
                 
                include "model.php";
                $id = '';
                $a = new CrudModel();
                $id=$_REQUEST['id'];
                $edit = $a->edit($id);
                if (isset($_POST['update'])) {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {            
                $data['id'] = $id;
                $data['name'] = $_POST['name'];
                $data['email'] = $_POST['email'];
                $data['mobile'] = $_POST['mobile'];
                $data['address'] = $_POST['address'];
 
               $update = $a->update($data);   
               if($update){
               echo "<script>alert('update Successfully');</script>";
               echo "<script>window.location.href = 'view.php';</script>";
             }else{
               echo "<script>alert('Failed');</script>";
               echo "<script>window.location.href = 'view.php';</script>";
                      
            }
            }
          }else{
              echo "<script>alert('empty');</script>";
               header("Location:edit.php?id=$id");
          }
        
        }

     ?>


          <form action="" method="post">

          
   				<div class="form-group">
   					<label for="name">Name</label>
   				<input type="text" name="name"  value="<?php echo $edit['name'];?>" class="form-control">
   				</div>	

           <div class="form-group">
   					<label for="name">Email</label>
   				<input type="email" name="email" value="<?php echo $edit['email'];?>"  class="form-control">
   				</div>	


                 <div class="form-group">
   					<label for="name">Mobile No</label>
   				<input type="text" name="mobile"  value="<?php echo $edit['mobile'];?>" class="form-control">
   				</div>	

   				<div class="form-group">
   					<label for="name">Address</label>
   				<input type="text" name="address" value="<?php echo $edit['address'];?>"  class="form-control">
   				</div>	


   				<div class="form-group">
   				<input type="submit" name="update" id="btn" class="btn btn-success">
   				</div>	


   			</form>
  			</div>  		
   		</div>   		
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
