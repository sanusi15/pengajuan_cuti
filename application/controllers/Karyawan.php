<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('userdata')) {
			redirect('/');
		}
	}

	public function index()
	{
		$userdata = $this->session->userdata('userdata');
		$data['user'] = $this->AdminModel->getKaryawanById($userdata['id'])->row_array();
		$data['level'] = $userdata['level'] == 0 ? 'Pegawai' : 'Manager';		
		$data['jml_cuti'] = $this->KaryawanModel->getAllCuti()->num_rows();	
		$data['pending'] = $this->KaryawanModel->getAllCuti('Pending')->num_rows();
		$data['ditolak'] = $this->KaryawanModel->getAllCuti('Ditolak')->num_rows();
		$data['diterima'] = $this->KaryawanModel->getAllCuti('Diterima')->num_rows();
		
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('karyawan/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function riwayat($status=null)
	{
		if($status==null){			
			$data['jml_cuti'] = $this->KaryawanModel->getAllCuti()->result_array();	
		}else{
			$data['jml_cuti'] = $this->KaryawanModel->getAllCuti($status)->result_array();	
		}
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('karyawan/history.php', $data);
		$this->load->view('template/footer.php');
	
	}
}
