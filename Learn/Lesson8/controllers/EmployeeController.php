<?php 
	require_once('models/Employee.php');
	class EmployeeController
	{	
		var $model;

		function __construct(){
			$this->model = new Employee();
		}
		function list(){
			$data = $this->model->All();
			require_once('views/employee/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/employee/detail.php');
		}

		function add(){
			require_once('views/employee/add.php');
		}

		function store(){
			$data = $_POST;
			$status = $this->model->insert($data);
			if ($status==true) {
				setcookie('msg','Thêm mới thành công',time()+1);
				header('location: index.php?mod=employee');
			} else {
				setcookie('msg','Thêm mới thất bại.',time()+1);
				header('location: index.php?mod=employee&act=add');
			}
		}

		function edit(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/employee/edit.php');
		}

		function update(){
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status==true) {
				setcookie('msg','Sửa thành công',time()+1);
				header('location: index.php?mod=employee');
			} else {
				setcookie('msg','Sửa thất bại.',time()+1);
				header('location: index.php?mod=employee&act=edit');
			}
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);
			if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				header('location: index.php?mod=employee');
			} else {
				setcookie('msg','Xoá thất bại.',time()+1);
				header('location: index.php?mod=employee&act=list');
			}
		}
	}
 ?>