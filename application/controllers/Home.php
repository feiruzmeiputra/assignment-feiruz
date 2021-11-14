<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data');
	}

	public function index()
	{	
		$data['resep'] = $this->m_data->resep_list();

		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('home', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{	
		$data['obat'] = $this->m_data->obat_list();
		$data['temp'] = $this->m_data->temp_list();
		$data['signa'] = $this->m_data->signa_list();

		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('create', $data);
		$this->load->view('layouts/footer');
	}

	public function daftar_obat()
	{	
		$data['obat'] = $this->m_data->obat_list();

		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('layouts/sidebar');
		$this->load->view('obat', $data);
		$this->load->view('layouts/footer');
	}

	public function add_obat()
	{
        $current_date = date("Ymdhis");
        $obat_id = $this->input->post('obat_id');

        $temp_list = $this->m_data->temp_list_id($obat_id);

        if(empty($temp_list)){

        	$result_obat = $this->m_data->obat_list_id($obat_id);

        	$data = [
        		'temp_obat_id' 		=> $result_obat[0]->obatalkes_id,
	            'temp_obat_nama' 	=> $result_obat[0]->obatalkes_nama,
	            'temp_obat_stok' 	=> 1,
	        ];

	        $result = $this->db->insert('temp_resep', $data);
        }else{

        	$result_obat = $this->m_data->obat_list_id($obat_id);

        	if($temp_list[0]->temp_obat_stok < $result_obat[0]->stok){
        		$qty = $temp_list[0]->temp_obat_stok + 1;

	        	$this->db->set('temp_obat_stok', $qty);
	        	$this->db->where('temp_id', $temp_list[0]->temp_id);
	        	$this->db->update('temp_resep');
        	}
        }      
    }

    function data_temp()
    {
		$data = $this->m_data->temp_list();
		echo json_encode($data);
	}

	function hapus_obat()
	{
		$id = $this->input->post('kode');
		$data = $this->m_data->hapus_obat($id);
		echo json_encode($data);
	}

	public function simpan_resep()
	{
		$jenis_obat = $this->input->post('jenis');
		$obat = $this->input->post('obat');
		$qty = $this->input->post('qty');
		$current_date = date("Ymdhis");

		if($jenis_obat == 'Non Racikan'){	

			$get_obat = $this->db->query("SELECT * FROM obatalkes_m WHERE obatalkes_nama = '".$obat."' ");
            $result_obat = $get_obat->result();

            $stok = rtrim(rtrim(number_format($result_obat[0]->stok,2),0),'.');

            if($qty > $stok){
            	$this->session->set_flashdata(array('tipe'=>'1', 'message'=>'Quantity obat tidak boleh melebihi stok yang tersedia!'));
            	redirect('home/create/');
            }else{

            	$insert = [
	                'resep_jenis' => $jenis_obat,
	                'resep_signa' => $this->input->post('signa'),
	                'resep_obat' => $obat,
	                'resep_qty' => $qty,
	                'resep_create' => $current_date,
	            ];

	            $result = $this->db->insert('resep', $insert);

	            $stok = $stok - $qty;

	            // ------------------------------------------
				$this->db->set('stok', $stok);
	        	$this->db->where('obatalkes_nama', $result_obat[0]->obatalkes_nama);
	        	$this->db->update('obatalkes_m');

	            $this->session->set_flashdata(array('tipe'=>'2', 'message'=>'Resep berhasil disimpan'));
				redirect('home');
            }
		}else{

			$data['temp'] = $this->m_data->temp_list();
			$get_temp = $this->db->query("SELECT * FROM temp_resep");
            $result_temp = $get_temp->result();

            $obat = '';
            if(empty($result_temp[1]->temp_id)){
            	$this->session->set_flashdata(array('tipe'=>'1', 'message'=> 'Obat racikan minimal 2 jenis obat'));
    			redirect('home/create');
            }else{
            	foreach ($result_temp as $key) {
				
					$obat = $obat.' '.$key->temp_obat_nama.' ('.$key->temp_obat_stok.'),';

					// ------------------------------------------
					$result_obat = $this->m_data->obat_list_id($key->temp_obat_id);
					$stok = $result_obat[0]->stok - $key->temp_obat_stok;

					$this->db->set('stok', $stok);
		        	$this->db->where('obatalkes_id ', $result_obat[0]->obatalkes_id );
		        	$this->db->update('obatalkes_m');
				}

				$insert = [
		            'resep_jenis' => $jenis_obat,
		            'resep_name' => $this->input->post('nama'),
		            'resep_signa' => $this->input->post('signa'),
		            'resep_obat' => $obat,
		            'resep_qty' => 1,
		            'resep_create' => $current_date,
		        ];

		        $result = $this->db->insert('resep', $insert);
		        $this->db->empty_table('temp_resep'); 

		        $this->session->set_flashdata(array('tipe'=>'2', 'message'=> 'Resep berhasil disimpan'));
	        	redirect('home');
            }
		}
	}

	public function resep_print()
	{	
		$data['resep'] = $this->m_data->resep_by_id($this->uri->segment(3));

		$this->load->view('print_resep', $data);
	}
}
