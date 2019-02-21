<?php
class Ajaxpaging extends CI_Controller{

	public function __construct(){

		parent::__construct();
		
		$this->load->model('ajaxpagingmodel');

		$this->load->library('pagination');

	}

	public function index(){

		$this->load->view('utama');
	}
	public function hapuspilih(){
		if($this->input->post('checkbox_value')){
			$id=$this->input->post('checkbox_value');
			for($count=0; $count<count($id);$count++){
				$this->ajaxpagingmodel->menghapus($id[$count]);
			}
			echo $id;
			
		}
	}
	
	public function cari($query='',$rowno=0){

		$rowperpage = 5;

		if($rowno !=0 ){
			$rowno = ($rowno-1) * $rowperpage;
		}
		else{

		}
		//jumlah record
		$jumlah = $this->ajaxpagingmodel->jumlahcari($query);

		
		

		//konfigurasi pagination
		$config['base_url'] = base_url('ajaxpaging/cari/'.$query);
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $rowperpage;
		
		//ini tidak dipakai
		$no=round(($jumlah/5)+1);
		for($i=0;$i<$no;$i++){
			$i;
		}
		//tidak dipakai berakhir
		
		$config['attributes'] = array('class' => 'baru','oke'=>$rowno,'carisearch'=>$query);

		//intialize paging
		$this->pagination->initialize($config);

		//menampilkan data
		$hasil = $this->ajaxpagingmodel->caritahu($query,$rowperpage,$rowno);
		
		//membuat data array

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $hasil;
		$data['row'] = $rowno;
		$data['jumlah']=$jumlah;	
		

		echo json_encode($data);
	}

	public function loadRecord($rowno=0){
		

		$rowperpage = 5;

		if($rowno !=0 ){
			$rowno = ($rowno-1) * $rowperpage;
		}
		else{

		}
		//jumlah record
		$jumlah = $this->ajaxpagingmodel->jumlah();

		
		

		//konfigurasi pagination
		$config['base_url'] = base_url('ajaxpaging/loadRecord/');
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $jumlah;
		$config['per_page'] = $rowperpage;
		$config['attributes'] = array('class' => 'baru','oke'=>$rowno);

		//intialize paging
		$this->pagination->initialize($config);

		//menampilkan data
		$get_record = $this->ajaxpagingmodel->lihat($rowperpage,$rowno);
		
		//membuat data array

		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $get_record;
		$data['row'] = $rowno;
		$data['jumlah'] = $jumlah;

		echo json_encode($data);

	}
	public function edit($id){
		$query = $this->db->where('id',$id)->get('fullajaxtb')->result();
		echo json_encode($query);
	}

	public function aksi_edit(){
		$query = $this->ajaxpagingmodel->mengubah();
		echo json_encode($query);
	}

	public function add(){

		$query=$this->ajaxpagingmodel->save();

		echo json_encode($query);
	}

	public function hapus($id){
		$query = $this->ajaxpagingmodel->menghapus($id);

		echo json_encode($query);
	}

}


?>