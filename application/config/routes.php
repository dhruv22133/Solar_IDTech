<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/* Route url */
$route['Dashboard']='Auth/Dashboard';

/* User Management */
$route['UserManagement/RegisterdUsers']='Users/All_Users';
$route['UserManagement/UserRegistration']='Users/Add_User';
$route['UserManagement/RoleLists']='Users/Role_List';
$route['UserManagement/AddRole']='Users/Add_Role';
$route['UserManagement/AddPrivilledge']='Users/Add_Privilledge';
$route['UserManagement/ChangPassword']='Users/Change_Password';


/*  Manage Assets */
$route['ManageAssets/RegisterAssets']='Assets/Asset_Reg';
$route['ManageAssets/ViewAssets']='Assets/View_Assets';
$route['ManageAssets/BulkUpload']='Assets/Bulk_Upload_Assets';
$route['ManageAssets/ViewsTempAssets']='Assets/View_Temp_Assets';
$route['ManageAssets/ManageAsset']='Assets/Manage_Assets';
$route['ManageAssets/TempTransferAssets']='Assets/TempTransferAssets';

/* Report section */
$route['Reports/AssetWise']='Report/Asset_Wise';
$route['Reports/PhysicalInventry']='Report/Physical_Inventry';
$route['Reports/AssetTransfer']='Report/Asset_Transfer';
$route['Reports/DeletedAssets']='Report/DeletedAssets';

/* Master */
$route['Master/Location']='Master/Location_Master';
$route['Master/Departmant']='Master/Dep_Master';
$route['Master/Asset_Type']='Master/Accet_Type_master';
$route['Master/Plant']='Master/Plant_Master';
$route['Master/Asset_Status']='Master/Asset_Status_master';
$route['Master/AssetClass']='Master/Asset_Class_master';
$route['Master/CostCenter']='Master/Asset_CostCenter';
$route['Master/DeleteLocation/(:any)']='Master/Delete_Location/$1';
$route['Master/DeleteDept/(:any)']='Master/Delete_Dept/$1';
$route['Master/DeleteAssetType/(:any)']='Master/Delete_Asset_Type/$1';
$route['Master/DeletePlant/(:any)']='Master/Delete_Plant/$1';
$route['Master/DeleteStatus/(:any)']='Master/Delete_Status/$1';
$route['Master/DeleteAssetclass/(:any)']='Master/Delete_Asset_Class/$1';
$route['Master/DeleteCostCenter/(:any)']='Master/Delete_CostCenter/$1';


$route['default_controller'] = 'Auth/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
