<?php
class Auth_Model extends CI_MODEL
{

	function Mathc_Password($data)
	{
		$query = $this->db->get_where('users', array('user_name' => $data['user_name']));
		if ($query->num_rows() == 0) {
			return false;
		} else {

			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
			if ((MD5($data['password'])) == $result['password']) {
				return $result = $query->row_array();
			} else {
				return FALSE;
			}
		}
	}

	function Dashboard_count()
	{

		$query = $this->db->query(" SELECT
	 (SELECT COUNT(*) FROM master_country_details) AS total_assets,
	 	(SELECT COUNT(*) FROM master_module_manufacture) AS tempassets,
		(SELECT COUNT(*) FROM master_cell_manufacture) AS asset_types,
		(SELECT COUNT(*) FROM master_iec_certificate) AS total_deletedassets,
		(SELECT COUNT(*) FROM master_module_name) AS total_pending_transfer_request ;
	  ");
		return $query->result_array();
	}
}
