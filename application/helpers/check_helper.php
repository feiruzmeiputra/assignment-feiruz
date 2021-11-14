<?php
	function array_obat()
    {
        $ci = get_instance();
        $query = $ci->db->query("SELECT * FROM obatalkes_m ORDER BY obatalkes_id");

        $data = array('' => '-');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data += [$row->obatalkes_id => $row->obatalkes_nama];
            }
        }

        return $data;
    }

    function convert_obat($value)
    {
        if (isset(array_obat()[$value])) return array_obat()[$value];
    }