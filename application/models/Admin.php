<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{
  function __construct(){
    parent::__construct();

  }
	//fungsi cek session
  function logged_id(){
    return $this->session->userdata('id_user');
  }

  public function personal(){
   $hasil = $this->db->query("SELECT * FROM personal");
   return $hasil;
 }

 public function get_all_buku2(){
   $hasil = $this->db->query("SELECT * FROM personal");
   return $hasil;
 }

 public function check_login($table, $field1, $field2){
  $this->db->select('*');
  $this->db->from($table);
  $this->db->where($field1);
  $this->db->where($field2);
  $this->db->limit(1);
  $query = $this->db->get();
  if ($query->num_rows() == 0) {
    return FALSE;
  } else {
    return $query->result();
  }
}

public function edit_anggota($nrp,$nama,$pn,$jb,$sts,$jk){
  $hasil = $this->db->query("UPDATE personal SET nama='$nama',pangkat='$pn',jabatan='$jb',status='$sts',jenis_kelamin='$jk' WHERE nrp='$nrp'");
  return $hasil;
}

public function edit_piket($nrp,$stss){
  $ada = $this->db->query("UPDATE piket SET statuss='$stss' WHERE nrp='$nrp'");
  return $ada;
}

public function inne(){
  $listabsen = $this->db->query("SELECT * FROM personal INNER JOIN piket WHERE personal.nrp = piket.nrp ");
  return $listabsen;
}

public function allp(){
  $allpp = $this->db->query("SELECT e.id , e.start, e.end, e.title, e.description , a.nrp , a.event_id from events e inner join anggota_piket a on a.event_id = e.id INNER JOIN personal p on p.nrp = a.nrp ORDER BY e.id = a.event_id");
  return $allpp;
}

public function ket()
{
  $pike = $this->db->query("SELECT * FROM events");
  return $pike;
}

Public function getEvents(){  
  $sql = "SELECT * FROM events WHERE events.start BETWEEN ? AND ? ORDER BY events.start ASC";
  return $this->db->query($sql, array($_GET['start'], $_GET['end']))->result();
}

public function input($data,$table){
  $this->db->insert($table,$data);
  return $this->db->insert_id();
}

public function datas(){
  $ok = $this->db->get("SELECT p.*, a.* , e.* from events e inner join anggota_piket a on e.id = a.event_id INNER JOIN personal p on p.nrp = a.nrp where ");
  return $ok;
}


}