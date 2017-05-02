<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index($idPegawai)
	{
		$this->load->model('pegawai_model');		
		$data["jabatan_list"] = $this->pegawai_model->getJabatanByPegawai($idPegawai);
		$this->load->view('jabatan', $data);
	}
	public function create($idPegawai)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); //untuk form validasi
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');//trim memo
		$this->load->model('pegawai_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_jabatan_view');

		}else{

				$this->pegawai_model->insertJabatan($idPegawai);
				$this->load->view('tambah_jabatan_sukses');

		}
	}
	public function update($idPegawai)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('pegawai_model');
		$data['jabatan_pegawai']=$this->pegawai_model->getJabatan($idPegawai);
		
		if($this->form_validation->run()==FALSE){

			$this->load->view('edit_jabatan_view',$data);

		}else{
			$this->pegawai_model->updateJabatan($idPegawai);
			$this->load->view('edit_pegawai_sukses');

		}
	}
	public function delete($idPegawai) {
			$this->load->model('pegawai_model');
			$this->pegawai_model->deleteJabatan($idPegawai);
			redirect('jabatan/index/'.$this->uri->segment(3));
		}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>