
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function ambilbarang(){
			$ambilbarang = $this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori')->get('barang')->result();

			return $ambilbarang;
	}


	public function ambilkategori(){

			$ambilkategori = $this->db->get('kategori')->result();

			return $ambilkategori;
	}

	public function tambah($nama_file){

	if($nama_file == ""){

			$tambah = array(
				'nama_barang' => $this->input->post('nama_barang'),
				// 'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				// 'merk' => $this->input->post('merk'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'), );

	}else{

		$tambah = array(
				'nama_barang' => $this->input->post('nama_barang'),
				// 'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				// 'merk' =>  $this->input->post('merk'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'), );

	}
	return $this->db->insert('barang', $tambah);
	}

public function tampil_ubah_barang($kode_barang){
		return $this->db->join('kategori', 'kategori.kode_kategori = barang.kode_kategori')->where('kode_barang',$kode_barang)->get('barang')->row();

	}



public function update(){
			$ubah = array(
				'nama_barang' => $this->input->post('nama_barang'),
				// 'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				// 'merk' => $this->input->post('merk'),
				'harga' => $this->input->post('harga'),
				
				'stok' => $this->input->post('stok'), );

			return $this->db->where('kode_barang',$this->input->post('kode_barang'))->update('barang', $ubah);

}


public function update_ft($nama_file){
				$ubah = array(
				'nama_barang' => $this->input->post('nama_barang'),
				// 'size' => $this->input->post('size'),
				'kode_kategori' => $this->input->post('kategori'),
				'harga' => $this->input->post('harga'),
				// 'merk' => $this->input->post('merk'),
				'stok' => $this->input->post('stok'), );

		return $this->db->where('kode_barang',$this->input->post('kode_barang'))->update('barang', $ubah);





}


public function hapus($kode_barang ){
	return $this->db->where('kode_barang',$kode_barang)->delete('barang');
}




public function ambilbarangcart($kode_barang){
	return $this->db->where('kode_barang',$kode_barang )->get('barang')->row();

}

}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */

?>
