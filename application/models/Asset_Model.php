<?php 
class Asset_Model extends CI_Model
{
	function Asset_Registration($userdata){
		if($this->db->insert('mst_assets',$userdata)){
			return TRUE;
		}else{
			return false;
		}
	}
	function Findtagunique($tag_id,$asset_code){
    	$query = $this->db->query("SELECT * FROM mst_assets WHERE tag_id = '".$tag_id."' or asset_code = '".$asset_code."'");
        return $query->row();
    }

    function TempAssetStatusList(){
    	/*$query = $this->db->query("SELECT * FROM `temp_asset_status` WHERE stsus = '0' ORDER BY id DESC");
        return $query->result_array();*/

        	$query = $this->db->query("SELECT t1.id,t1.asset_id,t1.tag_id,t1.asset_code,t1.current_status,t1.cr_by,t1.cr_at,t1.approve_at,t1.approve_by,
			(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = t1.new_status) AS new_status     
			FROM temp_asset_status AS t1
			
			WHERE t1.stsus = '0'ORDER BY id DESC");
        return $query->result_array();
    }

	function Get_Assets_search($tagid){
	
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.asset_type,t1.value,t1.facility,t1.cat,
		t1.department,t1.plant,t1.region,t1.Tag,t1.model,t1.device_sl_no,t1.location,t1.vendor,t1.city,t1.invoice_no,t1.date_of_commissioning,t1.po_no,t1.Specification,t1.equipment_brand,t1.date_of_installation,t1.warranty,t1.Assetsubcategory,
		t1.asset_user,t1.asset_status,t1.UNIQUEID,t1.asset_code,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,
		mst_Dep.dep_name,mst_plant.plant_name,mst_vendor.vendor,mst_equipment_brand.equipment_brand,region.region,mst_city.city,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		 where t1.tag_id = '".$tagid."' and t1.delete_atatus = '0'AND t1.asset_status !='3'");
		return $query->result_array();

	
	}

	function Get_Assets_byid($id){
		$query = $this->db->query("SELECT mst_assets.*,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = mst_assets.department) AS dept_name,
		(SELECT type_name FROM mst_asset_type WHERE mst_asset_type.id = mst_assets.asset_type) AS asset_type_name,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = mst_assets.cat) AS cat,
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = mst_assets.Assetsubcategory) AS Assetsubcategory,
		(SELECT city FROM mst_city WHERE mst_city.id = mst_assets.city) AS city,
		(SELECT vendor FROM mst_vendor WHERE mst_vendor.id = mst_assets.vendor) AS vendor,
		(SELECT equipment_brand FROM mst_equipment_brand WHERE mst_equipment_brand.id = mst_assets.equipment_brand) AS equipment_brand,
		(SELECT region FROM region WHERE region.id = mst_assets.region) AS region,
		(SELECT location_name FROM mst_location WHERE mst_location.id = mst_assets.location) AS loc_name,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = mst_assets.asset_status) AS asset_status
		FROM mst_assets where id = '".$id."' and delete_atatus = '0'");
		return $query->result_array();
	}

	/*function Get_Assets($loc,$usertype){
		if($usertype == '1'){
			$query = $this->db->query("SELECT * FROM `Asset_Details`
			WHERE delete_atatus = '0'");
			return $query->result_array();
		}else{
			$query = $this->db->query("SELECT * FROM `Asset_Details`
			WHERE delete_atatus = '0' AND plant = '".$loc."'");
			return $query->result_array();
		}
		
	}*/


	function Get_Assets(){
		
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.asset_type,t1.value,t1.facility,t1.cat,
		t1.department,t1.plant,t1.region,t1.model,t1.device_sl_no,t1.location,t1.vendor,t1.city,t1.invoice_no,t1.Tag,t1.date_of_commissioning,t1.po_no,t1.Specification,t1.equipment_brand,t1.date_of_installation,t1.warranty,t1.Assetsubcategory,
		t1.asset_user,t1.asset_status,t1.UNIQUEID,t1.asset_code,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,mst_subcat.Assetsubcategory,
		mst_Dep.dep_name,mst_plant.plant_name,mst_vendor.vendor,mst_equipment_brand.equipment_brand,region.region,mst_city.city,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		WHERE t1.delete_atatus = '0'AND t1.asset_status !='3'");
			return $query->result_array();
		
		
	}



	function Remove_log($log){
		if($this->db->insert('deletion_log',$log)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Remove_Assets($id){
		if($this->db->query("UPDATE mst_assets SET delete_atatus = '1' WHERE id = '".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Remove_temp_Assets($id){
		if($this->db->query("DELETE FROM temp_assets WHERE id='".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}

	function Asset_Asset_Transfer_log($userdata){
		if($this->db->insert('asset_transfer_log',$userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Transfer_mst_asset($id,$loc,$plant){
		if($this->db->query("UPDATE mst_assets SET location = '".$loc."',plant = '".$plant."' WHERE id = '".$id."'")){
			return TRUE;
		}else{
			return false;
		}
	}


	function Get_Temp_Assets(){
	
			$query = $this->db->query("SELECT id,tag_id,Remarks,asset_name,value,facility,region,city,date_of_installation,date_of_commissioning,Specification,UNIQUEID,invoice_no,
warranty,equipment_brand,asset_code,cat,Assetsubcategory,asset_type,department,
		plant,model,device_sl_no,location,vendor,po_no,
		asset_user,asset_status,created_at,created_by,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = temp_assets.cat) AS cat,
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = temp_assets.Assetsubcategory) AS Assetsubcategory,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = temp_assets.department) AS dept_name,
	    (SELECT city FROM mst_city WHERE mst_city.id = temp_assets.city) AS city,
		(SELECT vendor FROM mst_vendor WHERE mst_vendor.id = temp_assets.vendor) AS vendor,
		(SELECT equipment_brand FROM mst_equipment_brand WHERE mst_equipment_brand.id = temp_assets.equipment_brand) AS equipment_brand,
		(SELECT region FROM region WHERE region.id = temp_assets.region) AS region,
		(SELECT type_name FROM mst_asset_type WHERE mst_asset_type.id = temp_assets.asset_type) AS asset_type_name,
		(SELECT location_name FROM mst_location WHERE mst_location.id = temp_assets.location) AS loc_name,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = temp_assets.asset_status) AS asset_status
		FROM temp_assets");
		return $query->result_array();
		
	}

	function Get_Temp_Assets_by_id($id){
		$query = $this->db->query("SELECT id,tag_id,asset_name,Remarks,value,facility,region,city,date_of_installation,date_of_commissioning,Specification,UNIQUEID,invoice_no,
warranty,equipment_brand,asset_code,cat,Assetsubcategory,asset_type,department,
		plant,model,device_sl_no,location,vendor,po_no,
		asset_user,asset_status,created_at,created_by,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = temp_assets.cat) AS cat,
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = temp_assets.Assetsubcategory) AS Assetsubcategory,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = temp_assets.department) AS dep_name,
	    (SELECT city FROM mst_city WHERE mst_city.id = temp_assets.city) AS city,
		(SELECT vendor FROM mst_vendor WHERE mst_vendor.id = temp_assets.vendor) AS vendor,
		(SELECT equipment_brand FROM mst_equipment_brand WHERE mst_equipment_brand.id = temp_assets.equipment_brand) AS equipment_brand,
		(SELECT region FROM region WHERE region.id = temp_assets.region) AS region,
		(SELECT type_name FROM mst_asset_type WHERE mst_asset_type.id = temp_assets.asset_type) AS asset_type_name,
		(SELECT location_name FROM mst_location WHERE mst_location.id = temp_assets.location) AS location,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = temp_assets.asset_status) AS status_name
		FROM temp_assets
		WHERE id = '".$id."'");
		return $query->result_array();
	}

	function Update_temp_asset($userdata,$id){
		$this->db->where('id',$id);
		if($this->db->update('temp_assets',$userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Update_asset($userdata,$id){
		$this->db->where('id',$id);
		if($this->db->update('mst_assets',$userdata)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Ass_Bulk_date($quary){
		if($this->db->query($quary)){
			return TRUE;
		}else{
			return false;
		}
	}

	function Get_TemptransferAssets(){
		$query = $this->db->query("SELECT id,tag_id,asset_id,asset_code,UNIQUEID,asset_status,source_loc,source_plant,source_dept,destination_loc,dest_plant,desc_dept,
			created_by,created_at,STATUS
			FROM asset_transfer_log
			WHERE STATUS = '0' ");
		return $query->result_array();
	}

	
	Function asset_code(){
		$query = $this->db->query("SELECT DISTINCT asset_code FROM temp_assets");
		return $query->result_array();
	}

	Function UNIQUEID(){
		$query = $this->db->query("SELECT DISTINCT UNIQUEID FROM temp_assets");
		return $query->result_array();
	}

	/*function GetTempAssetsMapp($asset_code){
		if(!empty($asset_code) && empty($UNIQUEID)) $whereArr[] = "asset_code ='".$asset_code."'";
        if(!empty($UNIQUEID) && empty($asset_code)) $whereArr[] = "UNIQUEID = '".$UNIQUEID."'";
        if(!empty($UNIQUEID) && !empty($asset_code)) $whereArr[] = "UNIQUEID = '".$UNIQUEID."' and asset_code = '".$asset_code."'";

        $whereStr = implode("  ", $whereArr);
		$query = $this->db->query("SELECT id,asset_code,UNIQUEID,department,Remarks,asset_user,asset_status,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = temp_assets.asset_status) AS status_name,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = temp_assets.department) AS dep_name,
		(SELECT location_name FROM mst_location WHERE mst_location.id = temp_assets.location) AS location,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = temp_assets.cat) AS cat,
		
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = temp_assets.Assetsubcategory) AS Assetsubcategory

		FROM temp_assets
		WHERE  $whereStr");
		return $query->result_array();	
	}*/
function GetTempAssetsMapp($asset_code){
		

      
		$query = $this->db->query("SELECT id,asset_code,department,Remarks,asset_user,asset_status,
		(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = temp_assets.asset_status) AS status_name,
		(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = temp_assets.department) AS dep_name,
		(SELECT location_name FROM mst_location WHERE mst_location.id = temp_assets.location) AS location,
		(SELECT cat FROM mst_cat WHERE mst_cat.id = temp_assets.cat) AS cat,
		
		(SELECT Assetsubcategory FROM mst_subcat WHERE mst_subcat.id = temp_assets.Assetsubcategory) AS Assetsubcategory

		FROM temp_assets
		WHERE asset_code = '".$asset_code."'");
		return $query->result_array();	
	}


	function Get_temp_transferassetList(){
	
			$query= $this->db->query("SELECT t1.id,t1.tag_id,t2.asset_code,t2.department,t2.asset_user,t1.source_loc,t1.source_dept,t1.created_at,t2.Remarks,
			
			(SELECT dep_name FROM mst_Dep WHERE mst_Dep.id = t1.desc_dept) AS desc_dept,
			(SELECT location_name FROM mst_location WHERE mst_location.id = t1.destination_loc) AS destination_loc,
			#(SELECT location_name FROM mst_location WHERE mst_location.id = t1.source_loc) AS source_loc,
			(SELECT status_name FROM mst_asset_status WHERE mst_asset_status.id = t2.asset_status) AS statusname     
			FROM asset_transfer_log AS t1
			INNER JOIN `mst_assets` AS t2 ON t1.asset_id = t2.id
			WHERE t1.status = '0'");
		return $query->result_array();
		}

	Function TransferAssetNow($id){
		$query = $this->db->query("UPDATE mst_assets
		INNER JOIN asset_transfer_log ON (mst_assets.tag_id = asset_transfer_log.tag_id)
		SET mst_assets.location = asset_transfer_log.destination_loc,
		mst_assets.department = asset_transfer_log.desc_dept
		WHERE asset_transfer_log.id = '".$id."'");
		if ($query) {
			$this->db->query("UPDATE asset_transfer_log SET status = '1'
			WHERE id = '".$id."'");
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function Deletetransfermanufest($id){
		$this->db->where('id', $id);
    	if($this->db->delete('asset_transfer_log')){
    	return TRUE;
    	}else{
    		return FALSE;
    	}
	}

	function DeleteChangeStatusManufest($id){
		$this->db->where('id', $id);
    	if($this->db->delete('temp_asset_status')){
    	return TRUE;
    	}else{
    		return FALSE;
    	}
	}

	Function ApproveAssetStatus($id){
		$query = $this->db->query("UPDATE mst_assets
		INNER JOIN temp_asset_status ON (mst_assets.tag_id = temp_asset_status.tag_id)
		SET mst_assets.asset_status = temp_asset_status.new_status
		WHERE temp_asset_status.id = '".$id."'");
		if ($query) {
			$this->db->query("UPDATE temp_asset_status SET stsus = '1'
			WHERE id = '".$id."'");
			return TRUE;
		}else{
			return FALSE;
		}
	}

}

?>