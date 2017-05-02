<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai',$data);	

	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); //untuk form validasi
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');//trim memo
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');
		$this->load->model('pegawai_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pegawai_view');

		}else{

			$config['upload_path']		= './assets/uploads/';
			$config['allowed_types']	= 'gif|jpg|png';
			$config['max_size']			= 1000000000;
			$config['max_width']		= 10240;
			$config['max_height']		= 7680;

			$this->load->library('upload',$config);

			if ($this->upload->do_upload('foto')) 
			{
				# code...
				$this->pegawai_model->insertPegawai();
				$this->load->view('tambah_pegawai_sukses');
			}
			else
			{
				
				$error = array('error' => $this->upload->display_errors() );
				$this->load->view('tambah_pegawai_view',$error);
			}
			

		}
	}
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');
		$this->load->model('pegawai_model');
		$data['pegawai']=$this->pegawai_model->getPegawai($id);
		
		$file_name = 'foto';

		if($this->form_validation->run()==FALSE){
			$this->load->view('edit_pegawai_view',$data);

		}else{

			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000000000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);

			if( ! $this->upload->do_upload())
			{
				$error = array('error' =>$this->upload->display_errors());
				$this->load->view('edit_pegawai_view');
			}

			else
			{
				$image_data = $this->upload->data();
				$configer=array
				(
					'image_library' => 'gd2',
					'source_image' => $image_data['full_path'],
					'maintain_ration' => TRUE,
					'width' => 10240,
					'height' => 7680,
				);
				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();
				$this->pegawai_model->updateById($id);
				redirect('pegawai/datatable');
			}

			$this->pegawai_model->updateById($id);
			redirect('pegawai');

		}

	}

	

	/*public function delete()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); //untuk form validasi
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|numeric');
		$this->load->model('pegawai_model');	
	}*/

	public function delete($id) {
			$this->load->model('pegawai_model');
			$this->pegawai_model->delete($id);
			redirect('pegawai');
		}

	public function datatable(){
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai_datatable',$data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>