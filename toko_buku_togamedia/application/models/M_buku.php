
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function ambilbuku(){
			$ambilbuku = $this->db->join('kategori', 'kategori.kode_kategori = buku.kode_kategori')->get('buku')->result();
	
			return $ambilbuku;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('buku', $tambah);
	}

public function tampil_ubah_buku($kode_buku){
		return $this->db->join('kategori', 'kategori.kode_kategori = buku.kode_kategori')->where('kode_buku',$kode_buku)->get('buku')->row();

	}



public function update(){
			$ubah = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_buku',$this->input->post('kode_buku'))->update('buku', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'judul_buku' => $this->input->post('judul_buku'),
				'tahun' => $this->input->post('tahun'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				'cover' => $nama_file,
				'penerbit' => $this->input->post('penerbit'),
				'penulis' => $this->input->post('penulis'),
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_buku',$this->input->post('kode_buku'))->update('buku', $ubah);





}


public function hapus($kode_buku ){
	return $this->db->where('kode_buku',$kode_buku)->delete('buku');
}




public function ambilbukucart($kode_buku){
	return $this->db->where('kode_buku',$kode_buku )->get('buku')->row();

}

}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */

?>