<?php 

class AdminModel extends CI_Model{

    public function getAllKaryawan()
    {
        $this->db->select('*');
        $this->db->from('tbl_karyawan t1');
        $this->db->join('tbl_jabatan t2', 't1.id_jabatan=t2.id_jabatan');
        $query = $this->db->get();
        return $query;
    }
    public function getJmlCutiBulanIni($status)
    {
        $bulanSekarang = date('Y-m');
        $this->db->select('*');
        $this->db->from('tbl_cuti');
        $this->db->where('YEAR(tgl)', date('Y', strtotime($bulanSekarang)));
        $this->db->where('MONTH(tgl)', date('m', strtotime($bulanSekarang)));
        if(!$status == ''){
            $this->db->where('status', $status);            
        }
        $query = $this->db->get();
        return $query;
    }
    public function getKaryawanByNik($nik)
    {
        $this->db->select('*');
        $this->db->from('tbl_karyawan t1');
        $this->db->join('tbl_jabatan t2', 't1.id_jabatan=t2.id_jabatan');
        $this->db->where('t1.nik', $nik);
        $query = $this->db->get();
        return $query;
    }
    public function getKaryawanById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_karyawan t1');
        $this->db->join('tbl_jabatan t2', 't1.id_jabatan=t2.id_jabatan');
        $this->db->where('t1.id_karyawan', $id);
        $query = $this->db->get();
        return $query;
    }
    public function getAllJabatan()
    {        
        $query = $this->db->get('tbl_jabatan');
        return $query;
    }
    public function getJabatanById($id)
    {
        $query = $this->db->get_where('tbl_jabatan', ['id_jabatan' => $id]);
        return $query;
    }
    public function getAllJenisCuti()
    {        
        $query = $this->db->get('tbl_jeniscuti');
        return $query;
    }
    public function getJenisCutiById($id)
    {
        $query = $this->db->get_where('tbl_jeniscuti', ['id_jeniscuti' => $id]);
        return $query;
    }
    public function getAllCutiKaryawan()
    {
        $this->db->select('*');
        $this->db->from('tbl_cuti t1');
        $this->db->join('tbl_jeniscuti t2', 't1.id_jeniscuti=t2.id_jeniscuti');
        $this->db->join('tbl_karyawan t3', 't1.id_karyawan=t3.id_karyawan');        
        $this->db->order_by('t1.id_cuti', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    public function getAllCutiKaryawanByDate($tglMulai, $tglSelesai)
    {
        $this->db->select('*');
        $this->db->from('tbl_cuti t1');
        $this->db->join('tbl_jeniscuti t2', 't1.id_jeniscuti=t2.id_jeniscuti');
        $this->db->join('tbl_karyawan t3', 't1.id_karyawan=t3.id_karyawan');
        $this->db->join('tbl_jabatan t4', 't3.id_jabatan=t4.id_jabatan');
        $this->db->where("t1.tgl BETWEEN '$tglMulai' AND '$tglSelesai'");        
        $query = $this->db->get();
        return $query;
    }
    public function getCutiKaryawanById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_cuti t1');
        $this->db->join('tbl_jeniscuti t2', 't1.id_jeniscuti=t2.id_jeniscuti');
        $this->db->join('tbl_karyawan t3', 't1.id_karyawan=t3.id_karyawan');
        $this->db->where('t1.id_cuti', $id);
        $query = $this->db->get();
        return $query;
    }
    public function getCutiKaryawanByStatus($status)
    {
        $this->db->select('*');
        $this->db->from('tbl_cuti t1');
        $this->db->join('tbl_jeniscuti t2', 't1.id_jeniscuti=t2.id_jeniscuti');
        $this->db->join('tbl_karyawan t3', 't1.id_karyawan=t3.id_karyawan');
        $this->db->where('t1.status', $status);
        $query = $this->db->get();
        return $query;
    }
    
}