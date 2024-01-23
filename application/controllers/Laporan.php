<?php

use FontLib\Table\Type\post;

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('userdata')){
			redirect('/');
		}
	}
	public function index()
	{
		$data['laporan'] = $this->db->get('tbl_laporan')->result_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/laporan/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function cari()
	{
		$tgl = $this->input->post('tgl');
		list($tglMulai, $tglSelesai) = explode(' - ', $tgl);
		$tglMulai = date('Y-m-d', strtotime($tglMulai));
		$tglSelesai = date('Y-m-d', strtotime($tglSelesai));
		$data = $this->AdminModel->getAllCutiKaryawanByDate($tglMulai, $tglSelesai)->result_array();

		$this->load->library('pdfgenerator');

		$this->data['daftar'] = $data;
		$this->data['date1'] = $tglMulai;
		$this->data['date2'] = $tglSelesai;


		$this->data['title_pdf'] = 'Laporan Pengajuan Cuti';
		$file_pdf = 'LaporanPengajuanCuti';
		$paper = 'A4';
		$orientation = "portrait";
		$html = $this->load->view('admin/laporan/print', $this->data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function kirim()
	{	$bulan = $this->input->post('bulan');
		$tahun =  $this->input->post('tahun');
		$config['upload_path'] = './assets/upload/file/';
		$config['allowed_types'] = 'pdf';
		$config['file_name'] = 'Reporting_'.$tahun.'_'.$bulan;
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$this->session->set_flashdata('msg', 'Laporan Gagal Dikirim');
			redirect('laporan');
		}else{
			$upload = $this->upload->data();
			$data = [
				'tgl_pelaporan' => date('Y-m-d'),
				'periode_laporan' => $bulan.' '.$tahun,
				'file' => $upload['file_name'],
			];
			$insert = $this->db->insert('tbl_laporan', $data);
			if($insert){
				$this->session->set_flashdata('msg', 'Laporan berhasil dikirim');
				redirect('laporan');
			}
		}
	}

	public function delete($id)
	{
		// Select the file name from the database
		$this->db->select('file');
		$this->db->from('tbl_laporan');
		$this->db->where('id_laporan', $id);
		$query = $this->db->get();
		
		// Check if the record exists
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$fileToDelete = $row->file;
			
			// var_dump('ada');die;
			$filePath = './assets/upload/file/' . $fileToDelete;
			if (file_exists($filePath)) {
				unlink($filePath);
				$this->db->where('id_laporan', $id);
				$this->db->delete('tbl_laporan');
				$this->session->set_flashdata('msg', 'Laporan berhasil dihapus');
				redirect('laporan');
			} else {
				$this->session->set_flashdata('msg', 'Laporan gagal dihapus');
				redirect('laporan');
			}

			
		} else {
			var_dump('tidak ad');die;
			$this->session->set_flashdata('msg', 'Laporan gagal dihapus');
			redirect('laporan');
		}
	}

}
