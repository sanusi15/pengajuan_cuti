<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('login/index.php');
    }

    public function signIn()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];
        $getUsernameDB = $this->db->get_where('tbl_users', $data);
        if ($getUsernameDB->num_rows() != 1) {
            $this->session->set_flashdata('pesan', 'Login Gagal, Harap cek kembali username dan password anda!');
            redirect('login');
        } else {
            $row = $getUsernameDB->row_array();
            $karyawan = $this->AdminModel->getKaryawanById($row['id_karyawan'])->row_array();
            $data = [
                'username' => $row['username'],
                'id' => $row['id_karyawan'],
                'level' => $row['level'],
                'nama' => $karyawan['nama'],
            ];
            $this->session->set_userdata('userdata', $data);
            if ($data['level'] == 1) {
                redirect('admin');
            } else {
                redirect('karyawan');
            }
        }
    }

    public function signUp()
    {
        $this->load->view('login/daftar.php');
    }

    public function regist()
    {
        $this->db->where_not_in('nama_jabatan', 'Manager');
        $this->db->where_not_in('nama_jabatan', 'HRD');
        $query = $this->db->get('tbl_jabatan')->result_array();
        $data['posisi'] = $query;
        $this->load->view('registrasi/index', $data);
    }

    public function daftar()
    {
        $nama = $this->input->post('nama');
        $gender = $this->input->post('gender');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $nik = $this->input->post('nik');
        $posisi = $this->input->post('posisi');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $agama = $this->input->post('agama');
        $username = $this->input->post('username');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        $data = [
            'nama' => $nama,
            'nik' => $nik,
            'gender' => $gender,
            'id_jabatan' => $posisi,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'telp' => $no_telp,
            'agama' => $agama,
            'kuota_cuti' => 12,
        ];
        $this->db->insert('tbl_karyawan', $data);
        $getKaryawan = $this->AdminModel->getKaryawanByNik($nik)->row_array();
        $data = [
            'username' => $username,
            'password' => $password1,
            'id_karyawan' => $getKaryawan['id_karyawan'],
        ];

        $insert = $this->db->insert('tbl_users', $data);

        if ($insert) {
            $this->session->set_flashdata('msg', 'Registrasi Berhasil');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
