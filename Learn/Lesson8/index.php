
<?php 
$mod = isset($_GET['mod'])?$_GET['mod']:'employee';
$act = isset($_GET['act'])?$_GET['act']:'list';

switch ($mod) {
	// case 'product':
	// 		// echo "Bạn đang chọn sản phẩm";
	// require_once('controllers/ProductController.php');
	// $product_controller = new ProductController();

	// switch ($act) {
	// 	case 'list':
	// 				// echo "<br>Danh sách sản phẩm.";
	// 	$product_controller->list();
	// 	break;
	// 	case 'add':
	// 				// echo "<br>Thêm sản phẩm.";
	// 	$product_controller->add();
	// 	break;
	// 	case 'detail':
	// 				// echo "<br>Chi tiết sản phẩm.";
	// 	$product_controller->detail();
	// 	break;
	// 	default:
	// 	echo "<br>không có gì hết.";
	// 	break;
	// }
	// break;

	case 'customer':
	require_once('controllers/CustomerController.php');
	$customer_controller = new CustomerController();

	switch ($act) {
		case 'list':
		$customer_controller->list();
		break;
		case 'add':
		$customer_controller->add();
		break;
		case 'store':
		$customer_controller->store();
		break;
		case 'detail':
		$customer_controller->detail();
		break;
		case 'edit':
		$customer_controller->edit();
		break;
		case 'update':
		$customer_controller->update();
		break;
		case 'delete':
		$customer_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}
	break;

	case 'employee':
	require_once('controllers/EmployeeController.php');
	$employee_controller = new EmployeeController();

	switch ($act) {
		case 'list':
		$employee_controller->list();
		break;
		case 'add':
		$employee_controller->add();
		break;
		case 'store':
		$employee_controller->store();
		break;
		case 'detail':
		$employee_controller->detail();
		break;
		case 'edit':
		$employee_controller->edit();
		break;
		case 'update':
		$employee_controller->update();
		break;
		case 'delete':
		$employee_controller->delete();
		break;
		default:
		echo "<br>không có gì hết.";
		break;
	}
	break;
}
?>