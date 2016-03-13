<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
	private $limit = 10;
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_mdl', 'users');
		$this->load->helper('app_helper');
	}
	
	function index()
	{
		$data = $this->get_data_from_post();
		$data['record'] = $this->users->get_users('id', $this->limit);
		$total_rows = $this->users->all_records();	

		//fungsi pagination() ini diambil dari application/helpers/app_helper.php
		$data['page_links'] = pagination($total_rows, $this->limit);
				
		$data['module'] = 'user';
		$data['content'] = 'userlists';
		echo Modules::run('template', $data);
	}
	
	function get_data_from_post()
	{
		$data['firstname'] = $this->input->post('first_name', TRUE);
		$data['lastname'] = $this->input->post('last_name', TRUE);
		$data['username'] = $this->input->post('username', TRUE);
		$data['email'] = $this->input->post('email', TRUE);
		return $data;
	}
	
	/*
	 |--------------------------------------------------------------------------
	 | Fungsi Submit Data
	 |--------------------------------------------------------------------------
	 |
	 | Fungsi ini memiliki 2 fungsi yaitu untuk insert dan update data.
	 | Fungsi ini akan dijalankan bila inputnya berasal dari request ajax, selain itu
	 | akan dialihkan ke fungsi index(). "$update_id" adalah variabel indikator yang
	 | berisi id suatu record, digunakan untuk mengecek apakah data yang disubmit akan 
	 | diinsert sebagai data baru atau diupdate ke data lama.
	 |
	 */
	function submit()
	{
		if ($this->input->is_ajax_request())
		{
			$data = $this->get_data_from_post();
			$update_id = $this->input->post('update_id', TRUE);
			
			if (is_numeric($update_id))
			{
				$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|alpha_numeric');
			}
			else
			{
				$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|alpha_numeric|is_unique[users.username]',
						array(
								'is_unique' => '%s "'.$data['username'].'" sudah ada yang menggunakan.'
						));
			}
			$this->form_validation->set_rules('first_name', 'Nama Depan', 'required|alpha');
			$this->form_validation->set_rules('last_name', 'Nama Belakang', 'required|alpha');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
						
			if ($this->form_validation->run())
			{
				if (is_numeric($update_id))
				{
					$this->users->update($update_id, $data);
					echo json_encode(array(
							'success' => TRUE
					));
				}
				else
				{
					$this->users->insert($data);
					echo json_encode(array(
							'success' => TRUE
					));
				}	
			}
			else
			{
				echo json_encode(array(
						'success' => FALSE,
						'error_messages' => validation_errors()
				));
			}
		}
		else
		{
			$this->index();
		}
	}
	
	/*
	 |--------------------------------------------------------------------------
	 | Fungsi Update
	 |--------------------------------------------------------------------------
	 |
	 | Fungsi ini hanya untuk mengambil data yang akan diupdate sesuai id lalu 
	 | dikirimkan ke view dalam bentuk json untuk dimasukkan ke field form yang ada.
	 |
	 */
	function update()
	{
		if ($this->input->is_ajax_request())
		{
			$edit_id = $this->uri->segment(3);
			$query = $this->users->find_by_id($edit_id);
			foreach ($query->result() as $row)
			{
				echo json_encode(array(
						'id' => $row->id,
						'firstname' => $row->firstname,
						'lastname' => $row->lastname,
						'username' => $row->username,
						'email' => $row->email
				));
			}
		}
		else
		{
			$this->index();
		}
	}
	
	function delete()
	{
		if ($this->input->is_ajax_request())
		{
			$delete_id = $this->uri->segment(3);
			$this->users->delete($delete_id);
		}
		else 
		{
			$this->index();
		}
	}
}

/* End of file User.php */
/* Location: ./application/modules/user/controllers/User.php */