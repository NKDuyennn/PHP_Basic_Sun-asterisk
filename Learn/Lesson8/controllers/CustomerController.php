<?php 
	require_once('models/Customer.php');
	class CustomerController
	{	
		var $model;

		function __construct(){
			$this->model = new Customer();
		}
		function list(){
			$data = $this->model->All();
			require_once('views/customer/list.php');
		}

		function detail(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/customer/detail.php');
		}

		function add(){
			require_once('views/customer/add.php');
		}

		function store(){
			$data = $_POST;
			$status = $this->model->insert($data);
			if ($status==true) {
				setcookie('msg','Thêm mới thành công',time()+1);
				header('location: index.php?mod=customer');
			} else {
				setcookie('msg','Thêm mới thất bại.',time()+1);
				header('location: index.php?mod=customer&act=add');
			}
		}

		function edit(){
			$code = $_GET['code'];
			$data = $this->model->find($code);
			require_once('views/customer/edit.php');
		}

		function update(){
			$data = $_POST;
			$status = $this->model->update($data);
			if ($status==true) {
				setcookie('msg','Sửa thành công',time()+1);
				header('location: index.php?mod=customer');
			} else {
				setcookie('msg','Sửa thất bại.',time()+1);
				header('location: index.php?mod=customer&act=edit');
			}
		}

		function delete(){
			$code = $_GET['code'];
			$status = $this->model->delete($code);
			if ($status==true) {
				setcookie('msg','Xoá thành công',time()+1);
				header('location: index.php?mod=customer');
			} else {
				setcookie('msg','Xoá thất bại.',time()+1);
				header('location: index.php?mod=customer&act=list');
			}
		}
	}
 ?>