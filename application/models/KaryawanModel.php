<?php 


class KaryawanModel extends CI_Model{

    public function getAllCuti($status=null)
    {
        $user = $this->session->userdata('userdata');        
        $bulanSekarang = date('Y-m');
        $this->db->select('*');
        $this->db->from('tbl_cuti t1');
        $this->db->join('tbl_jeniscuti t2', 't1.id_jeniscuti=t2.id_jeniscuti');
        $this->db->where('YEAR(t1.tgl)', date('Y', strtotime($bulanSekarang)));
        $this->db->where('MONTH(t1.tgl)', date('m', strtotime($bulanSekarang)));
        $this->db->where('t1.id_karyawan', $user['id']);
        if ($status != null) {
            $this->db->where('status', $status);
        }
        $this->db->order_by('t1.tgl', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}