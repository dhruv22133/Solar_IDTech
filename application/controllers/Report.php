<?php 



class Report extends CI_Controller

{

	public function __construct(){

        parent::__construct();
        $this->load->model('Report_Model', 'Report_Model');
        $this->load->model('Master_Model', 'Master_Model');
        $this->isLogin = $this->session->userdata('user_logged');
        if(!$this->isLogin){
        redirect(base_url('index.php/Auth/Logout'));
        }

    }



	function Asset_Wise(){

		$data['asset_type'] = $this->Master_Model->Get_Asset_Type();

		$data['depts'] = $this->Master_Model->Get_Dep();

		$data['plants'] = $this->Master_Model->Get_Plant();

		$data['status'] = $this->Master_Model->Get_Status();

		$data['locations'] = $this->Master_Model->Get_Location();

		 $data['cat'] = $this->Master_Model->Get_AssetClass();

		 $data['Assetsubcategory'] = $this->Master_Model->Get_subcat();

		

		if (isset($_POST['submit'])){

			$tag_id = trim($_POST['tag_id']);

			$asset_code = trim($_POST['asset_code']);

			$Assetsubcategory = trim($_POST['Assetsubcategory']);

			$Assettype = trim($_POST['Assettype']);

			$cat = trim($_POST['cat']);

			$department = trim($_POST['department']);

			$asset_status = trim($_POST['asset_status']);

			$location = trim($_POST['location']);

			
		//	$asset_status = trim($_POST['asset_status']);

			$frome = trim(date("Y-m-d", strtotime($_POST['frome'])));

			$todate = trim(date("Y-m-d", strtotime($_POST['todate'])));

			$data['Assettype'] = $Assettype;

			$data['cat'] = $cat;

			$data['department'] = $department;

			$data['Assetsubcategory'] = $_POST['Assetsubcategory'];

			$data['location'] = $location;

			

			$data['asset_status'] = $asset_status;
		//	$loc = $_SESSION['plant'];
			//$roleid = $_SESSION['user_type'];
			$data['assetdata'] = $this->Report_Model->Get_Asset_Wise_data_search($tag_id,$asset_code,$Assettype,$cat,$Assetsubcategory,$department,$location,$asset_status,$frome,$todate);

			$this->template->load('template', 'Admin/Reports/Asset_Wise_Report',$data);

		}else{
	//	$loc = $_SESSION['plant'];
		//$roleid = $_SESSION['user_type'];
		$data['assetdata'] = $this->Report_Model->Get_Asset_Wise_data();
		$this->template->load('template', 'Admin/Reports/Asset_Wise_Report',$data);

		}

	}
	
	
	function Detail_Inv($invid){
$data['Inventry'] = $this->Report_Model->Detailed_inv_session($invid);
$this->template->load('template', 'Admin/Reports/Detailed_Inventory',$data);
}

	function Asset_History(){

		$this->load->view('admin/Report/Asset_History');

	}

	function Department_Wise(){

		$this->load->view('admin/Report/Department');

	}

	function Physical_Inventry(){
		//$loc = $_SESSION['plant'];
		//$roleid = $_SESSION['user_type'];
		if (isset($_POST['submit'])) {

			$from = trim(date("Y-m-d", strtotime($_POST['from'])));

			$to = trim(date("Y-m-d", strtotime($_POST['todate'])));

			$data['Inventry'] =$this->Report_Model->Inventry_Search($from,$to,$loc,$roleid);

			$this->template->load('template', 'Admin/Reports/Physical_inventry_report',$data);

		}else{

		$data['Inventry'] = $this->Report_Model->Inventry($loc,$roleid);

		$this->template->load('template', 'Admin/Reports/Physical_inventry_report',$data);

		}

	}



	function Asset_Transfer(){
		//$roleid = $_SESSION['user_type'];
		if (isset($_POST['submit'])) {

			$from = trim(date("Y-m-d", strtotime($_POST['from'])));

			$to = trim(date("Y-m-d", strtotime($_POST['todate'])));
			//$loc = $_SESSION['plant'];
			$data['assetdata'] = $this->Report_Model->Get_Asset_Transfer_search($from,$to);

			$this->template->load('template', 'Admin/Reports/Asset_Transfer',$data);

		}else{
		//$loc = $_SESSION['plant'];
		$data['assetdata'] = $this->Report_Model->Get_Asset_Transfer();
		$this->template->load('template', 'Admin/Reports/Asset_Transfer',$data);
		}

	}

	function DeletedAssets(){
		//$plant = $_SESSION['plant'];
		//$roleid = $_SESSION['user_type'];
		$data['log'] = $this->Report_Model->Get_Deleted_assets();
		$this->template->load('template', 'Admin/Reports/Deleted_Assets',$data);
	}


function Mst_Inv(){
	
		//print_r($this->Report_Model->Inventry($loc,$roleid));
		if (isset($_POST['submit'])) {

			$from = trim(date("Y-m-d", strtotime($_POST['from'])));

			$to = trim(date("Y-m-d", strtotime($_POST['todate'])));

			$data['Inventry'] =$this->Report_Model->Search_Mst_Inventry($from,$to);

			$this->template->load('template', 'Admin/Reports/Mst_Inv',$data);

		}else{

		$data['Inventry'] = $this->Report_Model->Mst_Inventry();

		$this->template->load('template', 'Admin/Reports/Mst_Inv',$data);

		}

	}



	

}

?>