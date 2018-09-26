<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        //load model admin
		$this->load->model('admin');
		

	}

	public function index()
	{
		if($this->admin->logged_id())
		{

			$this->load->view("admin/dashboard");					

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function jad()
	{
		if($this->admin->logged_id())
		{

			$this->load->view("admin/jadwal");					

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function lok()
	{

		if($this->admin->logged_id())
		{

			$this->load->view("admin/lokasi");					

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}


	public function user()
	{			
		if($this->admin->logged_id())
		{
			$data['biasa'] = $this->admin->personal();	
			$this->load->view("admin/user",$data);					

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function absen()
	{
		
		if($this->admin->logged_id())
		{
			$data['bajah'] = $this->admin->inne();
			$this->load->view('admin/absen',$data);				

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function pik()
	{
		if($this->admin->logged_id())
		{
			$data['allp'] = $this->admin->ket();
			$data['allp2'] = $this->admin->allp();

			

			$this->load->view("admin/piket",$data);					

		}else{

			//jika session belum terdaftar, maka redirect ke halaman login
			redirect("login");

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function delete($nrp){
		$t_personal = array(
			'nrp' => $nrp
		);
		$t_piket = array(
			'nrp' => $nrp
		);
		$this->db->where($t_personal);
		$this->db->delete('personal');
		$this->db->where($t_piket);
		$this->db->delete('piket');

		redirect('dashboard/user');
	}

	public function tambah()
	{
		$data = array(
			'nrp'=>$this->input->post('nrp'),
			'nama'=>$this->input->post('name'),//yang didalam kurung adalah nama dari inputan di view
			'pangkat'=>$this->input->post('pangkat'),
			'jabatan'=>$this->input->post('jabatan'),
			'status'=>$this->input->post('status'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin')
		);
		$data1 = array(
			'statuss' =>'hadir',
			'nrp'=>$this->input->post('nrp'),
		);
		$this->db->insert('personal',$data);
		$this->db->insert('piket',$data1);
		redirect('dashboard/user');
	}

	public function edit_anggota(){
		$nrp=$this->input->post('nrp');
		$nama=$this->input->post('nama');
		$pn=$this->input->post('pangkat');
		$jb=$this->input->post('jabatan');
		$sts=$this->input->post('status');
		$jk=$this->input->post('jenis_kelamin');

		$this->admin->edit_anggota($nrp,$nama,$pn,$jb,$sts,$jk);
		redirect('dashboard/user');
	}

	public function edit_piket(){
		$nrp=$this->input->post('nrp');
		$stss=$this->input->post('statuss');

		$this->admin->edit_piket($nrp,$stss);
		redirect('dashboard/absen');
	}

	Public function getEvents()
	{
		$result=$this->admin->getEvents();
		echo json_encode($result);
	}

	public function rand()
	{

		$listPersonil = $this->db->query("SELECT nama FROM personal ORDER BY rand()");
		$listlokasi = $this->db->query("SELECT * FROM lokasi ORDER BY rand()");


		foreach ($listlokasi->result_array() as $row) {
			$this->db->query("INSERT INTO anggota_piket (nama_post) value ('" . $row["nama_post"] . "')");
		}
		foreach ($listPersonil->result_array() as $row) {
			$this->db->query("INSERT INTO anggota_piket (nama) value ('" . $row["nama"] . "')");
		}

		redirect('dashboard/pik');
	}

	public function tambah_piket()
	{

		$data = array(
			'start' =>$this->input->post('start'),
			'end'=>$this->input->post('end'),
			'description'=>$this->input->post('des'),
			'title'=>$this->input->post('title'),
		);
		$event_id = $this->admin->input($data,'events');
		$listPersonil = $this->db->query("SELECT nrp FROM personal ORDER BY rand() limit 5");

		foreach($listPersonil->result_array() as $row) {
			$data = [
				'nrp' => $row['nrp'],
				'event_id' => $event_id
			];
			$this->admin->input($data,'anggota_piket');
		}
		redirect('/dashboard/pik');
	}
	
}




