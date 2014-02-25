<?php 
include_once("model/database.php");
include_once("model/useradd.php");
include_once("model/activate.php");
include_once("model/change.php");
include_once("model/user.php");
include_once("model/verify.php");
include_once("view/changeInfo.php");
include_once("view/emailSent.php");
include_once("view/infoChanged.php");
include_once("view/logIn.php");
include_once("view/userform.php");
include_once("welcome.php");
include_once ('view/home.php');
$obj = new index;
class index {
	private $page;
	function __construct() {
		if(!isset($_REQUEST['page'])) {
			include_once 'view/header.php';
			$obj = new welcomePage();
		 } else {
			$page = $_REQUEST['page'];
			include_once 'view/header.php';
			$obj = new $page();
		}
	}
    function __destruct() {
    	include_once 'view/footer.php';
    }
}

/*class page {
	function __construct() {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->get();
		}else {
			$this->post();
		}
	}
	function get() {
		echo "show form";
	}
	function post() {
		echo "process form";
	}
}*/
?>