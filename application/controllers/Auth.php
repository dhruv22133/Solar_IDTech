<?php 



class Auth extends CI_Controller

{

	public function __construct(){

		parent::__construct();

		$this->isLogin = $this->session->userdata('user_logged');

		$this->load->model('Auth_Model', 'Auth_Model');

	}



	function Login(){

		if(isset($_POST['submit'])){

			$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');

			$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');

			if ($this->form_validation->run() == FALSE) {

				$this->load->view('Login');

			}else{

				$username = $_POST['username'];

				$password = $_POST['password'];

				$data = array('user_name' => $_POST['username'],'password' => $_POST['password']);



				$result = $this->Auth_Model->Mathc_Password($data);

				if ($result == TRUE) {

					$_SESSION['user_logged'] = TRUE;

                    $_SESSION['first_name'] = $result['first_name'];

                    $_SESSION['last_name'] = $result['last_name'];

                    $_SESSION['user_name'] = $result['user_name'];

                    $_SESSION['email'] = $result['email'];

                    $_SESSION['mobile_no'] = $result['mobile_no'];

                    // $_SESSION['emp_code'] = $result['emp_code'];

                    // $_SESSION['site'] = $result['site'];

                    // $_SESSION['plant'] = $result['plant'];

                    $_SESSION['user_type'] = $result['user_type'];

                    $_SESSION['status'] = $result['status'];
                    redirect(base_url('index.php/Auth/Dashboard'));
                }else{

                	$data['msg'] = 'Invalid Username or Password!';

                	$this->load->view('Login');

                }

            }

        }else{

        	$this->load->view('Login');

        }

    }



    function Dashboard(){
        if(!$this->isLogin){
        redirect(base_url('index.php/Auth/Logout'));
        }
       //s $plant = $_SESSION['plant'];
       // $usertype = $_SESSION['user_type'];
       $data['Dashboard_count'] = $this->Auth_Model->Dashboard_count();
    	$this->template->load('template', 'Admin/Dashboard', $data);

	}

	

	function Logout(){

		unset($_SESSION);

        session_destroy();

        redirect(base_url(), "refresh");

	}



}

?>