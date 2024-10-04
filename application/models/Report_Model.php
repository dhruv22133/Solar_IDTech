<?php

class Report_Model extends CI_Model
{
	function Get_Asset_Transfer()
	{

		$query = $this->db->query("SELECT * from write_tag");
		return $query->result_array();
	}


	function Get_Asset_Transfer_search($from, $to)
	{

		$query = $this->db->query("SELECT * from write_tag WHERE CAST(created_at AS DATE) BETWEEN '" . $from . "' AND '" . $to . "' ");
		return $query->result_array();
	}

	function Inventry($loc, $roleid)
	{
		if ($roleid == '1') {
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t2.it_asset_code,t2.finance_asset_id,t2.description,t2.asset_user,t1.scan_status,t2.department,t1.scan_time,
		(SELECT status_name FROM mst_asset_status WHERE t2.asset_status = mst_asset_status.id) AS status_name, 
        (select mst_Dep.dep_name from mst_Dep where t2.department = mst_Dep.id) as depname
		FROM inventry_log AS t1
		left JOIN mst_assets AS t2 ON t1.tag_id = t2.tag_id
		");
			return $query->result_array();
		} else {
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t2.it_asset_code,t2.finance_asset_id,t2.description,t2.asset_user,t1.scan_status,t2.department,t1.scan_time,
		(SELECT status_name FROM mst_asset_status WHERE t2.asset_status = mst_asset_status.id) AS status_name, 
        (select mst_Dep.dep_name from mst_Dep where t2.department = mst_Dep.id) as depname
		FROM inventry_log AS t1
		left JOIN mst_assets AS t2 ON t1.tag_id = t2.tag_id
		where t2.plant ='" . $loc . "'
		");
			return $query->result_array();
		}
	}

	function Inventry_Search($from, $to, $loc, $roleid)
	{
		if ($roleid == '1') {
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t2.it_asset_code,t2.finance_asset_id,t2.description,t2.asset_user,t1.scan_status,t2.department,t2.department,t1.scan_time,
		(SELECT status_name FROM mst_asset_status WHERE t2.asset_status = mst_asset_status.id) AS status_name,
		(select mst_Dep.dep_name from mst_Dep where t2.department = mst_Dep.id) as depname 
		FROM inventry_log AS t1
		LEFT JOIN mst_assets AS t2 ON t1.tag_id = t2.tag_id
		WHERE CAST(t1.scan_time AS DATE) BETWEEN '" . $from . "' AND '" . $to . "'");
			return $query->result_array();
		} else {
			$query = $this->db->query("SELECT t1.id,t1.tag_id,t2.it_asset_code,t2.finance_asset_id,t2.description,t2.asset_user,t1.scan_status,t2.department,t2.department,t1.scan_time,
		(SELECT status_name FROM mst_asset_status WHERE t2.asset_status = mst_asset_status.id) AS status_name,
		(select mst_Dep.dep_name from mst_Dep where t2.department = mst_Dep.id) as depname 
		FROM inventry_log AS t1
		LEFT JOIN mst_assets AS t2 ON t1.tag_id = t2.tag_id
		WHERE CAST(t1.scan_time AS DATE) BETWEEN '" . $from . "' AND '" . $to . "' and t2.plant ='" . $loc . "'");
			return $query->result_array();
		}
	}

	function Get_Asset_Wise_data()
	{

		$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.value,t1.invoice_no,t1.facility,t1.region,t1.city,t1.date_of_commissioning,t1.Specification,t1.Tag,t1.equipment_brand,
t1.asset_code,t1.date_of_installation,t1.warranty,t1.cat,t1.model,t1.device_sl_no,t1.vendor,t1.po_no,t1.asset_user,t1.Assetsubcategory,
t1.asset_type,t1.department,t1.location,t1.asset_status,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,mst_subcat.Assetsubcategory,
		mst_Dep.dep_name,mst_plant.plant_name,mst_vendor.vendor,mst_equipment_brand.equipment_brand,region.region,mst_city.city,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
        LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		WHERE t1.delete_atatus = '0'AND t1.asset_status !='3'
		");
		return $query->result_array();
	}

	function Get_Asset_Wise_data_search($tag_id, $asset_code, $Assettype, $cat, $Assetsubcategory, $department, $location, $asset_status, $frome, $todate)
	{

		$whereArr = array();

		if (!empty($tag_id)) $whereArr[] = "AND t1.tag_id LIKE '%" . $tag_id . "%'";
		// if(!empty($UNIQUEID)) $whereArr[] = "AND t1.UNIQUEID = '".$UNIQUEID."'";
		if (!empty($asset_code)) $whereArr[] = "AND t1.asset_code = '" . $asset_code . "'";
		if (!empty($Assettype)) $whereArr[] = "AND t1.asset_type = '" . $Assettype . "'";
		if (!empty($Assetsubcategory)) $whereArr[] = "AND t1.Assetsubcategory = '" . $Assetsubcategory . "'";

		if (!empty($cat)) $whereArr[] = "AND t1.cat = '" . $cat . "'";
		if (!empty($department)) $whereArr[] = "AND t1.department = '" . $department . "'";
		if (!empty($location)) $whereArr[] = "AND t1.location = '" . $location . "'";

		if (!empty($asset_status)) $whereArr[] = "AND t1.asset_status = '" . $asset_status . "'";

		$whereStr = implode("  ", $whereArr);

		$query = $query = $this->db->query("SELECT t1.id,t1.tag_id,t1.Remarks,t1.asset_name,t1.value,t1.invoice_no,t1.facility,t1.region,t1.city,t1.date_of_commissioning,t1.Specification,t1.Tag,t1.equipment_brand,
t1.asset_code,t1.date_of_installation,t1.warranty,t1.cat,t1.model,t1.device_sl_no,t1.vendor,t1.po_no,t1.asset_user,t1.Assetsubcategory,
t1.asset_type,t1.department,t1.location,t1.asset_status,t1.created_at,t1.created_by,
		mst_asset_type.type_name,mst_cat.cat,mst_subcat.Assetsubcategory,
		mst_Dep.dep_name,mst_plant.plant_name,mst_vendor.vendor,mst_equipment_brand.equipment_brand,region.region,mst_city.city,mst_location.location_name,mst_asset_status.status_name
		FROM mst_assets AS t1
		LEFT JOIN mst_asset_type ON t1.asset_type = mst_asset_type.id
		LEFT JOIN mst_subcat ON t1.Assetsubcategory = mst_subcat.id
		LEFT JOIN mst_cat ON t1.cat = mst_cat.id
		LEFT JOIN mst_vendor ON t1.vendor = mst_vendor.id
		LEFT JOIN mst_equipment_brand ON t1.equipment_brand = mst_equipment_brand.id
		LEFT JOIN mst_city ON t1.city = mst_city.id
		LEFT JOIN region ON t1.region = region.id
		LEFT JOIN mst_Dep ON t1.department = mst_Dep.id
		LEFT JOIN mst_plant ON t1.plant = mst_plant.id
		LEFT JOIN mst_location ON t1.location = mst_location.id
		LEFT JOIN mst_asset_status ON t1.asset_status = mst_asset_status.id
		WHERE t1.delete_atatus = '0' AND t1.asset_status !='3' AND CAST(t1.created_at AS DATE) BETWEEN '" . $frome . "' AND '" . $todate . "' $whereStr");
		return $query->result_array();
	}


	function Get_Deleted_assets()
	{

		$query = $this->db->query("SELECT t1.id,t1.tag_id,t1.asset_code,t1.department,t1.plant,t1.asset_user,t2.deletion_by,t2.deletion_at,
			t4.dep_name,t5.cat,t6.Assetsubcategory
			FROM mst_assets AS t1
			LEFT JOIN `deletion_log` AS t2 ON t1.id = t2.asset_id
			
			LEFT JOIN `mst_cat` AS t5 ON t1.cat = t5.id
			LEFT JOIN `mst_subcat` AS t6 ON t1.Assetsubcategory = t6.id
			LEFT JOIN `mst_Dep` AS t4 ON t1.department = t4.id
			WHERE delete_atatus = '1'  OR asset_status ='3'");
		return $query->result_array();
	}

	function Mst_Inventry()
	{

		$query = $this->db->query("SELECT* from mst_inventry ORDER BY id DESC");
		return $query->result_array();
	}

	function Detailed_inv_session($invid)
	{
		$query = $this->db->query("SELECT * from inventry_log
			WHERE inventry_id = '" . $invid . "'
ORDER BY id DESC LIMIT 5000");
		return $query->result_array();
	}


	function Search_Mst_Inventry($from, $to)
	{

		$query = $this->db->query("SELECT* from mst_inventry
WHERE DATE(inventary_date) BETWEEN '" . $from . "' AND '" . $to . "' ORDER BY id DESC");
		return $query->result_array();
	}
}
