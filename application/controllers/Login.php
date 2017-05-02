<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function cekLogin()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); //untuk form validasi
		$this->form_validation->set_rules('username', 'Username', 'trim|required');//trim memo
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDB');

		if($this->form_validation->run()==FALSE){

			$this->load->view('login');

		}else{

			redirect('pegawai','refresh');
			

		}
	}
	public function cekDB($password)
	{
		$this->load->model('login_model');
		$username = $this->input->post('username');
		$result = $this->login_model->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id'=>$row->id,
					'username'=> $row->username
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal Username dan Password tidak valid");
			return false;
		}
		

	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');

	}
	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); //untuk form validasi
		$this->form_validation->set_rules('username', 'username', 'trim|required');//trim memo
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->load->model('login_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('register');

		}else{
			$this->login_model->insertRegister();
			redirect('login','refresh');
		}

	}

}



 ?>