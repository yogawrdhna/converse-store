<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function index(){
		$data['konten']="galleryy";
		$this->load->view('template', $data);
	}
}
?>