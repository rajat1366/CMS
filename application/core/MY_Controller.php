<?php 
class MY_Controller extends CI_Controller{
	 function __construct(){
	 	parent::__construct();
	 }
}
	 class Public_Controller extends MY_Controller{
	 	function __construct(){
	 		parent::__construct();

	 		$this->load->library('menu');
	 		$this->pages = $this->menu->get_pages();
	 		
	 		$this->brand = "My Website";
	 		$this->banner_heading ="Welcome To Our Website";
	 		$this->banner_text = "This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.";
	 		$this->banner_link =  'pages/show/our-team';

	 		}
	 }
	 class Admin_Controller extends MY_Controller{
	 	function __construct(){
	 		parent::__construct();
	 		
	 	}
	 }


?>