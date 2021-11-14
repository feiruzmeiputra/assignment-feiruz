<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{	
	function resep_list(){
		$hasil = $this->db->query("SELECT * FROM resep");
		return $hasil->result();
	}

	function resep_by_id($id){
		$hasil = $this->db->query("SELECT * FROM resep WHERE resep_id = $id");
		return $hasil->result();
	}

	function obat_list(){
		$hasil = $this->db->query("SELECT * FROM obatalkes_m");
		return $hasil->result();
	}

	function temp_list(){
		$hasil = $this->db->query("SELECT * FROM temp_resep");
		return $hasil->result();
	}

	function signa_list(){
		$hasil = $this->db->query("SELECT * FROM signa_m");
		return $hasil->result();
	}

	function temp_list_id($id){
		$hasil = $this->db->query("SELECT * FROM temp_resep WHERE temp_obat_id = $id");
		return $hasil->result();
	}

	function temp_list_id2($id){
		$hsl=$this->db->query("SELECT * FROM temp_resep WHERE temp_obat_id = $id");
		if($hsl->num_rows() > 0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'temp_obat_id' 		=> $data->temp_obat_id,
					'temp_obat_nama' 	=> $data->temp_obat_nama,
					'temp_obat_stok' 	=> $data->temp_obat_stok,
				);
			}
		}
		return $hasil;
	}

	function obat_list_id($id){
		$hasil = $this->db->query("SELECT * FROM obatalkes_m WHERE obatalkes_id = $id");
		return $hasil->result();
	}

	function hapus_obat($id){
		$hasil = $this->db->query("DELETE FROM temp_resep WHERE temp_id = $id");
		return $hasil;
	}
}