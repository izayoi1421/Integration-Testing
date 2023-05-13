<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Report_model');
        $this->load->library('pdf');        
    }

    // index view report
    public function index()
    {
        $data['title'] = 'Report Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['reports'] = $this->db->order_by('date_reported');
        $data['reports'] = $this->Report_model->getAll();      
        $data['reportsummon'] = $this->Report_model->getReportandSummon();  
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/admin_footer');
    }


    // add report
    public function addreport()
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 1) {
            redirect('auth');
        }
        $data['reportsummon'] = $this->Report_model->getReportandSummon();  
        $report = $this->Report_model;

        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status is required!'
        ]);

        $this->form_validation->set_rules('uqid', 'UQID', 'required', [
            'required' => 'UQID is required!'
        ]);
        $this->form_validation->set_rules('accused_name', 'Accused Name', 'required', [
            'required' => 'Accused Name is required!'
        ]);
        $this->form_validation->set_rules('address', 'Address', 'required', [
            'required' => 'Address is required!'
        ]);
        $this->form_validation->set_rules('age', 'Age', 'required|numeric', [
            'required' => 'Age is required!'
        ]);
        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|numeric', [
            'required' => 'Contact Number is required!'
        ]);
        $this->form_validation->set_rules('title', 'Report Title', 'required', [
            'required' => 'Report title is required!'
        ]);
        $this->form_validation->set_rules('description', 'Report Description', 'required', [
            'required' => 'Report description is required!'
        ]);
        $this->form_validation->set_rules('type', 'Select Type', 'required', [
            'required' => 'Select type is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Report';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['notif'] = $this->db->get_where('user_report', ['is_read' => 0])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('report/add_report');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed to report!</div>');
        } else {
            $report->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Reported successfully!</div>');
            redirect('user');
        }
    }

    // add summon
    public function addsummon()
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $report = $this->Report_model;

        $this->form_validation->set_rules('case_no', 'Case Number', 'required', [
            'required' => 'Case Number is required!'
        ]);

        $this->form_validation->set_rules('summon_detail', 'summon_detail', 'required', [
            'required' => 'Summon Detail is required!'
        ]);

        $this->form_validation->set_rules('summon_schedule', 'Summon Schedule', 'required', [
            'required' => 'Summon Schedule is required!'
        ]);
        $data['reportsummon'] = $this->Report_model->getReportandSummon();  

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Report';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['notif'] = $this->db->get_where('user_report', ['is_read' => 0])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('report/schedule_summon');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed to report!</div>');
        } else {
            $report->savesummon();
            

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Reported successfully!</div>');
            redirect('report');
        }
    }
// add summon
public function addsettlementinfo()
{
    if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
        redirect('auth');
    }
    $report = $this->Report_model;

    $this->form_validation->set_rules('case_no', 'Case Number', 'required', [
        'required' => 'Case Number is required!'
    ]);

    $this->form_validation->set_rules('settlement_agreement', 'Settlement Agreement', 'required', [
        'required' => 'Settlement Agreement is required!'
    ]);

    $this->form_validation->set_rules('kag_onduty', 'Kagawad On Duty', 'required', [
        'required' => 'Kagawad On Duty is required!'
    ]);

        $report->savesettlementinfo();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Reported successfully!</div>');
        redirect('report');
    
}


    // view detail report
    public function detail($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 1) {
            redirect('auth');
        }
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'is_read' => 1
            ];

            $this->db->update('user_report', $data, ['id' => $id]);
            $data['title'] = 'Report Detail Information';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['report'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['reportsummon'] = $this->Report_model->getReportandSummon();  
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('report/detail', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
            ];

            $this->db->update('user_report', $data, ['id' => $data['id']]);

            redirect('report/user_report_detail');
        }
    }

    // edit member
    public function update_detail($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {        

            $data['title'] = 'Report Update';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
            $data['limitsummon'] = $this->Report_model->countSummon();
            $data['reportsettlement'] = $this->Report_model->getReportandSettlement();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/update_detail', $data);
            $this->load->view('templates/admin_footer');
           
        } else {
            $data = [
                'is_read' => 2,
                'cases' => $this->input->post('cases'),
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
            ];

            $this->db->update('user_report', $data, ['id' => $data['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Report updated successfully!</div>');            
            return redirect(base_url('/report/update_detail/' . $id));
        }
    }

     // update status redirect to Schedule Summon
     public function update_detail_schedule($id)
     {
         if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
             redirect('auth');
         }
         
         $this->form_validation->set_rules('status', 'Status Report', 'required', [
             'required' => 'Status is required!'
         ]);
 
        
             $data = [
                 'is_read' => 2,
                 'id' => $this->input->post('id'),
                 'status' => $this->input->post('status'),
             ];
 
             $this->db->update('user_report', $data, ['id' => $data['id']]);
             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                 Report updated successfully!</div>');            
             return redirect(base_url('/report/schedule_summon/' . $id));
         
     }

    // schedule summon

    public function schedule_summon($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'is_read' => 2
            ];

            $this->db->update('user_report', $data, ['id' => $id]);

            $data['title'] = 'Schedule Summon';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
            $data['limitsummon'] = $this->Report_model->countSummon();
            
            $data['reportsummon'] = $this->Report_model->getReportandSummon();
            $data['reportsettlement'] = $this->Report_model->getReportandSettlement();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/schedule_summon', $data);
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed to Add Summon!</div>');
        } else {
            $data = [
                'is_read' => 2,
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
            ];


            $this->db->update('user_report', $data, ['id' => $data['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Summon added successfully!</div>');
            return redirect(base_url('/report/schedule_summon/' . $id));
        }
    }

    // schedule summon

    public function settlement($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'is_read' => 1
            ];

            $this->db->update('user_report', $data, ['id' => $id]);

            $data['title'] = 'Settlement';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
            $data['reportsettlement'] = $this->db->get_where('settlement_information', ['id' => $id])->row_array();
            $data['reportsettlement'] = $this->Report_model->getReportandSettlement();
            $data['limitsummon'] = $this->Report_model->countSummon();
            $data['reportsummon'] = $this->Report_model->getReportandSummon();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/settlement', $data);
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Failed to Add Summon!</div>');
        } else {
            $data = [
                'is_read' => 2,
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
            ];


            $this->db->update('user_report', $data, ['id' => $data['id']]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Summon added successfully!</div>');
            return redirect(base_url('/report/schedule_summon/' . $id));
        }
    }
    // view summon
    public function view_summon($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $data['title'] = 'View Summon History';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
        $data['reportsettlement'] = $this->db->get_where('settlement_information', ['id' => $id])->row_array();
        $data['limitsummon'] = $this->Report_model->countSummon();
        $data['reportsummon'] = $this->Report_model->getReportandSummon();
        $data['reportsettlement'] = $this->Report_model->getReportandSettlement();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('report/view_summon', $data);
        $this->load->view('templates/admin_footer');
    }
    // user view summon
    public function user_view_summon($id)
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 1) {
            redirect('auth');
        }
        $data['title'] = 'View Summon';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
        $data['limitsummon'] = $this->Report_model->countSummon();
        $data['reportsummon'] = $this->Report_model->getReportandSummon();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('report/user_view_summon', $data);
        $this->load->view('templates/admin_footer');
    }
    

    // add report
    public function addaction_taken()
    {
        if (!$this->session->userdata('is_logged_in()') && $this->session->userdata('role_id') == 2) {
            redirect('auth');
        }
        $report = $this->Report_model;

        $this->form_validation->set_rules('action_description', 'Action Detail', 'required', [
            'required' => 'Action Detail is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Report';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['notif'] = $this->db->get_where('user_report', ['is_read' => 0])->row_array();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('report/action_taken');
            $this->load->view('templates/admin_footer');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Failed to sent remark!</div>');
        } else {
            $report->saveremark();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Sent Remark successfully!</div>');
            redirect('report');
        }
    }

    // schedule summon

    public function action_taken($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'is_read' => 1
            ];

            $this->db->update('user_report', $data, ['id' => $id]);

            $data['title'] = 'Action Taken';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['lsummon'] = $this->db->get_where('summon', ['id' => $id])->row_array();
            $data['limitsummon'] = $this->Report_model->countSummon();
            $data['reportsummon'] = $this->Report_model->getReportandSummon();
            $data['reportremark'] = $this->Report_model->getReportandRemark();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/action_taken', $data);
            $this->load->view('templates/admin_footer');
        } else {



            return redirect(base_url('/report/action_taken/' . $id));
        }
    }

    // view summon
    public function view_action($id)
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status Report', 'required', [
            'required' => 'Status is required!'
        ]);

        if ($this->form_validation->run() == false) {
        
              
            $data['title'] = 'Give Remarks to Action';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
            $data['vremark'] = $this->db->get_where('user_remark', ['case_no' => $id])->row_array();
            $data['vremark'] = $this->Report_model->getRemark();
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('report/view_action', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'cases' => $this->input->post('cases'),
                'status' => $this->input->post('status'),
                'name' => $this->input->post('name'),
                'accused_name' => $this->input->post('accused_name'),
                'uqid' => $this->input->post('uqid'),
                'address' => $this->input->post('address'),
                'age' => $this->input->post('age'),
                'contactnum' => $this->input->post('contactnum'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
            ];

            $this->db->update('user_report', $data, ['id' => $data['id']]);

            redirect('report/user_report_detail');
        }
    }
    public function user_report_detail()
    {
        $data['title'] = 'History';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['userid'] = $this->db->get_where('user', ['id' => $this->session->userdata('email')])->row_array();
        $data['reports2'] = $this->db->order_by('date_reported', 'DESC');
        $data['reports2'] = $this->Report_model->getAll();
        $data['reportsummon'] = $this->Report_model->getReportandSummon();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('report/user_report_detail', $data);
        $this->load->view('templates/admin_footer');
    }

    /*
    // cancel own report
    public function cancelownreport($id = null)
    {
        $data = [
            'status' => $this->input->post('status'),         
        ];
            
        $this->db->update('user_report', $data, ['id' => $data['id']]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Report updated successfully!</div>');
        redirect('report/user_report_detail');
    }
*/

    // delete report

    public function report_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $html = $this->load->view('templates/admin_header', $data);

        $html = $this->load->view('report/report_pdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }
    public function first_hearing_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $data['summondetail'] = $this->db->get_where('summon', ['case_no' => $id])->row_array();
        $data['summondetail'] = $this->Report_model->getfirsthearing();
        $html = $this->load->view('templates/admin_header', $data);

        $html = $this->load->view('report/first_hearingpdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }

    public function second_hearing_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $data['summondetail'] = $this->db->get_where('summon', ['case_no' => $id])->row_array();
        $data['summondetail'] = $this->Report_model->getsecondhearing();
        $html = $this->load->view('templates/admin_header', $data);

        $html = $this->load->view('report/second_hearingpdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }

    public function third_hearing_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();
        $data['summondetail'] = $this->db->get_where('summon', ['case_no' => $id])->row_array();
        $data['summondetail'] = $this->Report_model->getthirdhearing();
        $html = $this->load->view('templates/admin_header', $data);
        $html = $this->load->view('report/third_hearingpdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }

    public function settlement_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();    
        $data['reportsettlement'] = $this->db->get_where('settlement_information', ['case_no' => $id])->row_array();        
        $html = $this->load->view('templates/admin_header', $data);
        $html = $this->load->view('report/settlement_pdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }

    public function endorsed_pdf($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ureport'] = $this->db->get_where('user_report', ['id' => $id])->row_array();    
        $data['reportsettlement'] = $this->db->get_where('settlement_information', ['case_no' => $id])->row_array();        
        $html = $this->load->view('templates/admin_header', $data);
        $html = $this->load->view('report/endorsed_pdf', [], true);
        $this->pdf->createPDF($html, 'Report PDF');
    }
    public function notifcontroler($id)
    {
        $data = [
            'is_read' => 1
        ];

        $this->db->update('user_report', $data, ['id' => $id]);

        return redirect(base_url('/report/update_detail/' . $id));
    }
    public function notifcontrolerusernotif($id)
    {
        $data = [
            'is_read' => 1
        ];

        $this->db->update('user_report', $data, ['id' => $id]);

        return redirect(base_url('/report/detail/' . $id));
    }

    public function summonnotifcontrolerusernotif($id)
    {

        
        $data = [
            'is_read' => 1
        ];

        $this->db->update('user_report', $data, ['id' => $id]);

        return redirect(base_url('/report/user_view_summon/' . $id));
    }

    public function deletereport($id = null)
    {
        if (!isset($id)) show_404();

        $report = $this->Report_model;
        if ($report->delete($id)) {
            redirect('report');
        }
    }
}
