<?php 

class Users extends CI_Controller
{
	public function __construct(){
        parent::__construct();
        $this->isLogin = $this->session->userdata('user_logged');
        $this->load->model('User_Model', 'User_Model');
        $this->load->model('Master_Model', 'Master_Model');
        if(!$this->isLogin){
        redirect(base_url('index.php/Auth/Logout'));
        }
    }
 public function check_strong_password($str)
    {
       //if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
        if(preg_match('/^(?=.*[!@#$%^&*()\-_=+`~\[\]{}?])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,30}$/',$str)){
         return TRUE;
       }
       $this->form_validation->set_message('check_strong_password', 'Password must contain at least one uppercase letter, one lower case letter, one digit and one special character.');
       return FALSE;
    }
	function Add_User(){
        if($_SESSION['user_type'] == 1) { 
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('firstname',' First Name','trim|required');
        	$this->form_validation->set_rules('lastname',' Last Name','trim|required');
            $this->form_validation->set_rules('user_name',' User Name','trim|required|is_unique[users.user_name]');
        	$this->form_validation->set_rules('user_email',' User Email','trim|required');
        	$this->form_validation->set_rules('user_mobile',' Mobile','trim|required');
        	$this->form_validation->set_rules('siteadd',' Site Address','trim|required');
        	//$this->form_validation->set_rules('plant',' Plant','trim|required');
        	//$this->form_validation->set_rules('user_role',' User Role','trim|required');
        //	$this->form_validation->set_rules('user_status',' User Status','trim|required');
        	$this->form_validation->set_rules('password',' Password','trim|required|max_length[20]|min_length[6]|callback_check_strong_password');
            $this->form_validation->set_rules('con_password',' Confirm Password','trim|required|matches[password]|max_length[20]');

            
            if ($this->form_validation->run()== TRUE) {
                $userdata = array(
                            'first_name' => $_POST['firstname'],
                            'last_name' => $_POST['lastname'],
                            'user_name' => $_POST['user_name'],
                            'email' => $_POST['user_email'],
                            'mobile_no' => $_POST['user_mobile'],
                            'address' => $_POST['siteadd'],
                           // 'plant' => $_POST['plant'],
                           // 'user_type' => $_POST['user_role'],
                           // 'status' => $_POST['user_status'],
                            'password' => md5($_POST['password']),
                            'created_by' => $_SESSION['user_name'],
                            'creation_ip' => getenv("REMOTE_ADDR"),
                            'user_type' => $_POST['role']
                            );
                if($this->User_Model->User_Registration($userdata) == TRUE){
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('UserManagement/UserRegistration'));
                }else{
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('UserManagement/UserRegistration'));
                }

            }else{
                //$data['plants'] = $this->Master_Model->Get_Plant();
            	//$data['roles'] = $this->User_Model->Role_Master();
                $this->template->load('template', 'Admin/User_mgmt/Add_User');
            }
		}else{
      //  $data['plants'] = $this->Master_Model->Get_Plant();
       // $data['roles'] = $this->User_Model->Role_Master();
        $this->template->load('template', 'Admin/User_mgmt/Add_User');
		}
        } else{
            redirect(base_url('Dashboard'));
        }
	}

    function Edit_user($id){
        $data['id'] = $id;
      //  $data['plants'] = $this->Master_Model->Get_Plant();
        $data['roles'] = $this->User_Model->Role_Master();
        $data['userdata'] = $this->User_Model->Get_user_byid($id);
        if (isset($_POST['submit'])) {
        	$this->form_validation->set_rules('firstname',' First Name','trim|required');
        	$this->form_validation->set_rules('lastname',' Last Name','trim|required');
        	//$this->form_validation->set_rules('plant',' Plant','trim|required');
        	$this->form_validation->set_rules('user_role',' User Role','trim|required');
        	$this->form_validation->set_rules('user_status',' USer Status','trim|required');
        	$this->form_validation->set_rules('password',' Password','trim');
             if(!empty($_POST['password'])){
               $this->form_validation->set_rules('password',' Password','trim|required|max_length[20]|min_length[6]|callback_check_strong_password');
               
            }
        	if ($this->form_validation->run()== TRUE) {
                if(!empty($_POST['password'])){
                $userdata = array(
                            'first_name' => $_POST['firstname'],
                            'last_name' => $_POST['lastname'],
                            //'plant' => $_POST['plant'],
                            'user_type' => $_POST['user_role'],
                            'status' => $_POST['user_status'],
                            'password' => md5($_POST['password']),
                            'updated_at' => date('Y-m-d h:m:s'),
                            'updated_by' => $_SESSION['user_name'],
                            'updation_ip' => getenv("REMOTE_ADDR")
                            );
        		}else{
                $userdata = array(
                            'first_name' => $_POST['firstname'],
                            'last_name' => $_POST['lastname'],
                            //'plant' => $_POST['plant'],
                            'user_type' => $_POST['user_role'],
                            'status' => $_POST['user_status'],
                            'updated_at' => date('Y-m-d h:m:s'),
                            'updated_by' => $_SESSION['user_name'],
                            'updation_ip' => getenv("REMOTE_ADDR")
                            );
             	}
        		
                if($this->User_Model->Update_users($userdata,$id) == TRUE){
                    $this->session->set_flashdata('msg', ' User Updated Successfully!');
                    redirect(base_url('UserManagement/RegisterdUsers'));
                }else{
                    $this->session->set_flashdata('msg', ' Updation Error !');
                    redirect(base_url('UserManagement/RegisterdUsers'));
                }

            }else{
                $this->template->load('template', 'Admin/User_mgmt/Edit_User',$data);
            }
	
        }else{
        $this->template->load('template', 'Admin/User_mgmt/Edit_User',$data);
    	}
    }

	function All_Users(){
        $data['all_users'] = $this->User_Model->All_Users();
        $this->template->load('template', 'Admin/User_mgmt/All_Users',$data);
	}

    function Role_List(){
        $data['roles'] = $this->User_Model->Role_Master();
        $this->template->load('template', 'Admin/User_mgmt/Role_Lists',$data);
    }

    function Edit_Role($id){
        $data['id'] = $id;
        $data['arr_mst_privileges'] = $this->User_Model->GetPrivilege();
        $arr_role_privileges = $this->User_Model->Get_role_privilege_by_id($id);
        foreach ($arr_role_privileges as $role_privilege){
            $data['arr_role_privileges'][] = $role_privilege['privilege_id'];
        }
        $data['mst_role'] = $this->User_Model->get_role_by_id($id);
        if (isset($_POST['submit'])) {
        	$this->form_validation->set_rules('Role_name',' Role Name','trim|required');
        	$this->form_validation->set_rules('role_privileges[]', 'Role Privilege', 'trim|required');
        	if ($this->form_validation->run()== TRUE) {
        		$data = array(
                        'role_name' => $_POST['Role_name'],
                );
                $data = $this->security->xss_clean($data);
                $result = $this->User_Model->edit_role($data, $id);
                $this->db->delete('trans_role_privileges',array('role_id'=>$id));
                $role_privileges = $_POST['role_privileges'];
                foreach ($role_privileges as $privilege) {
                $privilege_to_insert = array("role_id" => ($id), "privilege_id" => $privilege);
                $this->User_Model->insertPrivilege($privilege_to_insert);
          		}
          		if($result){
                    $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                    redirect(base_url('Users/Edit_Role/'.$id));
            		}

            }else{
                $this->template->load('template', 'Admin/User_mgmt/Edit_Role',$data);
            }
        }else{
        $this->template->load('template', 'Admin/User_mgmt/Edit_Role',$data);
    	}
    }

    function Add_Role(){
    	if (isset($_POST['submit'])) {
    		$this->form_validation->set_rules('Role_name',' Role Name','trim|required|is_unique[mst_role.role_name]');
        	            
            if ($this->form_validation->run()== TRUE) {
            	//print_r($_POST['role_privileges']);
               	$userdata = array(
                            'role_name' => $_POST['Role_name'],
                            'created_by' => $_SESSION['user_name'],
                            'creation_ip' => getenv("REMOTE_ADDR")
                            );
               	$last_insert_id = $this->User_Model->Add_Role($userdata);
               	foreach ($_POST['role_privileges'] as $privilege) {
                    $privilege_to_insert = array("role_id" => $last_insert_id, "privilege_id" => $privilege);
                    $this->User_Model->insertPrivilege($privilege_to_insert);
                }
                if($last_insert_id){
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('UserManagement/RoleLists'));
                }else{
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('UserManagement/RoleLists'));
                }

            }else{
                $data['arr_privileges'] = $this->User_Model->GetPrivilege();
        		$this->template->load('template', 'Admin/User_mgmt/Add_Role',$data);
            }
		}else{
        $data['arr_privileges'] = $this->User_Model->GetPrivilege();
        $this->template->load('template', 'Admin/User_mgmt/Add_Role',$data);
    	}
    }

    function Add_Privilledge(){
        $data['arr_privileges'] = $this->User_Model->GetPrivilege();
        $this->template->load('template', 'Admin/User_mgmt/Add_Privilledge',$data);
    }
    function Change_Password(){
    	if (isset($_POST['submit'])) {
        	$this->form_validation->set_rules('old_password',' Old Password','trim|required');
        	$this->form_validation->set_rules('new_password',' New Password','trim|required|max_length[20]|min_length[6]|callback_check_strong_password');
            $this->form_validation->set_rules('con_password',' Confirm Password','trim|required|matches[new_password]|max_length[20]|min_length[6]|callback_check_strong_password');
        	            
            if ($this->form_validation->run()== TRUE) {
            	// Match old Password
            	$pass= md5($_POST['old_password']);
            	$data = $this->User_Model->Match_Password($pass);
            	if (empty($data[0]['email'])) {
            		$this->session->set_flashdata('msg', ' No Match Old Password !');
                    redirect(base_url('UserManagement/ChangPassword'));
            	}else{
            		$email = $data[0]['email'];
            		$userdata = array(
                            'password' => md5($_POST['new_password']),
                            'updated_at'=> date('Y-m-d h:m:s'),
                            'updated_by' => $_SESSION['user_name'],
                            'updation_ip' => getenv("REMOTE_ADDR")
                            );
            		if($this->User_Model->Updatepassword($userdata,$email) == TRUE){
                    $this->session->set_flashdata('msg', ' Password Has Been Updated Successfully !');
                    redirect(base_url('UserManagement/ChangPassword'));
	                }else{
	                    $this->session->set_flashdata('msg', ' Updation Error !');
	                    redirect(base_url('UserManagement/ChangPassword'));
	                }
            	}
                

            }else{
        		$this->template->load('template', 'Admin/User_mgmt/Change_Password');
            }
		}else{
    	$this->template->load('template', 'Admin/User_mgmt/Change_Password');
    	}
    }

    // For testing Purpose
    
    function User_privelledge(){
        $id = '7';
        $query = $this->db->query("SELECT t2.privileges_id
        FROM trans_role_privileges AS t1
        LEFT JOIN mst_privileges AS t2 ON t1.privilege_id = t2.privileges_id
        WHERE t1.role_id = '".$id."'");

        /*$query = $this->db->query("SELECT GROUP_CONCAT(t2.privileges_id) AS pr_id
        FROM trans_role_privileges AS t1
        LEFT JOIN mst_privileges AS t2 ON t1.privilege_id = t2.privileges_id
        WHERE t1.role_id = '".$id."'
        ORDER BY t1.role_id");*/

        

        $privilledge = $query->result_array();
        foreach ($privilledge as $ey) {
            $priv[]  = $ey['privileges_id']; 
        }
        //print_r($privilledge);
        if (in_array(1, $priv) == TRUE){
           echo "match"; 
        }else{
            echo "NO Match";
        }
        /*if (!empty($privilledge)){
            foreach ($privilledge as $keys) {
                if($keys['pr_id'] == '1'){
                    echo "match";
                }
            }
        }*/
    }
}
?>
