<?php
      class ModelCrud
      {
      private $server = "localhost";
      private $username = "root";
      private $password;
      private $db = "php_crud";
      private $conn;

      	function __construct()
      	{
      		try {
      			$this->conn= new mysqli($this->server,$this->username,$this->password,$this->db);
      		} catch (Exception $e) {
      			die('connection faile'.$e->getMessage());
      		}
      	}


      	public function insert(){
      		if (isset($_POST['btn'])) {
      			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
      				if (!empty($_POST['name'])  && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
      				    $name = $_POST['name'];
      				  	$email = $_POST['email'];
      					$mobile = $_POST['mobile'];
      				 	$address = $_POST['address']; 

      				 	$query = "INSERT INTO users(name,email,mobile,address) VALUES ('$name','$email','$mobile','$address')";
      				 	if ($sql = $this->conn->query($query)) {
      				 		echo "<script>alert('Record Added Successfully');</script>";
      				 		echo "<script>window.location.href='crud.php';</script>";
      				 		
      				 	}else{
      				 		echo "<script>alert('faild');</script>";
      			    	    echo "<script>window.location.href='crud.php';</script>";

      				 	}
      				}
      			    else{
      			    	echo "<script>alert('empty');</script>";
      			    	echo "<script>window.location.href='crud.php';</script>";
      			    }
      			}
      			
      		}
      	}
      }
?>