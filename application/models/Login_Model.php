<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function login($username,$password)
		{
			$this->db->select('id,username,password');
			$this->db->from('user');
			$this->db->where('username',$username);
			$this->db->where('password',MD5($username));

				$query = $this->db->get();
				if($query->num_rows()==1){
					return $query->result();
				}else{
					return false;
				}
			
		}
		
		public function insertRegister()
		{
			$password = $this->input->post('password');
			$object = array(('username') => $this->input->post('username'), 'password' => MD5($password));
			$this->db->insert('user', $object);
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>