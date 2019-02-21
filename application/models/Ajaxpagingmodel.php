<?php

class Ajaxpagingmodel extends CI_Model{

	private $table='fullajaxtb';
	
	public $nama;
	public $alamat;
	public $kelas;


	public function lihat($nomor,$offset){
		$this->db->order_by('id','desc');
		return $this->db->get($this->table,$nomor,$offset)->result();

	}

	public function jumlah(){
		return $query = $this->db->get($this->table)->num_rows();
	}

	public function save(){
		$post=$this->input->post();
		$this->nama=$post['nama'];
		$this->alamat=$post['alamat'];
		$this->kelas=$post['kelas'];

		return $query = $this->db->insert($this->table,$this);
	}

	public function mengubah(){
		$post=$this->input->post();
		$id=$post['id'];
		$this->nama=$post['nama'];
		$this->alamat=$post['alamat'];
		$this->kelas=$post['kelas'];

		return $query= $this->db->where('id',$id)->update($this->table,$this);		
	}
	public function menghapus($id){

		return $query= $this->db->where('id',$id)->delete($this->table);
	}

	public function caritahu($query,$limit,$offset){
		$this->db->order_by('id','desc');
		$this->db->like('nama',$query);
		$this->db->or_like('kelas',$query);
		return $hasil= $this->db->get($this->table,$limit,$offset)->result();

	}
	
	public function jumlahcari($query){

		$this->db->like('nama',$query);
		$this->db->or_like('kelas',$query);
		return $hasil= $this->db->get($this->table)->num_rows();

	}

}

?>