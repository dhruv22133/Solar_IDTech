<?php

class API extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('API_Model', 'API_Model');
	}

	function WriteTag()
	{
		$write_tag = $this->API_Model->write_tag();

		print_r(json_encode(array("Write_tag" => $write_tag)));
	}

	function AllMaster()
	{
		$Mst_Cont = $this->API_Model->Mst_Cont();
		$Mst_module = $this->API_Model->Mst_module();
		$Mst_cell = $this->API_Model->Mst_cell();
		$Mst_iec = $this->API_Model->Mst_iec();
		$Mst_module_name = $this->API_Model->Mst_module_name();

		print_r(json_encode(array("All Masters" => $Mst_Cont, "module" => $Mst_module, "cell" => $Mst_cell, "iec" => $Mst_iec, "module_name" => $Mst_module_name)));
	}

	function Company_settings()
	{
		$Mst_company_details = $this->API_Model->Mst_company_settings();

		print_r(json_encode(array("Company Settings" => $Mst_company_details)));
	}

	function Post_WriteTag(){
		
		$userdata = array (
			'serial_no' => $_POST['serial_no'],
			'pv_module_name' => $_POST['pv_module_name'],
			'pv_module_manufacturer' => $_POST['pv_module_manufacturer'],
			'pv_module_country' => $_POST['pv_module_country'],
			'pv_module_date' => $_POST['pv_module_date'],
			'cell_manufacturer' => $_POST['cell_manufacturer'],
			'cell_country' => $_POST['cell_country'],
			'cell_date' => $_POST['cell_date'],
			'w_max' => $_POST['w_max'],
			'v_max' => $_POST['v_max'],
			'i_max' => $_POST['i_max'],
			'fill_factor' => $_POST['fill_factor'],
			'certification_lab' => $_POST['certification_lab'],
			'certification_date' => $_POST['certification_date'],
			'unique_id' => $_POST['unique_id'],
			'tag_mfg' => $_POST['tag_mfg'],
			'created_at' => date('d-m-y')
		);

		$this->form_validation->set_rules('serial_no', 'Serial_No', 'required');
		$this->form_validation->set_rules('w_max', 'W_Max', 'required');
		$this->form_validation->set_rules('v_max', 'V_Max', 'required');
		$this->form_validation->set_rules('i_max', 'I_Max', 'required');
		$this->form_validation->set_rules('fill_factor', 'Fill_Factor', 'required');
		$this->form_validation->set_rules('unique_id', 'Unique_id', 'required');

		if($this -> form_validation -> run() == true){
			$res = $this -> API_Model -> post_writetag($userdata);
			if($res){
				header("HTTP/1.0 200 Okay");
				echo json_encode(array('msg'=>'Record Added Successfully'));
			} else{
				header("HTTP/1.0 400 Failed");
				echo json_encode(array('msg' => 'Record Not Added'));
			}
		} else{
			header("HTTP/1.0 500 Internal Error");
			echo json_encode(array('msg' => 'Provide the Proper Values'));
		}
	}

	function Login()
	{
		if (!empty($_POST['username']) && !empty($_POST['password'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
		}

		if (!empty($username) && !empty($password)) {
			$result = $this->API_Model->Match_Password($username, $password);
			if (!empty($result)) {
				print_r(json_encode(array("data" => $result)));
			} else {
				echo json_encode(array("data" => "No Match User Details !"));
				//echo json_encode("No Match User Details");
			}
		} else {
			echo json_encode(array("data" => "Enter username and password !"));
			//echo json_encode("Enter username and password");
		}
	}

	function Asset_Type_Master()
	{
		if (!empty($result = $this->API_Model->Get_Asset_Type())) {
			print_r(json_encode(array("data" => $result)));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
		}
	}

	function Category_Master()
	{
		if (!empty($result = $this->API_Model->Get_Category())) {
			print_r(json_encode(array("data" => $result)));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
		}
	}
	function SubCategory_Master()
	{
		if (!empty($result = $this->API_Model->Get_SubCategory())) {
			print_r(json_encode(array("data" => $result)));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
		}
	}

	function Plant_Master()
	{
		//$result = $this->API_Model->Get_Plant();
		if (!empty($result = $this->API_Model->Get_Plant())) {
			print_r(json_encode(array("data" => $result)));
			//print_r(json_encode($result,JSON_PRETTY_PRINT));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
			//echo json_encode("No Match User Details");
		}
	}


	function Dept_Master()
	{
		//$result = $this->API_Model->Get_Plant();
		if (!empty($result = $this->API_Model->Get_Dept())) {
			print_r(json_encode(array("data" => $result)));
			//print_r(json_encode($result,JSON_PRETTY_PRINT));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
			//echo json_encode("No Match User Details");
		}
	}

	function Location_Master()
	{
		//$result = $this->API_Model->Get_Plant();
		if (!empty($result = $this->API_Model->Get_Location())) {
			print_r(json_encode(array("data" => $result)));
			//print_r(json_encode($result,JSON_PRETTY_PRINT));
		} else {
			echo json_encode(array("data" => "No Data Found !"));
			//echo json_encode("No Match User Details");
		}
	}


	function Get_Assets_Data()
	{

		$department = $_POST['department'];
		$location = $_POST['location'];
		$asset_type = $_POST['asset_type'];
		$cat = $_POST['cat'];
		$Assetsubcategory = $_POST['Assetsubcategory'];
		$accetcode = $_POST['asset_code'];
		if (!empty($result = $this->API_Model->Get_Assets($department, $location, $asset_type, $cat, $Assetsubcategory, $accetcode))) {
			print_r(json_encode(array("msg" => "Found", "data" => $result)));
			//print_r(json_encode($result,JSON_PRETTY_PRINT));
		} else {
			//echo json_encode(array("data"=>"No Data Found !"));
			print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
			//echo json_encode(array("msg"=>"No Data Found !"));
			//echo json_encode("No Match User Details");
		}
	}


	function Post_Inventry_Data()
	{
		header('Content-Type: application/json');
		$jeson = file_get_contents('php://input');
		$data = json_decode($jeson, true);
		/*$jeson = json_decode(file_get_contents('php://input'), true);
		$data =  json_encode($jeson);*/
		//echo $data;
		$inv_id = "INV" . date('Ymdhms') . rand(00000, 10000);
		$blogtags = array();
		foreach ($data['scan_data'] as $row) {
			$id = $row['id'];

			// Get Asset byid
			$Assetdetail = $this->API_Model->GetAssetByid($id);
			$tagid = $row['tag_id'];
			$scan_status = $row['scan_status'];
			$scan_by = $data['user_name'];
			$location_name = $data['location_name'];
			$dep_name = $data['dep_name'];
			$total = $data['total'];
			$found = $data['found'];
			$notfound = $data['notfound'];
			$scan_time = $data['scan_date_time'];

			$detailinv[] = array(
				'tag_id' => $row['tag_id'],
				'asset_name' => $Assetdetail->asset_name,
				'value' => $Assetdetail->value,
				'invoice_no' => $Assetdetail->invoice_no,
				'facility' => $Assetdetail->facility,
				'region' => $Assetdetail->region,
				'city' => $Assetdetail->city,
				'date_of_commissioning' => $Assetdetail->date_of_commissioning,
				'Specification' => $Assetdetail->Specification,
				'equipment_brand' => $Assetdetail->equipment_brand,
				'asset_code' => $Assetdetail->asset_code,
				'date_of_installation' => $Assetdetail->date_of_installation,
				'warranty' => $Assetdetail->warranty,
				'asset_type' => $Assetdetail->type_name,
				'cat' => $Assetdetail->cat,
				'department' => $Assetdetail->dep_name,
				'model' => $Assetdetail->model,
				'device_sl_no' => $Assetdetail->device_sl_no,
				'location' => $Assetdetail->location_name,
				'vendor' => $Assetdetail->vendor,
				'po_no' => $Assetdetail->po_no,
				'asset_user' => $Assetdetail->asset_user,
				'Assetsubcategory' => $Assetdetail->Assetsubcategory,
				'asset_status' => $Assetdetail->status_name,
				'UNIQUEID' => $Assetdetail->UNIQUEID,
				'Remarks' => $Assetdetail->Remarks,
				'scan_status' => $scan_status,
				'scan_by' => $scan_by,
				'scan_at' => $scan_time,
				'inventry_id' => $inv_id,

			);
		}

		$mstinv = array(
			'inventry_id' => $inv_id,
			'location_name' => $data['location_name'],
			'dep_name' => $data['dep_name'],
			'total' => $data['total'],
			'found' => $data['found'],
			'notfound' => $data['notfound'],
			'user_name' => $data['user_name'],
			'created_by' => $data['user_name'],
			'inventary_date' => $data['scan_date_time']
		);

		if ((!empty($mstinv)) && (!empty($detailinv))) {
			$this->db->insert('mst_inventry', $mstinv);
			$this->db->insert_batch('inventry_log', $detailinv);
			echo json_encode(array("data" => " Success!"));
		} else {
			echo json_encode(array("data" => " No input found or list is empty !"));
		}
	}

	function Post_newInventry_Data()
	{
		header('Content-Type: application/json');
		$jeson = file_get_contents('php://input');
		$data = json_decode($jeson, true);
		/*$jeson = json_decode(file_get_contents('php://input'), true);
		$data =  json_encode($jeson);*/
		//echo $data;
		$inv_id = "INV" . date('Ymdhms') . rand(00000, 10000);
		$blogtags = array();
		foreach ($data['scan_data'] as $row) {
			$id = $row['id'];

			// Get Asset byid
			$Assetdetail = $this->API_Model->GetAssetByid($id);
			$tagid = $row['tag_id'];
			$scan_status = $row['scan_status'];
			$scan_by = $data['user_name'];
			$location_name = $data['location_name'];
			$dep_name = $data['dep_name'];
			$total = $data['total'];
			$found = $data['found'];
			$notfound = $data['notfound'];
			$access = $data['access'];
			$scan_time = $data['scan_date_time'];

			$detailinv[] = array(
				'tag_id' => $row['tag_id'],
				'asset_name' => $Assetdetail->asset_name,
				'value' => $Assetdetail->value,
				'invoice_no' => $Assetdetail->invoice_no,
				'facility' => $Assetdetail->facility,
				'region' => $Assetdetail->region,
				'city' => $Assetdetail->city,
				'date_of_commissioning' => $Assetdetail->date_of_commissioning,
				'Specification' => $Assetdetail->Specification,
				'equipment_brand' => $Assetdetail->equipment_brand,
				'asset_code' => $Assetdetail->asset_code,
				'date_of_installation' => $Assetdetail->date_of_installation,
				'warranty' => $Assetdetail->warranty,
				'asset_type' => $Assetdetail->type_name,
				'cat' => $Assetdetail->cat,
				'department' => $Assetdetail->dep_name,
				'model' => $Assetdetail->model,
				'device_sl_no' => $Assetdetail->device_sl_no,
				'location' => $Assetdetail->location_name,
				'vendor' => $Assetdetail->vendor,
				'po_no' => $Assetdetail->po_no,
				'asset_user' => $Assetdetail->asset_user,
				'Assetsubcategory' => $Assetdetail->Assetsubcategory,
				'asset_status' => $Assetdetail->status_name,
				'UNIQUEID' => $Assetdetail->UNIQUEID,
				'Remarks' => $Assetdetail->Remarks,
				'scan_status' => $scan_status,
				'scan_by' => $scan_by,
				'scan_at' => $scan_time,
				'inventry_id' => $inv_id,

			);
		}

		$mstinv = array(
			'inventry_id' => $inv_id,
			'location_name' => $data['location_name'],
			'dep_name' => $data['dep_name'],
			'total' => $data['total'],
			'found' => $data['found'],
			'notfound' => $data['notfound'],
			'access' => $data['access'],
			'user_name' => $data['user_name'],
			'created_by' => $data['user_name'],
			'inventary_date' => $data['scan_date_time']
		);

		if ((!empty($mstinv)) && (!empty($detailinv))) {
			$this->db->insert('mst_inventry', $mstinv);
			$this->db->insert_batch('inventry_log', $detailinv);
			echo json_encode(array("data" => " Success!"));
		} else {
			echo json_encode(array("data" => " No input found or list is empty !"));
		}
	}

	function Scan_Data()
	{
		if (!empty($tag_is = $_GET['tagid'])) {
			if (!empty($result = $this->API_Model->Get_Identify_Data($tag_is))) {
				print_r(json_encode(array("msg" => "Found", "data" => $result)));
				//print_r(json_encode($result,JSON_PRETTY_PRINT));
			} else {
				//echo json_encode(array("data"=>"No Data Found !"));
				print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
				//echo json_encode(array("msg"=>"No Data Found !"));
				//echo json_encode("No Match User Details");
			}
		} else {
			//print_r(json_encode(array("data"=>$result)));
			echo json_encode(array("msg" => " No Input Found !"));
		}
	}



	function Get_Tagdata()
	{
		if (!empty($tid = $_GET['tagid'])) {
			if (!empty($result = $this->API_Model->Get_Tagdata($tid))) {
				print_r(json_encode(array("msg" => "Found", "data" => $result)));
				//print_r(json_encode($result,JSON_PRETTY_PRINT));
			} else {
				//echo json_encode(array("data"=>"No Data Found !"));
				print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
				//echo json_encode(array("msg"=>"No Data Found !"));
				//echo json_encode("No Match User Details");
			}
		} else {
			//print_r(json_encode(array("data"=>$result)));
			echo json_encode(array("msg" => " No Input Found !"));
		}
	}

	function Post_Temp_TransferData()
	{
		header('Content-Type: application/json');
		$jeson = file_get_contents('php://input');
		$data = json_decode($jeson, true);
		if (!empty($data['id']) && empty($this->API_Model->Check_transfer_log($data['tag_id'], $data['source_loc']))) {
			$logdata = array(
				'tag_id' => $data['tag_id'],
				'asset_id' => $data['id'],
				'asset_code' => $data['asset_code'],
				// 'UNIQUEID' => $data['UNIQUEID'],
				'source_loc' => $data['source_loc'],
				'source_dept' => $data['source_dept'],
				'destination_loc' => $data['destination_loc'],
				'desc_dept' => $data['desc_dept'],
				'created_by' => $data['transferby']
			);

			if ($this->API_Model->Add_TransferTemp($logdata) == TRUE) {
				echo json_encode(array("msg" => "Done"));
			} else {
				echo json_encode(array("msg" => "Insertion Error !"));
			}
		} else {
			echo json_encode(array("msg" => "Duplicate Entry !"));
		}
	}

	function Post_Temp_ChangeStatus()
	{
		header('Content-Type: application/json');
		$jeson = file_get_contents('php://input');
		$data = json_decode($jeson, true);
		if (!empty($data['id']) && empty($this->API_Model->Temp_AssetChange_Req($data['id'], $data['tag_id']))) {
			$logdata = array(
				'tag_id' => $data['tag_id'],
				'asset_id' => $data['id'],
				'asset_code' => $data['asset_code'],
				'current_status' => $data['old_ststus'],
				'new_status' => $data['new_status'],
				'cr_by' => $data['transferby']
			);

			if ($this->API_Model->Add_Temp_statuschangeLog($logdata) == TRUE) {
				echo json_encode(array("msg" => "Done"));
			} else {
				echo json_encode(array("msg" => "Insertion Error !"));
			}
		} else {
			echo json_encode(array("msg" => "Duplicate Entry !"));
		}
	}

	function Get_Temp_Tagdata()
	{
		if (!empty($plant = trim($_GET['plant']))) {
			if (!empty($result = $this->API_Model->Get_Temp_Tagdata($plant))) {
				print_r(json_encode(array("msg" => "Found", "data" => $result)));
				//print_r(json_encode($result,JSON_PRETTY_PRINT));
			} else {
				//echo json_encode(array("data"=>"No Data Found !"));
				print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
				//echo json_encode(array("msg"=>"No Data Found !"));
				//echo json_encode("No Match User Details");
			}
		} else {
			//print_r(json_encode(array("data"=>$result)));
			echo json_encode(array("msg" => " No Input Found !"));
		}
	}

	function Send_Asset_Temp_to_trans()
	{
		header('Content-Type: application/json');
		$jeson = file_get_contents('php://input');
		$data = json_decode($jeson, true);

		if (!empty($data['updatedby'])) {
			$blogtags = array();
			foreach ($data['datas'] as $row) {
				if (empty($row['tagid'])) {
					$row['tagid'] = "0";
				}
				$blogtags[] = array(
					'id' => $row['id'],
					'tag_id' => $row['tag_id'],
					'created_by' => $data['updatedby']
				);
				$id[] = $row['id'];
			}
			$ids =  implode(',', $id);
			if ($this->db->update_batch('temp_assets', $blogtags, 'id') && $this->API_Model->PostData_temp_to_trans($ids)) {
				echo json_encode(array("msg" => "Done !"));
			} else {
				echo json_encode(array("msg" => "Ids Not Found !"));
			}
		} else {
			echo json_encode(array("msg" => " No Input Found !"));
		}
	}

	function Get_Approved_Asset()
	{
		if ((!empty($tag_id = trim($_POST['tag_id']))) && (!empty($reader_id = trim($_POST['reader_id'])))) {
			if (!empty($result = $this->API_Model->Get_approve_transfer_asset($tag_id))) {
				print_r(json_encode(array("msg" => "Found", "data" => $result)));
				//print_r(json_encode($result,JSON_PRETTY_PRINT));
			} else {
				print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
			}
			$outlog = array(
				'tag_id' => $_POST['tag_id'],
				'reader_id' => $_POST['reader_id'],
				'action' => "OUT"
			);
			$this->db->insert('out_gate_log', $outlog);
		} else {
			//print_r(json_encode(array("data"=>$result)));
			echo json_encode(array("msg" => " No Input Found tag_id and reader_id !"));
		}
	}
	function Get_Inventory_list()
	{
		if (!empty($department = $_POST['department']) && !empty($location = $_POST['location'])) {
			if (!empty($result = $this->API_Model->Get_Invlist($department, $location))) {
				print_r(json_encode(array("msg" => "Found", "data" => $result)));
				//print_r(json_encode($result,JSON_PRETTY_PRINT));
			} else {
				//echo json_encode(array("data"=>"No Data Found !"));
				print_r(json_encode(array("msg" => " Not Found", "data" => $result)));
				//echo json_encode(array("msg"=>"No Data Found !"));
				//echo json_encode("No Match User Details");
			}
		} else {
			print_r(json_encode(array("data" => $result)));
			echo json_encode(array("msg" => " Not Found !"));
		}
	}
}
