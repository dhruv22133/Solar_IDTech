<?php
class Master_Model extends CI_Model
{
	//region
		function Add_city($userdata){
		if($this->db->insert('mst_city', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_city_data(){
		$query = $this->db->query("select id,city,created_by from mst_city");
		return $query->result_array();
	}

	function Get_city_data_byid($id){
		$query = $this->db->query("select id,city,created_by from mst_city where id = '".$id."'");
		return $query->result_array();
	}

	function Update_city($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_city', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_City($id){
		if($this->db->query("DELETE FROM mst_city WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}
	//region
		function Add_region($userdata){
		if($this->db->insert('region', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_region_data(){
		$query = $this->db->query("select id,region,created_by from region");
		return $query->result_array();
	}

	function Get_region_data_byid($id){
		$query = $this->db->query("select id,region,created_by from region where id = '".$id."'");
		return $query->result_array();
	}

	function Update_region($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('region', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_region($id){
		if($this->db->query("DELETE FROM region WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}
	//vendor master

		function Add_vendor($userdata){
		if($this->db->insert('mst_vendor', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_vendor_data(){
		$query = $this->db->query("select id,vendor,created_by from mst_vendor");
		return $query->result_array();
	}

	function Get_vendor_data_byid($id){
		$query = $this->db->query("select id,vendor,created_by from mst_vendor where id = '".$id."'");
		return $query->result_array();
	}

	function Update_vendor($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_vendor', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_vendor($id){
		if($this->db->query("DELETE FROM mst_vendor WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	//Eqipment brand master

		function Add_equipment_brand($userdata){
		if($this->db->insert('mst_equipment_brand', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_equipment_brand_data(){
		$query = $this->db->query("select id,equipment_brand,created_by from mst_equipment_brand");
		return $query->result_array();
	}

	function Get_equipment_brand_data_byid($id){
		$query = $this->db->query("select id,equipment_brand,created_by from mst_equipment_brand where id = '".$id."'");
		return $query->result_array();
	}

	function Update_equipment_brand($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_equipment_brand', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_equipment_brand($id){
		if($this->db->query("DELETE FROM mst_equipment_brand WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}
//rfid reader
		function Add_rfid_reader($userdata){
		if($this->db->insert('rfid_reader', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_rfid_reader_data(){
		$query = $this->db->query("select id,reader_location,created_by from rfid_reader");
		return $query->result_array();
	}

	function Get_rfid_reader_data_byid($id){
		$query = $this->db->query("select id,reader_location,created_by from rfid_reader where id = '".$id."'");
		return $query->result_array();
	}

	function Update_rfid_reader($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('rfid_reader', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_rfid_reader($id){
		if($this->db->query("DELETE FROM rfid_reader WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}
	//location
	function Add_Location($userdata){
		if($this->db->insert('mst_location', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_Location(){
		$query = $this->db->query("select id,location_name,created_by from mst_location");
		return $query->result_array();
	}

	function Get_Location_byid($id){
		$query = $this->db->query("select id,location_name,created_by from mst_location where id = '".$id."'");
		return $query->result_array();
	}

	function Update_Location($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_location', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_Location($id){
		if($this->db->query("DELETE FROM mst_location WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}
	//Sub Category
	function Add_subcat($userdata){
		if($this->db->insert('mst_subcat', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_subcat(){
		$query = $this->db->query("select id,Assetsubcategory,created_by from mst_subcat");
		return $query->result_array();
	}

	function Get_subcat_byid($id){
		$query = $this->db->query("select id,Assetsubcategory,created_by from mst_subcat where id = '".$id."'");
		return $query->result_array();
	}

	function Update_subcat($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_subcat', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Delete_Assetsubcategory($id){
		if($this->db->query("DELETE FROM mst_subcat WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	/* Departmant master */
	function Add_Dep($userdata){
		if($this->db->insert('mst_Dep', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_Dep(){
		$query = $this->db->query("select id,dep_name,created_by from mst_Dep");
		return $query->result_array();
	}

	function Get_Dep_by_id($id){
		$query = $this->db->query("select id,dep_name,created_by from mst_Dep where id = '".$id."'");
		return $query->result_array();
	}

	function Delete_Dept($id){
		if($this->db->query("DELETE FROM mst_Dep WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_Dept($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_Dep', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	/* Asset Type master */

	function Add_Asset_Type($userdata){
		if($this->db->insert('mst_asset_type', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_Asset_Type(){
		$query = $this->db->query("select id,type_name,created_by from mst_asset_type");
		return $query->result_array();
	}

	function Get_Asset_Type_by_id($id){
		$query = $this->db->query("select id,type_name,created_by from mst_asset_type where id ='".$id."'");
		return $query->result_array();
	}

	function Delete_Asset_Type($id){
		if($this->db->query("DELETE FROM mst_asset_type WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_AssetType($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_asset_type', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}


/* Plant Master */

	function Add_Plant($userdata){
		if($this->db->insert('mst_plant', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_Plant(){
		$query = $this->db->query("select id,plant_name,created_by from mst_plant");
		return $query->result_array();
	}

	function Get_Plant_by_id($id){
		$query = $this->db->query("select id,plant_name,created_by from mst_plant where id ='".$id."' ");
		return $query->result_array();
	}

	function Get_Plant_ByID($id){
		$query = $this->db->query("select id,plant_name,created_by from mst_plant where id = '".$id."'");
		return $query->result_array();
	}

	function Delete_Plant($id){
		if($this->db->query("DELETE FROM mst_plant WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_Plant($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_plant', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	/* Asset Status Master */

	function Add_Status($userdata){
		if($this->db->insert('mst_asset_status', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_Status(){
		$query = $this->db->query("select id,status_name,created_by from mst_asset_status");
		return $query->result_array();
	}

	function Get_Status_BYID($id){
		$query = $this->db->query("select id,status_name,created_by from mst_asset_status where id ='".$id."' ");
		return $query->result_array();
	}

	function Delete_Status($id){
		if($this->db->query("DELETE FROM mst_asset_status WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_AssetStatus($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_asset_status', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	/* Asset Class Master */

	function Add_AssetClass($userdata){
		if($this->db->insert('mst_cat', $userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_AssetClass(){
		$query = $this->db->query("select id,cat,created_by from mst_cat");
		return $query->result_array();
	}

	function Get_AssetClass_by_id($id){
		$query = $this->db->query("select id,cat,created_by from mst_cat where id='".$id."' ");
		return $query->result_array();
	}

	function Delete_AssetClass($id){
		if($this->db->query("DELETE FROM mst_cat WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_AssetClass($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('mst_cat', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function add_country_details($userdata){
		if($this -> db -> insert('master_country_details',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_country_details(){
		$query = $this->db->query("select id,country_name,created_by from master_country_details");
		return $query->result_array();
	}



	function Update_country_details($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('master_country_details', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_country_details_byid($id){
		$query = $this->db->query("select id,country_name,created_by from master_country_details where id = '".$id."'");
		return $query->result_array();
	}

	function Delete_country_details($id){
		if($this->db->query("DELETE FROM master_country_details WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function add_module_manufacture($userdata){
		if($this -> db -> insert('master_module_manufacture',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_module_manufacture(){
		$query = $this->db->query("select id,module_manufacture,created_by from master_module_manufacture");
		return $query->result_array();
	}

	function Delete_module_manufacture($id){
		if($this->db->query("DELETE FROM master_module_manufacture WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_module_manufacture($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('master_module_manufacture', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_module_manufacture_byid($id){
		$query = $this->db->query("select id,module_manufacture,created_by from master_module_manufacture where id = '".$id."'");
		return $query->result_array();
	}

	function add_cell_manufacture($userdata){
		if($this -> db -> insert('master_cell_manufacture',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_cell_manufacture(){
		$query = $this->db->query("select id,cell_manufacture,created_by from master_cell_manufacture");
		return $query->result_array();
	}

	function Delete_cell_manufacture($id){
		if($this->db->query("DELETE FROM master_cell_manufacture WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_cell_manufacture($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('master_cell_manufacture', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_cell_manufacture_byid($id){
		$query = $this->db->query("select id,cell_manufacture,created_by from master_cell_manufacture where id = '".$id."'");
		return $query->result_array();
	}

	function add_iec_certification($userdata){
		if($this -> db -> insert('master_iec_certificate',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_iec_certification(){
		$query = $this->db->query("select id,iec_certificate,iec_certificate_date,created_by from master_iec_certificate");
		return $query->result_array();
	}

	function Delete_iec_certification($id){
		if($this->db->query("DELETE FROM master_iec_certificate WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_iec_certification($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('master_iec_certificate', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_iec_certification_byid($id){
		$query = $this->db->query("select id,iec_certificate,created_by from master_iec_certificate where id = '".$id."'");
		return $query->result_array();
	}

	function add_module_name($userdata){
		if($this -> db -> insert('master_module_name',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_module_name(){
		$query = $this->db->query("select id,module_name,created_by from master_module_name");
		return $query->result_array();
	}

	function Delete_module_name($id){
		if($this->db->query("DELETE FROM master_module_name WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_module_name($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('master_module_name', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_module_name_byid($id){
		$query = $this->db->query("select id,module_name,created_by from master_module_name where id = '".$id."'");
		return $query->result_array();
	}

	function add_country_settings($userdata){
		if($this -> db -> insert('company_settings',$userdata)){
			return true;
		}else{
			return false;
		}
	}

	function get_company_settings_name(){
		$query = $this->db->query("select id,pv_module,warranty,pv_country,pv_module1,pv_date,cell_country,cell_module,cell_date,company_setting_status from company_settings ORDER BY id ASC");
		return $query->result_array();
	}

	function Update_company_setting($updatedata,$id){
		$this->db->where('id', $id);
		if($this->db->update('company_settings', $updatedata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function get_company_setting_by_id($id){
		$query = $this->db->query("Select * from company_settings Where id = '".$id."'");
		return $query->result_array();
	}

	// function get_user(){
	// 	$uname = $_SESSION['user_name'];
	// 	$query = $this->db->query("select * from users WHERE user_name ='".$uname."'");
	// 	return $query -> result_array();
	// }
}
?>
