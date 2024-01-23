<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$data['level'] = $userdata['level'] == 1 ? 'Admin' : 'Manager';
		$data['jml_karyawan'] = $this->AdminModel->getAllKaryawan()->num_rows();
		$data['jml_cuti'] = $this->AdminModel->getJmlCutiBulanIni('')->num_rows();
		$data['jml_cutiditerima'] =
		$this->AdminModel->getJmlCutiBulanIni('Diterima')->num_rows();
		$data['jml_cutipending'] = $this->AdminModel->getJmlCutiBulanIni('Pending')->num_rows();
		$data['jml_cutiditolak'] = $this->AdminModel->getJmlCutiBulanIni('Ditolak')->num_rows();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function karyawan()
	{		
		$data['karyawan'] = $this->AdminModel->getAllKaryawan()->result_array();
		$data['jabatan'] = $this->AdminModel->getAllJabatan()->result_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/karyawan/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function jgetKaryawan()
	{
		$nik = $this->input->post('nik');
		$res = $this->AdminModel->getKaryawanByNik($nik)->row_array();
		echo json_encode($res);
	}

	public function editKaryawan()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$jabatan = $this->input->post('jabatan');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$tlp = $this->input->post('tlp');
		$agama = $this->input->post('agama');

		$data = [
			'nama' => $nama,
			'nik' => $nik,
			'gender' => $gender,
			'id_jabatan' => $jabatan,
			'tempat_lahir' => $tempat,
			'tanggal_lahir' => $tanggal,
			'alamat' => $alamat,
			'telp' => $tlp,
			'agama' => $agama,
		];
		$this->db->where('id_karyawan', $id);
		$update = $this->db->update('tbl_karyawan', $data);
		if($update){
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('Admin/karyawan');
		}
	}

	public function addKaryawan()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$jabatan = $this->input->post('jabatan');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$tlp = $this->input->post('tlp');
		$agama = $this->input->post('agama');

		$data = [
			'nama' => $nama,
			'nik' => $nik,
			'gender' => $gender,
			'id_jabatan' => $jabatan,
			'tempat_lahir' => $tempat,
			'tanggal_lahir' => $tanggal,
			'alamat' => $alamat,
			'telp' => $tlp,
			'agama' => $agama,
			'kuota_cuti' => 12,
		];
		$insert = $this->db->insert('tbl_karyawan', $data);

		$getKaryawan = $this->AdminModel->getKaryawanByNik($nik)->row_array();

		$data = [
			'username' => $nik,
			'password' => 123,
			'id_karyawan' => $getKaryawan['id_karyawan'],
		];

		$this->db->insert('tbl_users', $data);

		if($insert){
			$this->session->set_flashdata('msg', 'Data berhasil ditambah');
			redirect('Admin/karyawan');
		}
	}
	
	public function deleteKaryawan()
	{
		$nik = $this->input->post('nik');
		$delete = $this->db->delete('tbl_karyawan', ['nik' => $nik]);
		if($delete){
			$res = 'sukses';
		}else{
			$res = 'gagal';
		}
		echo $res;
	}

	public function jenisCuti()
	{
		$data['cuti'] = $this->AdminModel->getAllJenisCuti()->result_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/jeniscuti/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function addJenisCuti()
	{		
		$data = [
			'nama_cuti' => $this->input->post('nama'),
		];
		$insert = $this->db->insert('tbl_jeniscuti', $data);
		if ($insert) {
			$this->session->set_flashdata('msg', 'Data berhasil ditambah');
			redirect('Admin/jeniscuti');
		}
	}

	public function jgetJenisCuti()
	{
		$id = $this->input->post('id');
		$res = $this->AdminModel->getJenisCutiById($id)->row_array();
		echo json_encode($res);
	}

	public function editJenisCuti()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');		

		$data = [
			'nama_cuti' => $nama,
		];
		$this->db->where('id_jeniscuti', $id);
		$update = $this->db->update('tbl_jeniscuti', $data);
		if ($update) {
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('Admin/jeniscuti');
		}
	}

	public function deleteJenisCuti()
	{
		$id = $this->input->post('id');
		$delete = $this->db->delete('tbl_jeniscuti', ['id_jeniscuti' => $id]);
		if ($delete) {
			$res = 'sukses';
		} else {
			$res = 'gagal';
		}
		echo $res;
	}

	public function jabatan()
	{
		$data['jabatan'] = $this->AdminModel->getAllJabatan()->result_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/jabatan/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function addJabatan()
	{
		$data = [
			'nama_jabatan' => $this->input->post('nama'),
		];
		$insert = $this->db->insert('tbl_jabatan', $data);
		if ($insert) {
			$this->session->set_flashdata('msg', 'Data berhasil ditambah');
			redirect('Admin/jabatan');
		}
	}

	public function jgetJabatan()
	{
		$id = $this->input->post('id');
		$res = $this->AdminModel->getJabatanById($id)->row_array();
		echo json_encode($res);
	}

	public function editJabatan()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		$data = [
			'nama_jabatan' => $nama,
		];
		$this->db->where('id_jabatan', $id);
		$update = $this->db->update('tbl_jabatan', $data);
		if ($update) {
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('Admin/jabatan');
		}
	}

	public function deleteJabatan()
	{
		$id = $this->input->post('id');
		$delete = $this->db->delete('tbl_jabatan', ['id_jabatan' => $id]);
		if ($delete) {
			$res = 'sukses';
		} else {
			$res = 'gagal';
		}
		echo $res;
	}

	public function cutiKaryawan($status)
	{
		if($status == 'all'){
			$data['cutikaryawan'] = $this->AdminModel->getAllCutiKaryawan()->result_array();			
		}else{
			$data['cutikaryawan'] = $this->AdminModel->getCutiKaryawanByStatus($status)->result_array();
		}
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/cutikaryawan/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function detailCuti($id)
	{
		$data['cuti'] = $this->AdminModel->getCutiKaryawanById($id)->row_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/cutikaryawan/detail.php', $data);
		$this->load->view('template/footer.php');
	}

	public function konfirmasi()
	{
		$id = $this->input->post('id');
		$nik = $this->input->post('id_karyawan');
		$lama_cuti = $this->input->post('lama_cuti');
		$submit = $this->input->post('submit');		
		$jenis_cuti = $this->input->post('jenis_cuti');
		if($submit == 'Diterima'){
			$getKaryawan = $this->AdminModel->getKaryawanByNik($nik)->row_array();
			$kuota = $getKaryawan['kuota_cuti'] - $lama_cuti;			
// 			if($jenis_cuti == 1){
				if($kuota <= 0){
					$this->session->set_flashdata('msg', 'Sisa cuti tidak cukup');
					redirect('Admin/cutiKaryawan');
				}else{
					$data = [
						'kuota_cuti' => $kuota,
					];
					$this->db->where('nik', $nik);
					$this->db->update('tbl_karyawan', $data);
					$data2 = [
						'sisa_cuti' => $kuota,
					];
					$this->db->where('id_cuti', $id);
					$this->db->update('tbl_cuti', $data2);
				}
// 			}
		}
		$data = [
			'alasan' => $this->input->post('alasan'),
			'status' => $submit,
		];
		$this->db->where('id_cuti', $id);
		$update = $this->db->update('tbl_cuti', $data);
		if ($update) {
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('Admin/cutiKaryawan/all');
		}

	}

	public function profile()
	{
		$userdata = $this->session->userdata('userdata');
		$data['user'] = $this->AdminModel->getKaryawanById($userdata['id'])->row_array();
		$data['level'] = $userdata['level'] == 1 ? 'Admin' : 'Anggota';
		if($userdata['level'] == 1){
			$data['level'] = 'Admin';
		}elseif($userdata['level'] == 2){
			$data['level'] = 'Manager';
		}else{
			$data['level'] = 'Pegawai';
		}
		$data['user2'] = $this->db->get_where('tbl_users', ['id_karyawan' => $userdata['id']])->row_array();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/profile/index.php', $data);
		$this->load->view('template/footer.php');
	}

	public function editProfile()
	{		
		
		$userdata = $this->session->userdata('userdata');		
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$gender = $this->input->post('gender');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$tlp = $this->input->post('tlp');
		$agama = $this->input->post('agama');

		$data = [
			'nama' => $nama,
			'nik' => $nik,
			'gender' => $gender,
			'tempat_lahir' => $tempat,
			'tanggal_lahir' => $tanggal,
			'alamat' => $alamat,
			'telp' => $tlp,
			'agama' => $agama,
		];
		
		$this->db->where('id_karyawan', $userdata['id']);
		$update = $this->db->update('tbl_karyawan', $data);
		
		if ($this->input->post('password') != null) {
			$data2 = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
			];
		} else {
			$data2 = [
				'username' => $this->input->post('username'),			
			];
		}	
		$this->db->where('id_karyawan', $userdata['id']);
		$update = $this->db->update('tbl_users', $data2);

		if ($update) {
			$this->session->set_flashdata('msg', 'Data berhasil diubah');
			redirect('Admin/profile');
		}
	}

}
