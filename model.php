<?php
    class CrudModel
    {
       private	$server = "localhost";
       private	$username = "root";
       private	$password;
       private	$db = "php_oop_crud_db";
       private $conn;
    	function __construct()
    	{
    		try {
    			$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
    		} catch (Exception $e) {
    			die('Connection Faild'.$e->getMessage());
    		}
    	}

    	public function insert(){
    		if (isset($_POST['btn'])) {
    			if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
    				if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])) {
    					$name = $_POST['name'];
    					$email = $_POST['email'];
    					$mobile = $_POST['mobile'];
    					$address = $_POST['address'];
    					$sql = "INSERT INTO users(name,email,mobile,address)VALUES('$name','$email','$mobile','$address')";
    				if ($query=	$this->conn->query($sql)) {
    					echo "<script>alert('Record Added Successfully');</script>";
    					echo "<script>window.location.href = 'index.php';</script>";
    				}else{
    					echo "<script>alert('Faild');</script>";
    					echo "<script>window.location.href = 'index.php';</script>";
    				}
    				}
    			}else{
    				echo "<script>alert('empty');</script>";
    				echo "<script>window.location.href = 'index.php';</script>";
    			}
    			# code...
    		}
    	}
    	public function view(){
    		       $data[]=null;
    		       $sql = "SELECT * FROM users";
    		       if ($query = $this->conn->query($sql)) {
    		          while($row=mysqli_fetch_assoc($query)) {
    		          $data[] = $row;
    		          }
    		       }
    		       return $data;

    	}

    	public function delete($id){
    		$sql = "DELETE FROM users WHERE id = $id";
    		if($query=$this->conn->query($sql)){
    		return true;
    		}else{
    		return false;
    		}
    	}

    	public function singleRecord($id){
    		$data = null;
            $sql = "SELECT * FROM users WHERE id ='$id'";
            if($query = $this->conn->query($sql)){
           	while ($row = $query->fetch_assoc()){
           		$data = $row; 
           	}

          }
          return $data;
    	}
    	public function edit($id){
    		
    		$data = null;
    		$sql = "SELECT * FROM users WHERE id = '$id'";
    		if($query = $this->conn->query($sql)){
    			while ($row = $query->fetch_assoc()) {
    				$data = $row;
    			}
    			
    		}
           return $data;   
    	}
    	public function update($data){
    		$sql = "UPDATE users SET name='$data[name]',email='$data[email]',mobile = '$data[mobile]',address='$data[address]' WHERE id = '$data[id]'";
    		   if($query=$this->conn->query($sql)){
                 return true;
    		}else{
    			return false;
    		}
    	}
    }


?>