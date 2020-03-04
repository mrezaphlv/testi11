<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
function __construct(){
parent::__construct();
// if($this->session->userdata('status') != "login"){
// 			//redirect(base_url("login"));
// 	echo '<script>alert("Login dulu boy");document.location.href="'.base_url('login').'";</script>';
// 		}
$this->load->model('M_users');
               // $this->load->helper('url');
}
	public function index()
	{
		$data['dusers'] = $this->M_users->get();
		$data['drole'] = $this->M_users->get_role();
		$this->load->view('v_users',$data);
	}
	function data_users(){
$ambil=$this->M_users->get();
echo json_encode($ambil);
	}
	function save(){
		$role=$this->input->post('a_role');
		$nama=$this->input->post('a_nama');
		$phone=$this->input->post('a_phone');
		$email=$this->input->post('a_email');
		$data = array(
			'id_role' => $role,
			'nama' => $nama,
			'phone' => $phone,
			'email' => $email
			);
		$simpen=$this->M_users->save($data);
		//echo json_encode($simpen);
	}

	function hapus($id){
		$this->M_users->delete($id);
		redirect('Users');
	}
}