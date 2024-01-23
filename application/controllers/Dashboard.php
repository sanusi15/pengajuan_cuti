<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		if($userdata['level'] == 1){
			redirect('admin');
		}else{
			redirect('karyawan');
		}
	}
}
