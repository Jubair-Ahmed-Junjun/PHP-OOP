<?php
   include "model.php";
   $model = new CrudModel();
   $id= $_REQUEST['id'];
   $delete = $model->delete($id);
   if($delete){
   	 echo "<script>alert('Delete Successfully');</script>";
     echo "<script>window.location.href = 'view.php';</script>";
   }
?>