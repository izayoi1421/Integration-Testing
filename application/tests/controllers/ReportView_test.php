<?php
use Kenjis\CI3Compatible\CI_Controller;
class ReportIntegrationTest extends CIPHPUnitTestCase
{
    protected $CI;

    public function setUp(): void
    {
        $this->CI = &get_instance();
        $this->CI->load->model("Report_model"); 
        $this->CI->load->model("Menu_model"); 
        $this->Rmodel = $this->CI->Report_model;
     
    }

    public function testSummonIntegration()
    {

        // Simulate interaction with Report/index module

        $output = $this->request('GET', ['Report', 'index']);

        $this->assertStringContainsString('645cc65f5fa39', $output);
        

                   $this->resetInstance();

                   $scheduleSummonUrl = 'report/schedule_summon/645cc77eecea9'; // Replace {id} with the actual ID value from the table
               
           
                   // Set the X-Requested-With header
                   $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
           
                   // Send a test HTTP request to the "Make Schedule" URL
                
                   $request = $this->request('GET', $scheduleSummonUrl);
                   $this->assertResponseCode(200); // Assert that the response status code is 200 (OK)
                   $this->assertStringContainsString('645cc65f5fa39', $request);

 
    
   
    

    }
}
