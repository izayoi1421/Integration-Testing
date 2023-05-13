<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('user_report')->result_array();
    }

    public function getReportandSettlement(){
        
        $query = "SELECT * FROM settlement_information INNER JOIN user_report ON settlement_information.case_no = user_report.id";

        return $this->db->query($query)->result_array();
    }
    public function getReportandRemark(){
        
        $query = "SELECT * FROM user_remark INNER JOIN user_report ON user_remark.case_no = user_report.id";

        return $this->db->query($query)->result_array();
    }
    
    public function getReportandSummon(){
        
        $query = "SELECT *,summon_no FROM summon INNER JOIN user_report ON summon.case_no = user_report.id";

        return $this->db->query($query)->result_array();
    }

    public function countSummon(){
    
        $query = "SELECT *,COUNT(case_no) as ccn FROM summon INNER JOIN user_report ON summon.case_no = user_report.id GROUP BY case_no";

        return $this->db->query($query)->result_array();
    }

    public function getfirsthearing(){        
        $query = "SELECT *,summon_no FROM summon INNER JOIN user_report ON summon.case_no = user_report.id WHERE summon_no = '1st'";
        return $this->db->query($query)->result_array();
    }

    public function getsecondhearing(){        
        $query = "SELECT *,summon_no FROM summon INNER JOIN user_report ON summon.case_no = user_report.id WHERE summon_no = '2nd'";
        return $this->db->query($query)->result_array();
    }

    public function getthirdhearing(){        
        $query = "SELECT *,summon_no FROM summon INNER JOIN user_report ON summon.case_no = user_report.id WHERE summon_no = '3rd'";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_report', ['id' => $id])->row_array();
    }

    public function getByUqid($uqid)
    {
        return $this->db->get_where('user_report', ['uqid' => $uqid])->row_array();
    }



    public function save()
    {
        $post = $this->input->post();


        $this->id = uniqid();        
        $this->name = $post['name'];
        $this->uqid = $post['uqid'];
        $this->cases = "Unresolved";
        $this->address = $post['address'];
        $this->age = $post['age'];
        $this->contactnum = $post['contactnum'];
        $this->title = $post['title'];
        $this->description = $post['description'];
        $this->type = $post['type'];
        $this->status = $post['status'];
        $this->accused_name = $post['accused_name'];        
        $this->date_reported = date('Y-m-d H:i:s');
        $this->is_read = 0;
        $this->file = $this->_uploadFile();

        return $this->db->insert('user_report', $this);
    }

    public function savesummon()
    {
        $post = $this->input->post();


        $this->case_no = $post['case_no'];
        $this->summon_detail = $post['summon_detail'];
        $this->summon_schedule = $post['summon_schedule'];
        $this->user_id = $post['user_id'];
        $this->kag_onduty = $post['kag_onduty'];
        $this->summon_time = $post['summon_time'];
        $this->summon_no = $post['summon_no'];
        
 

        return $this->db->insert('summon', $this);
    }

    public function savesettlementinfo()
    {
        $post = $this->input->post();


        $this->case_no = $post['case_no'];
        $this->settlement_agreement = $post['settlement_agreement'];        
        $this->kag_onduty = $post['kag_onduty'];  
        $this->date_settled = date('Y-m-d H:i:s');
 

        return $this->db->insert('settlement_information', $this);
    }

    public function saveremark()
    {
        $post = $this->input->post();

        $this->case_no = $post['case_no'];
        $this->action_description = $post['action_description'];    
        $this->date_remark = date('Y-m-d H:i:s');
        
        return $this->db->insert('user_remark', $this);
    }

    public function getRemark(){
        
        $query = "SELECT case_no,action_description,date_remark FROM user_remark INNER JOIN user_report ON user_remark.case_no = user_report.id";

        return $this->db->query($query)->result_array();
    }
    public function updatestatussched()
    {
        $query = "UPDATE user_report
        SET status= 'On Process'";

        return $this->db->query($query)->result_array();
    }

    public function delete($id)
    {
        $this->_deleteFile($id);
        return $this->db->delete('user_report', ['id' => $id]);
    }

    private function _uploadFile()
    {
        $config['upload_path'] = './assets/img/report/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
        $config['file_name'] = $this->id;
        $config['overwrite'] = true;
        $config['max_size'] = '15000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    private function _deleteFile($id)
    {
        $report = $this->getById($id);

        if ($report['file'] != 'default.jpg') {
            $file_name = explode(".", $report['file'])[0];
            return array_map('unlink', glob(FCPATH . "assets/img/report/$file_name.*"));
        }
    }

    public function getTypeCount()
    {
        $query = "SELECT type, count(type) as tcount 
        FROM user_report 
        GROUP by type;";

        return $this->db->query($query)->result_array();
    }

    public function notifcontroler($id)
    {
        $data = [
            'is_read' => 1
        ];

        $this->db->update('user_report', $data, ['id' => ['id']]);
    }

    public function getDateReport()
    {
        $query = "SELECT date_reported, count(date_reported) as dcount
        FROM user_report
        GROUP by date_reported;";

        return $this->db->query($query)->result_array();
    }
    public function getMonthReport()
    {
        $query = "SELECT monthname(date_reported) as month ,date_reported AS date, COUNT(date_reported) AS mcount 
        FROM user_report 
        GROUP BY month DESC;";

        return $this->db->query($query)->result_array();
    }
        
    public function getRecordResolvedandUnresolved()
    {
        $query = "SELECT monthname(date_reported) as month ,date_reported AS date, cases AS record, COUNT(status) c_action,COUNT(date_reported) AS mcount 
        FROM user_report 
        WHERE cases='Resolved' OR cases='Unresolved'
        GROUP BY month,cases DESC;";

        return $this->db->query($query)->result_array();
    }
    public function getRecordComplaintStatus()
    {
        $query = "SELECT monthname(date_reported) as month ,date_reported AS date, status AS complaint, COUNT(status) scount,COUNT(date_reported) AS mcount 
        FROM user_report 
        WHERE status='Pending' OR status='On Process' OR status='Scheduled' OR status='Settled' OR status='Endorsed' OR status='Dismiss' OR status='Cancelled'
        GROUP BY month,status DESC;";

        return $this->db->query($query)->result_array();
    }
    public function getuserNotifNotReadModel()
    {
        $query = "SELECT user.image, user_report.uqid,user_report.status, user_report.id,user_report.name,user_report.title,user_report.type,user_report.date_reported,user_report.is_read 
        FROM user 
        INNER JOIN user_report 
        ON user.id = user_report.uqid 
        WHERE is_read='0' 
        ORDER BY date_reported DESC";

        return $this->db->query($query)->result_array();
    }
    public function getuserNotifReadModel()
    {
        $query = "SELECT user.image, user_report.uqid,user_report.status, user_report.id,user_report.name,user_report.title,user_report.type,user_report.date_reported,user_report.is_read 
        FROM user 
        INNER JOIN user_report 
        ON user.id = user_report.uqid 
        WHERE is_read='1' 
        ORDER BY date_reported DESC";

        return $this->db->query($query)->result_array();
    }
    public function getuserreportNotReadModel()
    {
        $query = "SELECT user.image, user_report.uqid,user_report.status, user_report.id,user_report.name,user_report.title,user_report.type,user_report.date_reported,user_report.is_read 
        FROM user 
        INNER JOIN user_report 
        ON user.id = user_report.uqid 
        WHERE is_read='2' ORDER BY date_reported DESC";

        return $this->db->query($query)->result_array();
    }
    public function getuserNoNotifYet()
    {
        $query = "SELECT user.image, user_report.uqid,user_report.status, user_report.id,user_report.name,user_report.title,user_report.type,user_report.date_reported,user_report.is_read 
        FROM user 
        INNER JOIN user_report 
        ON user.id = user_report.uqid 
        WHERE is_read='2' || is_read='1' ORDER BY date_reported DESC";

        return $this->db->query($query)->result_array();
    }
    public function getuserreportcountdoneReadModel()
    {
        $query = "SELECT user.image, user_report.uqid,user_report.status, user_report.id,user_report.name,user_report.title,user_report.type,user_report.date_reported,user_report.is_read FROM user INNER JOIN user_report ON user.id = user_report.uqid WHERE status='Done' ORDER BY date_reported DESC";

        return $this->db->query($query)->result_array();
    }

}