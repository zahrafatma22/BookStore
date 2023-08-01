<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
        $data['title'] = "beranda";
        $this->load->view('templates/header', $data);
        $this->load->view('beranda');
        $this->load->view('templates/footer');
	}
    public function daftarBuku()
	{
		//$this->load->view('welcome_message');
		// $data['data_buku'] = $this->db->get('tb_buku')->result_array();
		$this->load->model('Model_buku');
		$this->load->model('Model_penerbit');
		$data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "daftarBuku";
        $this->load->view('templates/header', $data);
        $this->load->view('daftarBuku',$data);
		$this->load->view('templates/modal');
        $this->load->view('templates/footer');
	}
    public function daftarPenerbit()
	{
		//$this->load->view('welcome_message');
		 $this->load->model('Model_penerbit');
		// $data['data_penerbit'] = $this->db->get('tb_penerbit')->result_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "daftarPenerbit";
        $this->load->view('templates/header', $data);
        $this->load->view('daftarPenerbit');
		$this->load->view('templates/modal_penerbit');
        $this->load->view('templates/footer');
	}
  
	public function show_edit_page()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		$this->load->model('Model_buku');
		$data['data_buku'] = $this->Model_buku->get_buku_by_kode($kode)-> row_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
		$data['title']= "daftar penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('editBuku');
		$this->load->view('templates/footer');

	}
	public function update_buku()
	{
		$data = array(
			'judul_buku' =>$this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
		$kode = $this->input->post('kodeBuku');
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil diperbaharui</div>');
		$this->Model_buku->update_buku($data, $kode);
		redirect('pages/daftarBuku');
	}
	public function show_edit_page1()
	{
		$kode = $this->uri->segment(3);
		$this->load->model('Model_penerbit');
		$data['data_penerbit'] = $this->Model_penerbit->get_penerbit_by_kode($kode)-> row_array();
		$data['title']= "edit penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('editPenerbit');
		$this->load->view('templates/footer');

	}
	public function update_penerbit()
	{
		$this->load->model('Model_penerbit');
		$data = array(
			'nama_penerbit' =>$this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit')
		);
		$kode = $this->input->post('kodePenerbit');
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil diperbaharui</div>');
		$this->Model_penerbit->update_penerbit($data, $kode);
		redirect('pages/daftarPenerbit');
	}
	public function simpan_buku()
	{
		$data = array(
			'judul_buku' =>$this->input->post('judulBuku'),
			'tahun_terbit' => $this->input->post('tahunTerbit'),
			'kode_penerbit' => $this->input->post('kodePenerbit')
		);
		$this->Model_buku->simpan_buku($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil disimpan</div>');
		redirect('pages/daftarBuku');
	}
	public function simpan_penerbit()
	{
		$this->load->model('Model_penerbit');
		$data = array(
			'nama_penerbit' =>$this->input->post('namaPenerbit'),
			'alamat_penerbit' => $this->input->post('alamatPenerbit')
		
		);
		$this->Model_penerbit->simpan_penerbit($data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil disimpan</div>');
		redirect('pages/daftarPenerbit');
	}


	public function hapus_buku()
	{
		$kode = $this->uri->segment(3);
		$this->Model_buku->hapus_buku($kode);
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil di hapus</div>');

		redirect('pages/daftarBuku');
	}

	public function hapus_penerbit()
	{
		$connection = mysqli_connect('localhost', 'root','', 'db_buku');
		$this->load->model('Model_penerbit');
		$kode = $this->uri->segment(3);

		if(!$connection){
			die("Database connection failed: ". mysqli_connect_error());
		}  

			$delete_query = "DELETE FROM tb_penerbit WHERE kode_penerbit = $kode";

		if(mysqli_query($connection, $delete_query)){
			redirect('pages/daftarPenerbit');
			exit();
		} else{
			if(mysqli_errno($connection) == 1451){
				$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data tidak bisa di hapus</div>');
				redirect('pages/daftarPenerbit');
			} else {
				$error_message = "error deleting data: ".mysqli_error($connection);
			}
		}
		$this->Model_penerbit->hapus_penerbit($kode);
		$this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">Data berhasil di hapus</div>');

		redirect('pages/daftarPenerbit');
	}

}
