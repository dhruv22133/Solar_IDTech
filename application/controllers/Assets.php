<?php
class Assets extends CI_Controller
{
  public function __construct(){
        parent::__construct();
        $this->isLogin = $this->session->userdata('user_logged');
        $this->load->model('Asset_Model', 'Asset_Model');
        $this->load->model('Master_Model', 'Master_Model');
        $this->load->model('API_Model', 'API_Model');
        $this->load->model('User_Model', 'User_Model');
        if(!$this->isLogin){
        redirect(base_url('index.php/Auth/Logout'));
        }
    }

  function Asset_Reg(){
    $data['asset_type'] = $this->Master_Model->Get_Asset_Type();
    $data['depts'] = $this->Master_Model->Get_Dep();
    $data['plants'] = $this->Master_Model->Get_Plant();
    $data['status'] = $this->Master_Model->Get_Status();
    $data['locations'] = $this->Master_Model->Get_Location();
    $data['cat'] = $this->Master_Model->Get_AssetClass();
    $data['region'] = $this->Master_Model->Get_region_data();
    $data['vendor'] = $this->Master_Model->Get_vendor_data();
    $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data();
    $data['city'] = $this->Master_Model->Get_city_data();
    $data['subcat'] = $this->Master_Model->Get_subcat();

if (isset($_POST['submit'])) {
     $this->form_validation->set_rules('tag_id',' Tag Id ','trim|required|max_length[24]|min_length[8]|is_unique[mst_assets.tag_id]');
     $this->form_validation->set_rules('asset_code',' asset_code ','trim|required|is_unique[mst_assets.asset_code]');
      
      if (!empty($_POST['non-tagable-assets']) && $_POST['non-tagable-assets'] == "1") {
        
        $_POST['tag_id'] = $_POST['asset_code']."1234567"."UN_TAG";
        $_POST['tag'] = "Untagged";
      }
       $this->form_validation->set_rules('asset_name',' Asset Name','trim');
       $this->form_validation->set_rules('cat','Category ','trim|required');
       $this->form_validation->set_rules('Assetsubcategory',' Sub Category','trim|required');
       $this->form_validation->set_rules('value',' Value','trim');
       $this->form_validation->set_rules('invoice_no',' Invoice No. ','trim');
       $this->form_validation->set_rules('facility',' facility','trim');
       $this->form_validation->set_rules('region',' region','trim');
       $this->form_validation->set_rules('city',' city','trim');
       $this->form_validation->set_rules('device_sl_no',' Serial No.','trim|required');;
       $this->form_validation->set_rules('date_of_commissioning',' date_of_commissioning','trim');
       $this->form_validation->set_rules('department',' Department','trim|required');
       $this->form_validation->set_rules('Assettype',' Assettype','trim');
       $this->form_validation->set_rules('model',' Equipment model','trim|required');
       $this->form_validation->set_rules('vendor','Vendor ','trim');
       $this->form_validation->set_rules('warranty',' Under warranty','trim|required');
       $this->form_validation->set_rules('location',' location','trim');
       $this->form_validation->set_rules('equipment_brand',' Equipment Brand ','trim|required');
       $this->form_validation->set_rules('date_of_installation',' date_of_installation ','trim');
      
       $this->form_validation->set_rules('Specification',' Specification','trim|required');
       $this->form_validation->set_rules('po_no',' PO Number ','trim');
       $this->form_validation->set_rules('asset_status','asset_status','trim|required');
       $this->form_validation->set_rules('asset_user',' asset_user ','trim');
       $this->form_validation->set_rules('Remarks',' Remarks ','trim|required');
       $this->form_validation->set_rules('Tag',' Tag ','trim');
                      
            if ($this->form_validation->run()== TRUE) {
                $userdata = array(
                            'tag_id' => $_POST['tag_id'],
                            'asset_name' =>$_POST['asset_name'],
                            'cat' => $_POST['cat'],
                            'Assetsubcategory' => $_POST['Assetsubcategory'],
                            'value' => $_POST['value'],
                            'invoice_no' => $_POST['invoice_no'],
                            'facility' => $_POST['facility'],
                            'region' => $_POST['region'],
                            'city' => $_POST['city'],
                            'device_sl_no' => $_POST['device_sl_no'],
                            'date_of_commissioning' => $_POST['date_of_commissioning'],
                            'department' => $_POST['department'],
                            'asset_type' => $_POST['Assettype'],
                            'model' => $_POST['model'],
                           // 'asset_class_1' => $_POST['Assetclass'],
                            'vendor' => $_POST['vendor'],
                            'warranty' => $_POST['warranty'],
                            'location' => $_POST['location'],
                            'equipment_brand' => $_POST['equipment_brand'],
                            'date_of_installation' => $_POST['date_of_installation'],
                            'asset_code' => $_POST['asset_code'],
                            'Specification' => $_POST['Specification'],
                            'po_no' => $_POST['po_no'],
                            'asset_status' => $_POST['asset_status'],
                            'asset_user' => $_POST['asset_user'],
                          //'UNIQUEID' => $_POST['UNIQUEID'],
                            'Remarks' => $_POST['Remarks'],
                            'Tag' => $_POST['Tag'],
                            'created_by' => $_SESSION['email'],
                            'creation_ip' => getenv("REMOTE_ADDR")
                            );
                if($this->Asset_Model->Asset_Registration($userdata) == TRUE){
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('ManageAssets/RegisterAssets'));
                }else{
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('ManageAssets/RegisterAssets'));
                }

            }else{
              $this->template->load('template', 'Admin/Manage_Assets/Asset_Registration',$data);
            }
    }else{
    $this->template->load('template', 'Admin/Manage_Assets/Asset_Registration',$data);
    }
  }




  function View_Assets(){
  
    $usertype = $_SESSION['user_type'];
    $data['assets'] = $this->Asset_Model->Get_Assets();
    $this->template->load('template', 'Admin/Manage_Assets/View_Assets',$data);
  }

  function View_Temp_Assets(){
    //$loc = $_SESSION['plant'];
    $id = $_SESSION['user_type'];
    $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    $data['assets'] = $this->Asset_Model->Get_Temp_Assets();
    $this->template->load('template', 'Admin/Manage_Assets/Temp_Assets',$data);
  }

  Function Edit_Asset($id){
      $data['id'] = $id;
      $data['asset_type'] = $this->Master_Model->Get_Asset_Type();
      $data['depts'] = $this->Master_Model->Get_Dep();
      $data['plants'] = $this->Master_Model->Get_Plant();
      $data['status'] = $this->Master_Model->Get_Status();
      $data['locations'] = $this->Master_Model->Get_Location();
      $data['cat'] = $this->Master_Model->Get_AssetClass();
      $data['subcat'] = $this->Master_Model->Get_subcat();
      $data['region'] = $this->Master_Model->Get_region_data();
      $data['vendor'] = $this->Master_Model->Get_vendor_data();
      $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data();
      $data['city'] = $this->Master_Model->Get_city_data();
      $data['assetdata'] = $this->Asset_Model->Get_Assets_byid($id);
      if (isset($_POST['submit'])) {
      $this->form_validation->set_rules('asset_name','Asset Name ','trim');
      $this->form_validation->set_rules('value',' Value','trim');
      $this->form_validation->set_rules('invoice_no',' Invoice No. ','trim');
      $this->form_validation->set_rules('facility',' facility','trim');
    // $this->form_validation->set_rules('region',' region','trim|required');
    //  $this->form_validation->set_rules('city',' city','trim|required');
     // $this->form_validation->set_rules('device_sl_no',' Serial No.','trim|required');;
      $this->form_validation->set_rules('date_of_commissioning',' date_of_commissioning','trim');
     // $this->form_validation->set_rules('model',' Equipment model','trim|required');
      $this->form_validation->set_rules('vendor','Vendor ','trim');
      $this->form_validation->set_rules('warranty',' Under warranty','trim|required');
       $this->form_validation->set_rules('location',' location','trim');
      //$this->form_validation->set_rules('equipment_brand',' Equipment Brand ','trim|required');
      $this->form_validation->set_rules('date_of_installation',' date_of_installation ','trim');
     // $this->form_validation->set_rules('asset_code',' asset_code ','trim|required');
      $this->form_validation->set_rules('Specification',' Specification','trim|required');
      $this->form_validation->set_rules('po_no',' PO Number','trim');
      $this->form_validation->set_rules('asset_status','asset_status','trim|required');
      $this->form_validation->set_rules('asset_user','asset_user','trim');
     // $this->form_validation->set_rules('UNIQUEID',' UNIQUEID','trim|required');
      $this->form_validation->set_rules('Remarks',' Remarks ','trim|required');
                           
            if ($this->form_validation->run()== TRUE) {
                $userdata = array(
                  'asset_name' =>$_POST['asset_name'],
                           // 'cat' => $_POST['cat'],
                            //'Assetsubcategory' => $_POST['Assetsubcategory'],
                            'value' => $_POST['value'],
                            'invoice_no' => $_POST['invoice_no'],
                            'facility' => $_POST['facility'],
                           // 'region' => $_POST['region'],
                           // 'city' => $_POST['city'],
                           // 'device_sl_no' => $_POST['device_sl_no'],
                            'date_of_commissioning' => $_POST['date_of_commissioning'],
                           // 'department' => $_POST['department'],
                           // 'asset_type' => $_POST['Assettype'],
                         //   'model' => $_POST['model'],
                           // 'asset_class_1' => $_POST['Assetclass'],
                            'vendor' => $_POST['vendor'],
                            'warranty' => $_POST['warranty'],
                            'location' => $_POST['location'],
                           // 'equipment_brand' => $_POST['equipment_brand'],
                            'date_of_installation' => $_POST['date_of_installation'],
                           // 'asset_code' => $_POST['asset_code'],
                            'Specification' => $_POST['Specification'],
                            'po_no' => $_POST['po_no'],
                            'asset_status' => $_POST['asset_status'],
                            'asset_user' => $_POST['asset_user'],
                          //'UNIQUEID' => $_POST['UNIQUEID'],
                            'Remarks' => $_POST['Remarks'],
                            'updated_at' => date('Y-m-d h:m:s'),
                            'updated_by' => $_SESSION['email'],
                            'updation_ip' => getenv("REMOTE_ADDR")
                  );
                if($this->Asset_Model->Update_asset($userdata,$id) == TRUE){
                    $this->session->set_flashdata('msg', ' Asset is Updated Successfully!');
                    redirect(base_url('ManageAssets/ManageAsset'));
                }else{
                    $this->session->set_flashdata('msg', ' Updation Error !');
                    redirect(base_url('ManageAssets/ManageAsset'));
                }
            }else{
              $this->template->load('template', 'Admin/Manage_Assets/Edit_Assets',$data);
            }
      }else{
      $this->template->load('template', 'Admin/Manage_Assets/Edit_Assets',$data);
      }
      
    }

  function Manage_Assets(){
    $id = $_SESSION['user_type'];
    $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    if (isset($_POST['submit'])) {
      //$tag_id = $_POST['tagid'];
      $data['assets'] = $this->Asset_Model->Get_Assets_search(trim($_POST['tagid']));
      $this->template->load('template', 'Admin/Manage_Assets/Manage_Assets',$data);
    }else{
    $data['assets'] = $this->Asset_Model->Get_Assets();
    $this->template->load('template', 'Admin/Manage_Assets/Manage_Assets',$data);
    }
  }

  Function Delete_Asset($id){
    $log = array(
                    'asset_id' => $id,
                    'type' => "Asset Deletion",
                    'source' => "ManageAssets/DeleteAssets/".$id,
                    'deletion_by' => $_SESSION['email'],
                    'ip' => getenv("REMOTE_ADDR"),
                    'description' => "Delete Asset");

        if($this->Asset_Model->Remove_log($log) == TRUE && $this->Asset_Model->Remove_Assets($id)){
      $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
      redirect(base_url('ManageAssets/ManageAsset'));
    }else{
      $this->session->set_flashdata('msg', ' Deletion Error !');
      redirect(base_url('ManageAssets/ManageAsset'));
    }
  }

  Function Transfer_Asset($id){
    if (isset($_POST['submit'])) {
      //print_r($_POST);
      $assetdata = $this->Asset_Model->Get_Assets_byid($id);
      $loc = $_POST['desc_loc'];
      $plant = $_POST['desc_plant'];
      $userdata = array(
                    'tagid' => $assetdata[0]['tag_id'],
                    'asset_id' => $assetdata[0]['id'],
                    'source_loc' => $assetdata[0]['loc_name'],
                    'source_plant' => $assetdata[0]['plant_name'],
                    'destination_loc' => $_POST['desc_loc'],
                    'dest_plant' => $_POST['desc_plant'],
                    'created_by' => $_SESSION['email'],
                    'creation_ip' => getenv("REMOTE_ADDR"));
      if($this->Asset_Model->Asset_Asset_Transfer_log($userdata) == TRUE && $this->Asset_Model->Transfer_mst_asset($id,$loc,$plant)){
      $this->session->set_flashdata('msg', ' Asset Transfer Successfully!');
      redirect(base_url('ManageAssets/Asset_Transfer/'.$id));
      }else{
        $this->session->set_flashdata('msg', ' Transection Error !');
        redirect(base_url('ManageAssets/Asset_Transfer/'.$id));
      }

    }else{
    $data['id'] = $id;
    $data['locations'] = $this->Master_Model->Get_Location();
    $data['asset_details'] = $this->Asset_Model->Get_Assets_byid($id);
    $data['plants'] = $this->Master_Model->Get_Plant();
        $this->load->view('admin/Manage_Assets/Asset_Transfer',$data);
      }
  }


  function Bulk_Upload_Assets(){
    $this->template->load('template', 'Admin/Manage_Assets/Bulk_Upload');
  }

  // Bulk Upload 

  function Asset_Registration_bulk(){
      $ip = $_SERVER['REMOTE_ADDR'];
      $by = $_SESSION['email'];
      ini_set('max_execution_time', 0); 
      ini_set('memory_limit', '-1');
      if (isset($_POST['submit'])) {
        $file = $_FILES['bulk_upload']['tmp_name'];
        $type = explode(".",$_FILES['bulk_upload']['name']);
        if(strtolower(end($type)) == 'csv'){
        $handle = fopen($file, "r");
              $c = 1;//
              while(($filesop = fgetcsv($handle, 10000, ",")) !== false)
              {
                $asset_name = $filesop[0];
                $category = $filesop[1];
                $Assetsubcategory = $filesop[2];
                $value = $filesop[3];
                $invoice_no = $filesop[4];
                $facility = $filesop[5];
                $region = $filesop[6];
                $city = $filesop[7];
                $serial_no =$filesop[8];
                $date_of_commissioning = date("Y-m-d", strtotime($filesop[9]));
                $department = $filesop[10];
                $Asset_type = $filesop[11];
                $model = $filesop[12];
                $vendor = $filesop[13];
                $warranty = date("Y-m-d", strtotime($filesop[14]));
                $location = $filesop[15];
                $equipment_brand = $filesop[16];
                $date_of_installation = date("Y-m-d", strtotime($filesop[17]));
                $asset_code = $filesop[18];
                $Specification = $filesop[19];
                $po_no = $filesop[20];
                 $asset_status = $filesop[21];
                $asset_user = $filesop[22];
              //  $UNIQUEID = $filesop[23];
                $Remarks = $filesop[23];
                           
                  if($c<>1){
                  //if (empty($this->Auth_Model->MatchTID($tagid))) {
                    $values[] = "('$asset_name','$category','$Assetsubcategory','$value','$invoice_no','$facility','$region','$city','$serial_no','$date_of_commissioning','$department','$Asset_type','$model','$vendor','$warranty','$location','$equipment_brand','$date_of_installation','$asset_code','$Specification','$po_no','$asset_status','$asset_user','$Remarks','$by','$ip')";
                  //}else{
                  //}
                  
                  
                  }

                  $c = $c + 1;

                  
              }
              if (!empty($values)) {
                try{
                    $formdata =  implode(',',$values);
                    $quary = "INSERT INTO `temp_assets` (`asset_name`,  `cat`, `Assetsubcategory`, `value`, `invoice_no`, `facility`, `region`, `city`, `device_sl_no`, `date_of_commissioning`,  `department`, `asset_type`, `model`, `vendor`,  `warranty`, `location`,  `equipment_brand`, `date_of_installation`, `asset_code`, `Specification`, `po_no`,  `asset_status`, `asset_user`,`Remarks`,`created_by`, `creation_ip`) VALUES $formdata;";
                    if ($this->Asset_Model->Ass_Bulk_date($quary) == TRUE) {
                      $this->session->set_flashdata('msg',' Successfully Uploaded Asset Data!');
                      redirect('index.php/ManageAssets/BulkUpload');
                     }else{
                      $this->session->set_flashdata('faliour',' Insertion Error !');
                    redirect('index.php/ManageAssets/BulkUpload');
                     }
                 }catch (Exception $e) {
                     echo $e;
                  }
                  }
              }else{
                $this->session->set_flashdata('failure',' File format is not match. Only .CSV format allowed. you try to upload :- '.strtolower(end($type)) ." file that is wrong format !");
                  redirect('index.php/Assets/Bulk_Upload_Assets');
              }

              
      }else{
      redirect('index.php/Assets/Bulk_Upload_Assets');
      }
    }

    Function Delete_Temp_Asset($id){
      if($this->Asset_Model->Remove_temp_Assets($id)){
        $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
        redirect(base_url('ManageAssets/ViewsTempAssets'));
      }else{
        $this->session->set_flashdata('msg', ' Deletion Error !');
        redirect(base_url('ManageAssets/ViewsTempAssets'));
      }
    }

    Function Edit_Temp_Asset($id){
      $data['id'] = $id;
      $data['asset_type'] = $this->Master_Model->Get_Asset_Type();
      $data['depts'] = $this->Master_Model->Get_Dep();
      $data['plants'] = $this->Master_Model->Get_Plant();
      $data['asset_status'] = $this->Master_Model->Get_Status();
      $data['locations'] = $this->Master_Model->Get_Location();
      $data['cat'] = $this->Master_Model->Get_AssetClass();
      $data['region'] = $this->Master_Model->Get_region_data();
      $data['vendor'] = $this->Master_Model->Get_vendor_data();
      $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data();
      $data['city'] = $this->Master_Model->Get_city_data();
      $data['subcat'] = $this->Master_Model->Get_subcat();
   
      $data['assetdata'] = $this->Asset_Model->Get_Temp_Assets_by_id($id);
      if (isset($_POST['submit'])) {
       $this->form_validation->set_rules('tag_id',' Tag Id','trim|required|max_length[24]|min_length[8]|is_unique[temp_assets.tag_id]');
      $this->form_validation->set_rules('asset_name','Asset Name ','trim|required');
      
     
      $this->form_validation->set_rules('value',' Value','trim|required');
      $this->form_validation->set_rules('invoice_no',' Invoice No. ','trim');
      $this->form_validation->set_rules('facility',' facility','trim|required');
    //  $this->form_validation->set_rules('region',' region','trim|required');
    //  $this->form_validation->set_rules('city',' city','trim|required');
     // $this->form_validation->set_rules('device_sl_no',' Serial No.','trim|required');;
      $this->form_validation->set_rules('date_of_commissioning',' date_of_commissioning','trim|required');

     
     // $this->form_validation->set_rules('model',' Equipment model','trim|required');
      $this->form_validation->set_rules('vendor','Vendor ','trim|required');
      $this->form_validation->set_rules('warranty',' Under warranty','trim|required');

      //$this->form_validation->set_rules('equipment_brand',' Equipment Brand ','trim|required');
      $this->form_validation->set_rules('date_of_installation',' date_of_installation ','trim|required');
     // $this->form_validation->set_rules('asset_code',' asset_code ','trim|required');
      $this->form_validation->set_rules('Specification',' Specification','trim');
       $this->form_validation->set_rules('po_no',' PO Number','trim');
      $this->form_validation->set_rules('asset_status','asset_status','trim');
      $this->form_validation->set_rules('asset_user','asset_user','trim');
     // $this->form_validation->set_rules('UNIQUEID',' UNIQUEID','trim|required');
          $this->form_validation->set_rules('Remarks',' Remarks ','trim');
                           
            if ($this->form_validation->run()== TRUE) {
                $userdata = array(
                 'asset_name' =>$_POST['asset_name'],
                           'tag_id' => $_POST['tag_id'],
                            //'Assetsubcategory' => $_POST['Assetsubcategory'],
                            'value' => $_POST['value'],
                            'invoice_no' => $_POST['invoice_no'],
                            'facility' => $_POST['facility'],
                           // 'region' => $_POST['region'],
                           // 'city' => $_POST['city'],
                           // 'device_sl_no' => $_POST['device_sl_no'],
                            'date_of_commissioning' => $_POST['date_of_commissioning'],
                           // 'department' => $_POST['department'],
                           // 'asset_type' => $_POST['Assettype'],
                         //   'model' => $_POST['model'],
                           // 'asset_class_1' => $_POST['Assetclass'],
                            'vendor' => $_POST['vendor'],
                            'warranty' => $_POST['warranty'],
                           // 'location' => $_POST['location'],
                           // 'equipment_brand' => $_POST['equipment_brand'],
                            'date_of_installation' => $_POST['date_of_installation'],
                           // 'asset_code' => $_POST['asset_code'],
                            'Specification' => $_POST['Specification'],
                            'po_no' => $_POST['po_no'],
                            'asset_status' => $_POST['asset_status'],
                            'asset_user' => $_POST['asset_user'],
                          //  'UNIQUEID' => $_POST['UNIQUEID'],
                            'Remarks' => $_POST['Remarks']
                  );
                if($this->Asset_Model->Update_temp_asset($userdata,$id) == TRUE){
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('ManageAssets/ViewsTempAssets'));
                }else{
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('ManageAssets/ViewsTempAssets'));
                }
            }else{
              $this->template->load('template', 'Admin/Manage_Assets/Edit_Temp_Asset',$data);
            }
      }else{
      $this->template->load('template', 'Admin/Manage_Assets/Edit_Temp_Asset',$data);
      }
      
    }


    Function TempTransferAssets(){
      
      $data['Get_TemptransferAssets'] = $this->Asset_Model->Get_TemptransferAssets();
      $this->template->load('template', 'Admin/Manage_Assets/TempTransferAssets',$data);
    }  

    Function Search_TempAsset(){
      if (isset($_POST['submit'])) {
        $asset_code = $_POST['asset_code'];
     
        $data['asset_code'] = $asset_code;
      
        $data['assetdata'] = $this->Asset_Model->GetTempAssetsMapp($asset_code);
        $data['asset_code'] = $this->Asset_Model->asset_code();
     
        $this->template->load('template', 'Admin/Manage_Assets/TempTransferAssets',$data);
      }else{
      $data['asset_code'] = $this->Asset_Model->asset_code();
    
      $this->template->load('template', 'Admin/Manage_Assets/TempTransferAssets',$data);
      }
    }

    function AddTidTempasset($id){
      $data['id'] =$id;
      if (isset($_POST['submit'])) {
        $this->form_validation->set_rules('tagid',' Tag Id','trim|required|max_length[24]|min_length[8]|is_unique[temp_assets.tag_id]|is_unique[mst_assets.tag_id]');
       
                      
            if ($this->form_validation->run()== TRUE) {
                $userdata = array(
                            'tag_id' => $_POST['tagid'],
                            
                            'updated_at' => date('Y-m-d h:m:s'),
                            'updated_by' => $_SESSION['email'],
                            'updation_ip' => getenv("REMOTE_ADDR")
                            );
                if($this->Asset_Model->Update_temp_asset($userdata,$id) == TRUE){
                    // Transfer data temp to trans
                  $ids = $id;
                  $this->API_Model->PostData_temp_to_trans($ids);
                  $this->session->set_flashdata('msg', ' Tag Mapped Successfully!');
                  redirect(base_url('Assets/Search_TempAsset'));
                }else{
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Assets/AddTidTempasset/'.$id));
                }

            }else{
              $data['assetdata'] = $this->Asset_Model->Get_Temp_Assets_by_id($id); 
              $this->template->load('template', 'Admin/Manage_Assets/AddTagTo_TempAsset',$data);
            }
      }else{
      $data['assetdata'] = $this->Asset_Model->Get_Temp_Assets_by_id($id); 
      $this->template->load('template', 'Admin/Manage_Assets/AddTagTo_TempAsset',$data);
    }
    }


    /* Asset Transfer List */

    function TransferAssetList(){
     // $loc = $_SESSION['plant'];
      $id = $_SESSION['user_type'];
      $data['list'] = $this->Asset_Model->Get_temp_transferassetList(); 
      $this->template->load('template', 'Admin/Manage_Assets/Asset_Transfer_able_list',$data);
    }

    function TransAssetStatusCrList(){
     // $loc = $_SESSION['plant'];
      $id = $_SESSION['user_type'];
      $data['list'] = $this->Asset_Model->TempAssetStatusList(); 
      $this->template->load('template', 'Admin/Manage_Assets/AssetStatusChangeableList',$data);
    }
    //
    
    function ChangeAssetStatusNow($id){
      if($this->Asset_Model->ApproveAssetStatus($id) == TRUE){
      $this->session->set_flashdata('msg', ' Asset Transfer Successfully!');
      redirect(base_url('index.php/Assets/TransAssetStatusCrList'));
      }else{
        $this->session->set_flashdata('faliour', ' Id Not Match !');
        redirect(base_url('index.php/Assets/TransAssetStatusCrList'));
      }
    }

    function DeleteStatusChangeRequest($id){
      if($this->Asset_Model->DeleteChangeStatusManufest($id) == TRUE){
      $this->session->set_flashdata('msg', ' Asset Delete Successfully!');
      redirect(base_url('index.php/Assets/TransAssetStatusCrList'));
      }else{
        $this->session->set_flashdata('faliour', ' Id Not Match !');
        redirect(base_url('index.php/Assets/TransAssetStatusCrList'));
      }
    }

    //
    function TransferAssetNow($id){
      if($this->Asset_Model->TransferAssetNow($id) == TRUE){
      $this->session->set_flashdata('msg', ' Asset Transfer Successfully!');
      redirect(base_url('Assets/TransferAssetList'));
      }else{
        $this->session->set_flashdata('faliour', ' Id Not Match !');
        redirect(base_url('Assets/TransferAssetList'));
      }
    }

    function Deletetransfermanufest($id){
      if($this->Asset_Model->Deletetransfermanufest($id) == TRUE){
      $this->session->set_flashdata('msg', ' Asset Delete Successfully!');
      redirect(base_url('Assets/TransferAssetList'));
      }else{
        $this->session->set_flashdata('faliour', ' Id Not Match !');
        redirect(base_url('Assets/TransferAssetList'));
      }
    }

    /* Delete Mass temp data */

    public function deleteSelectedTemp(){
        $ids = $this->input->post('ids');
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('temp_assets');
        echo json_encode(['success'=>"Item Deleted successfully."]);
      }

      Function Bulk_Upload_reg(){
        $this->template->load('template', 'Admin/Manage_Assets/Bulk_Upload_reg');
    }

           
    
    /*  Master  Bulk Upload reg */
    function Bulk_Uploadregisteration(){
      $ip = $_SERVER['REMOTE_ADDR'];
      $by = $_SESSION['email'];
      ini_set('max_execution_time', 0); 
      ini_set('memory_limit', '-1');
      if (isset($_POST['submit'])) {
        // Allowed mime types
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        // Validate whether selected file is a CSV file
        if(!empty($_FILES['bulk_reg']['name']) && in_array($_FILES['bulk_reg']['type'], $csvMimes)){
        // If the file is uploaded
          if(is_uploaded_file($_FILES['bulk_reg']['tmp_name'])){
          // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['bulk_reg']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            $flag = 0;
            // check if data is already present behalf of tyre sl no 
            while(($line = fgetcsv($csvFile)) !== FALSE){
              // Get row data 
              $tag_id = trim($line[0]);
               $asset_name = $line[1];
                $category = $line[2];
                $Assetsubcategory = $line[3];
                $value = $line[4];
                $invoice_no = $line[5];
                $facility = $line[6];
                $region = $line[7];
                $city = $line[8];
                $serial_no =$line[9];
                $date_of_commissioning = date("Y-m-d", strtotime($line[10]));
                $department = $line[11];
                $Asset_type = $line[12];
                $model = $line[13];
                $vendor = $line[14];
                $warranty = date("Y-m-d", strtotime($line[15]));
                $location = $line[16];
                $equipment_brand = $line[17];
                $date_of_installation = date("Y-m-d", strtotime($line[18]));
                $asset_code = trim($line[19]);
                $Specification = $line[20];
                $po_no = $line[21];
                $asset_status = $line[22];
                $asset_user = $line[23];
              //  $UNIQUEID = $line[24];
                $Remarks = $line[24];
                $Tag = $line[25];
              $Tag_data = $this->Asset_Model->Findtagunique($tag_id,$asset_code);
              
              
              if (!empty($Tag_data->tag_id) ){
                //echo "Battery Sl No ".$tag_id." Already Exist";  
                $flag = 1;
                $this->session->set_flashdata('faliour',' Tag Id '.$tag_id.' or Asset Code '.$asset_code.'Already Uploaded !');
                redirect('Assets/Bulk_Upload_reg');
              }else{
                $insert[] = array(
                  "tag_id" => $tag_id,
                  "asset_name" => $asset_name,
                  "cat"=> $category,
                  "Assetsubcategory" => $Assetsubcategory,
                  "value" => $value,
                  "invoice_no"=> $invoice_no,
                  "facility" => $facility,
                  "region" => $region,
                  "city"=> $city,
                  "device_sl_no" => $serial_no,
                  "date_of_commissioning" => $date_of_commissioning,
                  "department"=> $department,
                  "asset_type" => $Asset_type,
                  "model" => $model,
                  "vendor"=> $vendor,
                  "warranty" => $warranty,
                  "location" => $location,
                  "equipment_brand"=> $equipment_brand,
                  "date_of_installation" => $date_of_installation,
                  "asset_code" => $asset_code,
                  "Specification"=> $Specification,
                  "po_no"=> $po_no,
                  "asset_status"=>$asset_status,
                  "asset_user"=>$asset_user,
                 // "UNIQUEID"=>$UNIQUEID,
                  "Remarks"=>$Remarks,
                  "Tag"=>$Tag,
                  "created_by" => $by,
                  "creation_ip" => $ip,
                 );
                      
                         
              }
            }
            try{
            if ((!empty($insert)) && ($this->db->insert_batch('mst_assets',$insert))) {
              $this->session->set_flashdata('msg',' Successfully Uploded Bulk Data !');
              redirect('Assets/Bulk_Upload_reg');
            }else{
              $this->session->set_flashdata('faliour',' Insertion Error !');
              redirect('Assets/Bulk_Upload_reg');
            }
            }catch (Exception $e) {
              echo $e;
            }
            fclose($csvFile); // close the file 
            
          }else{
            $this->session->set_flashdata('faliour',' No File Found !');
            redirect('Assets/Bulk_Upload_reg');
          }
        }else{
         // file formate is wrong
          $this->session->set_flashdata('faliour',' No File Found or no match file format.');
            redirect('Assets/Bulk_Upload_reg');
        }
        // end submission
      }else{
        redirect('Assets/Bulk_Upload_reg');
      }
    }
}
?>