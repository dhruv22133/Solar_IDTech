<?php 

class API_Model extends CI_Model
{
	
	function Match_Password($username,$password){
		$query = $this->db->query("SELECT t1.first_name,t1.last_name,t1.user_name,t1.email,t1.mobile_no,t1.emp_code,t1.user_type,t1.site,t1.plant,t2.plant_name
			FROM users AS t1
			LEFT JOIN `mst_plant` AS t2 ON t1.plant = t2.id			
			WHERE t1.user_name = '".$username."' and t1.password = '".$password."'");
		return $query->row();
	}
	function Mst_Cont(){
		$query = $this->db->query("select id,country_name from master_country_details");
		return $query->result_array();
	}

	function Mst_module(){
		$query = $this->db->query("select id,module_manufacture from master_module_manufacture");
		return $query->result_array();
	}

	function Mst_cell(){
		$query = $this->db->query("select id,cell_manufacture from master_cell_manufacture");
		return $query->result_array();
	}

	function Mst_iec(){
		$query = $this->db->query("select id,iec_certificate,iec_certificate_date from master_iec_certificate");
		return $query->result_array();
	}

	function Mst_module_name(){
		$query = $this->db->query("select id,module_name from master_module_name");
		return $query->result_array();
	}

	function Mst_company_settings(){
		$query = $this->db->query("select * from company_settings WHERE company_setting_status = 1 ORDER BY id ASC");
		return $query->result_array();
	}

	function write_tag(){
		$query = $this->db->query("select * from write_tag");
		return $query->result_array();
	}

	function post_writetag($userdata){
		$res = $this->db->insert("write_tag",$userdata);
		return $res;
	}

	function Get_Plant(){
		$query = $this->db->query("select id,plant_name from mst_plant");
		return $query->result_array();
	}

	function Get_Asset_Type(){
		$query = $this->db->query("select id,type_name from mst_asset_type");
		return $query->result_array();
	}

	function Get_Category(){
		$query = $this->db->query("select id,cat from mst_cat");
		return $query->result_array();
	}
	function Get_SubCategory(){
		$query = $this->db->query("select id,Assetsubcategory from mst_subcat");
		return $query->result_array();
	}

	function Get_Dept(){
		$query = $this->db->query("select id,dep_name from mst_Dep");
		return $query->result_array();
	}

	function Get_Location(){
		$query = $this->db->query("select id,location_name from mst_location");
		return $query->result_array();
	}

	function Get_Assets($department,$location,$asset_type,$cat,$Assetsubcategory,$accetcode){

		$whereArr = array();   
		$whereArr[] = "delete_atatus = '0'";

        if(!empty($department)) $whereArr[] = "AND t1.department = '".$department."'";
        if(!empty($location)) $whereArr[] = "AND t1.location = '".$location."'";
        if(!empty($asset_type)) $whereArr[] = "AND t1.asset_type = '".$asset_type."'";
        if(!empty($cat)) $whereArr[] = "AND  t1.cat = '".$cat."'";
        if(!empty($Assetsubcategory)) $whereArr[] = "AND t1.Assetsubcategory = '".$Assetsubcategory."'";
        if(!empty($accetcode)) $whereArr[] = "AND t1.asset_code = '".$accetcode."'";
        $whereStr = implode("  ", $whereArr);

		$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.value,t1.facility,
		t1.model,t1.device_sl_no,
		t1.invoice_no,t1.date_of_commissioning,t1.po_no,t1.Specification,
		t1.date_of_installation,t1.warranty,
		t1.asset_user,t1.UNIQUEID,t1.asset_code,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,mst_subcat.Assetsubcategory,mst_vendor.vendor,region.region,mst_city.city,mst_equipment_brand.equipment_brand,
		mst_Dep.dep_name,mst_plant.plant_name,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		WHERE $whereStr");
		return $query->result_array();
	}

	function Add_Inventry_Log($quary){
		if ($this->db->query("$quary")) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

	function Add_Inventry_master($inv_master){
		if ($this->db->query("$inv_master")) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

	function Check_transfer_log($tag_id,$loc){
		$query = $this->db->query("SELECT * FROM asset_transfer_log
		WHERE tag_id = '".$tag_id."' AND source_loc = '".$loc."' AND STATUS = '0'");
		return $query->result_array();

	}

	function Temp_AssetChange_Req($assetid,$tagid){
		$query = $this->db->query("SELECT * FROM `temp_asset_status` WHERE asset_id = '".$assetid."' AND tag_id = '".$tagid."' AND stsus = '0'");
		return $query->row();

	}

	function Add_Temp_statuschangeLog($logdata){
		if ($this->db->insert('temp_asset_status',$logdata)) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

	function Add_TransferTemp($logdata){
		if ($this->db->insert('asset_transfer_log',$logdata)) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

	public function batch_data($table, $data){
    $this->db->update_batch($table, $data, 'id'); // this will set the id column as the condition field
    return true;
	}

	function Get_Identify_Data($tag_is){
		$query = $this->db->query("SELECT mst_assets.*,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = mst_assets.department) AS dept_name,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = mst_assets.cat) AS cat,
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = mst_assets.Assetsubcategory) AS Assetsubcategory,
		(SELECT type_name FROM mst_asset_type WHERE mst_asset_type.id = mst_assets.asset_type) AS asset_type_name,
		(SELECT plant_name FROM mst_plant WHERE mst_plant.id = mst_assets.plant) AS plant_name,
		(SELECT location_name FROM mst_location WHERE mst_location.id = mst_assets.location) AS loc_name,
		(SELECT equipment_brand FROM mst_equipment_brand WHERE mst_equipment_brand.id = mst_assets.equipment_brand) AS equipment_brand,
		(SELECT vendor FROM mst_vendor WHERE mst_vendor.id = mst_assets.vendor) AS vendor,
		(SELECT city FROM mst_city WHERE mst_city.id = mst_assets.city) AS city,
		(SELECT region FROM region WHERE region.id = mst_assets.region) AS region,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = mst_assets.asset_status) AS asset_status
		FROM mst_assets

		WHERE tag_id = '".$tag_is."' and delete_atatus = '0'");
		return $query->result_array();
	}

	function Get_Tagdata($tid){
		$query = $this->db->query("SELECT id,tag_id,finance_asset_id,it_asset_code,asset_user,plant as source_plant_id,department as source_dept_id,
		(SELECT plant_name FROM mst_plant WHERE mst_plant .id= mst_assets.plant) AS plant_name,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = mst_assets.department) AS dep_name,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = mst_assets.asset_status) AS status_name
		FROM mst_assets WHERE delete_atatus = '0' AND tag_id = '".$tid."'");
		return $query->result_array();
	}

	function Get_Temp_Tagdata($plant){
		$query = $this->db->query("SELECT id,tag_id,finance_asset_id,it_asset_code,asset_user,plant,description,
		(SELECT plant_name FROM mst_plant WHERE mst_plant .id= temp_assets.plant) AS plant_name,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = temp_assets.department) AS dep_name,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = temp_assets.asset_status) AS status_name
		FROM temp_assets WHERE plant = '".$plant."' AND tag_id='0'");
		return $query->result_array();
	}

	function PostData_temp_to_trans($ids){
		if($this->db->query("INSERT INTO mst_assets (tag_id,asset_type,asset_name,VALUE,invoice_no,facility,region,city,date_of_commissioning,Specification,
equipment_brand,asset_code,date_of_installation,warranty,Remarks,Assetsubcategory,cat,department,plant
		,model,device_sl_no,location,vendor,po_no,asset_user,asset_status
		,created_by) SELECT tag_id,asset_type,asset_name,VALUE,invoice_no,facility,region,city,date_of_commissioning,Specification,
equipment_brand,asset_code,date_of_installation,warranty,Remarks,Assetsubcategory,cat,department,plant
		,model,device_sl_no,location,vendor,po_no,asset_user,asset_status
		,created_by FROM `temp_assets` WHERE id in (".$ids.") and tag_id > '1';
			")){
			$this->db->query("DELETE FROM temp_assets WHERE id in (".$ids.");");
			return TRUE;
		}else{
			return FALSE;
		}
	}


	function Get_approve_transfer_asset($tag_id){
		$query = $this->db->query("SELECT tag_id,asset_code,source_loc,source_dept,
		(SELECT location_name FROM mst_location WHERE asset_transfer_log.destination_loc =  mst_location.id) AS destination_loc ,
		(SELECT dep_name FROM mst_Dep WHERE asset_transfer_log.desc_dept =  mst_Dep.id) AS desc_dept,
		created_by,created_at 
		FROM asset_transfer_log
		WHERE tag_id = '".$tag_id."' AND STATUS = '1'");
		return $query->result_array();
	}
//inv list

	function Get_Invlist($department,$location){
		$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.value,t1.facility,
		t1.model,t1.device_sl_no,t1.location,mst_city.city,mst_vendor.vendor,mst_equipment_brand.equipment_brand,region.region,
		t1.invoice_no,t1.date_of_commissioning,t1.po_no,t1.Specification,
		t1.date_of_installation,t1.warranty,t1.asset_status,
		t1.asset_user,t1.UNIQUEID,t1.asset_code,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,
		mst_Dep.dep_name,mst_plant.plant_name,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN region ON t1.region = region.id
		WHERE t1.department = '".$department."' AND t1.location = '".$location."' AND delete_atatus = '0'");
		return $query->result_array();
	}

	function GetAssetByid($id){
		$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.value,t1.facility,
		t1.model,t1.device_sl_no,t1.location,
		t1.invoice_no,t1.date_of_commissioning,t1.po_no,t1.Specification,
		t1.date_of_installation,t1.warranty,mst_vendor.vendor,region.region,mst_city.city,mst_equipment_brand.equipment_brand,
		t1.asset_user,t1.UNIQUEID,t1.asset_code,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,mst_subcat.Assetsubcategory,
		mst_Dep.dep_name,mst_plant.plant_name,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		WHERE t1.id = '".$id."'");
		return $query->row();
	}


}

?>