<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{
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
		$data['jenis_cuti'] = $this->AdminModel->getAllJenisCuti()->result_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('cuti/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function pengajuan()
	{
		$userdata = $this->session->userdata('userdata');
		$tglMulai = strtotime($this->input->post('tgl_mulai'));
		$tglSelesai = strtotime($this->input->post('tgl_selesai'));
		$selisihDetik = $tglSelesai - $tglMulai;
		$lamaCutiHari = floor($selisihDetik / (60 * 60 * 24)) + 1;
		$getSisaCuti = $this->AdminModel->getKaryawanById($userdata['id'])->row_array();
		if ($getSisaCuti['kuota_cuti'] < $lamaCutiHari) {
			$this->session->set_flashdata('failed', 'Pengajuan cuti gagal, sisa cuti anda kurang dari jumlah pengajuan cuti');
			redirect('pengajuan_cuti');
		}
		$data = [
			'tgl' => date('Y-m-d'),
			'id_jeniscuti' => $this->input->post('jenis'),
			'id_karyawan' => $userdata['id'],
			'tgl_mulai' => $this->input->post('tgl_mulai'),
			'tgl_selesai' => $this->input->post('tgl_selesai'),
			'lama_cuti' => $lamaCutiHari,
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'status' => 'Pending',
			'keterangan ' => $this->input->post('keterangan'),
			'sisa_cuti ' => $getSisaCuti['kuota_cuti'],
		];
		$insert = $this->db->insert('tbl_cuti', $data);
		if ($insert) {
			$this->session->set_flashdata('msg', 'Data berhasil terkrim, silahkan menunggu persetujuan dari HRD');
			redirect('pengajuan_cuti');
		}
	}
}
