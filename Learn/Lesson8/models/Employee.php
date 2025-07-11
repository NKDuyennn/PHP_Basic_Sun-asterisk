<?php 			
	
	class Employee{
		function All(){
			require_once('db_connect.php');
			$data = array();
			$sql = "SELECT * FROM employees";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		function find($code){
			require_once('db_connect.php');
			$sql = "SELECT * FROM employees WHERE code='".$code."'";
			$data = $conn->query($sql)->fetch_assoc();
			return $data;
		}

		function insert($data){
			require_once('db_connect.php');
			$sql = "INSERT INTO employees (code,name,mobile,email,address,password) VALUES ('".$data['code']."','".$data['name']."','".$data['mobile']."','".$data['email']."','".$data['address']."','".md5($data['password'])."')";
			$result = $conn->query($sql);
			return $result;
		}
		function update($data){
			require_once('db_connect.php');
			$sql = "UPDATE employees SET name='".$data['name']."',mobile='".$data['mobile']."',email='".$data['email']."',address='".$data['address']."' WHERE code='".$data['code']."'";
			$result = $conn->query($sql);
			return $result;
		}

		function delete($data){
			require_once('db_connect.php');
			$sql = "DELETE FROM employees WHERE code='".$data."'";
			$result = $conn->query($sql);
			return $result;
		}
	}
 ?>