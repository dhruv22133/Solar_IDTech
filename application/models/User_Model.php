<?php 

class User_Model extends CI_Model
{
	function User_Registration($userdata){
		if($this->db->insert("users",$userdata)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function Update_users($userdata,$id){
		$this->db->where('id',$id);
		if($this->db->update('users',$userdata)){
			return TRUE;
		}
	}

	function Plant_Master(){
		$query = $this->db->query("select * from users");
		return $query->result_array();
	}

	function Role_Master(){
		$query = $this->db->query("select * from mst_role");
		return $query->result_array();
	}

	function Add_Role($userdata){
		$this->db->insert("mst_role",$userdata);
			return $this->db->insert_id();
	}

	public function insertPrivilege($privilege_to_insert){
			$this->db->insert('trans_role_privileges', $privilege_to_insert);
			return true;
		}

	function All_Users(){
		$query = $this->db->query("SELECT id,first_name,last_name,user_name,email,mobile_no,address
		,created_by 
		FROM users");
		return $query->result_array();
	}

	public function get_role_by_id($id){
			$query = $this->db->get_where('mst_role', array('role_id' => $id));
			return $result = $query->row_array();
		}
    public function GetPrivilege(){
			$query = $this->db->get('mst_privileges');
			return $result = $query->result_array();
		}
	public function Get_role_privilege_by_id($id){
			$query = $this->db->get_where('trans_role_privileges', array('role_id' => $id));
			return $result = $query->result_array();
		}
		public function edit_role($data, $id){
			$this->db->where('role_id', $id);
			$this->db->update('mst_role', $data);
			return true;
		}
		function Match_Password($pass){
			$query = $this->db->query("SELECT * FROM users WHERE email = '".$_SESSION['email']."' AND PASSWORD = '".$pass."'");
			return $query->result_array();
		}

		Function Updatepassword($userdata,$email){
			$this->db->where('email',$email);
			if($this->db->update('users',$userdata)){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		function Get_user_byid($id){
			$query = $this->db->query("
		SELECT id,first_name,last_name,user_name,email,mobile_no,emp_code,site,plant,user_type,status,
		(SELECT role_name FROM mst_role WHERE mst_role.role_id = users.user_type)AS user_typename,
		(SELECT plant_name FROM mst_plant WHERE mst_plant.id = users.plant)AS user_typename
		 FROM users
		WHERE id = '".$id."'");
		return $query->result_array();
		}

	function Get_Privilledge_list($id){
		$query = $this->db->query("SELECT GROUP_CONCAT(t2.privileges_id) AS pr_id
        FROM trans_role_privileges AS t1
        LEFT JOIN mst_privileges AS t2 ON t1.privilege_id = t2.privileges_id
        WHERE t1.role_id = '".$id."'
        ORDER BY t1.role_id");
		return $query->result_array();
	}

}
?>