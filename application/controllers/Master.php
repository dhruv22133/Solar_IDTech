<?php

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogin = $this->session->userdata('user_logged');
        $this->load->model('Master_Model', 'Master_Model');
        $this->load->model('User_Model', 'User_Model');
        if (!$this->isLogin) {
            redirect(base_url('index.php/Auth/Logout'));
        }
    }

    function country_details()
    {


        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('country_details', 'Country name', 'trim|required|is_unique[master_country_details.country_name]');

            if ($this->form_validation->run() == TRUE) {
                $userdata = array(
                    'country_name' => $_POST['country_details'],
                    // 'status' => "1",
                    'created_by' => $_SESSION['email'],
                    'created_at' => date('y-m-d')
                );
                if ($this->Master_Model->add_country_details($userdata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('Master/country_details'));
                } else {
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Master/country_details'));
                }
            } else {
                $data['locations'] = $this->Master_Model->get_country_details();
                $this->template->load('template', 'Admin/Master/country_details', $data);
            }
        } else {
            $data['locations'] = $this->Master_Model->get_country_details();
            $this->template->load('template', 'Admin/Master/country_details', $data);
        }
    }

    function Delete_country_details($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if ($this->Master_Model->Delete_country_details($id) == TRUE) {
                $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
                redirect(base_url('Master/country_details'));
            } else {
                $this->session->set_flashdata('msg', ' Deletion Error !');
                redirect(base_url('Master/country_details'));
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function Edit_country_details($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('country_details', 'Country name', 'trim|required|is_unique[master_country_details.country_name]');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'country_name' => $_POST['country_details'],
                        // 'status' => "1",
                        'created_by' => $_SESSION['email'],
                        'created_at' => date('Y-m-d'),

                    );
                    if ($this->Master_Model->Update_country_details($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                        redirect(base_url('Master/Edit_country_details/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', ' Updation Error !');
                        redirect(base_url('Master/Edit_country_details/' . $id));
                    }
                } else {
                    $data['location_data'] = $this->Master_Model->Get_country_details_byid($id);
                    $data['id'] = $id;
                    $this->template->load('template', 'Admin/Master/Edit/edit_country_details', $data);
                }
            } else {
                $data['location_data'] = $this->Master_Model->Get_country_details_byid($id);
                $data['id'] = $id;
                $this->template->load('template', 'Admin/Master/Edit/edit_country_details', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function module_manufacture()
    {


        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('module_manufacture', 'Module_Manufacture', 'trim|required|is_unique[master_module_manufacture.module_manufacture]');

            if ($this->form_validation->run() == TRUE) {
                $userdata = array(
                    'module_manufacture' => $_POST['module_manufacture'],
                    // 'status' => "1",
                    'created_by' => $_SESSION['email'],
                    'created_at' => date('y-m-d')
                );
                if ($this->Master_Model->add_module_manufacture($userdata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('Master/module_manufacture'));
                } else {
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Master/module_manufacture'));
                }
            } else {
                $data['locations'] = $this->Master_Model->get_module_manufacture();
                $this->template->load('template', 'Admin/Master/Module_Manufacture', $data);
            }
        } else {
            $data['locations'] = $this->Master_Model->get_module_manufacture();
            $this->template->load('template', 'Admin/Master/Module_Manufacture', $data);
        }
    }

    function Delete_module_manufacture($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if ($this->Master_Model->Delete_module_manufacture($id) == TRUE) {
                $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
                redirect(base_url('Master/module_manufacture'));
            } else {
                $this->session->set_flashdata('msg', ' Deletion Error !');
                redirect(base_url('Master/module_manufacture'));
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function Edit_module_manufacture($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('module_manufacture', 'Module_Manufacture', 'trim|required|is_unique[master_module_manufacture.module_manufacture]');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'module_manufacture' => $_POST['module_manufacture'],
                        // 'status' => "1",
                        'created_by' => $_SESSION['email'],
                        'created_at' => date('Y-m-d'),

                    );
                    if ($this->Master_Model->Update_module_manufacture($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                        redirect(base_url('Master/Edit_module_manufacture/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', ' Updation Error !');
                        redirect(base_url('Master/Edit_module_manufacture/' . $id));
                    }
                } else {
                    $data['location_data'] = $this->Master_Model->Get_module_manufacture_byid($id);
                    $data['id'] = $id;
                    $this->template->load('template', 'Admin/Master/Edit/edit_module_manufacture', $data);
                }
            } else {
                $data['location_data'] = $this->Master_Model->Get_module_manufacture_byid($id);
                $data['id'] = $id;
                $this->template->load('template', 'Admin/Master/Edit/edit_module_manufacture', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function cell_manufacture()
    {


        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('cell_manufacture', 'Cell_Manufacture', 'trim|required|is_unique[master_cell_manufacture.cell_manufacture]');

            if ($this->form_validation->run() == TRUE) {
                $userdata = array(
                    'cell_manufacture' => $_POST['cell_manufacture'],
                    // 'status' => "1",
                    'created_by' => $_SESSION['email'],
                    'created_at' => date('y-m-d')
                );
                if ($this->Master_Model->add_cell_manufacture($userdata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('Master/cell_manufacture'));
                } else {
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Master/cell_manufacture'));
                }
            } else {
                $data['locations'] = $this->Master_Model->get_cell_manufacture();
                $this->template->load('template', 'Admin/Master/cell_manufacture', $data);
            }
        } else {
            $data['locations'] = $this->Master_Model->get_cell_manufacture();
            $this->template->load('template', 'Admin/Master/cell_manufacture', $data);
        }
    }

    function Delete_cell_manufacture($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if ($this->Master_Model->Delete_cell_manufacture($id) == TRUE) {
                $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
                redirect(base_url('Master/cell_manufacture'));
            } else {
                $this->session->set_flashdata('msg', ' Deletion Error !');
                redirect(base_url('Master/cell_manufacture'));
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function Edit_cell_manufacture($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('cell_manufacture', 'Cell Manufacture', 'trim|required|is_unique[master_cell_manufacture.cell_manufacture]');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'cell_manufacture' => $_POST['cell_manufacture'],
                        // 'status' => "1",
                        'created_by' => $_SESSION['email'],
                        'created_at' => date('Y-m-d'),

                    );
                    if ($this->Master_Model->Update_cell_manufacture($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                        redirect(base_url('Master/Edit_cell_manufacture/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', ' Updation Error !');
                        redirect(base_url('Master/Edit_cell_manufacture/' . $id));
                    }
                } else {
                    $data['location_data'] = $this->Master_Model->Get_cell_manufacture_byid($id);
                    $data['id'] = $id;
                    $this->template->load('template', 'Admin/Master/Edit/edit_cell_manufacture', $data);
                }
            } else {
                $data['location_data'] = $this->Master_Model->Get_cell_manufacture_byid($id);
                $data['id'] = $id;
                $this->template->load('template', 'Admin/Master/Edit/edit_cell_manufacture', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function iec_certification()
    {


        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('iec_certificate', 'IEC_Certificate', 'trim|required|is_unique[master_iec_certificate.iec_certificate]');
            $this->form_validation->set_rules('iec_certificate_date', 'IEC_Certificate_date', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $userdata = array(
                    'iec_certificate' => $_POST['iec_certificate'],
                    // 'status' => "1",
                    'created_by' => $_SESSION['email'],
                    'created_at' => date('y-m-d'),
                    'iec_certificate_date' => $_POST['iec_certificate_date']
                );
                if ($this->Master_Model->add_iec_certification($userdata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('Master/iec_certification'));
                } else {
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Master/iec_certification'));
                }
            } else {
                $data['locations'] = $this->Master_Model->get_iec_certification();
                $this->template->load('template', 'Admin/Master/iec_certificate', $data);
            }
        } else {
            $data['locations'] = $this->Master_Model->get_iec_certification();
            $this->template->load('template', 'Admin/Master/iec_certificate', $data);
        }
    }

    function Delete_iec_certification($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if ($this->Master_Model->Delete_iec_certification($id) == TRUE) {
                $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
                redirect(base_url('Master/iec_certification'));
            } else {
                $this->session->set_flashdata('msg', ' Deletion Error !');
                redirect(base_url('Master/iec_certification'));
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function Edit_iec_certification($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('iec_certificate', 'IEC Certification', 'trim|required|is_unique[master_iec_certificate.iec_certificate]');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'iec_certificate' => $_POST['iec_certificate'],
                        // 'status' => "1",
                        'created_by' => $_SESSION['email'],
                        'created_at' => date('Y-m-d'),

                    );
                    if ($this->Master_Model->Update_iec_certification($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                        redirect(base_url('Master/Edit_iec_certification/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', ' Updation Error !');
                        redirect(base_url('Master/Edit_iec_certification/' . $id));
                    }
                } else {
                    $data['location_data'] = $this->Master_Model->Get_iec_certification_byid($id);
                    $data['id'] = $id;
                    $this->template->load('template', 'Admin/Master/Edit/edit_iec_certification', $data);
                }
            } else {
                $data['location_data'] = $this->Master_Model->Get_iec_certification_byid($id);
                $data['id'] = $id;
                $this->template->load('template', 'Admin/Master/Edit/edit_iec_certification', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function module_name()
    {


        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('module_name', 'Module_Name', 'trim|required|is_unique[master_module_name.module_name]');

            if ($this->form_validation->run() == TRUE) {
                $userdata = array(
                    'module_name' => $_POST['module_name'],
                    // 'status' => "1",
                    'created_by' => $_SESSION['email'],
                    'created_at' => date('y-m-d')
                );
                if ($this->Master_Model->add_module_name($userdata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('Master/module_name'));
                } else {
                    $this->session->set_flashdata('msg', ' Insertion Error !');
                    redirect(base_url('Master/module_name'));
                }
            } else {
                $data['locations'] = $this->Master_Model->get_module_name();
                $this->template->load('template', 'Admin/Master/module_name', $data);
            }
        } else {
            $data['locations'] = $this->Master_Model->get_module_name();
            $this->template->load('template', 'Admin/Master/module_name', $data);
        }
    }

    function Delete_module_name($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if ($this->Master_Model->Delete_module_name($id) == TRUE) {
                $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
                redirect(base_url('Master/module_name'));
            } else {
                $this->session->set_flashdata('msg', ' Deletion Error !');
                redirect(base_url('Master/module_name'));
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function Edit_module_name($id)
    {
        if ($_SESSION['user_type'] == 1) {
            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('module_name', 'Module Name', 'trim|required|is_unique[master_module_name.module_name]');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'module_name' => $_POST['module_name'],
                        // 'status' => "1",
                        'created_by' => $_SESSION['email'],
                        'created_at' => date('Y-m-d'),

                    );
                    if ($this->Master_Model->Update_module_name($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                        redirect(base_url('Master/Edit_module_name/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', ' Updation Error !');
                        redirect(base_url('Master/Edit_module_name/' . $id));
                    }
                } else {
                    $data['location_data'] = $this->Master_Model->Get_module_name_byid($id);
                    $data['id'] = $id;
                    $this->template->load('template', 'Admin/Master/Edit/edit_module_name', $data);
                }
            } else {
                $data['location_data'] = $this->Master_Model->Get_module_name_byid($id);
                $data['id'] = $id;
                $this->template->load('template', 'Admin/Master/Edit/edit_module_name', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }

    function company_settings()
    {
        $data['company'] = $this->Master_Model->get_country_details();
        $data['module'] = $this->Master_Model->get_module_manufacture();
        $data['cell_country'] = $this->Master_Model->get_country_details();
        $data['cell_module'] = $this->Master_Model->get_module_manufacture();
        $data['iec'] = $this->Master_Model->get_iec_certification();
        $data['locations'] = $this->Master_Model->get_company_settings_name();

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('pv_module', 'PV Module', 'trim|required');
            $this->form_validation->set_rules('warranty', 'Warranty', 'trim|required');
            $this->form_validation->set_rules('pv_country', 'PV Country', 'trim|required');
            $this->form_validation->set_rules('pv_module1', 'PV Module', 'trim|required');
            $this->form_validation->set_rules('pv_date', 'PV Date', 'trim|required');
            $this->form_validation->set_rules('cell_country', 'Cell Country', 'trim|required');
            $this->form_validation->set_rules('cell_module', 'Cell Module', 'trim|required');
            $this->form_validation->set_rules('cell_date', 'Cell Date', 'trim|required');
            $this->form_validation->set_rules('iec', 'IEC', 'trim|required');
            $this->form_validation->set_rules('iec_date', 'IEC Date', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $updatedata = array(
                    'pv_module' => $_POST['pv_module'],
                    'warranty' => $_POST['warranty'],
                    'pv_country' => $_POST['pv_country'],
                    'pv_module1' => $_POST['pv_module1'],
                    'pv_date' => $_POST['pv_date'],
                    'cell_country' => $_POST['cell_country'],
                    'cell_module' => $_POST['cell_module'],
                    'cell_date' => $_POST['cell_date'],
                    'iec' => $_POST['iec'],
                    'iec_date' => $_POST['iec_date'],
                    'company_setting_created_by' => $_SESSION['user_name'],
                    'company_setting_created_at' => date('d,m,y')
                );
                if ($this->Master_Model->add_country_settings($updatedata) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                    redirect(base_url('index.php/Master/company_settings'));
                } else {
                    $this->session->set_flashdata('msg', 'Insertion Error !');
                    redirect(base_url('index.php/Master/company_settings'));
                }
            } else {
                redirect(base_url('index.php/Master/company_settings'));
            }
        } else {

            $this->template->load('template', 'Admin/Master/Company_Settings', $data);
        }
    }

    function edit_company_setting($id)
    {
        if($_SESSION['user_type'] == 1) {
        $data['id'] = $id;
        $data['company'] = $this->Master_Model->get_country_details();
        $data['module'] = $this->Master_Model->get_module_manufacture();
        $data['cell_country'] = $this->Master_Model->get_country_details();
        $data['cell_module'] = $this->Master_Model->get_module_manufacture();
        $data['iec'] = $this->Master_Model->get_iec_certification();
        $data['locations'] = $this->Master_Model->get_company_settings_name();

        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('company_setting', 'Company Setting', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $updatedata = array(
                    'company_setting_status' => $_POST['company_setting'],
                    // 'status' => "1",
                    'company_setting_updated_by' => $_SESSION['email'],
                    'company_setting_updated_at' => date('Y-m-d'),

                );
                if ($this->Master_Model->Update_company_setting($updatedata, $id) == TRUE) {
                    $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
                    redirect(base_url('Master/edit_company_setting/' . $id));
                } else {
                    $this->session->set_flashdata('msg', ' Updation Error !');
                    redirect(base_url('Master/edit_company_setting/' . $id));
                }
            } else {
                $this->template->load('template', 'Admin/Master/Edit/edit_company_setting', $data);
            }
        } else {
            $this->template->load('template', 'Admin/Master/Edit/edit_company_setting', $data);
        }
    } else{
        redirect(base_url('index.php/Auth/Dashboard'));
    }
    }


    function edit_company_setting_all($id)
    {
        if ($_SESSION['user_type'] == 1) {
            $data['id'] = $id;
            $data['company'] = $this->Master_Model->get_country_details();
            $data['module'] = $this->Master_Model->get_module_manufacture();
            $data['cell_country'] = $this->Master_Model->get_country_details();
            $data['cell_module'] = $this->Master_Model->get_module_manufacture();
            $data['iec'] = $this->Master_Model->get_iec_certification();
            $data['locations'] = $this->Master_Model->get_company_settings_name();

            $data['userid'] = $this->Master_Model->get_company_setting_by_id($id);

            if (isset($_POST['submit'])) {
                $this->form_validation->set_rules('pv_module', 'PV Module', 'trim|required');
                $this->form_validation->set_rules('warranty', 'Warranty', 'trim|required');
                $this->form_validation->set_rules('pv_country', 'PV Country', 'trim|required');
                $this->form_validation->set_rules('pv_module1', 'PV Module', 'trim|required');
                $this->form_validation->set_rules('pv_date', 'PV Date', 'trim|required');
                $this->form_validation->set_rules('cell_country', 'Cell Country', 'trim|required');
                $this->form_validation->set_rules('cell_module', 'Cell Module', 'trim|required');
                $this->form_validation->set_rules('cell_date', 'Cell Date', 'trim|required');
                $this->form_validation->set_rules('iec', 'IEC', 'trim|required');
                $this->form_validation->set_rules('iec_date', 'IEC Date', 'trim|required');
                if ($this->form_validation->run() == TRUE) {
                    $updatedata = array(
                        'pv_module' => $_POST['pv_module'],
                        'warranty' => $_POST['warranty'],
                        'pv_country' => $_POST['pv_country'],
                        'pv_module1' => $_POST['pv_module1'],
                        'pv_date' => $_POST['pv_date'],
                        'cell_country' => $_POST['cell_country'],
                        'cell_module' => $_POST['cell_module'],
                        'cell_date' => $_POST['cell_date'],
                        'iec' => $_POST['iec'],
                        'iec_date' => $_POST['iec_date'],
                        'company_setting_updated_by' => $_SESSION['user_name'],
                        'company_setting_updated_at' => date('d,m,y')
                    );
                    if ($this->Master_Model->Update_company_setting($updatedata, $id) == TRUE) {
                        $this->session->set_flashdata('msg', ' Record is Added Successfully!');
                        redirect(base_url('index.php/Master/edit_company_setting_all/' . $id));
                    } else {
                        $this->session->set_flashdata('msg', 'Insertion Error !');
                        redirect(base_url('index.php/Master/edit_company_setting_all/' . $id));
                    }
                } else {
                    redirect(base_url('index.php/Master/edit_company_setting_all/' . $id));
                }
            } else {

                $this->template->load('template', 'Admin/Master/Edit/edit_company_settings_all', $data);
            }
        } else {
            redirect(base_url('index.php/Auth/Dashboard'));
        }
    }
    // function company_settings()
    // {
    //     $data['company'] = $this->Master_Model->get_country_details();
    //     $data['module'] = $this->Master_Model->get_module_manufacture();
    //     $data['cell_country'] = $this->Master_Model->get_country_details();
    //     $data['cell_module'] = $this->Master_Model->get_module_manufacture();
    //     $data['iec'] = $this->Master_Model->get_iec_certification();
    //     $this->template->load('template', 'Admin/Master/Company_Settings', $data);
    // }
    /* Rfid Reader Master */

    //     function CityMaster(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('city',' City Name','trim|required|is_unique[mst_city.city]');

    //             if ($this->form_validation->run()== TRUE) {

    //                 $userdata = array(
    //                             'city' => $_POST['city'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_city($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/CityMaster'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/CityMaster'));
    //                 }

    //             }else{
    //                 $data['city'] = $this->Master_Model->Get_city_data();
    //                 $this->template->load('template', 'Admin/Master/CityMaster',$data);
    //             }
    //         }else{
    //         $data['city'] = $this->Master_Model->Get_city_data();
    //         $this->template->load('template', 'Admin/Master/CityMaster',$data);
    //         }
    //     }

    //     Function Delete_City($id){
    //         if($this->Master_Model->Delete_City($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/CityMaster'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/CityMaster'));
    //         }
    //     }

    //     function Edit_City($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('city',' City Name','trim|required|is_unique[mst_city.city]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'city' => $_POST['city'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updated_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_city($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_City/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_City/'.$id));
    //                 }
    //             }else{
    //                 $data['city'] = $this->Master_Model->Get_city_data_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_City',$data);
    //             }
    //         }else{
    //         $data['city'] = $this->Master_Model->Get_city_data_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_City',$data);
    //         }
    //     }

    // /* Rfid Reader Master */

    //     function rfid_reader(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('reader_location',' reader location Name','trim|required|is_unique[rfid_reader.reader_location]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'reader_location' => $_POST['reader_location'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_rfid_reader($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/rfid_reader'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/rfid_reader'));
    //                 }

    //             }else{
    //                 $data['reader_location'] = $this->Master_Model->Get_rfid_reader_data();
    //                 $this->template->load('template', 'Admin/Master/rfid_reader',$data);
    //             }
    //         }else{
    //         $data['reader_location'] = $this->Master_Model->Get_rfid_reader_data();
    //         $this->template->load('template', 'Admin/Master/rfid_reader',$data);
    //         }
    //     }

    //     Function Delete_rfid_reader($id){
    //         if($this->Master_Model->Delete_rfid_reader($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/rfid_reader'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/rfid_reader'));
    //         }
    //     }

    //     function Edit_rfid_reader($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('reader_location',' reader location Name','trim|required|is_unique[rfid_reader.reader_location]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'reader_location' => $_POST['reader_location'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_rfid_reader($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_rfid_reader/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_rfid_reader/'.$id));
    //                 }
    //             }else{
    //                 $data['reader_location'] = $this->Master_Model->Get_rfid_reader_data_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_rfid_reader',$data);
    //             }
    //         }else{
    //         $data['reader_location'] = $this->Master_Model->Get_rfid_reader_data_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_rfid_reader',$data);
    //         }
    //     }

    // //Region 
    //       function region(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('region',' region ','trim|required|is_unique[region.region]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'region' => $_POST['region'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_region($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/region'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/region'));
    //                 }

    //             }else{
    //                 $data['region'] = $this->Master_Model->Get_region_data();
    //                 $this->template->load('template', 'Admin/Master/region',$data);
    //             }
    //         }else{
    //         $data['region'] = $this->Master_Model->Get_region_data();
    //         $this->template->load('template', 'Admin/Master/region',$data);
    //         }
    //     }

    //     Function Delete_region($id){
    //         if($this->Master_Model->Delete_region($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/region'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/region'));
    //         }
    //     }

    //     function Edit_region($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('region','  region ','trim|required|is_unique[region.region]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'region' => $_POST['region'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_region($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_region/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_region/'.$id));
    //                 }
    //             }else{
    //                 $data['region'] = $this->Master_Model->Get_region_data_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_region',$data);
    //             }
    //         }else{
    //         $data['region'] = $this->Master_Model->Get_region_data_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_region',$data);
    //         }
    //     }

    // //Vendor 
    //       function vendor(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('vendor',' vendor ','trim|required|is_unique[mst_vendor.vendor]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'vendor' => $_POST['vendor'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_vendor($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/vendor'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/vendor'));
    //                 }

    //             }else{
    //                 $data['vendor'] = $this->Master_Model->Get_vendor_data();
    //                 $this->template->load('template', 'Admin/Master/vendor',$data);
    //             }
    //         }else{
    //         $data['vendor'] = $this->Master_Model->Get_vendor_data();
    //         $this->template->load('template', 'Admin/Master/vendor',$data);
    //         }
    //     }

    //     Function Delete_vendor($id){
    //         if($this->Master_Model->Delete_vendor($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/vendor'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/vendor'));
    //         }
    //     }

    //     function Edit_vendor($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('vendor','  vendor ','trim|required|is_unique[mst_vendor.vendor]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'vendor' => $_POST['vendor'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_vendor($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_vendor/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_vendor/'.$id));
    //                 }
    //             }else{
    //                 $data['vendor'] = $this->Master_Model->Get_vendor_data_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_vendor',$data);
    //             }
    //         }else{
    //         $data['vendor'] = $this->Master_Model->Get_vendor_data_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_vendor',$data);
    //         }
    //     }

    //     //Equipment Brand 
    //       function equipment_brand(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('equipment_brand',' equipment_brand ','trim|required|is_unique[mst_equipment_brand.equipment_brand]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'equipment_brand' => $_POST['equipment_brand'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_equipment_brand($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/equipment_brand'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/equipment_brand'));
    //                 }

    //             }else{
    //                 $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data();
    //                 $this->template->load('template', 'Admin/Master/equipment_brand',$data);
    //             }
    //         }else{
    //         $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data();
    //         $this->template->load('template', 'Admin/Master/equipment_brand',$data);
    //         }
    //     }

    //     Function Delete_equipment_brand($id){
    //         if($this->Master_Model->Delete_equipment_brand($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/equipment_brand'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/equipment_brand'));
    //         }
    //     }

    //     function Edit_equipment_brand($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('equipment_brand','  equipment_brand ','trim|required|is_unique[mst_equipment_brand.equipment_brand]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'equipment_brand' => $_POST['equipment_brand'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_equipment_brand($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_equipment_brand/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_equipment_brand/'.$id));
    //                 }
    //             }else{
    //                 $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_equipment_brand',$data);
    //             }
    //         }else{
    //         $data['equipment_brand'] = $this->Master_Model->Get_equipment_brand_data_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_equipment_brand',$data);
    //         }
    //     }

    // /* Location Master */

    // 	function Location_Master(){
    //         $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {
    // 			$this->form_validation->set_rules('locname',' Location Name','trim|required|is_unique[mst_location.location_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(+
    //                             'location_name' => $_POST['locname'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_Location($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Location'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Location'));
    //                 }

    //             }else{
    //             	$data['locations'] = $this->Master_Model->Get_Location();
    //                 $this->template->load('template', 'Admin/Master/Location_Master',$data);
    //             }
    // 		}else{
    // 		$data['locations'] = $this->Master_Model->Get_Location();
    //         $this->template->load('template', 'Admin/Master/Location_Master',$data);
    // 		}
    // 	}

    // 	Function Delete_Location($id){
    // 		if($this->Master_Model->Delete_Location($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/Location'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/Location'));
    // 		}
    // 	}

    //     function Edit_Location($id){
    //         $privedid = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($privedid);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('locname',' Location Name','trim|required|is_unique[mst_location.location_name]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'location_name' => $_POST['locname'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_Location($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_Location/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_Location/'.$id));
    //                 }
    //             }else{
    //                 $data['location_data'] = $this->Master_Model->Get_Location_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_Location',$data);
    //             }
    //         }else{
    //         $data['location_data'] = $this->Master_Model->Get_Location_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_Location',$data);
    //         }
    //     }


    // 	/* Departmant Master */



    // 	function Dep_Master(){
    // 		$id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {
    // 			$this->form_validation->set_rules('deptname',' Departmant Name','trim|required|is_unique[mst_Dep.dep_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'dep_name' => $_POST['deptname'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_Dep($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Departmant'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Departmant'));
    //                 }

    //             }else{
    //             	$data['depts'] = $this->Master_Model->Get_Dep();
    //                 $this->template->load('template', 'Admin/Master/DepartmantMaster',$data);
    //             }
    // 		}else{
    // 		$data['depts'] = $this->Master_Model->Get_Dep();
    //         $this->template->load('template', 'Admin/Master/DepartmantMaster',$data);
    // 		}
    // 	}

    // 	Function Delete_Dept($id){
    // 		if($this->Master_Model->Delete_Dept($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/Departmant'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/Departmant'));
    // 		}
    // 	}

    //     function Edit_Dept($id){
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('deptname',' Department Name','trim|required|is_unique[mst_Dep.dep_name]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'dep_name' => $_POST['deptname'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_Dept($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_Dept/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_Dept/'.$id));
    //                 }
    //             }else{
    //                 $data['dept'] = $this->Master_Model->Get_Dep_by_id($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_Dept',$data);
    //             }
    //         }else{
    //         $data['dept'] = $this->Master_Model->Get_Dep_by_id($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_Dept',$data);
    //         }
    //     }



    // /*Asset Type Master */

    // 	function Accet_Type_master(){
    // 		$id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {
    // 			$this->form_validation->set_rules('asset_type_name',' Asset Type','trim|required|is_unique[mst_asset_type.type_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'type_name' => $_POST['asset_type_name'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_Asset_Type($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Asset_Type'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Asset_Type'));
    //                 }

    //             }else{
    //             	$data['asset_type'] = $this->Master_Model->Get_Asset_Type();
    //                 $this->template->load('template', 'Admin/Master/AssetTypeMaster',$data);
    //             }
    // 		}else{
    // 		$data['asset_type'] = $this->Master_Model->Get_Asset_Type();
    // 		//$this->load->view('admin/Master/Asset_Type_master',$data);
    //         $this->template->load('template', 'Admin/Master/AssetTypeMaster',$data);
    // 		}
    // 	}

    // 	Function Delete_Asset_Type($id){
    // 		if($this->Master_Model->Delete_Asset_Type($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/Asset_Type'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/Asset_Type'));
    // 		}
    // 	}

    //     function Edit_Asset_Type($id){
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('asset_type_name',' Asset type Name','trim|required|is_unique[mst_asset_type.type_name]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'type_name' => $_POST['asset_type_name'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_AssetType($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_Asset_Type/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_Asset_Type/'.$id));
    //                 }
    //             }else{
    //                 $data['assettype'] = $this->Master_Model->Get_Asset_Type_by_id($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_AssetTypeMaster',$data);
    //             }
    //         }else{
    //         $data['assettype'] = $this->Master_Model->Get_Asset_Type_by_id($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_AssetTypeMaster',$data);
    //         }
    //     }


    // /*Plant Master */

    // 	function Plant_Master(){
    // 		$id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {
    // 			$this->form_validation->set_rules('plant_name',' City(Office) Name','trim|required|is_unique[mst_plant.plant_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'plant_name' => $_POST['plant_name'],

    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_Plant($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Plant'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Plant'));
    //                 }

    //             }else{
    //             	$data['plants'] = $this->Master_Model->Get_Plant();
    //                 $this->template->load('template', 'Admin/Master/PlantMaster',$data);
    //             }
    // 		}else{
    // 		$data['plants'] = $this->Master_Model->Get_Plant();
    //         $this->template->load('template', 'Admin/Master/PlantMaster',$data);
    // 		}
    // 	}

    // 	Function Delete_Plant($id){
    //         if($this->Master_Model->Delete_Plant($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/Plant'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/Plant'));
    // 		}
    // 	}

    //     function Edit_Plant($id){
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('plant_name',' Plant Name','trim|required|is_unique[mst_plant.plant_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'plant_name' => $_POST['plant_name'],

    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updated_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_Plant($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_Plant/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_Plant/'.$id));
    //                 }
    //             }else{
    //                 $data['plant_name'] = $this->Master_Model->Get_Plant_by_id($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_PlantMaster',$data);
    //             }
    //         }else{
    //         $data['plant_name'] = $this->Master_Model->Get_Plant_by_id($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_PlantMaster',$data);
    //         }
    //     }

    // /* Asset Status Master */

    // 	function Asset_Status_master(){
    // 		$id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {
    // 			$this->form_validation->set_rules('satus_name',' Status Name','trim|required|is_unique[mst_asset_status.status_name]');

    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'status_name' => $_POST['satus_name'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_Status($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Asset_Status'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Asset_Status'));
    //                 }

    //             }else{
    //             	$data['status'] = $this->Master_Model->Get_Status();
    //                 $this->template->load('template', 'Admin/Master/AssetStatusMaster',$data);
    //             }
    // 		}else{
    // 		$data['status'] = $this->Master_Model->Get_Status();
    //         $this->template->load('template', 'Admin/Master/AssetStatusMaster',$data);
    // 		}
    // 	}

    // 	Function Delete_Status($id){
    // 		if($this->Master_Model->Delete_Status($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/Asset_Status'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/Asset_Status'));
    // 		}
    // 	}

    //     function Edit_AssetStatus($id){
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('satus_name',' Asset Status Name','trim|required|is_unique[mst_asset_status.status_name]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'status_name' => $_POST['satus_name'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_AssetStatus($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_AssetStatus/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_AssetStatus/'.$id));
    //                 }
    //             }else{
    //                 $data['status'] = $this->Master_Model->Get_Status_BYID($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_AssetStatusMaster',$data);
    //             }
    //         }else{
    //         $data['status'] = $this->Master_Model->Get_Status_BYID($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_AssetStatusMaster',$data);
    //         }
    //     }

    // 	/* Asset Class Master */ 

    // 	function Asset_Class_master(){
    // 		$id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    // 		if (isset($_POST['submit'])) {

    // 			$this->form_validation->set_rules('cat','  Category','trim|required|is_unique[mst_cat.cat]');        	            
    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(

    //                             'cat' => $_POST['cat'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_AssetClass($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/AssetClass'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/AssetClass'));
    //                 }

    //             }else{
    //             	$data['cat'] = $this->Master_Model->Get_AssetClass();
    //                 $this->template->load('template', 'Admin/Master/AssetClassMaster',$data);
    //             }
    // 		}else{
    // 		$data['cat'] = $this->Master_Model->Get_AssetClass();
    //         $this->template->load('template', 'Admin/Master/AssetClassMaster',$data);
    // 		}
    // 	}

    // 	Function Delete_Asset_Class($id){
    // 		if($this->Master_Model->Delete_AssetClass($id) == TRUE){
    // 			$this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    // 			redirect(base_url('Master/AssetClass'));
    // 		}else{
    // 			$this->session->set_flashdata('msg', ' Deletion Error !');
    // 			redirect(base_url('Master/AssetClass'));
    // 		}
    // 	}

    //     function Edit_AssetClass($id){
    //         if (isset($_POST['submit'])) {

    //             $this->form_validation->set_rules('cat',' Category Name','trim|required|is_unique[mst_cat.cat]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(

    //                             'cat' => $_POST['cat'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_AssetClass($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_AssetClass/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_AssetClass/'.$id));
    //                 }
    //             }else{
    //                 $data['cat'] = $this->Master_Model->Get_AssetClass_by_id($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_AssetClassMaster',$data);
    //             }
    //         }else{
    //         $data['cat'] = $this->Master_Model->Get_AssetClass_by_id($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_AssetClassMaster',$data);
    //         }
    //     }



    //     function Assetsubcategory(){
    //             $id = $_SESSION['user_type'];
    //         $data['privilledge'] = $this->User_Model->Get_Privilledge_list($id);
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('Assetsubcategory',' Sub Category Name','trim|required|is_unique[mst_subcat.Assetsubcategory]');                    
    //             if ($this->form_validation->run()== TRUE) {
    //                 $userdata = array(
    //                             'Assetsubcategory' => $_POST['Assetsubcategory'],
    //                             'status' => "1",
    //                             'created_by' => $_SESSION['email'],
    //                             'creation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Add_subcat($userdata) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Added Successfully!');
    //                     redirect(base_url('Master/Assetsubcategory'));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Insertion Error !');
    //                     redirect(base_url('Master/Assetsubcategory'));
    //                 }

    //             }else{
    //                 $data['subcat'] = $this->Master_Model->Get_subcat();
    //                 $this->template->load('template', 'Admin/Master/Assetsubcategory',$data);
    //             }
    //         }else{
    //         $data['subcat'] = $this->Master_Model->Get_subcat();
    //         $this->template->load('template', 'Admin/Master/Assetsubcategory',$data);
    //         }
    //     }
    //     function Edit_Assetsubcategory($id){
    //         if (isset($_POST['submit'])) {
    //             $this->form_validation->set_rules('Assetsubcategory','Sub Category','trim|required|is_unique[mst_subcat.Assetsubcategory]');
    //             if ($this->form_validation->run()== TRUE) {
    //                 $updatedata = array(
    //                             'Assetsubcategory' => $_POST['Assetsubcategory'],
    //                             'status' => "1",
    //                             'updated_at'=>date('Y-m-d h:m:s'),
    //                             'updated_by' => $_SESSION['email'],
    //                             'updation_ip' => getenv("REMOTE_ADDR")
    //                             );
    //                 if($this->Master_Model->Update_subcat($updatedata,$id) == TRUE){
    //                     $this->session->set_flashdata('msg', ' Record is Updated Successfully!');
    //                     redirect(base_url('Master/Edit_Assetsubcategory/'.$id));
    //                 }else{
    //                     $this->session->set_flashdata('msg', ' Updation Error !');
    //                     redirect(base_url('Master/Edit_Assetsubcategory/'.$id));
    //                 }
    //             }else{
    //                 $data['subcat'] = $this->Master_Model->Get_subcat_byid($id);
    //                 $data['id'] = $id;
    //                 $this->template->load('template', 'Admin/Master/Edit/Edit_Assetsubcategory',$data);
    //             }
    //         }else{
    //         $data['subcat'] = $this->Master_Model->Get_subcat_byid($id);
    //         $data['id'] = $id;
    //         $this->template->load('template', 'Admin/Master/Edit/Edit_Assetsubcategory',$data);
    //         }
    //     }
    // Function Delete_Assetsubcategory($id){
    //         if($this->Master_Model->Delete_Assetsubcategory($id) == TRUE){
    //             $this->session->set_flashdata('msg', ' Record is Deleted Successfully!');
    //             redirect(base_url('Master/Assetsubcategory'));
    //         }else{
    //             $this->session->set_flashdata('msg', ' Deletion Error !');
    //             redirect(base_url('Master/Assetsubcategory'));
    //         }
    //     }


}
