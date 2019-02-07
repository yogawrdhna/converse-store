<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang','mbk');
	}

	public function index()
	{
		if($this->session->userdata('level')){

			$data['kategori']=$this->mbk->ambilkategori();
			$data['barang']=$this->mbk->ambilbarang();
			$data['konten']='v_barang';
			$this->load->view('template',$data);
		}else{
			redirect('Login','refresh');
		}
	}


	public function tambah(){
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
		// $this->form_validation->set_rules('size', 'size', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		// $this->form_validation->set_rules('merk', 'merk', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'jpg|png';

			if($_FILES['cover']['name'] != ""){

				$this->load->library('upload', $config);


				if(!$this->upload->do_upload('merk')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('barang','refresh');

				}else{

					if($this->mbk->tambah($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
					}else{
						$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
					}

					redirect('barang','refresh');


				}

			}else{

				if($this->mbk->tambah('')){
					$this->session->set_flashdata('pesan', 'anda berhasil menambah barang');
				}else{
					$this->session->set_flashdata('pesan', 'anda gagal menambah barang');
				}
				redirect('barang','refresh');
			}

		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('barang','refresh');
		}

	}

	public function tampil_ubah_barang($kode_barang){
		$data =  $this->mbk->tampil_ubah_barang($kode_barang);
		echo json_encode($data);

	}

	public function update(){

		if($this->input->post('update')){

			if($_FILES['cover']['name']==""){

				if($this->mbk->update()){

					$this->session->set_flashdata('pesan', 'sukses ubah data ');
				}else{

					$this->session->set_flashdata('pesan', 'gagal ubah data ');
				}
				redirect('barang','refresh');


			}else{


				$config['upload_path'] = './assets/gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('cover')){

					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('barang','refresh');

				}else{


					if($this->mbk->update_ft($this->upload->data('file_name'))){

						$this->session->set_flashdata('pesan', 'sukses ubah data ');

					}else{

						$this->session->set_flashdata('pesan', 'gagal ubah data ');

					}


					redirect('barang','refresh');


				}
			}

		}

	}

	public function hapus($kode_barang){
		if($this->mbk->hapus($kode_barang)){

			$this->session->set_flashdata('pesan', 'anda berhasil menghapus data barang');
			redirect('barang','refresh');

		}else{

			$this->session->set_flashdata('pesan', 'anda gagal menghapus data barang');
			redirect('barang','refresh');
		}
	}
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */


?>
